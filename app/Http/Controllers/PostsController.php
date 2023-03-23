<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\like;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    public function index()
    {
        return view('blog.index')
        ->with('posts', Post::orderBy('created_at', 'desc')->get())
        ->with('Comments', Comment::orderBy('created_at', 'desc')->get());


    }

    public function create()
    {

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.*/
    public function show($slug)
    {
        return view('blog.show')
        ->with('post',Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug)
    {


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$slug)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {


    }
    public function like(Post $post,$id)
    {
        if (Auth::check())
        {
            $alreadyLiked = Like::where('post_id', $id)->where('user_id', Auth::id())->exists();

            if ($alreadyLiked == false && $post->count == 0) {
            $post_id = $id;
            $user_id = Auth::user()->id;
            $like = new like();
            $post = Post::find($id);
            $post->increment('count');
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->like = 1;
            $like->save();
            return back()->with('like','You liked this post');
            }
            else{return back()->with('like','You liked this post alerady');}
        }
        else {return back()->with('like', 'Please login first.');}

    }





}
