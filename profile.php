<?php include "includes/header.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/style/style.css">
    <link rel="stylesheet" href="./style/profile.css">
    <style>
        body {
            background-color: #009688;
            color: #fff;
            text-align: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .profile-section {
            background-color: #fff;
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .profile-info img {
            border: 1px solid #009688;
            border-radius: 50%;
            max-width: 100px;
            max-height: 100px;
            margin: 0 auto;
            display: block;
        }

        .details p {
            margin: 5px;
        }

        .post-list li {
            list-style: none;
            margin: 20px 0;
            border: 1px solid #009688;
            padding: 10px;
            border-radius: 10px;
            background-color: #fff;
        }

        main {
            flex: 1;
        }

        footer {
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
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

        <section class="profile-section">
            <h2>Recent Posts</h2>
            <ul class="post-list">
                <li>
                    <h3>Exploring the Mountains</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac lacinia odio.</p>
                </li>
                <li>
                    <h3>Capturing Memories</h3>
                    <p>Nulla facilisi. Vestibulum tincidunt tellus vitae tortor euismod, non ultricies dui bibendum.</p>
                </li>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 FloreDrop.</p>
    </footer>
</body>

</html>
