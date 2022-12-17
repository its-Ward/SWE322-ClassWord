<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <title>Register</title>
        <link href="../src/css/style.css" rel="stylesheet" />

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&display=swap" rel="stylesheet">
    </head>
<body>
<nav>

<ul>
  <li><img src="../src/images/logo.png" width="45" height="45"></li>
  <?php


  if(isset($_SESSION['id'])){
    ?>
    <li><a href="index.php">Home</a></li>
    <li><a href="MyAppointment.php">My appointment</a></li>
    <li style="float:right"><a class="active" href="logout.php">Logout</a></li>
    <?php
  }else{ ?>
    <li><a href="index.php">Home</a></li>
    <li style="float:right ; padding-left:2px"><a class="active" href="login.php">Login</a></li>
    <li style="float:right"><a class="active" href="register.php">Register</a></li>

    <?php
  }
  
  ?>
</ul>
</nav>

    <div class="main">
        <div class="logo">
            <img src="../src/images/logo.png">
            <h2>Hospital appointment</h2>
        </div>
        <div class="book">
            <form action="" method="post">
                <input type="text" placeholder="Enter user name" name="username"/>
                <input type="email" placeholder="Enter email" name="email"/>
                <input type="password" placeholder="Enter password" name="password"/>
                <input type="submit" value="Register" name="register"/>
            </form>
            <a style="color:#454545" href="login.php">or login</a>
        </div>
    </div>
    <div class="footer">
        <p>&copy; Copyright 2022</p>
    </div>
    </body>
</html>

<?php 


if(isset($_POST['register'])){
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    include "../Config/db_login.php" ;

    if($conn->query("INSERT INTO `user_account` (`id`, `username`, `email`, `password`) 
                                        VALUES (NULL, '$username', '$email', '$password')")){
        {
            Header("Location:login.php");
        }
    }

}


?>