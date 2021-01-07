@extends('admin.layout')
@section('main')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Duyệt bài viết</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('alert'))
            <div class="alert alert-danger">
                {{ session()->get('alert') }}
            </div>
        @endif
    </div>
    <h2>Danh sách bài viết</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id bài đăng</th>
                <th>Email tác giả</th>
                <th>Tác giả</th>
                <th>Tiêu đề</th>
                <th>Tình trạng</th>
                <th>Đăng ngày</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->author->email }}</td>
                    <td>{{ $item->author->name }}</td>
                    <td>{{ $item->title }}</td>
                    @if($item->approved == 1)
                        <td>Đã duyệt</td>
                    @elseif($item->is_banned == 1)
                        <td>Đã bị cấm</td>
                    @else
                        <td>Chưa xem xét</td>
                    @endif
                    <td>{{ $item->created_at }}</td>
                    <td><a class="btn btn-primary" href="{{url('show/'.$item->id)}}">Đi tới bài viết</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
