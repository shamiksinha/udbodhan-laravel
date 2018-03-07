<?php
namespace App;
use Illuminate\Support\Facades\Log;


class ReadCsv{
	
	public function readCsv(string $fileName){
		$csvData=null;
		if (file_exists($fileName)){
			$csvData=array_map('str_getcsv', file($fileName));
			array_walk($csvData, function(&$a) use ($csvData) {
				$a = array_combine($csvData[0], $a);
			});
			array_shift($csvData); # remove column header
			Log::info($csvData);
		}
		return $csvData;
	}
}