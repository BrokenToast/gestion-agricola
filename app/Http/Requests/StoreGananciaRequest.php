<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGananciaRequest extends FormRequest
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
            'comprador' => ['string', 'max:255'],
            'precio_tonelada' => ['numeric'],
            'cantidad' => ['numeric'],
            'fecha' => ['date'],
            'finca_id' => ['integer'],
            'temporada_id' => ['integer']
        ];
    }
}
