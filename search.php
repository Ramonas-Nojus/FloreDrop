<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/search.css">

<?php

if (!isset($_GET['page']) ) {
  $page = 1;
} else {
  $page = $_GET['page'];
}

$per_page = 10;
$page_result = ($page-1) * $per_page;

$product = new Products();

$count = $product->getRowsCount();

$products = $product->getAllProducts($page_result, $per_page); ?>

    <div class="container">
        <h1>Product Search</h1>
        <form class="search-form">
            <input type="text" id="search-input" placeholder="Enter product name">
            <select id="category-select">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home</option>
            </select>
            <button type="submit">Search</button>
        </form>
        <ul class="search-results" id="search-results">

        <?php foreach($products as $row) { ?>

        <a href="product.php" class="product-link">
            <div class="product-container">
                <img class="product-image" src="/img/<?php echo $row['image']; ?>" alt="">
                <li class="product-item">
                    <span class="product-name"><?php echo $row['name']; ?></span>
                    <span class="product-price"><?php echo $row['price']; ?></span>
                    <p class="product-description"><?php echo $row['description']; ?></p>
                </li>
            </div>
        </a>
        <?php } ?>
      </ul>
    </div>

</body>
</html>
