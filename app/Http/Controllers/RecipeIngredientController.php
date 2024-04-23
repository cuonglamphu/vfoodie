<?php

namespace App\Http\Controllers;

use App\Models\RecipeIngredient;
use Illuminate\Http\Request;

class RecipeIngredientController extends Controller
{
    public function create(Recipe $recipe)
    {
        return view('recipe_ingredients.create', compact('recipe'));
    }

    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|string',
            'unit' => 'required|string',
        ]);

        $recipeIngredient = new RecipeIngredient([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
        ]);

        $recipe->ingredients()->save($recipeIngredient);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Thành phần thêm mới thành công');
    }

    // Thêm các phương thức CRUD khác tương tự như trong RecipeController
}
