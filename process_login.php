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






















<!-- <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["username"]) && isset($_POST["password"])) {

  $username = trim($_POST["username"]); // Sanitize username (trim extra spaces)
  $password = $_POST["password"];

  try {
    // Improved database connection with error handling
    $connection = new mysqli('localhost', 'root', '', 'accounts');
    if ($connection->connect_error) {
      throw new Exception("Connection failed: " . $connection->connect_error);
    }

    // Prepared statement with parameter binding for security
    $sql = "SELECT username, password FROM users WHERE username = ?";
    $statement = $connection->prepare($sql);
    $statement->bind_param("s", $username);

    if ($statement->execute()) {
      $result = $statement->get_result();

      if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
          $_SESSION["username"] = $username;
          header("Location: welcome.php");
          exit();
        } else {
          echo "Wrong Password";
        }
      } else {
        echo "User not found";
      }

      $result->close();
    } else {
      throw new Exception("Error: " . $sql . "<br>" . $connection->error);
    }
  } catch (Exception $e) {
    echo "Login failed: " . $e->getMessage();
  } finally {
    // Close connection (if established)
    if (isset($connection)) {
      $connection->close();
    }
  }
}

?> -->
