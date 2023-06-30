<?php

namespace App\Repositories;

use App\Interfaces\KehadiranRepositoryInterface;
use App\Models\Kehadiran;

class KehadiranRepository implements KehadiranRepositoryInterface{
    public function createKehadiran(array $input)
    {
        return Kehadiran::create([
            'pkl_id'=>$input['pkl_id'],
            'tanggalwaktu'=>$input['tanggalwaktu'],
            // 'tanggal'=>$input['tanggal'],
            // 'waktu'=>$input['waktu'],
            'kehadiran'=>$input['kehadiran'],
            'keterangan'=>$input['keterangan'],
            'status'=>$input['status'],
        ]);
    }
}