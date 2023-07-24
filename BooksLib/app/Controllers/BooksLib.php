<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class BooksLib extends ResourceController
{
    protected $modelName = "App\Models\BooksModel";
    protected $format = "json";
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new BookModel();
        $books = $model->orderBy("id", "DESC", "")->findAll();
        if ($books) {
            $data["books"] = $books;
            return $this->respond($data);
        } else
            return $this->failNotFound("No books found!");
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        $model = new BookModel();
        $book = $model->where("id", $id)->first();
        if ($book)
            return $this->respond($book);
        else
            return $this->failNotFound();
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new BookModel();
        $data = [
            "title" => $this->request->getVar("title"),
            "price" => $this->request->getVar("price"),
            "yearOfPublish" => $this->request->getVar("yearOfPublish"),
            "authorid" => $this->request->getVar("authorid")
        ];
        try {
            $id = $model->insert($data);
            $buf["message"] = "book successfully added with id $id";
            return $this->respond($buf);
        } catch (Exception $ex) {
            return $this->fail("book wasn't added");
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        if ($id) {
            $model = new BookModel();
            $data = [
                "title" => $this->request->getVar("title"),
                "price" => $this->request->getVar("price"),
                "yearOfPublish" => $this->request->getVar("yearOfPublish"),
                "authorid" => $this->request->getVar("authorid")
            ];
            $model->update($id,$data);
            // $book = $model->find($id);
            // foreach ($data as $key => $val) {
            //     $book[$key] = $val;
            // }
            $responce=[
                "status"=>200,
                "error"=>null,
                "messages"=>
                [
                    "success"=>"Book with id $id was updated",
                    "update info"=>$data
                ]
                ];
            return $this->respond($responce);
        }
        return $this->failNotFound("wrong id");
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $model = new BookModel();
        $data = $model->delete($id);
        if($data)
        {
            $buf["Message"]="Book with id $id was successfully deleted";
            return $this->respond($buf);
        }
        $buf["Message"]="Error! Wrong id!";
        return $this->failNotFound($buf);
    }
}
