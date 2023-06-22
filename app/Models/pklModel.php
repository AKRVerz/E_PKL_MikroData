<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pklModel extends Model
{
    use HasFactory;

    protected $table = 'pkl';

    protected $fillable = [
        'mahasiswa_id',
        'dospem_id',
        'dpl_id',
        'lokasi_id'
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(mahasiswaModel::class);
    }

    public function dospem(): BelongsTo
    {
        return $this->belongsTo(dospemModel::class);
    }

    public function dpl(): BelongsTo
    {
        return $this->belongsTo(dplModel::class);
    }

    public function jurnal(): HasOne
    {
        return $this->hasOne(jurnalModel::class);
    }

    public function kegiatan(): HasOne
    {
        return $this->hasOne(kegiatanModel::class);
    }

    public function kehadiran(): HasMany
    {
        return $this->hasMany(kehadiranModel::class);
    }

    public function kuesioner(): HasMany
    {
        return $this->hasMany(kuesionerModel::class);
    }

    public function penilaian(): HasOne
    {
        return $this->hasOne(penilaianModel::class);
    }

    public function lokasi(): HasMany
    {
        return $this->hasMany(lokasiModel::class);
    }

    // public function mahasiswa(){
    //     return $this->belongsTo(related: mahasiswaModel::class, foreignKey: 'mahasiswa_id', ownerKey:'id');
    // }
}
