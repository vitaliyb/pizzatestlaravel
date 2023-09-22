<?php

namespace App\Observers;

use App\Models\Pizza;

class PizzaObserver
{

    public function saving(Pizza $ingredient): void
    {
        $ingredient->price = $ingredient->price * 100;
    }

    public function retrieved(Pizza $ingredient): void
    {
        $ingredient->price = $ingredient->price / 100;
    }
}
