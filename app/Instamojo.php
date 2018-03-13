<?php
namespace App;
use Illuminate\Support\Facades\Facade;

class InstamojoFacade extends Facade{
	
	protected static function getFacadeAccessor() {
		return 'Instamojo';
	}
}