<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class kuesioner extends Model
{
    use HasFactory;
    protected $table = 'kuiesioner';

    protected $fillable = [
        'pkl_id',
        'no1',
        'no2',
        'no3',
    ];

    public function pkl(): BelongsTo
    {
        return $this->belongsTo(pkl::class);
    }
}
