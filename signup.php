<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="signup.css">
</head>
<body>
  <form action="process_signUp.php" method="POST">  
    <h1>Sign Up</h1>
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" placeholder="Enter Username" required>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" placeholder="Enter Password" required>
    </div>
    <button type="submit">Sign Up</button>
  </form>
</body>
</html>
