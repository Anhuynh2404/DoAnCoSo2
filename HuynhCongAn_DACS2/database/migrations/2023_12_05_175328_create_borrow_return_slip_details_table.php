<?php

use App\Models\Book;
use App\Models\BorrowReturnSlip;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_return_slip_details', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(true);
            $table->date('borrowed_date');
            $table->date('returned_date');
            $table->text('note')->nullable();
            $table->foreignIdFor(BorrowReturnSlip::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrow_return_slip_details');
    }
};
