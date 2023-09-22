<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pizza extends Model
{
    use HasFactory;

    public function pizzaIngredients(): HasMany
    {
        return $this->hasMany(PizzaIngredient::class);
    }
}
