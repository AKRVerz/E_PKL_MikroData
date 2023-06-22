<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penilaianModel extends Model
{
    use HasFactory;

    protected $table = 'penilaian';

    protected $fillable = [
        'pkl_id',
        'nilai',
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pklModel::class);
    }
}
