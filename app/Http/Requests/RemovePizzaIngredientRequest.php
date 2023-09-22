<?php

namespace App\Http\Requests;

use App\Models\Ingredient;
use App\Models\Pizza;
use Illuminate\Foundation\Http\FormRequest;

class RemovePizzaIngredientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'pizza_id' => 'required|exists:' . Pizza::class . ',id',
            'ingredient_id' => 'required|exists:' . Ingredient::class . ',id'
        ];
    }
}
