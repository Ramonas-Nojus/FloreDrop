<?php include "includes/header.php" ?>

<link rel="stylesheet" href="./style/style.css">

<style>

    .container {
        width: 400px;
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

    .form-group .show-password {
        font-size: 14px;
        margin-top: 5px;
        cursor: pointer;
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

    label .match {
        border: 4px solid green;
        border-radius: 3px;
    }

    label .notmatch {
        border: 4px solid red;
    }


    #validate {
        color: #000;
        position: relative;
    }


    /* Add a green text color and a checkmark when the requirements are right */
    .valid {
        color: green;
    }

    /* Add a red text color and an "x" icon when the requirements are wrong */
    .invalid {
        color: red;
    }


</style>

<div class="container">


<?php $user = new Users();

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user->register($username, $email, $password);
    $user->login($email, $password);

}

?>

        <h1>Sign Up</h1>
        <form method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <!-- Password field -->
                <label>password :
                    <input name="password" class="password" id="password" type="password" placeholder="Enter your password" onkeyup='check();' required/>
                  </label>
                  <br>
                  <label>confirm password:
                    <input type="password" class="password" name="confirm_password" placeholder="Confirm your password" id="confirm_password"  onkeyup='check();' required/> 
                    <span id='message'></span>
                  </label>
                  
            </div>
            <p><input type="checkbox" onclick="showPass()" style="float: left;">Show Password</p>
            <div id="validate">
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                  </div>

            <label class="checkbox-container" >
                <input type="checkbox" class="checkbox" name="privacy_policy" required style="margin-bottom: 10px;" required>
                I accept the Privacy Policy
            </label>
            
            <div class="form-group">
                <button id="submit" name="submit" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
</body>

<script type="text/javascript">

function showPass() {
    var x = document.querySelectorAll(".password");
    console.log(x)
    for(let i=0; i<2; i++){
        if (x[i].type === "password") {
            x[i].type = "text";
        } else {
            x[i].type = "password";
        }
    }
}

const password = document.getElementById("password");
const confirm_password = document.getElementById('confirm_password');

const submit = document.getElementById('submit');

const msg = document.getElementById('message');

const capital = document.getElementById("capital");
const number = document.getElementById("number");
const length = document.getElementById("length");

    
var check = function() {
    if (password.value === confirm_password.value) {
        confirm_password.classList.add("match")
        confirm_password.classList.remove("notmatch")
        msg.innerHTML = ''
    } else {
        confirm_password.classList.remove("match")
        confirm_password.classList.add("notmatch")
        msg.style.color = 'red';
        msg.style.fontSize = '14px';
        msg.style.fontFamily = 'italic';
        msg.innerHTML = '𝘗𝘢𝘴𝘴𝘸𝘰𝘳𝘥𝘴 𝘩𝘢𝘷𝘦 𝘵𝘰 𝘮𝘢𝘵𝘤𝘩';
    }


    let upperVal = false
    let numberVal = false
    let lengthVal = false
  
    // Validate capital letters
    var upperCaseLetters = /[A-Z]/g;
    if(password.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
      upperVal = true
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
      upperVal = false
    }
  
    // Validate numbers
    var numbers = /[0-9]/g;
    if(password.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
      numberVal = true
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
      numberVal = false
    }
  
    // Validate length
    if(password.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
      lengthVal = true
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
      lengthVal = false
    }

    if(numberVal && upperVal && lengthVal){
        submit.disabled = false
    } else {
        submit.disabled = true
    }

    if (password.value === confirm_password.value) {
        submit.disabled = false
    } else {
        submit.disabled = true
    }

}

</script>

</html>
