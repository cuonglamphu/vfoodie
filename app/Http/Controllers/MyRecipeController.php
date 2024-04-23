<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class MyRecipeController extends Controller
{
    public function show()
    {
        $currentUserId = auth()->user()->id;
        $recipe = Recipe::where('user_id', 'LIKE', "%{$currentUserId}%")->get();
        return view('recipes.myrecipe', compact('recipe'));
    }


}
