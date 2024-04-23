<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use function Pest\Laravel\get;

class PostController extends Controller
{
    public function search(Request $request)
    {
        $output = '';
        if ($request->ajax() && !empty($request->search)) {
            $data = Recipe::where('title', 'like', '%' . $request->search . '%')
                ->limit(9)
                ->get();

            if ($data->count() > 0) {
                $output = '<ul class="list-group mt-3">';
                foreach ($data as $row) {
                    // Đảm bảo thẻ <a> bao trùm nội dung <li>
                    $output .= '<li class="list-group-item"><a class="primary-link block" href="' . route('recipe.show', $row->id) . '">' . $row->title . '</a></li>';
//                    $output .= '<a class="block" href="' . route('recipe.show', $row->id) . '"><li class="list-group-item primary-link"><span >' . $row->title . '</span></li></a>';
                }
                $output .= '</ul>';
                // Thêm nút "Xem thêm" (giả định 'recipes.index' để hiển thị tất cả công thức)
//                $output .= '<div class="text-center mt-3"><a href="' . route('recipes.index') . '" class="btn btn-primary">Xem thêm</a></div>';
            } else {
                $output = '<li class="list-group-item">No results found</li>';
            }
        } else {
            $output = '';
        }

        return $output;
    }


}
