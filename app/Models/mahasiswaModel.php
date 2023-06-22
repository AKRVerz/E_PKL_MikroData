<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'email',
        'password',
        'nama',
        'nim',
        'hp',
        'lokasi_id',
    ];

    protected $hidden = [
        'password'
    ];

    public function pkl(): HasOne
    {
        return $this->hasOne(pklModel::class);
    }
}
