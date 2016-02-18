<?php

namespace arleslie\TwoCheckout;

use GuzzleHttp\Client as Guzzle;
use GuzzleHttp\Psr7\Response;

trait Helper
{
	protected $client;
	protected $sellerId;

	public function __construct(Guzzle $client, $sellerId)
	{
		$this->client = $client;
		$this->sellerId = $sellerId;
	}

	protected function get($url)
	{
		return $this->parse($this->client->get($url));
	}

	protected function request($url, $params = [])
	{
		return $this->parse($this->client->post($url, $params));
	}

	protected function json($url, $params = [])
	{
		return $this->request($url, ['json' => $params]);
	}

	private function parse(Response $response)
	{
		return json_decode((string) $response->getBody());
	}
}