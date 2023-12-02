<?php

namespace App\Http\Controllers;

use CodeIgniter\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    //
    public function show($id)
    {
        $books = DB::select("select * from Books B left join Authors A on A.id=B.authorid where A.id=$id");
        $author = DB::selectOne("select * from Authors where id=$id");
        return view("author.info",$data = ["id"=>$id,"name"=>"$author->firstname $author->surname","books"=>$books]);
    }
    public function list(){
        $authors = DB::select('select * from Authors ');
        return view("author.list")
        ->with("title","List of authors")->with("authors",$authors);

    }
}
