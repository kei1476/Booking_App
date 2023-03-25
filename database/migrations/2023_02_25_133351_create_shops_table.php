<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigincrements('id');
            $table->string('name')->nullable(false);
            $table->foreignId('genre_id')->constrained('genres')->onUpdate('CASCADE')->onDelete('CASCADE')->nullable(false);
            $table->foreignId('area_id')->constrained('areas')->onUpdate('CASCADE')->onDelete('CASCADE')->nullable(false);
            $table->text('about')->nullable(false);
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
        Schema::dropIfExists('shops');
    }
}
