<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Dotenv\Parser\Value;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    if (Auth::check())
    {
        $validator = Validator::make($request->all(), [
            'Comment_Profil' => 'required|string'
        ]);

        if ($validator->fails()) {

            return redirect()->back()->with('message', 'Comment area is invalid.');
        }
        $post = Post::where('slug', $request->post_slug)->where('id',$request->id)->first();

        if($post) {

            Comment::create([
                'post_id' => $post->id,
                'user_id' => Auth::user()->id,
                'body' => $request->input('Comment_Profil')
            ]);
            return redirect()->back()->with('message', 'commented succsussfel.');

        }else {
            return redirect()->back()->with('message', 'Post not found.');
        }
    }
    else {
        return redirect()->back()->with('message', 'Please login first.');
    }
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
