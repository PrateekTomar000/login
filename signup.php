<?php
   $showalert = false;
   $showerror = false;

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      include 'partials/_dbconnect.php';
      $username = $_POST['username'];
      $password = $_POST["password"];
      $cpassword = $_POST["cpassword"];
     // $exist=false;
      
      $existsql= "SELECT * FROM `users` WHERE username = '$username'";
      $result = mysqli_query($conn, $existsql);
      $numexistrows = mysqli_num_rows($result);
      if($numexistrows > 0) {
        //$exist = true;
        $showerror = "Username already exist";
      }
      else {
      //  $exist = false;
     if ($password == $cpassword) {
          $sql = "INSERT INTO `users` (`Username`, `Password`, `Date`) VALUES ('$username', 
          '$password', current_timestamp())";
          $result = mysqli_query($conn, $sql);
          if($result) {
             $showalert = true;
          }
      } 
      else {
        $showerror = "Passwords do not match";
      }
    }
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php 
      if($showalert) {
      echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> your account is now created and you can log in
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
        <h1 class="text-center">Signup to our website</h1>
        <form action="/login/signup.php" method="post">
          <div class="form-group" >
                <label for="username" >Username</label>
                <input type="text" maxlength="11" class="form-control"  id="username" name="username" aria-describedby="emailHelp">
                
            </div>
            <div class="form-group">
                <label for="Password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control" id="Password" name="password">
            </div>
            <div class="form-group">
                <label for="cPassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="23" class="form-control" id="cPassword" name="cpassword">
            <div id="emailHelp" class="form-text">Make sure to put the same password</div>
        </div>
            <button type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>
</body>
</html>