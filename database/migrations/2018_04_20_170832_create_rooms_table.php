<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('number')->unsigned();
            $table->integer('capacity')->unsigned();
            $table->integer('price')->unsigned();
            $table->integer('floor_id')->unsigned();
            $table->integer('admin_id');
<<<<<<< HEAD
            $table->integer('is_reserved')->defaul(0);
=======
            $table->integer('created_by');
            $table->integer('is_reserved');
>>>>>>> 1499ae33d44271a14c7f8c557cc65877319ad504
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
        Schema::dropIfExists('rooms');
    }
}
