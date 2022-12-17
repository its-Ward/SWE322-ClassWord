<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <title>Home</title>
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
                        foreach($conn->query("SELECT * FROM `appointments`") as $appointment ){
                            ?>
                                <tr>
                                    <td>Dr.<?php echo $appointment['doctor_name'] ?></td>
                                    <td><?php echo $appointment['date'] ?></td>
                                    <td><?php echo $appointment['time'] ?></td>
                                <td>
                                    <form action="" method="post">
                                        <?php 
                                        
                                            if( $appointment['booking_status']){
                                                ?>
                                                    <button disabled style="background-color:#d5d5d5;color:#454545" type="submit">booked out</button>
                                                <?php
                                            }else{
                                                ?>
                                                    <button style="background-color:#00d5dd;color:#454545" name = "Appointment" type="submit" value="<?php echo $appointment['Appointment_id'] ?>">booked</button>
                                                <?php
                                            }
                                        
                                        ?>
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
    </body>
</html>


<?php

    if(isset($_POST['Appointment'])){
        
        if(!$_SESSION['id']){
            Header("Location:login.php");
        }
        
        $Appointment_id = $_POST['Appointment'];
        $user_id = $_SESSION['id'];

        include "../Config/db_login.php" ;
        if($conn->query("INSERT INTO `bookings` (`Appointment_id`, `user_id`) VALUES ('$Appointment_id', '$user_id')")){
            if($conn->query("UPDATE `appointments` SET `booking_status` = '1' WHERE `appointments`.`Appointment_id` =".$Appointment_id)){
                Header("Location:index.php?message=Successful add appointment ");
            }

        }else{
            Header("Location:index.php?message=Error");
        }
    }

?>