@extends('layouts.app')

@section('content')

<div class="text-center">
    <h1>All Posts</h1>
  </div>
  <div class="container">
    <form method="POST" action="/profile" class="border p-3 custom-form" enctype="multipart/form-data"  >
      @csrf
        <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
      </div>
      <div class="form-group">
        <label for="image">Image</label>
        <input type="file" class="form-control-file" name="image" id="image">
      </div>
      <button type="submit" class="btn btn-success">Submit the post</button>

    </form>
  </div>





@endsection
