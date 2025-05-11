@extends('layouts.app')

@section('title', 'Danh sách thông tin cá nhân')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Danh sách thông tin cá nhân</h1>
            <a href="{{ route('personal-info.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Thêm mới
            </a>
        </div>
    </div>
    <div class="card-body">
        @if($personalInfos->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và Tên</th>
                        <th>Email</th>
                        <th>Số Điện Thoại</th>
                        <th>Ngày Sinh</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personalInfos as $key => $info)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $info->fullname }}</td>
                        <td>{{ $info->email }}</td>
                        <td>{{ $info->phone }}</td>
                        <td>{{ date('d/m/Y', strtotime($info->dob)) }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('personal-info.show', $info->id) }}" class="btn btn-sm btn-info">
                                    Xem
                                </a>
                                <a href="{{ route('personal-info.edit', $info->id) }}" class="btn btn-sm btn-primary">
                                    Sửa
                                </a>
                                <form action="{{ route('personal-info.destroy', $info->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <div class="text-center py-5">
            <h4>Chưa có thông tin nào được đăng ký</h4>
            <p>Hãy nhấn vào nút "Thêm mới" để bắt đầu nhập thông tin</p>
            <a href="{{ route('personal-info.create') }}" class="btn btn-primary mt-3">
                Thêm thông tin mới
            </a>
        </div>
        @endif
    </div>
</div>
@endsection