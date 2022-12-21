<?php session_start();

if(!$_SESSION['id']){
    Header("Location:login.php");
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <title>MyAppointment</title>
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
        <span><?php echo (isset($_GET['message'])) ? $_GET['message'] : '' ?></span>
        <table>
                <tr>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th style="width:35%%">Booking</th>
                </tr>
                    <?php
                        include "../Config/db_login.php" ;
                        foreach($conn->query("SELECT * FROM bookings b INNER JOIN appointments a on b.Appointment_id = a.Appointment_id WHERE b.user_id = ".$_SESSION['id']) as $appointment ){
                            ?>
                                <tr>
                                    <td>Dr.<?php echo $appointment['doctor_name'] ?></td>
                                    <td><?php echo $appointment['date'] ?></td>
                                    <td><?php echo $appointment['time'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <button onclick="return confirm('Are you sure?')" style="background-color:#00d5dd;color:#454545" name = "Cancel" type="submit" value="<?php echo $appointment['Appointment_id'] ?>" >Cancel</button>
                                    </form>
                                </td>
                            <?php
                        }
                    ?>
                </tr>
            </table>

        </div>
    </div>
    <div class="footer">
        <p>&copy; Copyright 2022</p>
    </div>
    <script src="../src/JS/main.js"></script>
    </body>
</html>


<?php

    if(isset($_POST['Cancel'])){
        $Appointment_id = $_POST['Cancel'];
        if($conn->query("DELETE FROM bookings WHERE `Appointment_id` ='$Appointment_id'")){
            if($conn->query("UPDATE `appointments` SET `booking_status` = '0' WHERE `appointments`.`Appointment_id` =".$Appointment_id)){
                Header("Location:MyAppointment.php?message=Successful delete");
            }
        }else{
            Header("Location:MyAppointment.php?message=Error");
        }
    }

?>