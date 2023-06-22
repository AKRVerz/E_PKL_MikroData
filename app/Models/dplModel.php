<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dplModel extends Model
{
    use HasFactory;

    protected $table = 'dpl';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'password',
        'lokasi_id',
    ];

    public function pkl(): HasMany
    {
        return $this->hasMany(pklModel::class);
    }

}
