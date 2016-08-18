<!-- @Author: Mudrak Patel
     @Student ID: 300878960
     @fileName: Add_P.php
     @ Summer 2016
     @COMP 301 (UNIX/LINUX OPERATING SYSTEMS)
-->
<!DOCTYPE html>
<html>
<body>
<h1> Car Information System</h1> 
<form action="Add_P.php" method="post">
Car ID: <input type="text" name="CAR_ID_Input"><br>
Car Name: <input type="text" name="CARNAME_Input"><br>
Manufacturer: <input type="text" name="MANUFACTURER_Input"><br>
<input type="submit" value="submit" name="submit">
</form>
<?php
if(isset($_POST["submit"])) {
	$servername ="localhost";
	$username=$_SERVER['DB_USER'];
	$password=$_SERVER['DB_PASS'];
	$database="CAR_DATABASE";
	$connection=new mysqli($servername,$username,$password,$database);
	if(!$connection){
		die("Sorry! Connection failed: " .mysqli_connect_error());
	}
	$AddQuery="INSERT INTO CARS VALUES ("
		.$_POST["CAR_ID_Input"].",'"
		.$_POST["CARNAME_Input"]."','"
		.$_POST["MANUFACTURER_Input"]."');";
	//Adding the data entered by user in the table
		mysqli_query($connection,$AddQuery);
}
mysql_close($connection);
?>
</body>
</html>
