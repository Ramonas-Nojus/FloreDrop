<?php

session_start();

use Stripe\Climate\Order;

require 'vendor/autoload.php';

require './includes/class.autoload.php';

if(isset($_GET['email'])){

    $name = $_GET['name'];
    $country = $_GET['country'];
    $city = $_GET['city'];
    $address = $_GET['address'];
    $postal_code = $_GET['postal_code'];
    $price = $_GET['price'];
    $email = $_GET['email'];
    $date = date('Y/m/d');

} else {
    header('Location: index.php');
}

$order_number = date('Ymd') . uniqid();

$full_address = $country.', '. $city. ', '.$address.', '.$postal_code;

$products = $_SESSION['cart'][0];

for($i = 1; $i < count($_SESSION['cart']); $i++){
    $products .= ",".$_SESSION['cart'][$i];
}

$order = new Orders;

$order->addOrder($name, $email, $full_address, $products, $price);

$_SESSION['cart'] = []; 

$html_content = "

<!DOCTYPE html>
<html lang='lt'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Kvitas</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                line-height: 1.6;
                margin: 0;
                padding: 0;
            }

            .container {
                max-width: 600px;
                margin: 20px auto;
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1,
            h2,
            p {
                margin: 0;
            }

            .receipt-header {
                text-align: center;
                padding-bottom: 20px;
                border-bottom: 1px solid #ccc;
                margin-bottom: 20px;
            }


            .receipt-details {
                padding: 20px;
                background: #f9f9f9;
                border-radius: 6px;
                margin-bottom: 20px;
            }

            .receipt-details p {
                margin-bottom: 10px;
            }

            .item {
                padding: 10px;
                background: #f2f2f2;
                border-radius: 6px;
                margin-bottom: 10px;
            }

            .item:last-child {
                margin-bottom: 0;
            }

            .tracking-link {
                margin: 20px;
                text-align: center;
            }

            .tracking-link a {
                color: #007bff;
                text-decoration: none;
            }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='receipt-header'>
                <h1>Pirkinio Kvitas</h1>
            </div>
            <div class='receipt-details'>
                <p>Sveiki,</p>
                <p>Informuojame, kad gavome Jūsų užsakymą.</p>
                <br>
                <p><strong>Užsakymo Numeris: </strong> #$order_number</p>
                <p><strong>Data:</strong> $date</p>
                <p><strong>Bendra Suma:</strong> $price €</p>
                <p><strong>Pirkėjas:</strong> $name</p>
                <p><strong>El. paštas:</strong> $email</p>
                <p><strong>Pristatymas:</strong> kurjeriu į namus</p>
                <p><strong>Adresas:</strong> $address, $city, Lietuva, $postal_code</p>
                <p>Daugiau informacijos apie savo užsakymą galite pažiurėti paspaude <a href='http://floredrop.local/order/$order_number'>šią nuorodą</a></p>
            </div>
        </div>
    </body>
</html>";


require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$subject = "Užsakymo Patvirtinimas";

try {
    $mail = new PHPMailer(true);

    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth   = true;
    $mail->Username   = 'nojus.dev.test@gmail.com';
    $mail->Password   = getenv('GMAIL_APP_PASSWORD');


    function console_log($data) {
        $json_data = json_encode($data);
        echo "<script>console.log($json_data);</script>";
    }

    console_log(getenv('GMAIL_APP_PASSWORD'));

    // Recipients
    $mail->setFrom('nojus.dev.test@gmail.com', 'FloreDrop');
    $mail->addAddress($email, $name);

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $html_content;

    $mail->send();

    header('Location: index.php');
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
}


?>