<?php

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
        if(Schema::hasColumn('catagories','parent_id')){
            Schema::table('catagories', function (Blueprint $table) {
                $table->unsignedBigInteger('parent_id')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if(Schema::hasColumn('catagories','parent_id')){
            Schema::table('catagories', function (Blueprint $table) {
                $table->unsignedBigInteger('parent_id')->change();
            });
        }
    }
};
