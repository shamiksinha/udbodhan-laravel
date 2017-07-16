<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('udb_user_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('udb_user_member_code')->unique();
            $table->string('udb_user_mobile_number')->unique();
            $table->string('udb_user_mailing_address_id');
            $table->string('udb_user_billing_address_id');
            $table->char('udb_is_billing_shipping_same');
            $table->string('udb_subcription_id');
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
        Schema::dropIfExists('udb_user_subscriptions');
    }
}
