<?php

namespace arleslie\TwoCheckout\APIs;

class Account
{
	use \arleslie\TwoCheckout\Helper;

	public function getCompanyInfo()
	{
		return $this->request('/api/acct/detail_company_info');
	}

	public function getContactInfo()
	{
		return $this->request('/api/acct/detail_contact_info');
	}

	public function getPendingPayment()
	{
		return $this->request('/api/acct/detail_pending_payment');
	}

	public function getPayments()
	{
		return $this->request('/api/acct/list_payments');
	}
}