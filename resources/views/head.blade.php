@extends('layouts.homepage')
@section('content')
    <div class="list-group">
        <a href="'#" class="list-group-item active" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">Đại sảnh</h4>
            </div>
            <small>Thông báo và nội quy</small>
        </a>
        <a href="category/1" class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">Thông báo chung</h4>
                @if(\Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',1)->latest('updated_at')->first())
                    <small class="text-muted">Bài viết mới nhất : {{ \Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',1)->latest('updated_at')->first()->updated_at }}</small>
                @else
                    <small class="text-muted"> Chưa có cập nhật</small>
                @endif
            </div>

        </a>
        <a href="category/2" class="list-group-item">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">Nội quy forum</h4>
                @if(\Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',2)->latest('updated_at')->first())
                    <small class="text-muted">Bài viết mới nhất : {{ \Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',2)->latest('updated_at')->first()->updated_at }}</small>
                @else
                    <small class="text-muted"> Chưa có cập nhật</small>
                @endif            </div>

        </a>
    </div>
    <!-- POST -->

    <!-- POST -->
    <div class="list-group">
        <a class="list-group-item active" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">Top bài viết mới nhất</h4>
            </div>
            <small>Chia sẻ câu chuyện của các bạn</small>
        </a>
        @isset($posts)
            @foreach($posts as $p)
                <a href="{{'show/'.$p->id}}" class="list-group-item">
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
    <!-- POST -->

    @foreach($topics as $topic)
        <!-- POST -->
        <div class="list-group">
            <a href="topic/{{ $topic->id }}" class="list-group-item active" aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h4 class="mb-1">{{ $topic->topic_name }}</h4>
                </div>
                <small>Tìm kiếm bài viết theo các chủ đề</small>
            </a>
            @foreach($categories as $category)
                @if($category->topic_id == $topic->id)
                    <a href="category/{{ $category->id }}" class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h4 class="mb-1">{{ $category->category_name }}</h4>
                            @if(\Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',$category->id)->latest('updated_at')->first())
                                <small class="text-muted">Bài viết mới nhất : {{ \Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',$category->id)->latest('updated_at')->first()->updated_at }}</small>
                            @else
                                <small class="text-muted"> Chưa có cập nhật</small>
                            @endif

                        </div>
                    </a>
                @endif
            @endforeach

        </div>
        <!-- POST -->
    @endforeach

@endsection
