@extends('layouts.homepage')
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
            </div>
            <div class="posttext pull-left">
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
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
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>25</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>3</a>
            </div>

            <div class="prev pull-left">
                <a href="#"><i class="fa fa-reply"></i></a>
            </div>

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:30am</div>

            <div class="next pull-right">
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

    <!-- POST -->
    <div class="post">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="{{ asset("layout/images/avatar2.jpg") }}" alt="">
                    <div class="status red">&nbsp;</div>
                </div>

                <div class="icons">
                    <img src="images/icon3.jpg" alt=""><img src="images/icon4.jpg" alt=""><img src="images/icon5.jpg"
                                                                                               alt=""><img
                        src="images/icon6.jpg" alt="">
                </div>
            </div>
            <div class="posttext pull-left">
                <p>Typography helps you engage your audience and establish a distinct, unique personality on your
                    website. Knowing how to use fonts to build character in your design is a powerful skill, and
                    exploring the history and use of typefaces, as well as typogra...</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfobot">

            <div class="likeblock pull-left">
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>10</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>1</a>
            </div>

            <div class="prev pull-left">
                <a href="#"><i class="fa fa-reply"></i></a>
            </div>

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:45am</div>

            <div class="next pull-right">
                <a href="#"><i class="fa fa-share"></i></a>

                <a href="#"><i class="fa fa-flag"></i></a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div><!-- POST -->



    <!-- POST -->
    <div class="post">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="images/avatar3.jpg" alt="">
                    <div class="status red">&nbsp;</div>
                </div>

                <div class="icons">
                    <img src="images/icon3.jpg" alt=""><img src="images/icon4.jpg" alt=""><img src="images/icon5.jpg"
                                                                                               alt=""><img
                        src="images/icon6.jpg" alt="">
                </div>
            </div>
            <div class="posttext pull-left">

                <blockquote>
                    <span class="original">Original Posted by - theguy_21:</span>
                    Did you see that Dove ad pop up in your Facebook feed this year? How about the Geico camel one?
                </blockquote>
                <p>Toronto Mayor Rob Ford does not have a bigger fan than "Anchorman's" Ron Burgundy. In fact, Burgundy
                    wants Ford to be re-elected so much, that he agreed to sing the campaign song Brien. The tune in
                    question ...</p>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="postinfobot">

            <div class="likeblock pull-left">
                <a href="#" class="up"><i class="fa fa-thumbs-o-up"></i>55</a>
                <a href="#" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
            </div>

            <div class="prev pull-left">
                <a href="#"><i class="fa fa-reply"></i></a>
            </div>

            <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:50am</div>

            <div class="next pull-right">
                <a href="#"><i class="fa fa-share"></i></a>

                <a href="#"><i class="fa fa-flag"></i></a>
            </div>

            <div class="clearfix"></div>
        </div>
    </div><!-- POST -->



    <!-- POST -->
    <div class="post">
        <form action="#" class="form" method="post">
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="images/avatar4.jpg" alt="">
                        <div class="status red">&nbsp;</div>
                    </div>

                    <div class="icons">
                        <img src="images/icon3.jpg" alt=""><img src="images/icon4.jpg" alt=""><img
                            src="images/icon5.jpg" alt=""><img src="images/icon6.jpg" alt="">
                    </div>
                </div>
                <div class="posttext pull-left">
                    <div class="textwraper">
                        <div class="postreply">Post a Reply</div>
                        <textarea name="reply" id="reply" placeholder="Type your message here"></textarea>
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
                        <button type="submit" class="btn btn-primary">Post Reply</button>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        </form>
    </div><!-- POST -->


@endsection
