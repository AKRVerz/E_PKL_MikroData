<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'nim' => 'string|min:5',
            'roles_id' => 'required',
            'no_hp' => 'string|min:10',
            'lokasi' => 'string|min:3',
            'nip' => 'string|min:5',
            'jabatan' => 'string|min:5',

        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email Sudah Digunakan (Harus Unik)',
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
