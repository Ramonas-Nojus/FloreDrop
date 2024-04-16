<?php include "./includes/header.php" ?>
<link rel="stylesheet" href="./style/checkout.css">

<?php 

    if(count($_SESSION['cart']) == 0){
        header("Location: index.php");
    }

    $products = new Products;

    $price = 0;

    foreach($_SESSION['cart'] as $p_id){
        $price += $products->getProduct($p_id)['price']*100;
    }

?>

        <div class="checkout-wrapper">
            <div class="checkout-details">
                <h1>Checkout</h1>
                <form action="checkout.php" method="post">
                <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="city">Country:</label>
                    <input type="text" id="country" name="country" required>

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>


                    <label for="street-address">Address:</label>
                    <input type="text" id="address" name="address" required>


                    <label for="postal-code">Postal Code:</label>
                    <input type="text" id="postal-code" name="postal-code" required>


                    <input type="hidden" id="price" name="price" value="<?php echo $price; ?>" >


                    <div class="checkout-button">
                        <button type="submit" name="order">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
