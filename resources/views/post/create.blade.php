@extends('layouts.homepage')
@section('content')








    <!-- POST -->
    <div class="post">
        <form action="/create" class="form newtopic" method="post">
            @csrf
            <div class="topwrap">
                <div class="userinfo pull-left">
                    <div class="avatar">
                        <img src="{{ asset("layout/images/avatar4.jpg") }}" alt=""/>
                    </div>
                    <div class="icons">
                        <img src="{{ asset("layout/images/icon3.jpg") }}" alt=""/><img
                            src="{{ asset("layout/images/icon4.jpg") }}" alt=""/><img
                            src="{{ asset("layout/images/icon5.jpg") }}" alt=""/><img
                            src="{{ asset("layout/images/icon6.jpg") }}" alt=""/>
                    </div>
                </div>
                <div class="posttext pull-left">

                    <div>
                        <input type="text" name="title" placeholder="Nhập tiêu đề bài đăng"
                               class="form-control" required/>
                    </div>

                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <select name="category" id="subcategory" class="form-control" required>
                                <option value="">Chọn chuyên mục</option>
                                @if($adminCat != null)
                                    @foreach($adminCat as $cat)
                                        <option
                                            value="{{ $cat->id }}">{{ $cat->category_name .' - '.$cat->isAt->topic_name }}</option>
                                    @endforeach
                                @endif
                                @foreach($categories as $category)
                                    <option
                                        value="{{ $category->id }}">{{ $category->category_name .' - '.$category->isAt->topic_name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div>
                        <div class="postreply"><h5><b>Nội dung</b></h5></div>
                        <textarea required name="content" id="desc" placeholder="Nội dung"
                                  class="form-control"></textarea>
                    </div>
                    <div class="row newtopcheckbox">
                        <div class="col-lg-6 col-md-6">
                            <div><p>Who can see this?</p></div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="everyone"/> Everyone
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="friends"/> Only Friends
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div>
                                <p>Share on Social Networks</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="fb"/> <i
                                                class="fa fa-facebook-square"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="tw"/> <i
                                                class="fa fa-twitter"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" id="gp"/> <i
                                                class="fa fa-google-plus-square"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="clearfix"></div>
            </div>
            <div class="postinfobot">

                <div class="notechbox pull-left">
                    <input type="checkbox" name="note" id="note" class="form-control"/>
                </div>

                <div class="pull-left">
                    <label for="note"> Email me when some one post a reply</label>
                </div>

                <div class="pull-right postreply">
                    <div class="pull-left smile"><a href="#"><i class="fa fa-smile-o"></i></a></div>
                    <div class="pull-left">
                        <button type="submit" class="btn btn-primary">Post</button>
                    </div>
                    <div class="clearfix"></div>
                </div>


                <div class="clearfix"></div>
            </div>
        </form>
    </div>
    <!-- POST -->


    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xs-12">
                <div class="pull-left"><a href="#" class="prevnext"><i class="fa fa-angle-left"></i></a></div>

                <div class="pull-left"><a href="#" class="prevnext last"><i class="fa fa-angle-right"></i></a></div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>



@endsection
@section('extension')
    @parent
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('desc');
    </script>
@endsection

