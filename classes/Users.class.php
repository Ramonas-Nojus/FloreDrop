<?php 

class Users extends Db {


    public function register($username, $email, $password, $region) {
        if($this->checkUsername($username) && $this->checkEmail($email)) {

            $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));

            $sql = "INSERT INTO users(username, email, password, image, country) VALUES(:username, :email, :password, 'user-placeholdedr.png', :region)";
            $stmt = $this->connection()->prepare($sql);
            $stmt->bindValue("username", $username);
            $stmt->bindValue("email", $email);
            $stmt->bindValue("password", $password);
            $stmt->bindValue("region", $region);
            $stmt->execute();
        }
    }

    public function login($email, $password){

        $sql = "SELECT password FROM users WHERE email = :email";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue("email", $email);
        if(!$stmt->execute()) {
            $stmt = null;
            header('Location: /login.php?error=failed');
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header('Location: /login.php?error=userNotFound');
            exit();
        }

        $hashed_password = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $check_password = password_verify($password, $hashed_password[0]['password']);

        if($check_password == false) {
            $stmt = null;
            header('Location: /login.php?error=wrongPwd');
            exit();
        } elseif ($check_password == true){
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->connection()->prepare($sql);
            $stmt->bindValue("email", $email);

            if(!$stmt->execute()) {
                $stmt = null;
                header('Location: /login.php?error=failed');
                exit();
            }
    
            if($stmt->rowCount() == 0){
                $stmt = null;
                header('Location: /login.php?error=userNotFound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
            session_start();

            $_SESSION['id'] = $user[0]['id'];
            $_SESSION['username'] = $user[0]['username'];
            $_SESSION['email'] = $user[0]['email'];
            $_SESSION['image'] = $user[0]['image'];
            $_SESSION['country'] = $user[0]['country'];


                header('Location: /');

        }
    }

    public function checkUsername($username){

        $sql = "SELECT username FROM users WHERE username = :username";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue(':username', $username);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return false;
        } return true;

    }

    public function checkEmail($email){
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $this->connection()->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return false;
        } return true;
    }

    public function LogOut(){
        unset($_SESSION['id']);
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['image']);
        unset($_SESSION['country']);

        header("Location: /");

    }

}