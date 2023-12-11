<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReturnSlipDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'quantity',
        'borrowed_date',
        'returned_date',
        'note',
        'borrow_return_slip_id'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_borrow_slip', 'borrow_return_slip_detail_id', 'book_id');
    }

    public function slip()
    {
        return $this->belongsTo(BorrowReturnSlip::class, 'borrow_return_slip_id');
    }
}
