@extends('layouts.homepage')
@section('header')
    <link href="{{ asset("css/profile.css") }}" rel="stylesheet">
    <style>
        .text-secondary img {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="post">
        <div class="container-fluid">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    @if($user->avatar)
                                        <img src="{{ asset('/storage/'.$user->avatar) }}" alt="avatar"
                                             class="rounded-circle" width="150">
                                    @else
                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar"
                                             class="rounded-circle" width="150">
                                    @endif
                                    <div class="mt-3">
                                        <h4>{{ $user->name }}</h4>
                                        <p class="text-secondary mb-1">{{ $user->email }}</p>
                                        @if($user->is_admin == 1)
                                            <p class="text-muted font-size-sm">Admin of Forum</p>
                                        @else
                                            <p class="text-muted font-size-sm">Thành viên</p>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Auth::id() == $user->id)
                                            <a href="{{ route('editProfile',['id'=>$user->id]) }}" type="button"
                                               class="btn btn-info">Chỉnh sửa thông tin cá nhân
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Họ và tên</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->fullname }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mô tả bản thân</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {!! $user->description !!}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Địa chỉ cá nhân</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->address }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ngày sinh</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->birth }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Ngày tham gia</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->created_at }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Cập nhật lần cuối</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $user->updated_at }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
