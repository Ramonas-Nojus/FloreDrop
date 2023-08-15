<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/style.css">

<div class="hero-block-img">
        <div class="hero-content">
            <h1>Buy and Sell Products</h1>
            </div>
    </div>

<div class="hero-block">
    <div class="hero-content">
        <p>Discover a wide selection of products and start your online shopping experience today. Sell your own products and reach thousands of potential customers.</p>
        <?php if(!isset($_SESSION['id'])){ ?>
            <a href="login.php" class="hero-button sign-in">Sign In</a>
            <a href="register.php" class="hero-button">Sign Up</a>
        <?php } else { ?>
            <a href="search.php" class="hero-button sign-in">Shop</a>
        <?php } ?>

    </div>
</div>

<div class="popular-products">

    <h2>Most Popular Products</h2>

    <div class="container">
        <a href="product.html" class="product-link">
            <div class="product">
                <img src="img/logo-color.png" alt="Product 1">
                <h2>Product 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$19.99</p>
            </div>
        </a>
    
        <a href="product.html" class="product-link">
            <div class="product">
                <img src="img/logo-color.png" alt="Product 1">
                <h2>Product 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$19.99</p>
            </div>
        </a>
    
        <a href="product.html" class="product-link">
            <div class="product">
                <img src="img/logo-color.png" alt="Product 1">
                <h2>Product 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$19.99</p>
            </div>
        </a>

        <a href="product.html" class="product-link">
            <div class="product">
                <img src="img/logo-color.png" alt="Product 1">
                <h2>Product 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$19.99</p>
            </div>
        </a>
        <a href="product.html" class="product-link">
            <div class="product">
                <img src="img/logo-color.png" alt="Product 1">
                <h2>Product 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$19.99</p>
            </div>
        </a>
        
        <a href="product.html" class="product-link">
            <div class="product">
                <img src="img/logo-color.png" alt="Product 1">
                <h2>Product 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="price">$19.99</p>
            </div>
        </a>
        <!-- Add more product items here -->
    </div>
    
</div>

    <footer>
        <p>&copy; 2023 FloreDrop. All rights reserved.</p>
    </footer>
</body>

</html>
