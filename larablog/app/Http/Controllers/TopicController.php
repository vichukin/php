<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Models\Block;
use Illuminate\Http\Request;
use MicrosoftAzure\Storage\Blob\Models\CreateBlockBlobOptions;
use MicrosoftAzure\Storage\Blob\Models\ListBlobsOptions;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Blob\Models\ListContainersOptions;
use MicrosoftAzure\Storage\Blob\BlobRestProxy;

class TopicController extends Controller
{
    public function Index(Request $request)
    {
        $page=1;
        $array = Topic::All();
        $currentId = request('topic');
        $topic=null;
        if($currentId!=null)
        {
            $topic = Topic::find($currentId);
            $search = request('search');
            if($search!=null)
            {
                $filteredBlocks = $topic->blocks()->where('Title', 'LIKE', '%' . $search . '%')->get();
                $topic->setRelation('Blocks', $filteredBlocks);
            }
        }
        return view("topic.index", compact('array', 'currentId',"topic","page","search"));
    }
    public function Create(){
        $page=2;
        $topics = Topic::All();
        return view("topic.create",compact("page","topics"));
    }
    public function CreateTopic(Request $request){
        $validated = $request->validate([
            'Title' => 'required|unique:topics|max:100'
        ]);

        $topic = Topic::create($validated);
        // The blog post is valid...

        return to_route("topic.index");
    }
    public function CreateBlock(Request $request){
        $request->validate([
            'block_Title' => 'required|max:255|unique:blocks,Title',
            'block_Content' => 'required',
            'block_ImagePath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Допустимые форматы и размер файла
            'topic_id' => 'required|exists:topics,id', // Проверка на существование темы
        ], [
            'block_Title.required' => 'The block title is required.',
            'block_Title.max' => 'The block title must not exceed 255 characters.',
            'block_Title.unique' => 'The block title must be unique.',
            'block_Content.required' => 'The block content is required.',
            'block_ImagePath.required' => 'The block image is required.',
            'block_ImagePath.image' => 'The block image must be an image file.',
            'block_ImagePath.mimes' => 'The block image must be in the format: jpeg, png, jpg, gif.',
            'block_ImagePath.max' => 'The block image must not exceed 2048 kilobytes.',
            'topic_id.required' => 'The topic selection is required.',
            'topic_id.exists' => 'The selected topic does not exist.',
        ]);

        // Обработка загруженного файла (если нужно)
        $url=null;
        if ($request->hasFile('block_ImagePath')) {
            $image = $request->file('block_ImagePath');
            $imageName = uniqid('image_') . '.' . $image->getClientOriginalExtension();
            $url = $this->uploadToAzureBlobStorage($image, $imageName);
        }

        // Создание нового экземпляра Block и сохранение в базу данных
        $block = new Block([
            'Title' => $request->input('block_Title'),
            'Content' => $request->input('block_Content'),
            'imagePath' => $url,
        ]);

        // Связываем с выбранной темой
        $block->topic()->associate($request->input('topic_id'));

        $block->save();

        return redirect("/");
    }
    private function uploadToAzureBlobStorage($file, $imageName)
    {
        $blobRestProxy = BlobRestProxy::createBlobService("AccountName=devstoreaccount1;AccountKey=Eby8vdM02xNOcqFlqUwJPLlmEtlCDXJ1OUzFT50uSRZ6IFsuFq2UVErCz4I6tq/K1SZFPTOtr/KBHBeksoGMGw==;DefaultEndpointsProtocol=http;BlobEndpoint=http://127.0.0.1:10000/devstoreaccount1;QueueEndpoint=http://127.0.0.1:10001/devstoreaccount1;TableEndpoint=http://127.0.0.1:10002/devstoreaccount1;");

        $containerName = 'block-image';

        // create container if not exists
        $listContainersOptions = new ListContainersOptions();
        $containers = $blobRestProxy->listContainers($listContainersOptions);

        $containerExists = false;
        foreach ($containers->getContainers() as $container) {
            if ($container->getName() === $containerName) {
                $containerExists = true;
                break;
            }
        }

        if (!$containerExists) {
            $createContainerOptions = new CreateContainerOptions();
            $createContainerOptions->setPublicAccess('container');
            $blobRestProxy->createContainer($containerName, $createContainerOptions);
        }

        // upload image
        $content = fopen($file->getPathname(), 'r');
        $options = new CreateBlockBlobOptions();
        $options->setContentType($file->getMimeType());

        $blobRestProxy->createBlockBlob($containerName, $imageName, $content, $options);
        $blobUrl = $blobRestProxy->getBlobUrl($containerName, $imageName);
        return $blobUrl;
    }
}
