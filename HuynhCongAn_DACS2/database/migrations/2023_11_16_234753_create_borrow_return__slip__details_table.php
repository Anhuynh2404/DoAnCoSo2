<?php

use App\Models\Book;
use App\Models\BorrowReturn_Slip;
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
        Schema::create('borrow_return__slip__details', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['chưa trả', 'đã trả']);
            $table->date('returned_date');
            $table->text('note');
            $table->foreignIdFor(Book::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(BorrowReturn_Slip::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('borrow_return__slip__details');
    }
};
