<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'password' => 'string|min:8',
            'nim' => 'string|min:5',
            'no_hp' => 'string|min:10',
            'lokasi' => 'string|min:3',
            'nip' => 'string|min:5',
            'jabatan' => 'string|min:5',

        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'Password Harus Lebih Dari 8',
            'Lokasi' => 'Alamat Harus Lebih Dari 3 Huruf',

        ];
    }

    protected function failedValidation(ExceptionValidator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true,
        ], 422));
    }
}
