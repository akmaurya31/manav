<?php

require_once '../vendor/autoload.php';
require_once '../secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost';
// $YOUR_DOMAIN = 'https://tpeg-ibiv.com';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1Q5dbzBbbpUyp5ln6YamyEAF',
    'quantity' => 1,
  ]],
  'mode' => 'subscription',
  'success_url' => $YOUR_DOMAIN . '/tpeg/public/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/tpeg/public/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);