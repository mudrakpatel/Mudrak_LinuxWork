<!DOCTYPE html>
<html>
<head>
<title>Index_P</title>
</head>
<body>
<div id="optionsDiv">
  <div id="CarInfoHeading_Div">Car database</div>
   <div id="option1">
	<a href="View_P.php" id="option1_link" class="optionLink">View car data</a>
   </div>
   <div id="option2">
	<a href="Search_P.php" id="option2_link" class="optionLink">Search car data</a>
   </div>
   <div id="option3">
	<a href="Add_P.php" id="option3_link" class="optionLink" >Add car data</a>
   </div>
</div>
<?php
//Providing servername, username and password
 $servername="localhost";
 $username=$_SERVER['DB_USER'];
 $password=$_SERVER['DB_PASS'];
 $database="CAR_DATABASE";
//Establishing or creating a connection
 $connection=new mysqli($servername, $username, $password, $database);
 //Creating table CARS
 $TableQuery="CRAETE TABLE CARS(
     CAR_ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
     CARNAME VARCHAR(30) NOT NULL,
     MANUFACTURER VARCHAR(30) NOT NULL
 )";
 //Executing the table craetion query
 if(mysqli_query($connection, $TableQuery)){
     //Inserting data in CARS table
  $InsertDataQuery1="INSERT INTO CARS VALUES (0001,'CAR1','MANUFACTURER1')";
  mysqli_query($connection,$InsertDataQuery1);
  $InsertDataQuery2="INSERT INTO CARS VALUES (0002,'CAR2','MANUFACTURER2')";
  mysqli_query($connection,$InsertDataQuery2);
  $InsertDataQuery3="INSERT INTO CARS VALUES (0003,'CAR3','MANUFACTURER3')";
  mysqli_query($connection,$InsertDataQuery3);
  $InsertDataQuery4="INSERT INTO CARS VALUES (0004,'CAR4','MANUFACTURER4')";
  mysqli_query($connection,$InsertDataQuery4);
 }
//Checking the connection
 if(!$connection){
    die("Sorry! Connection failed: " .mysqli_connect_error());
 }
 mysqli_close($connection);
?>
<!--css section-->
<link rel="stylesheet" href="Project.css">
</body>
</html>
