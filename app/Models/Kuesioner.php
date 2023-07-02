<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kuesioner extends Model
{
    use HasFactory;

    protected $table = 'kuesioner';

    protected $fillable = [
        'pkl_id',
        'no1',
        'no2',
        'no3',
        'no4',
        'no5'
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(PKL::class, 'pkl_id', 'pkl');
    }
}
