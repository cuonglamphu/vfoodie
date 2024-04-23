<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FavoriteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorite()->get(); // Lấy tất cả các Favorite của user hiện tại

        $recipes = [];

        if ($favorites->isNotEmpty()) {
            $recipeIds = $favorites->pluck('recipe_id');
            $recipes = Recipe::whereIn('id', $recipeIds)->get();
        }

        return view('recipes.favorite', compact('recipes'));
    }


    public function store(Request $request)
    {

        $user = Auth::id(); // Lấy ID của user hiện tại
        $recipe_id = $request->recipe_id;
        $exists = Favorite::where('user_id', $user)->where('recipe_id', $recipe_id)->exists();
        $recipe = Recipe::find($recipe_id);
        if($recipe) {
            if (!$exists) {
                Favorite::create([
                    'user_id' => $user,
                    'recipe_id' => $recipe_id
                ]);

                return redirect('/')->with('success', 'Lưu Thành Công ' . $recipe->title);
            }
            return redirect('/')->with('success','Bạn đã lưu '.$recipe->title.' trước đó');
        }else {
            return  redirect('/')->withErrors(['msg' => 'Lưu Vào Lỗi: Không Tìm Thấy Công Thức :((']);
        }
    }

    public function destroy(Recipe $recipe)
    {
       if($recipe) {
           $user_id = Auth::user()->id; // Lấy user_id hiện tại từ Auth
           $recipe_id = $recipe->id; // Lấy recipe_id từ request
           // Tìm và xóa bản ghi trong bảng 'favorite'
           $favoriteDelete = Favorite::where('user_id', $user_id)
               ->where('recipe_id', $recipe_id)
               ->delete();
           return $favoriteDelete ? redirect()->route('favorite.index')->with('success','Xoá thành công món ăn khỏi danh sách yêu thích'): redirect()->route('favorite.index')->withErro('msg','Không thể xoá, vui lòng thử lại sau');
       }else {
           return redirect('/');
       }
    }
}
