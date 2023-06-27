<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PKLRequest extends FormRequest
{
    public function rules()
    {
        return [
            'mahasiswa_id' => 'required',
            'dospem_id' => 'required',
            'dpl_id' => 'required',
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
