<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\AuthorModel;
use CodeIgniter\Model;

class Books extends BaseController
{
    public function getindex()
    {
        //
        $model = Model(BookModel::class);
        $data["books"] = $model->GetBook();
        $data["title"] = "Book list";
        return view("templates/header",$data).view("books/index").view("templates/footer");
    }
    public function getCreate()
    {
        if(session()->get("isAdmin")==0)
        {
            return redirect()->to('/');
        }
        //
        helper("form");
        $model = Model(AuthorModel::class);
        $data["authors"] = $model->GetAuthor();
        $data["title"] = "Create book";
        return view("templates/header",$data).view("books/create").view("templates/footer");
    }
    public function postCreate()
    {
        helper('form');
        $model = Model(BookModel::class);
        $post = $this->request->getPost(["title","price","yearOfPublish","authorid"]);
        $data["title"] = "Create book";
        $rules=[
            "title"=>"required|max_length[128]",
            "price"=>"required|integer",
            "yearOfPublish"=>"required|integer",
            "authorid"=>"required|integer"
        ];
        if(!$this->validateData($post,$rules))
        {
            $model = Model(AuthorModel::class);
            $data["authors"] = $model->GetAuthor();
            return view("templates/header",$data).view("books/create").view("templates/footer");
        }
        $model->save($post);
        return redirect()->to('/');
        // return view("templates/header",$data).view("authors/create").view("templates/footer");
    }
}
