@extends('admin.layout')
@section('main')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Quản lý thành viên</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">

            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">

            </button>
        </div>

    </div>
    <h2>Danh sách Thành viên</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id người dùng</th>
                <th>Email </th>
                <th>Tên hiển thị</th>
                <th>Ngày tham gia</th>
                <th>Chức vụ</th>
                <th>Tình trạng</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    @if($item->is_admin == 1)
                        <td>Quản trị viên</td>
                    @else
                        <td>Thành viên</td>
                    @endif
                    <td>...</td>
                    <td><a class="btn btn-primary" href="{{url('profile/'.$item->id)}}">Đi tới profile</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
