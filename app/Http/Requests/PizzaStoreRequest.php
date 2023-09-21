<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PizzaStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:40',
            'desription' => 'required|min:3|max:500',
            'small_pizza_price' => 'required|number',
            'medium_pizza_price' => 'required|number',
            'large_pizza_price' => 'required|number',
            'category' => 'required',
            'image' => 'required|mimes:png, jpeg, jpg'
        ];
    }
}