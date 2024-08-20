<?php
  

        if($connection->connect_error) {
            die("Connection failed". $coonnection->connect_error);
        }  session_start ();
    if($_SERVER["REQUEST_METHOD"]==="POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $hashPassword = password_hash($password,PASSWORD_DEFAULT);

        $connection = new mysqli('localhost', 'root', '', 'accounts');
        $sql= "INSERT INTO users (username, password)VALUES ('$username','$hashPassword')";
        $statement = $connection->prepare($sql);
        if($statement->execute()){
            $_SESSION["username"]=$username;
            header("Location: welcome.php");
            exit();
        } else {
            echo "Error: " .sql . "<br>" . $coonnection->error;
            exit();
        }
    }

?>