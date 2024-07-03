<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "horrafoods";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
$fname=$_POST["fn"];
$lname=$_POST["ln"];
$pass=$_POST["psw"];
session_start();
$counter=0;
if(isset($_SESSION['counter'])){
$_SESSION['counter']+-1;
}
else{
	$_SESSION['counter']=1;
}
echo"you have visited this page".$_SESSION['counter']."times";

if(empty($fname)||empty($lname)||empty($pass)) 
{
	?>
	<script> alert (" you didn't fill the form");</script> 
    <?php	
}

else
{
$sql="select * from horrafoods where Firstname='$fname' and Lastname='$lname' and Password='$pass' ";

$login_result=mysqli_query($con, $sql);
$count=mysqli_num_rows($login_result);
    if($count==1){
		$row=mysqli_fetch_assoc($login_result);
		if($row['Firstname']==$fname && $row['Lastname']==$lname && $row['Password']==$pass){
			
			header("Location:loginsucc.html");
}}
	else{
		?>
	    <script>
		alert("Worng Username or Password");
	    </script> 
		<?php
}}
?>