<!-- @Author: Mudrak Patel
     @Student ID: 300878960
     @fileName: Search_P.php
     @ Summer 2016
     @COMP 301 (UNIX/LINUX OPERATING SYSTEMS)
-->
<!DOCTYPE html>
<html>
<head>
<title>Search_P</title>
</head>
<body>
<h1>Car information search page</h1>
<form action="Search_P.php" method="post">
Car ID: <input type="text" name="CAR_ID_Input"><br>
Car Name: <input type="text" name="CARNAME_Input"><br>
Manufacturer: <input type="text" name="MANUFACTURER_Input"><br>
<input type="submit" value="submit" name="submit">
</form>
<?php
echo $_POST["submit"];
//Providing servername, username and password
 if(isset($_POST["submit"]))
{
        $servername ="localhost";
	$username=$_SERVER['DB_USER'];
	$password=$_SERVER['DB_PASS'];
	$database="CAR_DATABASE";
	//Establishing connection
        $connection=new mysqli($servername,$username,$password,$database);
	if(!$connection){
		die("Sorry! Connection failed: " .mysqli_connect_error());
	}
        //Declaring a variable to store the search query 
	$SearchQuery="SELECT * FROM CARS where CAR_ID="
	.$_POST["CAR_ID_Input"]." OR CARNAME='"
	.$_POST["CARNAME_Input"]."' OR MANUFACTURER='"
	.$_POST["MANUFACTURER_Input"]."'";
	//Dclaring a variable to store result of the SearchQuery
	$SearchQueryResult=mysqli_query($connection, $SearchQuery);	
	if(mysqli_num_rows($SearchQueryResult) > 0) {
	echo "
         <table>
         <tr>
         <th>&nbsp;Car ID&nbsp;</th>
         <th>&nbsp;Car Name&nbsp;</th>
         <th>&nbsp;Manufacturer&nbsp;</th>
         </tr>";
		while($TableRow=mysqli_fetch_assoc($SearchQueryResult)){
		    echo "
                <tr>
                <td>&nbsp;".$TableRow["CAR_ID"].
		"&nbsp;</td><td>&nbsp;".$TableRow["CARNAME"].
		"&nbsp;</td><td>&nbsp;".$TableRow["MANUFACTURER"].
		"&nbsp;</td></tr>";
		}//closing while
		echo "</table>";
	}//closing inner if
//Close the connection
mysqli_close($connection);
   }//closing if
?>
<!--css section-->
<link rel="stylesheet" href="Project.css">
</body>
</html>
