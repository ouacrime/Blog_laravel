<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PagesContreller extends Controller
{
    public function index()
    {
        return view('index')
        ->with('posts', Post::orderBy('created_at', 'desc')->get());
    }
    public function search()
    {
        $search_text = $_GET['query'];
        $posts = Post::where('title','LIKE','%'.$search_text.'%')->get();

        return view('/search',compact('posts'));
    }

}
