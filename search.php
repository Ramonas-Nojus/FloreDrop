<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/search.css">

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
            <!-- Search results will be dynamically populated here -->
        </ul>
    </div>
    <script type="text/javascript">

var searchForm = document.querySelector('.search-form');
  var searchInput = document.querySelector('#search-input');
  var categorySelect = document.querySelector('#category-select');
  var searchResults = document.querySelector('#search-results');

  searchForm.addEventListener('submit', function (event) {
    event.preventDefault();
    var searchTerm = searchInput.value.trim();
    var selectedCategory = categorySelect.value.trim();
    searchProducts(searchTerm, selectedCategory);
  });

// Call searchProducts() with empty values on page load
searchProducts('', '');

function searchProducts(searchTerm, selectedCategory) {
  var products = [
  { name: 'Product 1', category: 'electronics', price: '$24.99', image: 'img/logo-color.png', description: 'lorem' },
  { name: 'home 1', category: 'electronics', price: '$24.99', image: 'img/logo-color.png', description: 'Lorem' },
  { name: 'electronic 1', category: 'electronics', price: '$24.99', image: 'img/logo-color.png', description: 'Lorem' },
  { name: 'home 1', category: 'electronics', price: '$24.99', image: 'img/logo-color.png', description: 'Lorem' },
  { name: 'Product 2', category: 'electronics', price: '$29.99', image: 'img/logo-color.png', description: 'Praesent' },
  { name: 'Product 3', category: 'electronics', price: '$39.99', image: 'img/logo-color.png', description: 'Nullam' },
  ];

// Clear previous search results
  searchResults.innerHTML = '';

// Filter products based on search term and category
  var filteredProducts = products.filter(function (product) {
  var matchesSearchTerm = product.name.toLowerCase().includes(searchTerm.toLowerCase());
  var matchesCategory = selectedCategory === '' || product.category === selectedCategory;
  return matchesSearchTerm && matchesCategory;
});

    // Check if there are no search results
    if (filteredProducts.length === 0) {
      displayNoProductsMessage();
      return;
    }


  // Calculate relevance score for each product based on search term
  filteredProducts.forEach(function (product) {
  var relevanceScore = calculateRelevanceScore(searchTerm, product);
  product.relevanceScore = relevanceScore;
  });

  // Sort products based on relevance score in descending order
  filteredProducts.sort(function (a, b) {
    return b.relevanceScore - a.relevanceScore;
  });



// Iterate over filtered products and display results
  filteredProducts.forEach(function (product) {

    var link = document.createElement('a')
    link.setAttribute("href", "product.php")
    var div = document.createElement("div")
    var li = document.createElement('li');
    var productName = document.createElement('span');
    productName.classList.add('product-name');
    productName.textContent = product.name;
    var productPrice = document.createElement('span');
    productPrice.classList.add('product-price');
    productPrice.textContent = product.price;
    var productImage = document.createElement('img');
    productImage.classList.add('product-image');
    productImage.src = product.image;
    productImage.alt = product.name;
    var productDescription = document.createElement('p');
    productDescription.classList.add('product-description');
    productDescription.textContent = product.description;

    li.appendChild(productImage);
    li.appendChild(productName);
    li.appendChild(document.createTextNode(' - '));
    li.appendChild(productPrice);
    li.appendChild(productDescription);

    div.appendChild(li)
    link.appendChild(div)

    searchResults.appendChild(link);
  });
}

function calculateRelevanceScore(searchTerm, product) {
  var nameScore = calculateTermScore(searchTerm, product.name);
  var descriptionScore = calculateTermScore(searchTerm, product.description);
  var totalScore = nameScore + descriptionScore;
  return totalScore;
}

function calculateTermScore(searchTerm, text) {
  var termRegex = new RegExp(searchTerm, 'gi');
  var matches = text.match(termRegex);
  var score = matches ? matches.length : 0;
  return score;
}

function displayNoProductsMessage() {
  searchResults.innerHTML = '<p class="no-products-message">No products found.</p>';
} 

    </script>
</body>
</html>
