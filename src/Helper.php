<?php

namespace arleslie\TwoCheckout;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Response;

trait Helper
{
	protected $client;

	public function __construct(Guzzle $client)
	{
		$this->client = $client;
	}

	protected function request($url, $params = [])
	{
		return $this->parse($this->client->post($url, $params));
	}

	private function parse(Response $response)
	{
		return json_decode((string) $response->getBody());
	}
}