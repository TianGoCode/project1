@extends('admin.layout')
@section('main')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tạo Chuyên mục</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>
    @dump($topics)
    @dump($categories)
    <h2>Tạo chuyên mục mới</h2>
    <hr>
    <div>
        <form method="post" action="/create_category">
            @csrf
            <div class="mb-3">
                <label for="newName" class="form-label">Tên chuyên mục</label>
                <input type="text" name="new-name" class="form-control" id="newName" aria-describedby="new" required>
                <div class="form-text">Tạo thứ gì đó mới mẻ</div>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Thuộc chủ đề</label>
                <select name="topic" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="">Chọn chuyên mục</option>
                    @foreach($topics as $item)
                        <option value="{{ $item->id }}">{{ $item->topic_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Xác nhận</button>
        </form>
    </div>
    <br>
    <h2>Chỉnh sửa tên chuyên mục</h2>
    <hr>
    <div>
        <form action="/edit_category" method="post">
            @csrf
            <div class="mb-3">
                <label for="select" class="form-label">Chuyên mục</label>
                <select name="category" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="">Chọn chuyên mục</option>
                    @foreach($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Tên mới</label>
                <input type="text" name="new-name" class="form-control" id="name" aria-describedby="new" required>
                <div class="form-text">Chỉnh sửa tên chuyên mục</div>
            </div>
            <div class="mb-3">
                <label for="select" class="form-label">Thuộc chủ đề</label>
                <select name="topic" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                    <option value="">Chọn chủ đề</option>
                    @foreach($topics as $item)
                        <option value="{{ $item->id }}">{{ $item->topic_name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br>
    <h2>Danh sách chuyên mục</h2>
    <hr>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Id</th>
                <th>Chuyên mục</th>
                <th>Chủ đề</th>
                <th>Ngày Tạo</th>
                <th>Chỉnh sửa lần cuối</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category_name }}</td>
                    <td>{{ $item->isAt->topic_name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
