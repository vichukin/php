<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function Index()
    {
        return view("topic.index");
    }
    public function Create(){

        return view("topic.create");
    }
    public function Store(Request $request){
        $validated = $request->validate([
            'Title' => 'required|unique:topics|max:100'
        ]);

        $topic = Topic::create($validated);
        // The blog post is valid...

        return to_route("topic.index");
    }
}
