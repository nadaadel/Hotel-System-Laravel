<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone');
            $table->string('country');
            $table->string('gender');
            $table->string('avatar');
            $table->rememberToken();
            $table->string('stripe_token')->nullable();
            $table->integer('is_registered')->default(0);
            $table->integer('registered_by')->default(0);
            $table->dateTime('last_logged')->default(DB::raw('CURRENT_TIMESTAMP'));
            
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
        Schema::dropIfExists('users');
    }
}
