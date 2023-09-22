<?php

namespace App\Observers;

use App\Models\Pizza;

class PizzaObserver
{

    public function saving(Pizza $pizza): void
    {
        $pizza->price = $pizza->price * 100;
    }

    public function retrieved(Pizza $pizza): void
    {
        $pizza->price = $pizza->price / 100;
    }
}
