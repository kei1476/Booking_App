<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->foreignId('user_id')->constrained('users')->onUpdate('CASCADE')->onDelete('CASCADE')->nullable(false);
            $table->foreignId('shop_id')->constrained('shops')->onUpdate('CASCADE')->onDelete('CASCADE')->nullable(false);
            $table->date('book_date')->nullable(false);
            $table->time('book_time')->nullable(false);
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
        Schema::dropIfExists('books');
    }
}
