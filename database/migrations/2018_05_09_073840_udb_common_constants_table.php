<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UdbCommonConstantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('udb_common_constants');
        Schema::create('udb_common_constants', function (Blueprint $table) {
            $table->increments('id');
			$table->string('attribute_module');
			$table->string('attribute_key');
			$table->string('attribute_value');
			$table->softDeletes();
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
        Schema::dropIfExists('udb_common_constants');
    }
}
