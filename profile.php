<?php include "includes/header.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="./style/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<?php 

if(!isset($_SESSION['id'])){
  header("Location: /");
}

if(isset($_GET['logout'])){
  $user = new Users();
  $user->LogOut();
}

?>

<body>
    <main>
        <section class="profile-section">
            <h2>Profile Information</h2>
            <div class="profile-info">
                <img src="img/<?php echo $_SESSION['image']; ?>" alt="Profile Image">
                <div class="details">
                    
                    <p><strong>Username:</strong> <?php echo $_SESSION['username']; ?></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
                    <p><strong>Country:</strong> <?php echo $_SESSION['country'] ?></p>

                </div>
                <p style='text-align: right; padding-right: 50px'>
                        <a href="profile.php?logout=true">
                            <button type="button" class="btn btn-danger">Log Out</button>
                        </a>
                    </p>
            </div>
        </section>


<?php

$product = new Products();

?>

        <section class="profile-section">
            <button class="button active">Listed Products</button>
            <button class="button unactive">My Orders</button>

            <div class="my-products hide">
                <ul class="products">
                    <?php foreach($products as $row) { ?>
                        <a href="product.php?p_id=<?php echo $row['id'] ?>" class="product-link">
                            <div class="product-container">
                                <li class="product-item">
                                    <img class="product-image" style="height: 125px; border: 3px solid; border-radius: 5px; float: left" src="/img/<?php echo $row['image']; ?>" alt="">
                                    <span class="product-name"><?php echo $row['name']; ?></span>
                                    <span class="product-price">$<?php echo $row['price']; ?></span>
                                    <p class="product-description"><?php echo $row['description']; ?></p>
                                </li>
                            </div>
                        </a>
                    <?php } ?>
                </ul>
            </div>    
        </section>
    </main>

    <footer>
        <p>&copy; 2023 FloreDrop.</p>
    </footer>
</body>

<script>

</script>

</html>
