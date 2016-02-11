<?php

namespace arleslie\TwoCheckout;

use Closure;

class Middleware
{
	public function handle($request, Closure $next)
	{
		$response = $next($request);

		return Base::injectJavascript($response);
	}
}