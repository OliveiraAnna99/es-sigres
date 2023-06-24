<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardapioRequest extends FormRequest
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
            'nome'         => 'required|max:60',
            'valor'        => 'required|regex:/\d{1,6}(\,\d{0,2})/',
            'ingredientes' => 'required|max:500',
            'status'       => 'required|in:pendente,pronto',
        ];
    }
}
