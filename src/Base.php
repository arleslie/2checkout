<?php

namespace arleslie\TwoCheckout;

use \Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client as Guzzle;

class Base
{
	const API_SANDBOX_URL = 'https://sandbox.2checkout.com';
	const API_URL = 'https://www.2checkout.com';

	private static $called = false;
	private $guzzle;
	private $sellerId;
	private $apis = [];

	public function __construct($user, $password, $privateKey, $sellerId, $sandbox = false)
	{
		$this->guzzle = new Guzzle([
			'base_uri' => $sandbox ? self::API_SANDBOX_URL : self::API_URL,
			'defaults' => [
				'query' => [
					'sellerId' => $sellerId,
					'privatekey' => $privateKey
				]
			],
			'headers' => [
				'Accept' => 'application/json',
				'Content-Type' => 'application/json'
			],
			'auth' => [
				$user,
				$password
			],
			'curl' => [
				CURLOPT_SSLVERSION => 6 // 2Checkout only allows TLS1.2
			]
		]);

		$this->sellerId = $sellerId;

		self::$called = true;
	}

	private function _getApi($api)
	{
		if (empty($this->apis[$api])) {
			$class = 'arleslie\\TwoCheckout\\APIs\\'. $api;
			$this->apis[$api] = new $class($this->guzzle, $this->sellerId);
		}

		return $this->apis[$api];
	}

	public function sales()
	{
		return $this->_getApi('Sales');
	}

	public function account()
	{
		return $this->_getApi('Account');
	}

	public function payment()
	{
		return $this->_getApi('Payment');
	}

	public static function isActive()
	{
		return self::$called;
	}

	public static function injectJavascript(Response $response)
	{
		if (app()->runningInConsole() || !self::isActive() || $response->isRedirection() || !config('2checkout.inject')) {
			return $response;
		}

		$content = $response->getContent();
		$response->setContent(str_replace(
			"</body>",
			"<script src='https://www.2checkout.com/checkout/api/2co.min.js'></script>\n</body>",
			$content
		));

		return $response;
	}
}