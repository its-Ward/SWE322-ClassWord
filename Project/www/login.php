<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <title>Login</title>
        <link href="../src/css/style.css" rel="stylesheet" />
        <link rel="icon" href="../src/images/logo.png" type="template/x-icon" />

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

    <div>
        <div class="logo">
            <img src="../src/images/logo.png">
            <h2>Hospital appointment</h2>
        </div>
        <div class="book">
        <span style="text-align:left ; color:red">
        <?php echo (isset($_GET['error'])) ? $_GET['error'] : '' ?></span>
            <form action="" method="post">
                <input type="email" placeholder="Enter Email" name="email"/>
                <input type="password" placeholder="Enter Password" name="password"/>
                <input type="submit" value="Login" name="send"/>
            </form>
            <a style="color:#454545" href="register.php">or Register</a>
        </div>
    </div>


    <div class="footer">
        <p>&copy; Copyright 2022</p>
    </div>
    </body>
</html>

<?php
include "../Config/db_login.php" ;

if (isset($_POST['email']) && $_POST['password']){

    $email = $_POST['email'] ;
    $result = $conn->query("SELECT * FROM `user_account` where email = '$email' limit 1");

    if ($result->num_rows){
        
        $result = $result->fetch_array();
        if($_POST['password'] == $result['password']){
            $_SESSION['id'] = $result['id'];
            Header("Location:index.php");
        }else{
            Header("Location:login.php?error=password incorrect");
        }

    }else{
        Header("Location:login.php?error=this data not valid");
    }
}
?>