<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('user_email');
            $table->string('group_id', 6);
            $table->tinyInteger('books_in_group')->unsigned();
			$table->string('start_book_id', 8);
			$table->string('end_book_id', 8);           
            $table->timestamps();
            $table->softDeletes();
            $table->index(['user_id','user_email','group_id']);
            $table->unique(['user_id','user_email','group_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_groups');
    }
}
