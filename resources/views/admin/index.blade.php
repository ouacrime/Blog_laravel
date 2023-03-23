@extends('layouts.app')

@section('content')
  <!-- Main Content-->

  <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Customer <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                            <i class="material-icons">&#xE8B6;</i>
                            <input type="text" class="form-control" placeholder="Search&hellip;">
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name <i class="fa fa-sort"></i></th>
                        <th>Email</th>
                        <th>ID Post <i class="fa fa-sort"></i></th>
                        <th>Title Post</th>
                        <th>Date Public <i class="fa fa-sort"></i></th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Posts as $post )

                    @if ($post->refused)
                    <tr>
                        <td>#</td>
                        <td>{{DB::table('users')->where('id', $post->user_id)->pluck('name')->first();}}</td>
                        <td>{{DB::table('users')->where('id', $post->user_id)->pluck('email')->first();}}</td>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td>
                            <a href="#" class="view" title="accepte" onclick="confirm({{$post->id}})" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                            <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
