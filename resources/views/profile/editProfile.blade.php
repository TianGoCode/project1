@extends('layouts.homepage')
@section('header')
    <style>
        textarea {
            resize: vertical;
            background: white;
        }

    </style>
@endsection
@section('content')



    <div class="post">
        <form action="/edit_profile" class="form newtopic" method="post" enctype="multipart/form-data">
            <input type="hidden" name="uid" value="{{ $user->id }}">
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
                        <label>Họ và đên</label><br>
                        <input type="text" name="fullname" placeholder="{{ $user->fullname }}"
                               class="form-control"/>
                    </div>
                    <div>
                        <label>Ngày sinh</label><br>
                        <input type="date" name="birth" placeholder="Nhập tiêu đề bài đăng" value="{{ $user->birth }}"
                               class="form-control"/>
                    </div>

                    <div>
                        <label>Địa chỉ</label><br>
                        <input type="text" name="address" placeholder="{{ $user->address }}"
                               class="form-control"/>
                    </div>

                    <div>
                        <label>Tên hiển thị</label><br>
                        <input type="text" name="name" value="{{ $user->name }}"
                               class="form-control"/>
                    </div>
                    <div>
                        <label>Mô tả</label><br>
                        <div class="postreply"><h5><b>Nội dung</b></h5></div>
                        <textarea name="description" id="describe" placeholder="{!! $user->description !!}"
                                  class="form-control"></textarea>
                    </div>
                    <div>
                        <div class="col-lg-6 col-md-6">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text">chọn ảnh đại diện</label>
                                        <input type="file" class="form-control" name="avatar" accept="image/*">
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


@endsection
@section('extension')
    @parent
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('describe', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection

