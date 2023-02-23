@extends('layouts.app')

@section('content')
  <!-- Main Content-->

  <div class="container px-4 px-lg-5">

  @foreach ($posts as $post)
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
@endforeach
<div class="d-flex justify-content-center mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
<p id='on'>holllla</p>
</div>

@endsection
