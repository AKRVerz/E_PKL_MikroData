<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'pkl_id',
        'tgl_mulai',
        'tgl_selesai',
        'rerata',
        'pengetahuan',
        'pelaksanaan',
        'kerjasama',
        'kreativitas',
        'kedisiplinan',
        'sikap'
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(PKL::class, 'pkl_id', 'pkl');
    }

}
