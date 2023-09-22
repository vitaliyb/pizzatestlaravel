<?php

namespace App\Http\Services;


use App\Events\PizzaIngredientsUpdated;
use App\Models\Ingredient;
use App\Models\Pizza;
use App\Models\PizzaIngredient;

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

    public function addPizzaIngredient(Pizza $pizza, Ingredient $ingredient): Pizza
    {
        PizzaIngredient::firstOrCreate([
            'pizza_id' => $pizza->id,
            'ingredient_id' => $ingredient->id
        ]);

        $this->refreshPizzaPrice($pizza);

        return $pizza->refresh();
    }

    protected function refreshPizzaPrice(Pizza $pizza): Pizza
    {
        $sum = 0;
        $pizza->pizzaIngredients()->with('ingredient')->each(function (PizzaIngredient $pizzaIngredient) use (&$sum) {
            $sum += $pizzaIngredient->ingredient->price;
        });
        $pizza->price = $sum;
        $pizza->save();

        return $pizza;
    }
}
