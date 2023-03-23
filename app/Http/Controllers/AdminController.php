<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index')
        ->with('Posts', Post::orderBy('created_at', 'desc')->get())
        ->with('Users', User::orderBy('created_at', 'desc')->get())
        ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function acceptPost( $postId)
    {
        $user = Auth::user();
        if ($user->admin) {
            $post = Post::findOrFail($postId);
            $post->confirmed = true;
            $post->refused = false;
            $post->save();
        }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
