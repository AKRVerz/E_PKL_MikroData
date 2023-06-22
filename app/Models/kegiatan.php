<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kegiatan extends Model
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
        return $this->belongsTo(pkl::class);
    }
}
