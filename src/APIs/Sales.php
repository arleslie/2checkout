<?php

namespace arleslie\TwoCheckout\APIs;

class Sales
{
	use \arleslie\TwoCheckout\Helper;

	/**
	 * Gets Sales
	 * @see https://www.2checkout.com/documentation/api/sales/list-sales
	 * @param array $search
	 * @return array
	 */
	public function getSales($search = [])
	{
		return $this->request('/api/sales/detail_sale', $search);
	}

	public function getSale($sale_id, $invoice_id = false)
	{
		return $this->request('/api/sales/detail_sale', [
			'sale_id' => $sale_id,
			'invoice_id' => $invoice_id
		]);
	}
}