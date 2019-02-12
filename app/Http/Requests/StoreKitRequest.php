<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKitRequest extends FormRequest
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
            'name' =>'required|unique:kits',
            'num_serie' => 'required|unique:kits'
        ];
    }

    public function message()
    {
        return [
          'name.required' => 'Debes introducir el nombre del kit',
          'name.unique' => 'Ya existe el nombre de ese kit'
        ];
    }
}
