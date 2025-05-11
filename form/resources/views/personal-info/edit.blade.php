@extends('layouts.app')

@section('title', 'Chỉnh sửa thông tin cá nhân')

@section('styles')
<style>
    .form-container {
        background: rgba(255, 255, 255, 0.95);
        padding: 2rem;
        border-radius: 20px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 100%;
        margin: 0 auto;
    }
    .form-container h1 {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 1.5rem;
    }
    .form-container .form-label {
        font-weight: 600;
        color: #555;
    }
    .form-container .form-control {
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 0.75rem;
    }
    .form-container .form-control:focus {
        border-color: #1e3c72;
        box-shadow: 0 0 5px rgba(30, 60, 114, 0.8);
    }
</style>
@endsection

@section('content')
<div class="form-container">
    <h1>Chỉnh Sửa Thông Tin Cá Nhân</h1>
    <form action="{{ route('personal-info.update', $personalInfo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="fullname" class="form-label">Họ và Tên</label>
            <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullname" name="fullname" 
                value="{{ old('fullname', $personalInfo->fullname) }}" required>
            @error('fullname')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" 
                value="{{ old('email', $personalInfo->email) }}" required>
            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="phone" class="form-label">Số Điện Thoại</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" 
                value="{{ old('phone', $personalInfo->phone) }}" required>
            @error('phone')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="address" class="form-label">Địa Chỉ</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" 
                value="{{ old('address', $personalInfo->address) }}" required>
            @error('address')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="dob" class="form-label">Ngày Sinh</label>
            <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" 
                value="{{ old('dob', $personalInfo->dob->format('Y-m-d')) }}" required>
            @error('dob')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('personal-info.index') }}" class="btn btn-secondary">Hủy</a>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
    </form>
</div>
@endsection