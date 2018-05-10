<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPaymentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('payment_requests', function (Blueprint $table) {
			$table->dropColumn('group_id');
		});
        Schema::table('payment_requests', function (Blueprint $table) {
			$table->string('group_id')->nullable()->after('payment_id');
			$table->string('book_id')->nullable()->after('group_id');			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('payment_requests', function (Blueprint $table) {
			$table->dropColumn('group_id','book_id');
		});
        Schema::table('payment_requests', function (Blueprint $table) {
			$table->string('group_id');
		});
    }
}
