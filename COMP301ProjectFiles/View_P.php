<!DOCTYPE html>
<html>
<head>
<title>View_P</title>
</head>
<body>
<h1>Cars information view page</h1>
<?php
//Providing servername, username and password
 $servername="localhost";
 $username=$_SERVER['DB_USER'];
 $password=$_SERVER['DB_PASS'];
 $database="CAR_DATABASE";
//Establishing or creating a connection
 $connection=new mysqli($servername, $username, $password, $database);
//Checking the connection
 if(!$connection){
    die("Sorry! Connection failed: " .mysqli_connect_error());
 }
 //View functionality code
 $ViewQuery="SELECT * FROM CARS";
 $ViewQueryResult = mysqli_query($connection, $ViewQuery);
 //Code to output data of each row
 if(mysqli_num_rows($ViewQueryResult) > 0){
      echo "
         <table>
         <tr>
         <th>Car ID</th>
         <th>Car Name</th>
         <th>Manufacturer</th>
         </tr>";
    while($TableRow=mysqli_fetch_assoc($ViewQueryResult)){
        echo "
        <tr>
        <td>".$TableRow["CAR_ID"].
        "</td><td>".$TableRow["CARNAME"].
        "</td><td>".$TableRow["MANUFACTURER"]."</td></tr>";        
    }
    echo "</table>";
 }
//Close the connection
 mysqli_close($connection);
?>
<!--css section-->
<link rel="stylesheet" href="Project.css">
</body>
</html>
