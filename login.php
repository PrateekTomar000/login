<?php
   $login = false;
   $showerror = false;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      include 'partials/_dbconnect.php';
      $username = $_POST["username"];
      $password = $_POST["password"];

      $sql = "Select * from users where username = '$username' AND password = '$password'";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if($num==1) {
          $login = true;
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("location: welcome.php");

      }
      else {
        $showerror = "Invalid Credentials";
      }
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php 
      if($login) {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> you are logged in
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
    }
    if($showerror) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Error!</strong> '. $showerror.'
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
      ';
      }
 ?>
    <div class="container my-4">
        <h1 class="text-center">Login to our website</h1>
        <form action="/login/login.php" method="post">
          <div class="form-group" >
                <label for="username" >Username</label>
                <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
</body>
</html>