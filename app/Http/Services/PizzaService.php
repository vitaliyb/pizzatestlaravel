<?php

namespace App\Http\Services;


use App\Models\Pizza;

class PizzaService
{

    public function createPizza(string $name): Pizza
    {
        $pizza = new Pizza();
        $pizza->name = $name;
        $pizza->save();

        return $pizza;
    }
}
