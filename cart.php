<?php include "./includes/header.php" ?>
<link rel="stylesheet" href="./style/cart.css">

<div class="cart-wrapper">
    <h1 class="cart-header">Shopping Cart</h1>
    
    <?php if(count($_SESSION['cart']) == 0) { ?>

        <div class="empty-cart">
            Your cart is currently empty.
        </div>

    <?php } else { ?>
        
    <table class="cart-table">
        <thead>
            <tr>
                <th></th>
                <th>Item</th>
                <th>Price</th>
                <th></th>

           </tr>
        </thead>
        <tbody>
            <?php 


            if(isset($_GET['remove'])){
                $remove_id = $_GET['remove'];

                $index = array_search($remove_id, $_SESSION['cart']);

                unset($_SESSION['cart'][$index]);

                header("Location: /cart.php");

            }
            
            $products = new Products;

            $total = 0;

            foreach($_SESSION['cart'] as $p_id) {
                $product = $products->getProduct($p_id);

                $name = $product['name'];
                $price = $product['price'];
                $image = $product['image'];

                $total += $price;
            
                ?>
            <tr>
                <td><a href="/product.php?p_id=<?php echo $p_id ?>"><img src="/img/<?php echo $image ?>" width="115px"></a></td>
                <td><a href="/product.php?p_id=<?php echo $p_id ?>"><?php echo $name ?></a></td>
                <td><?php echo $price ?>$</td>
                <td><a href="/cart.php?remove=<?php echo $p_id; ?>">remove</a></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="cart-total">
        Total: <?php echo $total ?>$
    </div>

    <div class="checkout-button">
        <a class="button-link" href="/checkout.php">Checkout</a>
    </div>

    <?php } ?>
    
</div>

</body>
</html>
