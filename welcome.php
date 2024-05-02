<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
  header("location: login.php");
  exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - <?php echo $_SESSION['username']?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <div class="conatiner my-4">
      <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username']?>
</h4>
      <p>Hello how are u? Welcome to our site. you are logged in as <?php echo $_SESSION['username']?>. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="/login/logout.php">using this link.</a></p>
      </div>
    </div>

</body>
</html>