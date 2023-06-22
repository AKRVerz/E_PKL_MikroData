<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class jurnal extends Model
{
    use HasFactory;

    protected $table = 'jurnal';

    protected $fillable = [
        'pkl_id',
        'kegiatan',
        'alatbahan',
        'waktu',
        'status',
        'materi',
        'prosedur',
        'hasil',
        'komentar',
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pkl::class);
    }
}
