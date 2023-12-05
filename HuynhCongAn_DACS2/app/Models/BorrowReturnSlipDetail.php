<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReturnSlipDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'note',
        'book_id',
        'borrow_return_slip_id'
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
