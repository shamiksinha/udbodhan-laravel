<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Model\UdbBookGroup;
use App\ReadCsvFacade;

class UdbBookGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udb_book_groups')->truncate();
		Log::info(getcwd() . "\n");
		$currDir='./'.Storage::url('app/');
		$currFile=$currDir.'GroupDetails.csv';
		Log::info("File Exists? ".file_exists($currFile));
		$groupDetails=ReadCsvFacade::readCsv($currFile);
		if (!is_null($groupDetails)){
			foreach($groupDetails as $groupDetailRow){
				UdbBookGroup::create([
					'group_id'=>$groupDetailRow ['group_id'],
					'books_in_group'=>$groupDetailRow ['books_in_group'],
					'start_book_id'=>$groupDetailRow ['start_book'],
					'end_book_id'=>$groupDetailRow ['end_book'],
					'no_of_issues'=>$groupDetailRow ['no_of_issues'],
					'price_per_issue'=>$groupDetailRow ['price_per_issue'],
					'actual_price'=>$groupDetailRow ['actual_price'],
					'discount'=>$groupDetailRow ['discount'],
					'final_price'=>$groupDetailRow ['final_price'],
					]);
				/*$udbBookGroup = new UdbBookGroup ();
				$udbBookGroup->group_id = $groupDetailRow ['group_id'];
				$udbBookGroup->books_in_group = $groupDetailRow ['books_in_group'];
				$udbBookGroup->start_book_id = $groupDetailRow ['start_book'];
				$udbBookGroup->end_book_id = $groupDetailRow ['end_book'];
				$udbBookGroup->price = $groupDetailRow ['price'];
				$udbBookGroup->save();*/
			}
		}
    }
}
