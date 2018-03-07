<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;
use App\ReadCsvFacade;
use App\UdbBookDetail;
use Illuminate\Support\Facades\Log;

class CreateUdbBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('udb_book_details');
        Schema::create('udb_book_details', function (Blueprint $table) {
            $table->string('book_id', 8);
            $table->string('book_name', 100);
			$table->string('book_month', 20);
			$table->smallInteger('book_year')->unsigned();
			$table->tinyInteger('book_number')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->primary('book_id');
        });
		
		Log::info(getcwd() . "\n");
		$currDir='./'.Storage::url('app/');
		$currFile=$currDir.'BookDetails.csv';
		Log::info("File Exists? ".file_exists($currFile));
		$bookDetails=ReadCsvFacade::readCsv($currFile);
		if (!is_null($bookDetails)){
			foreach($bookDetails as $bookDetailRow){
				$udbBookDetail = new UdbBookDetail();
				$udbBookDetail->book_id = $bookDetailRow ['book_id'];
				$udbBookDetail->book_name = $bookDetailRow ['book_name'];
				$udbBookDetail->book_month = $bookDetailRow ['book_month'];
				$udbBookDetail->book_year = $bookDetailRow ['book_year'];
				$udbBookDetail->book_number = $bookDetailRow ['book_number'];
				$udbBookDetail->save ();
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
        Schema::dropIfExists('udb_book_details');
    }
}
