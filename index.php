<?php
session_start();

if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You must log in first";
  header('location: login.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <title>Umair's Pizzario</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


  <?php if (isset($_SESSION['success'])) : ?>
    <div class="error success">
      <h3>
        <?php
        echo $_SESSION['success'];
        unset($_SESSION['success']);
        ?>
      </h3>
    </div>
  <?php endif ?>






  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Umair's Pizzario</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Deals <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Deal 1</a></li>
            <li><a href="#">Deal 2</a></li>
            <li><a href="#">Deal 3</a></li>
          </ul>
        </li>
        <li><a href="#">Products</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="./login.php"><span zclass="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
      <?php if (isset($_SESSION['username'])) : ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
        <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
      <?php endif ?>
    </div>

    </div>
  </nav>

  <div class="container">
    <p> Welcome to Umair's Pizzario</p>
  </div>

</body>

</html>