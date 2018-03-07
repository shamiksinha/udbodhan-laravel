<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_books', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('user_email');
            $table->string('book_id', 8);
            $table->string('book_name', 100);
            $table->string('book_month', 20);
            $table->smallInteger('book_year')->unsigned();
            $table->tinyInteger('book_number')->unsigned();            
            $table->timestamps();
            $table->softDeletes();
            $table->index(['user_id','user_email','book_id']);
            $table->unique(['user_id','user_email','book_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_books');
    }
}
