<?php include "includes/header.php" ?>
<link rel="stylesheet" href="/style/style.css">
 <style>
/* Global Styles */
body {
  font-family: Arial, sans-serif;

  display: flex;
  flex-direction: column;
  height: 100vh;
}

.container {
  flex: 1;
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1, h2 {
  color: #333;
}

p {
  color: #666;
}

form {
  margin-top: 20px;
}

input, textarea {
  width: 99%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: none;
}

button {
  padding: 10px 20px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #555;
}


/* Main Content Styles */
main {
  padding: 20px;
  flex: 1;
}

section {
  margin-bottom: 40px;
}

section h2 {
  margin-top: 0;
}

/* Footer Styles */
footer {
  background-color: #333;
  color: #fff;
  text-align: center;
  margin-top: auto; /* Adjusts margin to push the footer to the bottom */
}



 </style>
  
  <main>
    <section>
      <h2>Contact Information</h2>
      <p><strong>Address:</strong> 123 Main Street, City, State, ZIP Code</p>
      <p><strong>Phone:</strong> 123-456-7890</p>
      <p><strong>Email:</strong> info@example.com</p>
    </section>
    
    <section>
      <h2>Contact Form</h2>
      <form action="submit_form.php" method="post">
        <div>
          <label for="name">Name:</label>
          <input type="text" id="name" name="name" required>
        </div>
        <div>
          <label for="email">Email:</label>
          <input type="email" id="email" name="email" required>
        </div>
        <div>
          <label for="message">Message:</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Send</button>
      </form>
    </section>
  </main>
  
  <footer>
    <p>&copy; 2023 Your Company. All rights reserved.</p>
  </footer>
</body>
</html>
