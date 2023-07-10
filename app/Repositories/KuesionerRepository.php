<?php

namespace App\Repositories;

use App\Interfaces\KuesionerRepositoryInterface;
use App\Models\Kuesioner;

class KuesionerRepository implements KuesionerRepositoryInterface{
    public function createKuesioner(array $input)
    {
        return Kuesioner::create([
            'pkl_id'=>$input['pkl_id'],
            'no1'=>$input['no1'],
            'no2'=>$input['no2'],
            'no3'=>$input['no3'],
            'no4'=>$input['no4'],
            'no5'=>$input['no5'],
        ]);
    }
}