<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PautaFormRequest extends FormRequest
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
            'desc_pauta' => ['required', 'min:3'],
            'tipo_pauta' => ['required'],
            'ativa_sn' => ['required']
        ];

    }
    public function messages()
    {
        return [
            'desc_pauta.required' => 'O campo Descrição da pauta é obrigatório',  
            'desc_pauta.min' => 'O campo Descrição da pauta precisa de pelo menos :min caracteres', 
            'tipo_pauta.required' => 'O campo Tipo é obrigatório',
            'ativa_sn.required' => 'O campo Status é obrigatório'
        ];
    }
}
