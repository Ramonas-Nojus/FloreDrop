<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/style.css">

<?php
    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];

        $products = new Products();

        $products->addView($p_id);
    } else {
        header("Location: index.php");
    }

    

    $product = $products->getProduct($p_id);
?>

<div class="product-wrapper">
    <div class="product-preview">
        <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <div class="product-details">
            <h1><?php echo $product['name']; ?></h1>
            <p><?php echo $product['description']; ?></p>
            <p class="price">$<?php echo $product['price']; ?></p>
            <br>
            <div class="cart-button"><a  href="product.php?<?php echo $p_id ?>&add_to_cart=true">Add to cart</a></div>
        </div>
    </div>
</div>


    <div class="related-products">
        <h2>Related Products</h2>

        <div class="product">
            <img src="img/logo-color.png" alt="Product 1">
            <div class="product-info">
                <h3>Product 1</h3>
                <p class="price">$24.99</p>
            </div>
        </div>

        <div class="product">
            <img src="img/logo-color.png" alt="Product 2">
            <div class="product-info">
            <h3>Product 2</h3>
            <p class="price">$29.99</p>
            </div>
        </div>

        <div class="product">
            <img src="img/logo-color.png" alt="Product 3">
            <div class="product-info">

            <h3>Product 3</h3>
            <p class="price">$39.99</p>
            </div>
        </div>
    </div>
</body>
</html>