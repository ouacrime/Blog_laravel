@extends('layouts.app')

@section('content')
@if (session()->has('success'))

<div class="alert alert-success" role="alert">

    <div class="text-center">
        {{session()->get('success')}}
        </div>
  </div>


@endif

<div class="text-center">
    <h1>{{$post->title}}</h1>
    <p class="card-text"><small class="text-muted">by : {{$post ->user->name}}</small></p>
  </div>
  <div class="container">

      <div class="card mb-3">
        <img src="/images/{{$post ->image_path}}"  width="100%" height="400" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$post->title}}</h5>
          <div class="text-center">
          <p class="card-text">{{$post->description}}</p>
          </div>
          <p class="card-text"><small class="text-muted">update :{{$post->updated_at}}</small></p>
        </div>
      </div>


  </div>
  @if (Auth::user() && Auth::user()->id == $post->user_id)
  <div class="text-center" >
    <a class="btn btn-primary" href="/profile/{{$post->slug}}/edit" role="button">Edit</a>
  </div>
  <form action="/profile/{{$post->slug}}" method="post">@csrf
    @method('delete')
    <div class="text-center" >
        <button type="submit" class="btn btn-danger"  role="button">Delete</a>
      </div>
  </form>

  @endif

@endsection
