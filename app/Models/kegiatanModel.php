<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'pkl_id',
        'capaian',
        'sub_capaian',
        'durasi',
        'status',
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pklModel::class);
    }
}
