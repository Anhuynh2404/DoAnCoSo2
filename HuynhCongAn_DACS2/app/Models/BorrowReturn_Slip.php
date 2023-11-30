<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReturn_Slip extends Model
{
    use HasFactory;
    protected $fillable =[
        'quantity',
        'borrowed_date',
        'card_id',
        'user_id'
    ];
}
