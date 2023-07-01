<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PKL extends Model
{
    use HasFactory;

    protected $table = 'pkl';

    protected $fillable = [
        'mahasiswa_id',
        'dospem_id',
        'dpl_id',
    ];

    public function mahasiswaRelationship(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mahasiswa_id', 'id');
    }
    public function dospemRelationship(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dospem_id', 'id');
    }
    public function dplRelationship(): BelongsTo
    {
        return $this->belongsTo(User::class, 'dpl_id', 'id');
    }
    public function kegiatan()
    {
        return $this->hasMany(Kegiatan::class);
    }
    public function kehadiran(){
        return $this->hasMany(Kehadiran::class);
    }
    public function penilaian(){
        return $this->hasMany(Penilaian::class);
    }
}
