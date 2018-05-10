<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_request_id');
            $table->string('payment_id')->nullable();
            $table->string('group_id')->nullable();
			$table->string('book_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('buyer_name');
            $table->decimal('amount',14,6);
            $table->string('purpose');
            $table->enum('status',['Pending','Sent','Failed','Completed']);
            $table->boolean('send_sms')->default(false);
            $table->boolean('send_email')->default(false);
            $table->enum('sms_status',['Pending','Failed','Sent'])->default(null);
            $table->enum('email_status',['Pending','Failed','Sent'])->default(null);
            $table->string('shorturl')->nullable();
            $table->string('longurl');
            $table->string('redirect_url');
            $table->string('webhook')->nullable();
            $table->string('payment_req_created_at');
            $table->string('payment_req_modified_at');
            $table->boolean('allow_repeated_payments');
            $table->boolean('payment_status')->default(false);
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['payment_request_id','payment_id']);
            $table->index(['payment_request_id','payment_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_requests');
    }
}
