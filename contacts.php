<?php include "includes/header.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="./style/contacts.css">
</head>
<body>
    <main>
        <section>
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> 123 Main Street, City, State, ZIP Code</p>
            <p><strong>Phone:</strong> 123-456-7890</p>
            <p><strong>Email:</strong> info@example.com</p>
        </section>

        <section>
            <h2>Contact Form</h2>
            <form class="center-form" action="submit_form.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="Email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" placeholder="Message" required></textarea>
                
                <div class="button-wrapper">

                    <button type="submit">Send</button>
                </div>
            </form>
        </section>
    </main>
</body>

</html>
