<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\GstRateConfig;

class GstRateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gst_rate_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('rate', 14,6);
			$table->softDeletes();
            $table->timestamps();
        });
		
		$gstRateConfig = new GstRateConfig();
		$gstRateConfig->rate=0.1875;
		$gstRateConfig->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
