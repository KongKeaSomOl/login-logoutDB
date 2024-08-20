<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link rel="stylesheet" href="welcome.css">
</head>
<body>
  <div class="container">
    <?php
      // Start the session (if not already started)
      session_start();

      if (isset($_SESSION["username"])) {
        echo "<h1>Welcome, " . $_SESSION["username"] . "!</h1>";
        echo "<form action='logout.php' method='POST'>";
        echo "  <button type='submit'>Logout</button>";
        echo "</form>";
      } else {
        // Redirect to login page if not logged in
        header("Location: login.php");
        exit(); // Ensure script execution stops after redirect
      }
    ?>
  </div>
</body>
</html>
