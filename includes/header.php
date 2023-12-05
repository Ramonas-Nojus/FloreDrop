<?php include "class.autoload.php"; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page | Verdivory</title>
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
                <li><a href="search.php" class="nav-link">Shop</a></li>
                <li><a href="" class="nav-link">About</a></li>
                <li><a href="contacts.php" class="nav-link">Contact</a></li>
                <?php if(isset($_SESSION['id'])): ?>
                    <li><a href="profile.php" class="nav-link">Profile</a></li>
                    <li><a href="add_product.php" class="nav-link">List Product</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
