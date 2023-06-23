<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class pkl extends Model
{
    use HasFactory;
    protected $table = 'pkl';

    protected $fillable = [
        'mahasiswa_id',
        'dosbing_id',
        'dpl_id',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }

    public function dospem(): BelongsTo
    {
        return $this->belongsTo(Dosbing::class, 'dospem_id', 'id');
    }

    public function dpl(): BelongsTo
    {
        return $this->belongsTo(DPL::class, 'dpl_id', 'id');
    }

    // public function jurnal(): HasOne
    // {
    //     return $this->hasOne(jurnal::class);
    // }

    // public function kegiatan(): HasOne
    // {
    //     return $this->hasOne(kegiatan::class);
    // }

    // public function kehadiran(): HasMany
    // {
    //     return $this->hasMany(kehadiran::class);
    // }

    // public function kuesioner(): HasMany
    // {
    //     return $this->hasMany(kuesioner::class);
    // }

    // public function penilaian(): HasOne
    // {
    //     return $this->hasOne(penilaian::class);
    // }
}
