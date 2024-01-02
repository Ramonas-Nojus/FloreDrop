<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/checkout.css">

<div class="checkout-wrapper">
    <div class="checkout-details">
        <h1>Checkout</h1>
        <!-- Add checkout form elements here -->
        <form action="process_checkout.php" method="post">
            <!-- Include your checkout form fields (e.g., name, address, payment info) -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea>

            <label for="payment">Payment Info:</label>
            <input type="text" id="payment" name="payment" required>

            <div class="checkout-button">
                <button type="submit">Proceed to Payment</button>
            </div>
        </form>
    </div>
</div>

<footer>
        <p>&copy; 2023 FloreDrop. All rights reserved.</p>
    </footer>
</body>

</html>

