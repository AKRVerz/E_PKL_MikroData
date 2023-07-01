<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator as ExceptionValidator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PenilaianRequest extends FormRequest
{
    public function rules()
    {
        return [
        'pkl_id' => 'required',
        'tgl_mulai' => 'required|date_format:"Y-m-d',
        'tgl_selesai' => 'required|date_format:"Y-m-d',
        'rerata' => 'required|integer',
        'pengetahuan' => 'required|integer',
        'pelaksanaan' => 'required|integer',
        'kerjasama' => 'required|integer',
        'kreativitas' => 'required|integer',
        'kedisiplinan' => 'required|integer',
        'sikap' => 'required|integer',
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
