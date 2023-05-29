<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGananciaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'comprador' => ['string', 'max:255', 'nullable'],
            'precio_tonelada' => ['numeric', 'nullable'],
            'cantidad' => ['numeric', 'nullable'],
            'fecha' => ['date', 'nullable'],
            'finca_id' => ['integer', 'nullable'],
            'temporada_id' => ['integer', 'nullable']
        ];
    }
}
