<?php

use App\Http\Controllers\PersonalInfoController;
use Illuminate\Support\Facades\Route;

// Route mặc định: chuyển hướng đến form đăng ký
Route::get('/', function () {
    return redirect()->route('personal-info.create');
});

// Routes cho CRUD thông tin cá nhân
Route::resource('personal-info', PersonalInfoController::class);