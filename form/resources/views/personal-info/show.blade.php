@extends('layouts.app')

@section('title', 'Chi tiết thông tin cá nhân')

@section('content')
<div class="card">
    <div class="card-header bg-white py-3">
        <h1 class="h3 mb-0">Chi tiết thông tin cá nhân</h1>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Họ và Tên:</div>
            <div class="col-md-9">{{ $personalInfo->fullname }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Email:</div>
            <div class="col-md-9">{{ $personalInfo->email }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Số Điện Thoại:</div>
            <div class="col-md-9">{{ $personalInfo->phone }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Địa Chỉ:</div>
            <div class="col-md-9">{{ $personalInfo->address }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Ngày Sinh:</div>
            <div class="col-md-9">{{ date('d/m/Y', strtotime($personalInfo->dob)) }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Ngày Tạo:</div>
            <div class="col-md-9">{{ $personalInfo->created_at->format('d/m/Y H:i:s') }}</div>
        </div>
        <div class="row mb-3">
            <div class="col-md-3 fw-bold">Lần Cập Nhật Cuối:</div>
            <div class="col-md-9">{{ $personalInfo->updated_at->format('d/m/Y H:i:s') }}</div>
        </div>
    </div>
    <div class="card-footer bg-white py-3">
        <div class="d-flex justify-content-between">
            <a href="{{ route('personal-info.index') }}" class="btn btn-secondary">
                Quay lại danh sách
            </a>
            <div class="d-flex gap-2">
                <a href="{{ route('personal-info.edit', $personalInfo->id) }}" class="btn btn-primary">
                    Chỉnh sửa
                </a>
                <form action="{{ route('personal-info.destroy', $personalInfo->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection