<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPizzaIngredientRequest;
use App\Http\Requests\CreateIngredientRequest;
use App\Http\Requests\CreatePizzaRequest;
use App\Http\Services\PizzaService;
use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createPizza(CreatePizzaRequest $request, PizzaService $service)
    {
        return $service->createPizza($request->get('name'));
    }

    public function createIngredient(CreateIngredientRequest $request, PizzaService $service)
    {
        return $service->createIngredient($request->get('name'), $request->get('price'));
    }

    public function addPizzaIngredient(AddPizzaIngredientRequest $request, PizzaService $service)
    {
        $pizza = Pizza::findOrFail($request->get('pizza_id'));
        $ingredient = Ingredient::findOrFail($request->get('ingredient_id'));

        return $service->addPizzaIngredient($pizza, $ingredient);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pizza $pizza)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pizza $pizza)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pizza $pizza)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pizza $pizza)
    {
        //
    }
}
