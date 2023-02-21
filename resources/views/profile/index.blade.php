@extends('layouts.app')


@section('content')

@if (session()->has('success') )
<div class="alert alert-success" role="alert">

    <div class="text-center">
        {{session()->get('success')}}
        </div>
  </div>
@endif
@if (session()->has('delet') )
<div class="alert alert-danger" role="alert">

    <div class="text-center">
        {{session()->get('delet')}}
        </div>
  </div>
@endif

  @if (Auth::check())
  <div class="text-center" >
    <a class="btn btn-primary" href="/profile/create" role="button">New Post</a>
  </div>
  @endif




@foreach ($posts as $post)
  <div class="card mb-3 mx-auto" style="max-width: 750px;">
    <div class="row g-0">
      <div class="col-md-8">
        <div class="card-body d-flex flex-column">

          <h3 class="card-title">{{$post ->title}}</h3>
          <p class="card-text">{{$post ->description}}</p>

          <p class="card-text"><small class="text-muted">by {{$post->user->name}}</small></p>
          <p class="card-text"><small class="text-muted">on {{$post->created_at}}</small></p>


          <div>
              <a style="width: 91px;background: #148b3e;" class="btn btn-primary" href="/profile/{{$post->slug}}/edit" role="button">Edit</a>
          </div>
          <form action="/profile/{{$post->slug}}" method="post">@csrf
            @method('delete')
                <button style=" width: 91px;" type="submit" class="btn btn-danger"  role="button">Delete</a>
          </form>


        </div>
      </div>
      <div class="col-md-4">

        <img style="width: 100%;" src="images/{{$post ->image_path}}" class="img-fluid rounded-start" alt="images">
      </div>
    </div>
  </div>
@endforeach
  </div>




@endsection
