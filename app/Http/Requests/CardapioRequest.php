<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardapioRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|max:60',
            'valor' => 'required',
            'estoque_id' => 'required|array',
            'estoque_id.*' => 'exists:estoques,id',
        ];
    }
}
