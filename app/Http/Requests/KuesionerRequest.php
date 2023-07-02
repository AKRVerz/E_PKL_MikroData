<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Http\Exceptions\HttpResponseException;

class KuesionerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pkl_id'=>'required',
            'no1'=>'required|integer',
            'no2'=>'required|integer',
            'no3'=>'required|integer',
            'no4'=>'required|integer',
            'no5'=>'required|integer',
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
