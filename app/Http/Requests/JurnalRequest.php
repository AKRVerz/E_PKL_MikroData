<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class JurnalRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pkl_id' => 'required',
            'kegiatan' => 'required|string|max:255',
            'alatbahan' => 'required|string|max:255',
            'waktu' => 'required',
            'status' => 'required',
            'materi'  => 'required|string|max:2000',
            'prosedur' => 'required|string|max:255',
            'hasil' => 'required|string|max:255',
            'komentar' => 'required|string|max:2000',
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
