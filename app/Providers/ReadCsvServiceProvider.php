<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;
use App\ReadCsv;

class ReadCsvServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		App::bind('ReadCsv', function(){
			// creating and returning object of our class
			return new ReadCsv();
		});
    }
}
