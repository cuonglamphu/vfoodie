<?php

use App\Http\Controllers\ProfileController;
use \App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MyRecipeController;
use App\Http\Controllers\ContactController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\FavoriteController;

Route::get('/', [HomeController::class, 'index'])->name('home');
//Contact
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
//Recipe
Route::get('/myrecipe', [MyRecipeController::class, 'show'])->name('recipes.myrecipe');
Route::post('/recipes', [RecipeController::class, 'store'])->name('recipes.store');
Route::get('/recipedetail/{id}', [RecipeController::class, 'show'])->name('recipe.show');
Route::get('/create', function () {
    return view('recipes/create');
})->name('createRC')->middleware('auth');
Route::get('/recipe', function () {
    return view('recipes/index');
})->name('recipes.index');
//Tag
Route::get('/tag-search', [RecipeController::class, 'searchTag'])->name('tag.search');
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/search', [\App\Http\Controllers\PostController::class, 'search']);
//Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Manage Recipe
Route::get('/edit/{id}', [RecipeController::class, 'edit'])->name('myrecipe.edit');
Route::delete('/recipes/destroy/{recipe}', [RecipeController::class, 'destroy'])->name('recipes.destroy');
//Favorite Recipe
Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
Route::get('/favorite/store', [FavoriteController::class, 'store'])->name('favorite.store');
Route::delete('/favorite/destroy/{recipe}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
require __DIR__ . '/auth.php';
