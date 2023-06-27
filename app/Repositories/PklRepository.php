<?php

namespace App\Repositories;

use App\Interfaces\PklRepositoryInterface;
use App\Models\PKL;

class PklRepository implements PklRepositoryInterface
{
  public function createPKL(array $input)
  {
    //Membuat data PKL
    return PKL::create([
      'mahasiswa_id' => $input['mahasiswa_id'],
      'dospem_id' => $input['dospem_id'],
      'dpl_id' => $input['dpl_id'],

    ]);
  }
}
