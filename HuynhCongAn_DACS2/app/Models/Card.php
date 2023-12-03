<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'note',
    ];

    // Card.php
    public function reader()
    {
        return $this->belongsTo(Reader::class);
    }
}
