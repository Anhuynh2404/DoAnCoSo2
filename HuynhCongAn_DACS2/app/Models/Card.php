<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'end_date',
        'reader_id',
    ];

    // Card.php
    // Card.php
    public function reader()
    {
        // return $this->hasOne(Reader::class, 'reader_id');
        return $this->belongsTo(Reader::class, 'reader_id');
    }
}
