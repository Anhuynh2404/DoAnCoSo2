<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReturn_Slip_Detail extends Model
{
    use HasFactory;

    protected $fillable =[
        'status',
        'returned_date',
        'note',
        'book_id',
        'borrow_return_slip_id'
    ];
}
