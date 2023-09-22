<?php

namespace App\Http\Services;


use App\Models\Ingredient;
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

    public function createIngredient(string $name, float $price): Ingredient
    {
        $ingredient = new Ingredient();
        $ingredient->name = $name;
        $ingredient->price = $price;
        $ingredient->save();

        return $ingredient;
    }
}
