<?php

namespace App\Repositories;

use App\Interfaces\KegiatanRepositoryInterface;
use App\Models\Kegiatan;

class KegiatanRepository implements KegiatanRepositoryInterface
{
  public function createKegiatan(array $input)
  {
    //Membuat data Kegiatan
    return Kegiatan::create([
      'capaian' => $input['capaian'],
      'sub_capaian' => $input['sub_capaian'],
      'jam' => $input['jam'],
      'status' => $input['status'],
      'pkl_id' => $input['pkl_id'],
    ]);
  }
}
