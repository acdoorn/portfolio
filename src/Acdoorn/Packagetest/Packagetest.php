<?php namespace Acdoorn\Packagetest;
use View;
class Packagetest {

	public static function greeting() {
		return View::make('packagetest::greeting');
	}
}
