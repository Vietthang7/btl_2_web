<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;

class PersonalInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personalInfos = PersonalInfo::latest()->get();
        return view('personal-info.index', compact('personalInfos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personal-info.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'email.unique' => 'Email này đã được sử dụng, vui lòng sử dụng email khác.',
            'phone.unique' => 'Số điện thoại này đã được sử dụng, vui lòng sử dụng số khác.',
        ];

        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:personal_infos,email',
            'phone' => 'required|string|max:20|unique:personal_infos,phone', // Thêm unique cho số điện thoại
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ], $messages);

        PersonalInfo::create($validated);

        return redirect()->route('personal-info.index')
            ->with('success', 'Thông tin đã được lưu thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalInfo $personalInfo)
    {
        return view('personal-info.show', compact('personalInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalInfo $personalInfo)
    {
        return view('personal-info.edit', compact('personalInfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalInfo $personalInfo)
    {
        $messages = [
            'email.unique' => 'Email này đã được sử dụng, vui lòng sử dụng email khác.',
            'phone.unique' => 'Số điện thoại này đã được sử dụng, vui lòng sử dụng số khác.',
        ];

        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:personal_infos,email,'.$personalInfo->id,
            'phone' => 'required|string|max:20|unique:personal_infos,phone,'.$personalInfo->id, // Thêm unique với loại trừ ID hiện tại
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ], $messages);

        $personalInfo->update($validated);

        return redirect()->route('personal-info.index')
            ->with('success', 'Thông tin đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalInfo $personalInfo)
    {
        $personalInfo->delete();

        return redirect()->route('personal-info.index')
            ->with('success', 'Thông tin đã được xóa thành công!');
    }
}