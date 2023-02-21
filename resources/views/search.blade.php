@extends('layouts.app')

@section('content')
  <!-- Main Content-->

  <div class="container px-4 px-lg-5">

  @foreach ($posts as $post)
    @if ($post)
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <!-- Post preview-->
            <div class="post-preview">
                <a href="/blog/{{$post ->slug}}">
                    <h2 class="post-title">{{$post ->title}}</h2>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">{{$post ->user->name}}</a>
                    on {{date('d-m-Y',strtotime($post->created_at))}}
                </p>
            </div>

            <hr class="my-4" />
        </div>
    </div>

    @else
    <div class="alert alert-success" role="alert">

        <div class="text-center">
            Nothing
            </div>
      </div>
    @endif



@endforeach

</div>

@endsection
