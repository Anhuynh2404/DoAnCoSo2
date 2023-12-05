<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowReturnSlip extends Model
{
    use HasFactory;
    protected $fillable =[
        'status',
        'borrowed_date',
        'returned_date',
        'card_id',
        'user_id'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function details()
    {
        return $this->hasMany(BorrowReturnSlipDetail::class);
    }
}
