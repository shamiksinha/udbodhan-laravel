<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('udb_subscriptions')->insert([
    			'udb_subcription_id' => 'UDBSUB001',
    			'udb_subcription_type' => 'UDBSUB01YR',
    			'udb_subcription_desc' => 'Subscribe for one year (Only for the first 5 years)',
    			'udb_subcription_amount' => 200.00,
    			'udb_subscription_issues' => 1,
    	]);
    	DB::table('udb_subscriptions')->insert([
    			'udb_subcription_id' => 'UDBSUB002',
    			'udb_subcription_type' => 'UDBSUB05YR',
    			'udb_subcription_desc' => 'Subscribe for 5 years',
    			'udb_subcription_amount' => 1000.00,
    			'udb_subscription_issues' => 5,
    	]);
    	DB::table('udb_subscriptions')->insert([
    			'udb_subcription_id' => 'UDBSUB003',
    			'udb_subcription_type' => 'UDBSUB10YR',
    			'udb_subcription_desc' => 'Subscribe for 10 years',
    			'udb_subcription_amount' => 2000.00,
    			'udb_subscription_issues' => 10,
    	]);
    	DB::table('udb_subscriptions')->insert([
    			'udb_subcription_id' => 'UDBSUB004',
    			'udb_subcription_type' => 'UDBSUB40YR',
    			'udb_subcription_desc' => 'Subscribtion for 40 years',
    			'udb_subcription_amount' => 8000.00,
    			'udb_subscription_issues' => 40,
    	]);
    }
}
