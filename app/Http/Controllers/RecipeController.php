<?php

namespace App\Http\Controllers;

use App\Models\tags;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use App\Models\RecipeStep;
use App\Models\RecipeImage;

// Đảm bảo bạn đã tạo Model này
use App\Models\Tag;

class RecipeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index', compact('recipes'));
    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required',
            'prep_time' => 'required|integer|min:0',
            'cook_time' => 'required|integer|min:0',
            'servings' => 'required|integer|min:1',
            'tags' => 'nullable|string', // Có thể không bắt buộc và là chuỗi
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048', // Mỗi ảnh không quá 2MB
        ]);

        $recipe = Recipe::updateOrCreate(
            ['id' => $request->recipe_id], // Kiểm tra khóa chính
            $validatedData // Dữ liệu được xác thực
        );

        $this->storeImages($request, $recipe);
        $this->storeTags($request, $recipe);
        $this->storeIngredients($request, $recipe->id);
        $this->storeSteps($request, $recipe->id);

        return redirect("/recipedetail/{$recipe->id}")->with('success', 'Công thức đã được cập nhật thành công.');
    }

//    public function store(Request $request)
//    {
//        if($request->recipe_id){
//
//            $validatedData = $request->validate([
//                'title' => 'required|string|max:255',
//                'user_id' => 'required',
//                'prep_time' => 'required|integer|min:0',
//                'cook_time' => 'required|integer|min:0',
//                'servings' => 'required|integer|min:1',
//                'tags' => 'nullable|string', // Có thể không bắt buộc và là chuỗi
//                'images' => 'nullable|array',
//                'images.*' => 'image|max:2048', // Mỗi ảnh không quá 2MB
//            ]);
//
//            // Tạo mới công thức với dữ liệu đã được xác thực
//            $recipe = Recipe::update($validatedData);
//            $this->storeImages($request, $recipe);
//            $this->storeTags($request, $recipe);
//            $this->storeIngredients($request, $recipe->id);
//            $this->storeSteps($request, $recipe->id);
//
//
//            return redirect("/recipedetail/{$recipe->id}")->with('success', 'Công thức đã được tạo thành công.');
//
//        }else{
//            $validatedData = $request->validate([
//                'title' => 'required|string|max:255',
//                'user_id' => 'required',
//                'prep_time' => 'required|integer|min:0',
//                'cook_time' => 'required|integer|min:0',
//                'servings' => 'required|integer|min:1',
//                'tags' => 'nullable|string', // Có thể không bắt buộc và là chuỗi
//                'images' => 'nullable|array',
//                'images.*' => 'image|max:2048', // Mỗi ảnh không quá 2MB
//            ]);
//
//
//            // Tạo mới công thức với dữ liệu đã được xác thực
//            $recipe = Recipe::create($validatedData);
//            $this->storeImages($request, $recipe);
//            $this->storeTags($request, $recipe);
//            $this->storeIngredients($request, $recipe->id);
//            $this->storeSteps($request, $recipe->id);
//
//            return redirect("/recipedetail/{$recipe->id}")->with('success', 'Công thức đã được tạo thành công.');
//        }
//    }

    protected function storeImages(Request $request, Recipe $recipe)
    {
        if ($request->hasFile('images')) {
            if (!is_null($recipe->id)) {
                RecipeImage::where('recipe_id', $recipe->id)->delete(); // Giả định rằng bạn muốn xóa hết ảnh cũ
            }

            foreach ($request->file('images') as $image) {
                $path = $image->store('public/recipes');
                // Giả sử mô hình RecipeImage có trường `image` để lưu đường dẫn ảnh
                // và trường `recipe_id` để lưu ID của công thức
                RecipeImage::create([
                    'recipe_id' => $recipe->id,
                    'image' => $path, // Lưu đường dẫn đầy đủ hoặc chỉ tên file tùy thuộc vào cách bạn muốn quản lý
                ]);
            }
        }
    }

    protected function storeTags(Request $request, Recipe $recipe)
    {
        if ($request->tags) {
            $tagNames = explode(',', $request->tags);
            $tagIds = [];
            foreach ($tagNames as $tagName) {
                $tag = tags::firstOrCreate(['name' => trim($tagName)]);
                $tagIds[] = $tag->id;
            }
            $recipe->tags()->sync($tagIds);
        }
    }

    protected function storeIngredients(Request $request, $recipeId)
    {
        // Xóa thành phần cũ trước khi thêm mới
        RecipeIngredient::where('recipe_id', $recipeId)->delete();

        foreach ($request->ingredient_names as $index => $name) {
            RecipeIngredient::create([
                'recipe_id' => $recipeId,
                'name' => $name,
                'quantity' => $request->ingredient_quantities[$index],
                'unit' => $request->ingredient_units[$index],
            ]);
        }
    }

    protected function storeSteps(Request $request, $recipeId)
    {
        // Xóa bước cũ trước khi thêm mới
        RecipeStep::where('recipe_id', $recipeId)->delete();

        foreach ($request->steps as $index => $step) {
            RecipeStep::create([
                'recipe_id' => $recipeId,
                'step_number' => $index + 1,
                'description' => $step,
            ]);
        }
    }

    public function searchTag(Request $request)
    {

        $query = $request->get('term', '');

        $tags = tags::where('name', 'LIKE', "%{$query}%")->get();

        $data = [];
        foreach ($tags as $tag) {
            $data[] = ['label' => $tag->name, 'value' => $tag->name];
        }

        return response()->json($data);
    }

    public function show($id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return redirect()->route('recipes.index')->with('error', 'Không tìm thấy công thức nấu ăn.');
        }

        // Lấy dữ liệu các tag
        $recipeTags = $recipe->tags;

        // Lấy dữ liệu tên người dùng
        $user = User::find($recipe->user_id);
        $userFullName = $user->name;

        // Lấy dữ liệu các bước làm món ăn
        $recipeSteps = RecipeStep::where('recipe_id', $id)->get();

        // Lấy dữ liệu các thành phần
        $recipeIngredients = RecipeIngredient::where('recipe_id', $id)->get();

        // Hiển thị trang thông tin chi tiết công thức nấu ăn với tất cả dữ liệu cần thiết
        return view('recipes.recipedetail', compact('recipe', 'recipeSteps', 'recipeIngredients', 'recipeTags', 'userFullName'));
    }


    public function edit(int $id)
    {
        $recipe = Recipe::find($id);

        if (!$recipe) {
            return redirect()->route('recipes.myrecipe')->with('error', 'Không tìm thấy công thức nấu ăn.');
        }

        // Lấy dữ liệu các tag
        $recipeTags = $recipe->tags;

        // Lấy dữ liệu tên người dùng
        $user = User::find($recipe->user_id);
        $userFullName = $user->name;

        // Lấy dữ liệu các bước làm món ăn
        $recipeSteps = RecipeStep::where('recipe_id', $id)->get();

        // Lấy dữ liệu các thành phần
        $recipeIngredients = RecipeIngredient::where('recipe_id', $id)->get();

        // Hiển thị trang thông tin chi tiết công thức nấu ăn với tất cả dữ liệu cần thiết
        return view('recipes.edit', compact('recipe', 'recipeSteps', 'recipeIngredients', 'recipeTags', 'userFullName'));
    }

    // Method để xoá recipe
    public function destroy(Recipe $recipe)
    {
        if ($recipe) {
            // Xoá recipe
            $recipe->delete();

            // Redirect người dùng với một thông báo thành công
            return redirect()->route('recipes.myrecipe')->with('success', 'Recipe deleted successfully.');
        } else {
            return view('contact');
        }
    }
}
