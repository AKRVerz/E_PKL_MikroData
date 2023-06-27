<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class KegiatanRequest extends FormRequest
{
    public function rules()
    {
        return [
            'capaian' => 'required|string',
            'sub_capaian' => 'required|string',
            'jam' => 'required|integer',
            'status' => 'required',
            'pkl_id' => 'required|integer',
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'email.unique' => 'Email Sudah Digunakan (Harus Unik)',
    //         'password.min' => 'Password Harus Lebih Dari 8',
    //         'Lokasi' => 'Alamat Harus Lebih Dari 3 Huruf',
    //     ];
    // }

    protected function failedValidation(ExceptionValidator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
            'status' => true,
        ], 422));
    }
}
