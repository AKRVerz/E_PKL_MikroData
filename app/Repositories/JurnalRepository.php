<?php

namespace App\Repositories;

use App\Interfaces\JurnalRepositoryInterface;
use App\Models\Jurnal;

class JurnalRepository implements JurnalRepositoryInterface
{
  public function createJurnal(array $input)
  {
    //Membuat data PKL
    return Jurnal::create([
      'pkl_id' => $input['pkl_id'],
      'kegiatan' => $input['kegiatan'],
      'alatbahan' => $input['alatbahan'],
      'waktu' => $input['waktu'],
      'status' => $input['status'],
      'materi' => $input['materi'],
      'prosedur' => $input['prosedur'],
      'hasil' => $input['hasil'],
      'komentar' => $input['komentar'],
    ]);
  }
}
