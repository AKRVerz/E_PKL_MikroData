<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dospemModel extends Model
{
    use HasFactory;

    protected $table = 'dospem';

    protected $fillable = [
        'nama',
        'nip',
        'email',
        'password',
    ];

    public function pkl(): HasMany
    {
        return $this->hasMany(pklModel::class);
    }
}
