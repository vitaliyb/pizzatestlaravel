<?php

namespace App\Observers;

use App\Models\Ingredient;
use App\Observers\Traits\HasPriceTrait;

class IngredientObserver
{

    use HasPriceTrait;

    public function saving(Ingredient $ingredient): void
    {
        $this->setPriceAsInteger($ingredient);
    }

    public function retrieved(Ingredient $ingredient): void
    {
        $this->setPriceAsFloat($ingredient);
    }
}
