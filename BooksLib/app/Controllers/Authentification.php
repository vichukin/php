<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthorModel;
use CodeIgniter\Model;

class Authentification extends BaseController
{
    
    public function getLogin()
    {
        if(session()->get("login")!=null)
        {
            return redirect()->to('/');
        }
        helper("form");
        $data["title"]="Log in";
        return view("templates/header",$data).view("authentification/login").view("templates/footer");
    }
    public function postLogin()
    {
        //
        helper("form");
        $model = Model(UserModel::class);
        $post = $this->request->getPost(["login","password"]);
        //
        $data["title"] = "Log in";
        $rules=[
            "login"=>"required|max_length[128]",
            "password"=>"required|max_length[128]",
        ];
        
        if(!$this->validateData($post,$rules))
            return view("templates/header",$data).view("authentification/login").view("templates/footer");
        $pass = $post["password"];
        $login = $post["login"];
        
        
        $user = $model->GetUserByLogin($login);
        // $data["test"] = $pass."<br>".$user["password"]."<br>".(password_verify($pass,$user["password"])?"true":"false");
        if($user==null)
            return view("templates/header",$data).view("authentification/login").view("templates/footer");
        if(!password_verify($pass,$user["password"]))
            return view("templates/header",$data).view("authentification/login").view("templates/footer");
            
        // $data["authors"] = $model->GetAuthor();
        $data["title"] = "Log in";
        session()->set("login", $login);
        session()->set("isAdmin", $user["isAdmin"]);
        // $model->save($post);
        return redirect()->to('/');
    }
    public function getRegistration()
    {
        if(session()->get("login")!=null)
        {
            return redirect()->to('/');
        }
        helper("form");
        $data["title"]="Registration";
        return view("templates/header",$data).view("authentification/registration").view("templates/footer");
    }
    public function postRegistration()
    {
        //
        helper("form");
        $model = Model(UserModel::class);
        $post = $this->request->getPost(["login","password","confirmPassword"]);
        //
        $data["title"] = "Registration";
        $rules=[
            "login"=>"required|max_length[128]",
            "password"=>"required|max_length[128]",
            "confirmPassword"=>"required|max_length[128]",
        ];
        $pass = $post["password"];
        $confPass = $post["confirmPassword"];
        if(!$this->validateData($post,$rules) || $pass!=$confPass)
            return view("templates/header",$data).view("authentification/registration").view("templates/footer");
        $user["login"]=$post["login"];
        $user["password"]=password_hash($pass,PASSWORD_DEFAULT);
        $user["isAdmin"]=0;
        $model->save($user);
        session()->set("login", $post["login"]);
        session()->set("isAdmin", 0);
        return redirect()->to('');
        // helper("form");
        // $model = Model(AuthorModel::class);
        // // $data["authors"] = $model->GetAuthor();
        //  $data["title"] = "add new author";
        // return view("templates/header",$data).view("authors/create").view("templates/footer");
    }
    public function Logout()
    {
        session()->set("login",null);
        session()->set("isAdmin", null);
        return redirect()->to('');
    }
    public function getAdmin()
    {
        $model = Model(UserModel::class);
        $user = $model->GetUserByLogin(session()->get("login"));
        $user["isAdmin"]=1;
        $model->save($user);
        session()->set("isAdmin",1);
        return redirect()->to('');
    }
}
