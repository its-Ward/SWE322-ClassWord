<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>06_Lab</title>
</head>
<body>
    <?php
    //I created a connection between php and Mysql
    $conn = mysqli_connect("127.0.0.1:3307", "root","","lab_db"  );
    //Here showes me if there is an error occured while its executing the code.
    if(!$conn){
        echo  "Error Number  " .mysqli_connect_errno();
        echo "<br>";
        echo "Connected Successfuly  " .mysqli_connect_error();
        exit;
    }
    // Created a variable named (query) to select a row from the database. 
        $query = "SELECT * FROM 06_lab";
    // Created a variable named (result) to bring the content from the database.
        $result = mysqli_query($conn , $query);
    if($result){
        echo "<table>" 
       . "<tr>"
       . "<th> F_name </th>"
       . "<th> L_name </th>"
       . "<th> S_id </th>"
       . "<th> Major </th>"
       . "</tr>";
    // it will fetch the columns in the database.
       while($result_row = mysqli_fetch_row($result)){
        echo "<tr>"
        . "<td>" .$result_row [0]. "</td>"
        . "<td>" .$result_row [1]. "</td>"
        . "<td>" .$result_row [2]. "</td>"
        . "<td>" .$result_row [3]. "</td>"
        . "<tr>";
       }
       //will print the table that has been fetched.
       echo "</table>";
       //if it didn't fetch the columns in the database then it will close.
    }else{
        mysqli_close($conn);
    }

?>

    
</body>
</html>