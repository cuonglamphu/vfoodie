<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class ContactController extends Controller
{
    public function create()
    {
        return view('contact'); // Đảm bảo bạn có view tương ứng
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'note' => 'nullable|max:1000',
        ]);

        // Lưu vào cơ sở dữ liệu
        \App\Models\Contact::create($validated);

        // Chuyển hướng với thông báo thành công
        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}
