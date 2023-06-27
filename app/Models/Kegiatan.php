<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'capaian',
        'sub_capaian',
        'jam',
        'status',
        'pkl_id'
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(PKL::class, 'pkl_id', 'id');
    }
}
