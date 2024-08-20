<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In Form</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="" method="POST">  
    <h1>Sign In</h1>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter Username" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter Password" required>
    </div>
    <div class="button-container">
    <button class="sign-up"><a href="signup.php">Sign Up </button>
    <button class="sign-in" type="submit">Sign In</button>
    </div>
  </form>
  <?php
    session_start ();
    if($_SERVER["REQUEST_METHOD"]==="POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];


        $connection = new mysqli("localhost", "root", "", "accounts");
        
        if($connection->connect_error) {
          die("Connection failed". $coonnection->connect_error);
      }
        $sql = "SELECT username, password FROM  users WHERE username = ?";
        $statement = $connection->prepare($sql);
        $statement->bind_param("s",$username);
        $statement->execute();
        $result = $statement->get_result();

        if($result->num_rows === 1) {
          $row = $result->fetch_assoc();
          if(password_verify($password, $row["password"])){
            $_SESSION["username"] = $username;
            header("Location: welcome.php");
            exit();
          } else {
            echo "<p style='color:red'>Wrong Password</p>";
          }
        }else {
          echo "<p style='color:red'>User not found </p>";
        }
        $statement->close();
        $connection->close();
      }
  ?>











