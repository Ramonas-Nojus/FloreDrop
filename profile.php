<?php

use Stripe\Climate\Order;

 include "includes/header.php"; ?>
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

$order = new Orders();

$orders = $order->GetUsersOrder($_SESSION['id'])

?>

        <section class="profile-section">
            <h2>My Orders</h2>
            <ul class="orders">
                <?php 
                if(count($orders) > 0){
                    foreach($orders as $row) { ?>
                        <li class="order">
                            <div class="order-info">
                                <span class="order-id">Order ID: <?php echo $row['id']; ?></span>
                                <span class="order-price">Price: $<?php echo $row['price']; ?></span>
                                <span class="order-date">Date: <?php echo $row['date']; ?></span>
                                <a href="#" class="more-info-link">More Info</a>
                            </div>
                        </li>
                    <?php } 
                } else { 
                    echo "<li class='no-orders'>You have no orders</li>"; 
                } ?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 FloreDrop.</p>
    </footer>
</body>

<script>

</script>

</html>
