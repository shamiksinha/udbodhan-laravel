<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\ReadCsvFacade;
use App\Model\UdbBookDetail;

class UdbBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udb_book_details')->truncate();
		Log::info(getcwd() . "\n");
		$currDir='./'.Storage::url('app/');
		$currFile=$currDir.'BookDetails.csv';
		Log::info("File Exists? ".file_exists($currFile));
		$bookDetails=ReadCsvFacade::readCsv($currFile);
		if (!is_null($bookDetails)){
			foreach($bookDetails as $bookDetailRow){
				UdbBookDetail::create([
					'book_id'=>$bookDetailRow ['book_id'],
					'book_name'=>$bookDetailRow ['book_name'],
					'book_month'=>$bookDetailRow ['book_month'],
					'book_year'=>$bookDetailRow ['book_year'],
					'book_number'=>$bookDetailRow ['book_number'],
					]);
				/*$udbBookDetail = new UdbBookDetail();
				$udbBookDetail->book_id = $bookDetailRow ['book_id'];
				$udbBookDetail->book_name = $bookDetailRow ['book_name'];
				$udbBookDetail->book_month = $bookDetailRow ['book_month'];
				$udbBookDetail->book_year = $bookDetailRow ['book_year'];
				$udbBookDetail->book_number = $bookDetailRow ['book_number'];
				$udbBookDetail->save ();*/
			}
		}
    }
}
