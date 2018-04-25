<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBannedAtColumnToAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->timestamp('banned_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn('banned_at');
        });
    }
}

