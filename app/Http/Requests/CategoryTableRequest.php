<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTableRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'position' => 'required',
            'condition' => 'required',
            'image' => 'image',
            'slug' => 'required'
        ];
    }
    public function message()
    {

        [
            'required' => 'Este campo é obrigatório',
            'image' => 'Arquivo inválido!'
        ];

    }
}
