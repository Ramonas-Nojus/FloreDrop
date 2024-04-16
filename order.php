<?php include "./includes/header.php" ?>
<link rel="stylesheet" href="./style/checkout.css">

        <div class="checkout-wrapper">
            <div class="checkout-details">
                <h1>Checkout</h1>
                <form action="#" method="post">
                <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="city">Country:</label>
                    <input type="text" id="country" name="country" required>

                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" required>


                    <label for="street-address">Street Address:</label>
                    <input type="text" id="street-address" name="street-address" required>


                    <label for="postal-code">Postal Code:</label>
                    <input type="text" id="postal-code" name="postal-code" required>

                    <div class="checkout-button">
                        <button type="submit">Place Order</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
