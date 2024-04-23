<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Usamamuneerchaudhary\Commentify\Traits\Commentable;
class Recipe extends Model
{
    use HasFactory, Commentable;

    protected $fillable = ['title','user_id', 'prep_time', 'cook_time', 'servings'];

    // App\Models\Recipe.php

    /**
     * Get the user that owns the recipe.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(RecipeImage::class);
    }

    public function tags()
    {
        return $this->belongsToMany(tags::class,'recipe_tags', 'recipe_id', 'tag_id');
    }
    public function steps()
    {
        return $this->hasMany(RecipeStep::class);
    }

    public function ingredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }

    public function  favorite() {
        return $this->hasMany(Favorite::class);
    }
}
