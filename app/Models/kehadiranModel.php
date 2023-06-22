<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kehadiranModel extends Model
{
    use HasFactory;

    protected $table = 'kehadiran';

    protected $fillable = [
        'pkl_id',
        'lokasi_id',
        'waktu',
        'nilai',
        'status',
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pklModel::class);
    }
}
