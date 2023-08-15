<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="/style/style.css">

<link rel="stylesheet" href="./style/profile.css">

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
          <p style="display: inline-block; float: left"><strong>Username:</strong> <?php echo $_SESSION['username']; ?> </p>
          <p style='text-align: right; padding-right: 50px'>
            <a href="profile.php?logout=true">
              <button type="button" class="btn btn-danger">Log Out</button>
            </a>
          </p>
          <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
          <p><strong>Country:</strong> <?php echo $_SESSION['country']?></p>
        </div>
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
