<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PedidoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'numero_mesa' => 'required',
            'status' => 'required',
            'cardapio_id' => 'required|array',
            'cardapio_id.*' => 'exists:cardapios,id',
            'obs' => 'required|max:500',
        ];
    }
}
