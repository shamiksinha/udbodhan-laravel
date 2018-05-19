<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\UdbCommonConstant;

class UdbCommonConstantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('udb_common_constants')->truncate();
		UdbCommonConstant::create([
			'attribute_module'=>'UDB_SUBSCRIPTION',
			'attribute_key'=>'GST_RATE',
			'attribute_value'=>'0.1800',
		]);
		UdbCommonConstant::create([
			'attribute_module'=>'UDB_SUBSCRIPTION',
			'attribute_key'=>'PAYMENTGATEWAY_RATE',
			'attribute_value'=>'0.0200',
		]);
		UdbCommonConstant::create([
			'attribute_module'=>'UDB_SUBSCRIPTION',
			'attribute_key'=>'PAYMENTGATEWAY_CONSTANT',
			'attribute_value'=>'3',
		]);
		UdbCommonConstant::create([
			'attribute_module'=>'UDB_SUBSCRIPTION',
			'attribute_key'=>'PRICE_PER_BOOK',
			'attribute_value'=>'10.00',
		]);
    }
}
