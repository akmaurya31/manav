<?php

require_once '../vendor/autoload.php';
require_once '../secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey); // Use your Stripe secret key
$product_id = 'prod_R1BmXeZUDNv8Ff';
$YOUR_DOMAIN = 'https://tpeg-ibiv.com';
$prices = \Stripe\Price::all([
  'product' => $product_id,  // Fetch prices associated with the product
]);
if (count($prices->data) > 0) {
    $price_id = $prices->data[0]->id;
    $checkout_session = \Stripe\Checkout\Session::create([
      'line_items' => [
        [
          'price' => $price_id,  // Use the Price ID from the fetched prices
          'quantity' => 1,
        ],
      ],
      'mode' => 'payment',  // This is for one-time payments
      'success_url' => $YOUR_DOMAIN . '/stripe/public/success.php',  // Success redirect URL
      'cancel_url' => $YOUR_DOMAIN . '/stripe/public/cancel.php',    // Cancel redirect URL
    ]);
    header('Location: ' . $checkout_session->url);
} else {
    echo "No prices found for this product.";
}
