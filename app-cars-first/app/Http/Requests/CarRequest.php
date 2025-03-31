<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
                    'car_make' => 'required|string|max:255',
                    'car_model' => 'required|string|max:255',
                    'car_year' => 'required|integer|min:1886|max:'.(date('Y')+1),
                    'car_price' => 'required|numeric|min:0',
                    'car_status' => 'required|string|in:available,sold',
        ];
    }
}
