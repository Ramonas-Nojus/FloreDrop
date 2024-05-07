<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/products.css">

<?php

if (!isset($_GET['page']) ) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$per_page = 10;
$page_result = ($page-1) * $per_page;

$product = new Products();


if(isset($_GET['category'])){
    $category = $_GET['category'];

    $count = $product->getRowsCount($category);
    $products = $product->getAllProducts($page_result, $per_page, $category); 
}
?>

    <div class="container">
        <h1>Product Search</h1>
        <form class="search-form">
            <input type="text" id="search-input" placeholder="Enter product name">
            <button type="submit">Search</button>
        </form>
        <ul class="search-results" id="search-results">

        <?php foreach($products as $row) { ?>

        <a href="product.php?p_id=<?php echo $row['id'] ?>" class="product-link">
            <div class="product-container">
                <img class="product-image" src="/img/<?php echo $row['image']; ?>" alt="">
                <li class="product-item">
                    <span class="product-name"><?php echo $row['name']; ?></span>
                    <br>
                    <span class="product-price"><?php echo $row['price']; ?>€</span>
                </li>
            </div>
        </a>
        <br>
        <?php } ?>
      </ul>


      <ul class="pager">
      <?php 
      
        for($i = 1; $i<=ceil($count/$per_page); $i++){
            if($i == $page) {
                echo "<li '><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
            } else {
                echo "<li '><a href='index.php?page={$i}'>{$i}</a></li>";
            }
        } 

      ?> 
      </ul>
    </div>
</body>
</html>
