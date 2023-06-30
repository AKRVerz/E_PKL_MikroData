<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class KehadiranRequest extends FormRequest
{

    public function rules()
    {
        return [
            'pkl_id'=>'required',
            'tanggalwaktu'=>'required|date_format:"Y-m-d H:i:s',
            // 'tanggal'=>'required|date|date_format:d-m-Y',
            // 'waktu'=>'required|time|date_format:H:i:s',
            'kehadiran'=>'required',
            'keterangan'=>'required|string|max:255',
            'status'=>'required',
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
