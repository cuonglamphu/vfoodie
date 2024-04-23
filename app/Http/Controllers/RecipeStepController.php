<?php

namespace App\Http\Controllers;

use App\Models\RecipeStep;
use Illuminate\Http\Request;

class RecipeStepController extends Controller
{
    public function create(Recipe $recipe)
    {
        return view('recipe_steps.create', compact('recipe'));
    }

    public function store(Request $request, Recipe $recipe)
    {
        $request->validate([
            'step_number' => 'required|integer',
            'description' => 'required|string',
        ]);

        $recipeStep = new RecipeStep([
            'step_number' => $request->step_number,
            'description' => $request->description,
        ]);

        $recipe->steps()->save($recipeStep);

        return redirect()->route('recipes.show', $recipe->id)->with('success', 'Bước thêm mới thành công');
    }

    // Thêm các phương thức CRUD khác tương tự như trong RecipeController
}
