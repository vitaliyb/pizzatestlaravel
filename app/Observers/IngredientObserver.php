<?php

namespace App\Observers;

use App\Models\Ingredient;

class IngredientObserver
{

    public function saving(Ingredient $ingredient): void
    {
        $ingredient->price = $ingredient->price * 100;
    }

    public function retrieved(Ingredient $ingredient): void
    {
        $ingredient->price = $ingredient->price / 100;
    }
}
