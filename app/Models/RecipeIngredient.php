<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['name','recipe_id', 'quantity', 'unit'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
