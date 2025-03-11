<?php
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

require './autoload.php';

// For test payments we want to enable the sandbox mode. If you want to put live
// payments through then this setting needs changing to `false`.
$enableSandbox = true;

// PayPal settings. Change these to your account details and the relevant URLs
// for your site.
$paypalConfig = [
    'client_id' => 'AXpQ31MGnIMzRjIKYMuPxvx9D8UUyy4IyW4OndLRx5Z6Bhj8dUJwJlPYbm7cvr2AmIrj2Lu2p1yPqCzy',
    'client_secret' => 'EIXXiX4DDYa_QomlcuY2iNFGOmLPI3qNYiPz_7rGUYsZNm83RewP0ACbONXeY3F-oopCTLoI8JL6kkm3',
    'return_url' => 'http://localhost/paypal-rest-api/response.php',
    'cancel_url' => 'http://localhost/paypal-rest-api/payment-cancelled.html'
];

// Database settings. Change these for your database configuration.
$dbConfig = [
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'name' => 'customer'
];

$apiContext = getApiContext($paypalConfig['client_id'], $paypalConfig['client_secret'], $enableSandbox);

/**
 * Set up a connection to the API
 *
 * @param string $clientId
 * @param string $clientSecret
 * @param bool   $enableSandbox Sandbox mode toggle, true for test payments
 * @return \PayPal\Rest\ApiContext
 */
function getApiContext($clientId, $clientSecret, $enableSandbox = false)
{
    $apiContext = new ApiContext(
        new OAuthTokenCredential($clientId, $clientSecret)
    );

    $apiContext->setConfig([
        'mode' => $enableSandbox ? 'sandbox' : 'live'
    ]);

    return $apiContext;
}