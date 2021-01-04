@extends('layouts.homepage')
@section('header')
    <style>
        .posttext img{
            max-width: 100%;
            max-height: -webkit-fill-available;
        }
    </style>
@section('content')


    <!-- POST -->



    <div class="post beforepagination">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="{{ asset("layout/images/avatar.jpg") }}" alt="">
                    <div class="status green">&nbsp;</div>
                </div>

                <div class="icons">
                    <img src="images/icon1.jpg" alt=""><img src="images/icon4.jpg" alt=""><img src="images/icon5.jpg"
                                                                                               alt=""><img
                        src="images/icon6.jpg" alt="">
                </div>
                <div>
                    {{ $post->author->name }}
                </div>
            </div>
            <div class="posttext pull-left">
                <h2>{{ $post->title }}</h2>
                <p>{!!  $post->content !!}</p>
                @auth
                    @if(\Illuminate\Support\Facades\Auth::user()->is_admin==1)
                        <form method="post" action="{{ url('approve') }}">
                            @csrf
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <button type="submit" name="status" class="btn btn-success" value="1">Duyệt bài viết
                            </button>
                            <button type="submit" name="status" class="btn btn-danger" value="0">Cấm bài viết</button>
                        </form>
                    @endif
                    @if(\Illuminate\Support\Facades\Auth::user()->id==$post->author_id)

                        <blockquote>
                            <span class="original">From admin</span>
                            @if($post->is_banned == 1)
                                <p>Tình trạng: bài viết đang bị cấm</p>
                            @elseif($post->approved == 1)
                                <p>bài viết đã được duyệt</p>
                            @else
                                <p>bài viết chưa được xét duyệt</p>
                            @endif
                        </blockquote>
                    @endif
                @endauth

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfobot">

            <div class="likeblock pull-left">
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>0</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>0</a>
            </div>

            <div class="prev pull-left">
                <a href="#"><i class="fa fa-reply"></i></a>
            </div>

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Đăng vào ngày : {{ $post->updated_at }}</div>

            <div class="next pull-right" style="display: flex">
                <a href="#"><i class="fa fa-share"></i></a>

                <a href="#"><i class="fa fa-flag"></i></a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div><!-- POST -->

    <div class="paginationf" style="padding-top: 25px">
        <h4>Bình luận</h4>
        <hr>
    </div>

    <!-- comment -->
    @foreach($post->comment as $comment)
        <div class="post">
            <div class="topwrap">
                <div class="userinfo pull-left" style="">
                    <div class="avatar">
                        <img src="{{ asset("layout/images/avatar2.jpg") }}" alt="">
                        <div class="status red">&nbsp;</div>

                    </div>

                    <div class="icons">
                        <img src="images/icon3.jpg" alt=""><img src="images/icon4.jpg" alt=""><img
                            src="images/icon5.jpg"
                            alt=""><img
                            src="images/icon6.jpg" alt="">
                    </div>
                    <div>{{ $comment->user->name }}</div>
                </div>
                <div class="posttext pull-left" style="padding-left: 10px;border-left: 1px solid #f1f1f1f1;">
                    <div>{!! $comment->content !!}</div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                <div class="likeblock pull-left">
                    <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>0</a>
                    <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>0</a>
                </div>

                <div class="prev pull-left">
                    <a href="#"><i class="fa fa-reply"></i></a>
                </div>

                <div class="posted pull-left"><i class="fa fa-clock-o"></i> Đăng vào luc : {{ $comment->created_at }}
                </div>
                <div class="next pull-right">
                    <a href="#"><i class="fa fa-share"></i></a>
                    <a href="#"><i class="fa fa-flag"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    @endforeach
    <!-- comment -->

    <!-- POST -->
    <div class="post">
        <form action="/add_comment" class="form" method="post">
            @csrf
            <div class="topwrap">
                <div class="userinfo pull-left" style="">
                    <div class="avatar">
                        <img src="images/avatar4.jpg" alt="">
                        <div class="status red">&nbsp;</div>
                    </div>

                    <div class="icons">
                        <img src="images/icon3.jpg" alt=""><img src="images/icon4.jpg" alt=""><img
                            src="images/icon5.jpg" alt=""><img src="images/icon6.jpg" alt="">
                    </div>
                    @auth()
                        <div>
                            {{ \Illuminate\Support\Facades\Auth::user()->name }}
                        </div>
                    @endauth
                    @guest()
                        <div>
                            Khách
                        </div>
                    @endguest
                </div>
                <div class="posttext pull-left" style="padding-left: 10px;border-left: 1px solid #f1f1f1f1;">
                    <div class="textwraper">
                        <div class="postreply"><h5><b>Bình luận</b></h5></div>
                        <textarea required name="content" id="reply"
                                  placeholder="Để lại ý kiến của bạn tại đây"></textarea>
                        @auth
                            <input type="hidden" name="author_id"
                                   value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                        @endauth
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                <div class="notechbox pull-left">
                    <input type="checkbox" name="note" id="note" class="form-control">
                </div>

                <div class="pull-left">
                    <label for="note"> Email me when some one post a reply</label>
                </div>

                <div class="pull-right postreply">
                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                    <div class="pull-left">
                        @auth()
                            <button type="submit" class="btn btn-primary">Đăng</button>
                        @endauth
                        @guest()
                            <button type="button" onclick="window.location.href = '/login'" class="btn btn-primary">Đăng
                                nhập để bình luận
                            </button>
                        @endguest
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        </form>

    </div>
    <!-- POST -->


@endsection
@section('extension')
    @parent
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('reply', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
