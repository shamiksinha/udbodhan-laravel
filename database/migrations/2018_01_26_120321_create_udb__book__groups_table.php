<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\UdbBookGroup;
use App\ReadCsvFacade;

class CreateUdbBookGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('udb_book_groups');
        Schema::create('udb_book_groups', function (Blueprint $table) {
            $table->string('group_id', 6);
			$table->tinyInteger('books_in_group')->unsigned();
			$table->string('start_book_id', 8);
			$table->string('end_book_id', 8);
			$table->decimal('price', 16,6);
            $table->timestamps();
			$table->softDeletes();
			$table->primary('group_id');
        });
		Log::info(getcwd() . "\n");
		$currDir='./'.Storage::url('app/');
		$currFile=$currDir.'GroupDetails.csv';
		Log::info("File Exists? ".file_exists($currFile));
		$groupDetails=ReadCsvFacade::readCsv($currFile);
		if (!is_null($groupDetails)){
			foreach($groupDetails as $groupDetailRow){
				$udbBookGroup = new UdbBookGroup ();
				$udbBookGroup->group_id = $groupDetailRow ['group_id'];
				$udbBookGroup->books_in_group = $groupDetailRow ['books_in_group'];
				$udbBookGroup->start_book_id = $groupDetailRow ['start_book'];
				$udbBookGroup->end_book_id = $groupDetailRow ['end_book'];
				$udbBookGroup->price = $groupDetailRow ['price'];
				$udbBookGroup->save();
			}
		}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('udb_book_groups');
    }
}
