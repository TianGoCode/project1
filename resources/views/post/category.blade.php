@extends('layouts.homepage')
@section('content')
    <div class="list-group">
        <a class="list-group-item active" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">{{ $category->category_name }}</h4>
            </div>
            <small>Các bài viết theo chuyên mục</small>
        </a>
        @isset($posts)
            @foreach($posts as $p)
                <a href="{{ url('show/'.$p->id)}}" class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $p->title }}</h5>
                        <small class="text-muted">Tác giả: {{ $p->author->name }}</small><br>
                        <small class="text-muted">Đăng trong: {{ $p->category->category_name }}</small><br>
                        <small class="text-muted">Ngày xuất bản: {{ $p->updated_at }}</small>
                    </div>
                </a>
            @endforeach
        @endisset
    </div>
@endsection
