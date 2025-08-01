<?php include "./includes/header.php" ?>

    <?php if(isset($_GET['order_id'])){
            $id = $_GET['order_id'];
    } else { header("Location: ./ "); }



    $orders = new Orders;
    $order = $orders->GetOrder($id);
    
    $products = new Products;

    $products_list = explode(",", $order['products']);
    
    ?>

    <link rel="stylesheet" href="./style/order_info.css">
    <div class="container">
    <h1>Order Information</h1>
    <div class="order-details">
      <h2>Order<?php echo $id ?></h2>
      <div class="order-info">
        <span><strong>Order Date:</strong> <?php echo $order['date']; ?></span>
        <span><strong>Customer Name:</strong> <?php echo $order['buyer_name']; ?></span>
        <span><strong>Total Amount:</strong> <?php echo $order['price']; ?> $</span>
        <span><strong>Email:</strong> <?php echo $order['buyer_email']; ?></span>
        <span><strong>Delivery:</strong> by courier to your home</span>
        <span><strong>Address:</strong> <?php echo $order['buyer_full_address']; ?></span>

        <span><strong>Status:</strong> Shipped</span>
            <hr>
        <span><strong>Products:</strong></span>
        <ul class="orders">
                <?php 
                    foreach($products_list as $p_id) { 
                        
                        $product = $products->getProduct($p_id);
                        
                        ?>
                        <a href="./product.php?p_id=<?php echo $p_id ?>">
                            <li class="product">
                                <div class="order-info">
                                    <img class="product-image" src="./img/<?php echo $product['image']; ?>">
                                    <span class="product-price">Price: <?php echo $product['price']; ?>$</span>
                                    <span class="product-name">name: <?php echo $product['name']; ?></span>

                                </div>
                            </li>
                        </a>
                    <?php } ?>
            </ul>
      </div>


      <!-- <div class="action-buttons">
        <a href="#" class="button">Download Invoice</a>
        <a href="#" class="button">Track Order</a>
      </div> -->
    </div>
  </div>
</body>
</html>