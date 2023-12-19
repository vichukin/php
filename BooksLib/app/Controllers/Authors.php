<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthorModel;
use CodeIgniter\Model;

class Authors extends BaseController
{
    public function getindex()
    {
        //
        $model = Model(AuthorModel::class);
        $data["authors"] = $model->GetAuthor();
        $data["title"] = "Author list";
        return view("templates/header",$data).view("authors/index").view("templates/footer");
    }
    public function getCreate()
    {
        //
        if(session()->get("isAdmin")==0)
        {
            return redirect()->to('/authors');
        }
        helper("form");
        
        // $data["authors"] = $model->GetAuthor();
         $data["title"] = "add new author";
        return view("templates/header",$data).view("authors/create").view("templates/footer");
    }
    public function postCreate()
    {
        $model = Model(AuthorModel::class);
        $post = $this->request->getPost(["firstname","surname","yearOfBirth"]);
        //
        $data["title"] = "add new author";
        $rules=[
            "firstname"=>"required|max_length[128]",
            "surname"=>"required|max_length[128]",
            "yearOfBirth"=>"required|integer"
        ];
        if(!$this->validateData($post,$rules))
        return view("templates/header",$data).view("authors/create").view("templates/footer");
        
        $model->save($post);
        $data["title"] = "Author added";
        return redirect()->to('/authors');
        // helper("form");
        // $model = Model(AuthorModel::class);
        // // $data["authors"] = $model->GetAuthor();
        //  $data["title"] = "add new author";
        // return view("templates/header",$data).view("authors/create").view("templates/footer");
    }
}
