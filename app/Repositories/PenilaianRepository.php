<?php

namespace App\Repositories;

use App\Interfaces\PenilaianRepositoryInterface;
use App\Models\Penilaian;

class PenilaianRepository implements PenilaianRepositoryInterface{
    public function createPenilaian(array $input)
    {
        return Penilaian::create([
            'pkl_id'=>$input['pkl_id'],
            'tgl_mulai'=>$input['tgl_mulai'],
            'tgl_selesai'=>$input['tgl_selesai'],
            'rerata'=>$input['rerata'],
            'pengetahuan'=>$input['pengetahuan'],
            'pelaksanaan'=>$input['pelaksanaan'],
            'kerjasama'=>$input['kerjasama'],
            'kreativitas'=>$input['kreativitas'],
            'kedisiplinan'=>$input['kedisiplinan'],
            'sikap'=>$input['sikap'],
        ]);
    }
}