<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class InstaMojoServiceProvider extends ServiceProvider
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
    	$this->app->bind(Client::class, function ($app) {    		
    		return new Client([
    				'base_uri' => $app['config']['instamojo']['config']['url'],
    				'headers' => [
    					'X-Api-Key' => $app['config']['instamojo']['config']['apikey'],
    					'X-Auth-Token' => $app['config']['instamojo']['config']['authtoken'],
    				],
    		]);
    	});
    }
}
