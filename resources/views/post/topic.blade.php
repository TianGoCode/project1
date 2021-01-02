@extends('layouts.homepage')
@section('content')
    <div class="list-group">
        <a class="list-group-item active" aria-current="true">
            <div class="d-flex w-100 justify-content-between">
                <h4 class="mb-1">{{ $topic->topic_name }}</h4>
            </div>
            <small>Các bài viết theo chuyên mục</small>
        </a>

        @foreach($categories as $category)
            @if($category->topic_id == $topic->id)
                <a href="{{ url('category/'.$category->id) }}" class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="mb-1">{{ $category->category_name }}</h4>
                        @if(\Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',$category->id)->latest('updated_at')->first())
                            <small class="text-muted">Bài viết mới nhất
                                : {{ \Illuminate\Support\Facades\DB::table('posts')->where('category_id','=',$category->id)->latest('updated_at')->first()->updated_at }}</small>
                        @else
                            <small class="text-muted"> Chưa có cập nhật</small>
                        @endif

                    </div>
                </a>
            @endif
        @endforeach

    </div>
@endsection
