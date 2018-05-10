<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\GstRateConfig;

class GSTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gst_rate_configs')->truncate();
		GstRateConfig::create(['rate'=>0.1875,]);
		/*$gstRateConfig = new GstRateConfig();
		$gstRateConfig->rate=0.1875;
		$gstRateConfig->save();*/
		
    }
}
