<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'surface' => 'required',
            'n_room' => 'required',
            'n_bed' => 'required',
            'n_bath' => 'required',
            'price' => 'required',
        ];
    }

    public function messages(){

        return [
            'name.required' => 'Name has to be declared!',
            'description.required' => 'Insert the description',
            'address.required' => 'Insert the address',
            'surface.required' => 'Insert a number',
            'n_room.required' => 'Insert a number',
            'n_bed.required' => 'Insert a number',
            'n_bath.required' => 'Insert a number',
            'price.required' => 'Insert the price per night',
        ];
    }
}
