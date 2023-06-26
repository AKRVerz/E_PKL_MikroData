<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
  public function createUser(array $input)
  {
    //Membuat data user
    return User::create([
      'name' => $input['name'],
      'email' => $input['email'],
      'password' => Hash::make($input['password']),
      'nim' => $input['nim'],
      'roles_id' => $input['roles_id'],
      'no_hp' => $input['no_hp'],
      'lokasi' => $input['lokasi'],
      'nip' => $input['nip'],
      'jabatan' => $input['jabatan'],
    ]);
  }
}
