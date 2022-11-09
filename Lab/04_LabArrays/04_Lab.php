<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>
<body>
<?php
//part 1
/*Indexed array*/
$classmates = array("Rahaf", "Fatima", "Hisham",
 "Mojab", "Alaa", "Ali", "Salem");

 //we put count to count the classmates
 echo "<p> the total number of classmates are:" .count($classmates)." </p>";

 // put print_r to print the array
print_r($classmates);

echo "<br>";

for($i = 0; $i< count($classmates);  $i++) {
    //using paragraph to print it in separate lines
echo " <p> Classmate: $classmates[$i]</p>" ;
}

//part 2
/*Associative array*/
$course = array("SWE 302" =>"Software Architecture & Design",
 "SWE 312" =>"Software Construction & User Interface", 
"SWE 321" =>"Advanced User Interface", 
"SWE 300" =>"Software Pross & Modleing", "CIS 304" =>"Computer Architecture");


?>

</body>
<!--html and css-->


<html>
<head>
<title>Associative Array using html & css</title>
</head>
<body>


<!--Associative Array-->
<div>
    <hr>
<h2> Course code and Course Names of the courses finished. </h2><br>
<?php    

//Using foreach loop to print the course code and course name
foreach($course as $i => $i_value) {
  				
echo "Course Code:" . $i . ", Course Name: " . $i_value;

echo "<br>";
}
  			
?>
</div>
</hr>
<hr>
<h2>  Multidimensional array </h2>
<?php  
  
$device = array (
    array("Laptop","Asus","MSI"),
    array("CPU","AMD","Intel"),
    array("GPU","AMD","Nvidia")
  );
/* Printing values*/

echo '"I am looking for for '.$device[0][1].' '.$device[0][0].
' with '.$device[1][1].' '.$device[1][0].' and '.$device[2][2].' '.$device[2][0].'".';
  			
?>
</div>
</hr>
</html>


