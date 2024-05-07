<?php include "./includes/header.php"; ?>

<link rel="stylesheet" href="/style/style.css">

<section class="hero">
      <div class="container">
        <h1>Welcome to FloreDrop</h1>
        <p>Discover the epitome of elegance with our exquisite collection of jewelry.</p>
      </div>
    </section>

    <section class="featured">
      <h2>Featured Collections</h2>
      <div class="container">
        <div class="product">
          <h3>Rings</h3>
          <img src="./img/ring.png" alt="ring" width="250px">
          <p><a class="btn" href="products.php?category=rings">Shop Rings</a></p>
        </div>
        
        <div class="product">
          <h3>Necklaces</h3>
          <img src="./img/necklace.png" alt="necklace" width="250px">
          <p><a class="btn" href="product.php?category=necklaces">Shop Necklaces</a></p>
        </div>
        
        <div class="product">
          <h3>Bracelets</h3>
          <img src="./img/bracelet.png" alt="bracelet" width="250px">
          <p><a class="btn" href="product.php?category=bracelets">Shop Bracelets</a></p>
        </div>
      </div>  
    </section>

    <section class="newsletter">
      <div class="container">
        <h2>Stay Connected</h2>
        <p>Sign up for our newsletter to receive updates on new collections, promotions, and exclusive offers.</p>
        <form action="/subscribe" method="post">
          <input type="email" name="email" placeholder="Enter your email address">
          <button type="submit">Subscribe</button>
        </form>
        <p>We promise to never spam you!</p>
      </div>
    </section>

    <section class="faq">
      <div class="container">
        <h2>Frequently Asked Questions</h2>
        <ul>
          <li>
            <span class="question">What is your return policy?</span>
            <span class="answer">You can find our return policy details on our <a href="returns.html">Returns & Exchanges</a> page.</span>
          </li>
          <li>
            <span class="question">Do you offer shipping internationally?</span>
            <span class="answer">Yes, we ship internationally. See details on our <a href="shipping.html">Shipping Information</a> page.</span>
          </li>
          <li>
            <span class="question">How can I care for my jewelry?</span>
            <span class="answer">We provide jewelry care tips on our website and include a care card with every purchase.</span>
          </li>
        </ul>
        <a href="faq.html" class="btn">View All FAQs</a>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; 2024 FloreDrop.</p>
        <ul class="legal">
          <li><a href="terms.html">Terms of Service</a></li>
          <li><a href="privacy.html">Privacy Policy</a></li>
          <li><a href="shipping.html">Shipping Information</a></li>
        </ul>
      </div>
    </footer>

    <script src="https://kit.fontawesome.com/your-fontawesome-kit-code.js" crossorigin="anonymous"></script>
  </body>
</html>
