<?php

namespace arleslie\TwoCheckout;

class Facade extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor()
	{
		return 'TwoCheckout';
	}
}