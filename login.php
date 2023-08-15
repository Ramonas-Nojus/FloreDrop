<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="./style/style.css">

<?php 

$user = new Users;

if(isset($_POST['email'])) {
    $user->login($_POST['email'], $_POST['password']);
}

?>

<style>

    .container {
        max-width: 400px;
        padding: 40px;
        margin-top: 50px;
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }

    .container h1 {
        text-align: center;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .form-group button {
        width: 100%;
        padding: 10px;
        background-color: #009688;
        color: #ffffff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
    }

    .form-group button:hover {
        background-color: #00796b;
    }
</style>

    <div class="container">
        <h1>Sign In</h1>
        <?php
        
        if(isset($_GET['error'])){
            echo "<p>";
            $err = $_GET['error'];
            
            switch($err){
                case "wrongPwd":
                    echo "Wrong password";
                    break;

                case "userNotFound":
                    echo "User with this email is not registered";
                    break;

                case "failed":
                    echo "Something went wrong, try again later";
                    break;
            }
            echo "</p>";
        }
        ?>
        
        <form method='post'>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <div class="form-group">
                <button type="submit">Sign In</button>
            </div>
        </form>
        <a href="register.php" style="text-decoration: none;">don't have account?</a>
    </div>
</body>
</html>
