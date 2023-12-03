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
        'gender',
        'faculty',
        'major',
        'class',
        'class_of',
        'note',
    ];
    // Card.php
public function reader()
{
    return $this->belongsTo(Reader::class);
}

}
