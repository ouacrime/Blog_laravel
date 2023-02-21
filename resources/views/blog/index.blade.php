@extends('layouts.app')


@section('content')
@if (session()->has('success') || session()->has('like'))
<div class="alert alert-success" role="alert">

    <div class="text-center">
        {{session()->get('success')}}
        {{session()->get('like')}}
        </div>
  </div>
@endif
@if ( session()->has('dislike'))
<div class="alert alert-danger" role="alert">
    <div class="text-center">
        {{session()->get('dislike')}}
        </div>
  </div>
@endif

<div class="text-center">
    <h2 class="subheading">MIX BLOG</h2>
  </div>





@foreach ($posts as $post)

  <div class="card mb-3 mx-auto" style="max-width: 750px;">
    <div class="row g-0">
      <div class="col-md-8">
        <div class="card-body d-flex flex-column">

          <h3 class="card-title">{{$post ->title}}</h3>
          <p class="card-text">{{$post ->description}}</p>

          <p class="card-text"><small class="text-muted">by {{$post->user->name}}</small></p>
          <p class="card-text"><small class="text-muted">on {{$post->created_at}}</small></p>
          <div class="mt-auto">
            <a class="btn btn-primary" href="/blog/{{$post ->slug}}" role="button">read more</a>
          </div>
          @if (Auth::user())

                    <!-- Like Button -->
                    <div class="d-flex align-items-center" style="padding-top: 10px">
                            <button class="btn btn-outline-success btn-sm like-btn me-2 top" >
                            <i class="bi bi-hand-thumbs-up"></i>
                            <a href="{{url('/blog/liked/'.$post->id.'/')}}" style="text-decoration: none; color: rgb(99, 235, 133);"> <span>Like</span> </a>
                            </button>

                            <button class="btn btn-outline-danger btn-sm dislike-btn">
                            <i class="bi bi-hand-thumbs-down"></i>
                            <a href="{{url('/blog/Disliked/'.$post->id.'/')}}" style="text-decoration: none; color: rgb(245, 116, 116);"> <span>Dislike</span> </a>
                            </button>
                    </div>


                      <style>
                        /* Styling for the like button */

                        .like-btn {
                          border-color: green;
                          color: green;
                          font-size: 0.9rem;
                          padding: 0.2rem 0.5rem;
                        }
                        .like-btn:hover {
                          background-color: green;
                          color: white;
                        }

                        /* Styling for the dislike button */
                        .dislike-btn {
                          border-color: red;
                          color: red;
                          font-size: 0.9rem;
                          padding: 0.2rem 0.5rem;
                        }
                        .dislike-btn:hover {
                          background-color: red;
                          color: white;
                        }
                      </style>


          @endif
          <div class="d-flex align-items-center">
            <button type="submit" class="btn btn-outline-success btn-sm like-btn me-2">
                <i class="bi bi-hand-thumbs-up"></i>
                <span>{{ $post->count }} </span>
            </button>
    </div>
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
