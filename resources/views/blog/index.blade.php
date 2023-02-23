@extends('layouts.app')


@section('content')

@if (session()->has('success') || session()->has('like') || session()->has('message'))
<div class="alert alert-success" role="alert">

    <div class="text-center">
        {{session()->get('success')}}
        {{session()->get('like')}}
        {{session()->get('message')}}
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

    <div class="card mb-3 mx-auto" style="max-width: 750px; margin-bottom: 0px !important;">
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
                <!--like button-->
                    <div class="block" onclick="heart({{$post->id}})" >
                            <!-- heart shape SVG -->
                            <svg
                            @if(DB::table('likes')->where('post_id', $post->id)->where('user_id', Auth::id())->exists() == true )
                                class="heart-icon heart-{{$post->id}} isLiked"
                            @endif
                            @if(DB::table('likes')->where('post_id', $post->id)->where('user_id', Auth::id())->exists() == false )
                                class="heart-icon heart-{{$post->id}} "
                            @endif

                                width="30"
                                height="30"
                                viewBox="0 0 106 97"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <!-- I am working with <path>, not the whole <svg> -->
                                <path
                                class="fill-color-shape"
                                fill-rule="evenodd"
                                clip-rule="evenodd"
                                d="M73.0406 3.04949C65.7359 2.94379 58.3559 5.38824 53.2483 12.3801C48.1271 5.39042 40.631 3.04941 33.4677 3.04941C18.2587 3.04941 3.04622 15.7081 3.04622 33.4698C3.04622 51.0995 14.3683 66.123 26.1679 76.6801C32.0812 81.9708 38.1493 86.1719 43.0557 89.0533C45.5086 90.4938 47.6791 91.6092 49.402 92.3672C50.2628 92.7459 51.0206 93.0393 51.6517 93.2395C52.2639 93.4336 52.8188 93.5607 53.2487 93.5607C53.6786 93.5607 54.2336 93.4336 54.8458 93.2395C55.4769 93.0393 56.2347 92.7459 57.0955 92.3672C58.8183 91.6092 60.9889 90.4938 63.4418 89.0533C68.3481 86.1719 74.4162 81.9708 80.3295 76.6801C92.1292 66.1229 103.451 51.0995 103.451 33.4698C103.451 15.6993 88.2313 3.26928 73.0406 3.04949Z"
                                />
                                <path
                                d="M53.2483 12.3801L51.2316 13.8577C51.7029 14.5009 52.4527 14.8807 53.25 14.8801C54.0474 14.8796 54.7966 14.4987 55.267 13.8548L53.2483 12.3801ZM73.0406 3.04949L73.0767 0.549748L73.0406 3.04949ZM26.1679 76.6801L24.501 78.5433L24.501 78.5433L26.1679 76.6801ZM43.0557 89.0533L44.3217 86.8975L44.3217 86.8975L43.0557 89.0533ZM49.402 92.3672L50.4088 90.0789L50.4088 90.0789L49.402 92.3672ZM51.6517 93.2395L52.4075 90.8565L52.4074 90.8565L51.6517 93.2395ZM54.8458 93.2395L54.09 90.8565L54.09 90.8565L54.8458 93.2395ZM57.0955 92.3672L58.1023 94.6555L58.1023 94.6555L57.0955 92.3672ZM63.4418 89.0533L62.1757 86.8975L62.1757 86.8975L63.4418 89.0533ZM80.3295 76.6801L81.9965 78.5433L81.9965 78.5433L80.3295 76.6801ZM55.267 13.8548C59.7836 7.67202 66.2981 5.45219 73.0044 5.54923L73.0767 0.549748C65.1736 0.435397 56.9283 3.10445 51.2295 10.9054L55.267 13.8548ZM33.4677 5.54941C40.0922 5.54941 46.7154 7.69369 51.2316 13.8577L55.2649 10.9026C49.5387 3.08715 41.1697 0.549414 33.4677 0.549414V5.54941ZM5.54622 33.4698C5.54622 17.2225 19.5018 5.54941 33.4677 5.54941V0.549414C17.0157 0.549414 0.546219 14.1936 0.546219 33.4698H5.54622ZM27.8349 74.817C16.2174 64.4228 5.54622 50.0268 5.54622 33.4698H0.546219C0.546219 52.1722 12.5192 67.8231 24.501 78.5433L27.8349 74.817ZM44.3217 86.8975C39.5433 84.0912 33.6121 79.9859 27.8349 74.817L24.501 78.5433C30.5503 83.9556 36.7554 88.2525 41.7897 91.209L44.3217 86.8975ZM50.4088 90.0789C48.7945 89.3686 46.7116 88.3011 44.3217 86.8975L41.7897 91.209C44.3055 92.6865 46.5638 93.8497 48.3951 94.6555L50.4088 90.0789ZM52.4074 90.8565C51.8878 90.6917 51.2173 90.4346 50.4088 90.0789L48.3951 94.6555C49.3082 95.0572 50.1534 95.387 50.8959 95.6225L52.4074 90.8565ZM53.2487 91.0607C53.2633 91.0607 53.1984 91.0609 53.0284 91.0254C52.867 90.9918 52.6608 90.9368 52.4075 90.8565L50.8959 95.6225C51.5581 95.8325 52.417 96.0607 53.2487 96.0607V91.0607ZM54.09 90.8565C53.8367 90.9368 53.6305 90.9918 53.4691 91.0254C53.299 91.0609 53.2341 91.0607 53.2487 91.0607V96.0607C54.0805 96.0607 54.9393 95.8325 55.6016 95.6225L54.09 90.8565ZM56.0887 90.0789C55.2801 90.4346 54.6096 90.6917 54.09 90.8565L55.6016 95.6225C56.3441 95.387 57.1893 95.0572 58.1023 94.6555L56.0887 90.0789ZM62.1757 86.8975C59.7858 88.3011 57.703 89.3686 56.0887 90.0789L58.1023 94.6555C59.9337 93.8497 62.1919 92.6865 64.7078 91.209L62.1757 86.8975ZM78.6626 74.817C72.8853 79.9859 66.9542 84.0913 62.1757 86.8975L64.7078 91.209C69.742 88.2525 75.9471 83.9556 81.9965 78.5433L78.6626 74.817ZM100.951 33.4698C100.951 50.0268 90.2801 64.4228 78.6626 74.817L81.9965 78.5433C93.9783 67.8231 105.951 52.1722 105.951 33.4698H100.951ZM73.0044 5.54923C87.0131 5.75192 100.951 17.2432 100.951 33.4698H105.951C105.951 14.1555 89.4496 0.78665 73.0767 0.549748L73.0044 5.54923Z"
                                fill="#e74c3c"/>
                            </svg>
                            <!-- counter -->
                            <span class="number-of-likes">{{ $post->count }}</span>
                    </div>
                    <!--end like button-->
                    <!--old methode-->
                    <!--button class="btn btn-outline-danger btn-sm dislike-btn">
                    <i class="bi bi-hand-thumbs-down"></i>
                    <a href="url('/blog/Disliked/'.$post->id.'/')}}" style="text-decoration: none; color: rgb(245, 116, 116);"> <span>Dislike</span> </a>
                    </button-->




                        <button onclick="hideComment({{$post->id}})"
                            class="btn btn-outline-secondary btn-sm comment-btn"
                            style="margin-left: 10px;">
                            <i class="bi bi-hand-thumbs-up"></i>
                            <!--a href="#"  style="text-decoration: none; color: rgb(93, 0, 136);"-->
                                 <span>comment{{$post->id}}</span>
                            <!--/a-->
                        </button>
                </div>
            @endif

                </div>
            </div>
                        <div class="col-md-4">
                            <img style="width: 100%;" src="images/{{$post ->image_path}}" class="img-fluid rounded-start" alt="images">
                        </div>
        </div>
    </div>





    <!--comment-->
    <div  class="row d-flex justify-content-center" style="margin-bottom: 20px;">
        <div class="col-md-8 col-lg-6 commentid" id="comment-section{{$post->id}}">
          <div class="card shadow-0 border" style="background-color: #f0f2f5;">
            <div  class="card-body p-4" >
            <form action="{{url('/blog/comments')}}" method="post">
                @csrf
              <div class="form-outline mb-4">
                <input type="hidden"  value="{{$post->slug}}" name="post_slug">
                <input type="hidden"  value="{{$post->id}}" name="id">
                <input type="text" id="addANote"  name="Comment_Profil" class="form-control" placeholder="Type comment..." />
                <label class="form-label" for="addANote">+ Add a note</label>
                <div class="float-end mt-2 pt-1">
                  <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                  <button type="button" class="btn btn-outline-primary btn-sm" >Cancel</button>
                </div>
              </div>
            </form>
            @foreach ($Comments as $comment)
                 @if(DB::table('comments')->where('post_id', $post->id)->exists() == true )

                    <div class="card mb-4">
                        <div class="card-body">
                        <p>{{$comment->body}}</p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                            <p class="small mb-0 ms-2"></p>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                            <p class="small text-muted mb-0">Upvote?</p>
                            <i class="far fa-thumbs-up mx-2 fa-xs text-black" style="margin-top: -0.16rem;"></i>
                            <p class="small text-muted mb-0">3</p>
                            </div>
                        </div>
                        <div class="small d-flex justify-content-start">
                            <a href="#!" class="d-flex align-items-center me-3">
                            <i class="far fa-thumbs-up me-2"></i>
                            <p class="mb-0">Like</p>
                            </a>
                        </div>
                        </div>
                    </div>
                @endif
              @endforeach

            </div>
          </div>
        </div>
      </div>
    <!--end comment-->

    @endforeach




</div>




<!--like-->

@endsection
@push('scripts')
    <script src="/frontend/js/myjs.css"></script>
@endpush
