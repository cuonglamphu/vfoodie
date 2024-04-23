<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class HomeController extends Controller
{
    public function index()
    {
        $recipes = Recipe::orderBy('id')->take(6)->get();
        return view('welcome', compact('recipes'));
    }
}
