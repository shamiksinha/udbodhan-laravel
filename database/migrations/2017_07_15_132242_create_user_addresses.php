<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('udb_user_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('udb_user_address_id');
            $table->string('udb_user_address_type');
            $table->string('udb_user_state');
            $table->string('udb_user_country');
            $table->string('udb_user_address1');
            $table->string('udb_user_address2');
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
        Schema::dropIfExists('udb_user_address');
    }
}
