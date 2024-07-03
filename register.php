
<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "horrafoods";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
   
if(!$con)
{
	die(mysqli_error());
	echo "Database not connected, please try again.";
}

if(isset($_POST['submit']))
{
	
	$fn = $_POST['Firstname'];
	$ln = $_POST['Lastname'];
	$gender = $_POST['Gender'];
	$email = $_POST['Email'];
	$phone = $_POST['Phone'];
	$pass = $_POST['Password'];
	$cpass = $_POST['Confirmpass'];
	
	
	$register_query = "INSERT INTO `horrafoods`(`Firstname`, `Lastname`, `Gender`, `Email`, `PHONE_No`, `Password`, `Confirmpass`) VALUES ('$fn','$ln','$gender','$email','$pass','$cpass')";
    $register_result = mysqli_query($con, $register_query);

if ($pass == $cpass) 
{
    if($register_result)
 {
	  header("Location:successful.html");
 }
    else
 {
	  header("Location:error.html");
 }
}
else
{
	header("Location:passerror.html");
}		
}
?>