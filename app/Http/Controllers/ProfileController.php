<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Models\like;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user_id = Auth::user()->id ;
        $posts = Post::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('profile.index')
        ->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'image'=> 'required|mimes:png,jpg,jpeg,gif,png|max:5040',
    ]);

    if ($validatedData) {
        $slug = Str::slug($request->title,'-');
        $newImageName = uniqid().'-'.$slug.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        // Save the post to the database
        $post = new Post;
        $post->slug = $slug;
        $post->user_id = auth()->user()->id;
        $post->title = $validatedData['title'];
        $post->description = $validatedData['description'];
        $post->image_path = $newImageName;
        $post->save();

        // Redirect to the post index page
        return redirect()->route('profile.index')->with('success', 'Post created successfully.');
    } else {
        // Redirect back to the form with the validation errors
        return redirect()->back()->withErrors($validatedData);
    }

}

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
        return view('profile.edit')
        ->with('post',Post::where('slug', $slug)->first());

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image'=> 'required|mimes:png,jpg,jpeg,gif,png|max:5040',
        ]);

        $newImageName = uniqid().'-'.$slug.'.'.$request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

            // Save the post to the database
            Post::where('slug', $slug)
            ->update([

                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'slug' => $slug,
                'image_path'=> $newImageName,
                'user_id' => auth()->user()->id,
            ]);


            // Redirect to the post index page
        return redirect('/profile/' . $slug)->with('success', 'Post updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        Post::where('slug',$slug)->delete();
        return redirect('/profile/')->with('delet', 'Post deleted successfully.');

    }

}
