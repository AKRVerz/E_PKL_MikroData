<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasiModel extends Model
{
    use HasFactory;

    protected $table = 'lokasi';

    protected $fillable = [
        'lokasi'
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pklModel::class);
    }
}
