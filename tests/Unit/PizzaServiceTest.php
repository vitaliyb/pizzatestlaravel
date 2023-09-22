<?php

namespace Tests\Unit;

use App\Http\Services\PizzaService;
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
}
