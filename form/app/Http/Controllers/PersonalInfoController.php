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
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

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
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

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