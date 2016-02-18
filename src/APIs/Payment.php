<?php

namespace arleslie\TwoCheckout\APIs;

class Payment
{
	use \arleslie\TwoCheckout\Helper;

	/**
	 * Create sale using the token from the JavaScript API.
	 *
	 * Note: sellerId and privateKey are automatically added to the request.
	 * @see https://www.2checkout.com/documentation/payment-api/create-sale
	 *
	 * @param array $params
	 * @return array
	 */
	public function createSale($params)
	{
		return $this->json("/checkout/api/1/{$this->sellerId}/rs/authService", $params);
	}
}