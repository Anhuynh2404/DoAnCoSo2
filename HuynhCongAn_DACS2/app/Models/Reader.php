<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'cccd',
        'gender',
        'faculty',
        'major',
        'class',
        'note',
    ];
    // Reader.php
    // public function card()
    // {
    //     return $this->belongsTo(Card::class, 'reader_id');
    // }
}
