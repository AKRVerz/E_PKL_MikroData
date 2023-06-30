<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kehadiran extends Model
{
    use HasFactory;

    protected $table = 'kehadiran';

    protected $fillable = [
        'pkl_id',
        'tanggalwaktu',
        // 'tanggal',
        // 'waktu',
        'kehadiran',
        'keterangan',
        'status'
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(PKL::class, 'pkl_id', 'pkl');
    }
}
