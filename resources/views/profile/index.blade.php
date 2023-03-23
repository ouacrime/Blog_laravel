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



  <main>
    <div class="container">

        <div class="row row-cols-1 row-cols-md-2 g-4">
        <!-- <section class="mb-10 text-center">-->
                @foreach ($posts as $post)
                    <div class="col">
                        <div class="card  h-100">
                            <img src="images/{{$post ->image_path}}" class="card-img-top" alt="..." style="height: 200px;margin:auto;width:50%;">
                            <div class="card-body">
                                <h5 class="card-title">{{$post ->title}}</h5>

                                <p class="card-text">
                                    {{$post ->description}}
                                </p>

                                <p class="text-muted">
                                    <small>Create at: <u>{{$post->created_at}}</u> by
                                    <a href="" class="text-dark">{{$post->user->name}}</a></small>
                                </p>

                                <a href="/profile/{{$post->slug}}/edit" class="btn btn-primary btn-rounded" style="width: 70px;">Edit--</a>
                                <form action="/profile/{{$post->slug}}" method="post">@csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" data-mdb-color="dark" role="button">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
  </main>




@endsection
