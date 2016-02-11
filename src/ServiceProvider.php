<?php

namespace arleslie\TwoCheckout;

use App;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	public function register()
	{
		App::bind('TwoCheckout', function() {
			static $class;

			if (!isset($class)) {
				$class = new \arleslie\TwoCheckout\Base(
					config('2checkout.username'),
					config('2checkout.password'),
					config('2checkout.privatekey'),
					config('2checkout.sellerid'),
					config('2checkout.sandbox')
				);
			}

			return $class;
		});
	}

	public function boot()
	{
		$this->publishes([
			__DIR__.'/publish/config.php' => config_path('2checkout.php')
		], 'config');

		$kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
		$kernel->pushMiddleware(Middleware::class);
	}
}