<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\tags;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = tags::pluck('name'); // Lấy tất cả giá trị 'name' từ bảng 'tags'
        return response()->json($tags);
    }
}
