<?php

namespace Tests\Unit;

use App\Http\Services\PizzaService;
use App\Models\Ingredient;
use App\Models\Pizza;
use Tests\TestCase;

class PizzaServiceTest extends TestCase
{

    public function testItCreatesPizza()
    {
        /**
         * @var $service PizzaService
         */
        $service = app(PizzaService::class);
        $pizza = $service->createPizza('Mushroom pizza');

        $this->assertEquals('Mushroom pizza', $pizza->name);
        $this->assertEquals(0, $pizza->price);
    }

    public function testItCreatesIngredient()
    {
        /**
         * @var $service PizzaService
         */
        $service = app(PizzaService::class);
        $ingredient = $service->createIngredient('Cheese', 2.52);

        $ingredient->refresh();

        $this->assertEquals('Cheese', $ingredient->name);
        $this->assertEquals(2.52, $ingredient->price);
    }

    public function testItAddsIngredientsToPizza()
    {
        /**
         * @var $service PizzaService
         * @var $pizza Pizza
         */
        $service = app(PizzaService::class);

        $pizza = Pizza::factory()->create();
        $ingredient1 = Ingredient::factory()->create();
        $ingredient2 = Ingredient::factory()->create();

        $service->addPizzaIngredient($pizza, $ingredient1);
        $service->addPizzaIngredient($pizza, $ingredient2);

        $pizza->refresh();

        $this->assertEquals(2, $pizza->pizzaIngredients()->count());
    }
}
