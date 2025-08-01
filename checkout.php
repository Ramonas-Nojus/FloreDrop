<?php 

session_start();

require_once './vendor/autoload.php';

$stripeSecretKey = getenv('STRIPE_SECRET_KEY');

$stripe = new \Stripe\StripeClient($stripeSecretKey);


if(isset($_POST['order'])){
    
    $name = $_POST['name'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal-code'];
    $price = $_POST['price'];

    $email = isset($_POST['email']) ? $_POST['email'] : $_SESSION['email'];


} else {
    header('Location: index.php');
}



\Stripe\Stripe::setApiKey($stripeSecretKey);

$success_url =  'https://orange-kudu-155499.hostingersite.com/finish_order.php?' .
                '&name=' . urlencode($name) .
                '&country=' . urlencode($country) .
                '&city=' . urlencode($city) .
                '&address=' . urlencode($address) .
                '&postal_code=' . urlencode($postal_code) .
                '&price=' . urlencode($price/100) .
                '&email=' . urlencode($email);


$checkout_session = \Stripe\Checkout\Session::create([
    "mode" => "payment",
    "success_url" => $success_url,

    "cancel_url" => 'https://orange-kudu-155499.hostingersite.com/index.php',
    "line_items" => [
        [
            "quantity" => 1,
            "price_data" => [
                "currency" => "eur",
                "unit_amount" => $price,
                "product_data" => [
                    "name" => "products from FloreDrop",
                ]
            ]
        ]
    ]
]);

http_response_code(303);
header("Location: ". $checkout_session->url);