# 2checkout
Note: This package is still in heavy development.

## Installation
```composer require arleslie/2checkout```

Add the service provider `arleslie\TwoCheckout\ServiceProvider`.

## Facade Support
Copy the file from the publish directory into your config directory and update it. (Rename this to 2checkout.php)

Then you can use `TwoCheckout::account()->getPayments()` to retreive past payments.

## Class Support
```
use arleslie\TwoCheckout\Base as TwoCheckout;

$TwoCheckout = new TwoCheckout(<user>, <password>, <privateKey>, <sellerId>);
$TwoCheckout->account()->getPayments(); // Retreieve Past Payments
```
