<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jurnal extends Model
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

    public function pklRelationshipToJurnal(): BelongsTo
    {
        return $this->belongsTo(PKL::class);
    }
}
