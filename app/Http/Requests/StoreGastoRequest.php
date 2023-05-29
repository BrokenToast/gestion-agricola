<?php

namespace App\Http\Requests;

use App\Models\Finca;
use App\Models\Temporada;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGastoRequest extends FormRequest
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
            'descripcion' => ['string', 'max:600'],
            'cantidad' => ['numeric'],
            'fecha' => ['date'],
            'finca_id' => ['integer'],
            'temporada_id' => ['integer'],
            'tipo_de_gasto_id' => ['integer'],
        ];
    }
}
