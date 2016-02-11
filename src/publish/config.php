<?php

return [
	'inject' => true, // Inject the javascript needed for 2Checkout API. (when the Facade is called)

	/* API Information */
	'username'   => env('2CHECKOUT_USERNAME'),     // Username that has API access
	'password'   => env('2CHECKOUT_PASSWORD'),     // Password for the user above.
	'privatekey' => env('2CHECKOUT_PRIVATEKEY'),   // Private key from the API access page.
	'sellerid'   => env('2CHECKOUT_SELLERID'),     // Seller ID (Also known as Account Number)
	'sandbox'    => env('2CHECKOUT_SANDBOX', true) // To use the sandbox or not.
];