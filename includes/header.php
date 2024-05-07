<?php include "class.autoload.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page | FloreDrop</title>
    <link rel = "icon" href = "../img/logo-no-background-favicon.png" type = "image/x-icon">
    <link rel = "icon" href = "../img/logo-no-background-favicon.png" type = "image/x-icon">


</head>

<body>
    <header>
        <div class="logo">
            <img src="../img/logo-no-background.png" alt="Green White Blue Shop Logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="nav-link">Home</a></li>
                <li><a href="" class="nav-link">About</a></li>
                <li><a href="contacts.php" class="nav-link">Contact</a></li>
                    <?php if(isset($_SESSION['id'])){ 
                            if($_SESSION['id'] == 1){ ?>
                                <li><a href="add_product.php" class="nav-link">Add Product</a></li>
                    <?php } ?>
                    <li><a href="profile.php" class="nav-link">Profile</a></li>
                <?php } else { ?>
                    <li><a href="register.php" class="nav-link">Sign Up</a></li>
                    <li><a href="login.php" class="nav-link">Log In</a></li>
                <?php } ?>
                <li><a href="cart.php"><img src="/img/cart.png" style="width: 25px;" ><?php if(!isset($_SESSION['cart'])) { echo 0; } else { echo count($_SESSION['cart']); } ?></a></li>
            </ul>
        </nav>
    </header>
