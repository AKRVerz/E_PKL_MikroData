<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuesionerModel extends Model
{
    use HasFactory;

    protected $table = 'kuesioner';

    protected $fillable = [
        'pkl_id',
        'no1',
        'no2',
        'no3',
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pklModel::class);
    }
}