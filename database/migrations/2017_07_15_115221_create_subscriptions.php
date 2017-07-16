<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('udb_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('udb_subcription_id')->unique();
            $table->string('udb_subcription_type');
            $table->string('udb_subcription_desc');
            $table->decimal('udb_subcription_amount');
            $table->integer('udb_subscription_issues');
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
        Schema::dropIfExists('udb_subscriptions');
    }
}
