<?php
session_start(); 
include('config.php'); 
if(isset($_POST["login"]))
{

$username=$_POST['username'];
$password=md5($_POST['userpassword']); 
$sql = "Select * from yav_users where username ='$username' and userpassword ='$password'";
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	if($row) {
			$_SESSION["userid"]= $row["user_id"];
	
			if(!empty($_POST["remember"])) {

setcookie ("user_login",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));

setcookie ("userpassword",$_POST["userpassword"],time()+ (10 * 365 * 24 * 60 * 60));
} else {
if(isset($_COOKIE["user_login"])) {
setcookie ("user_login","");
if(isset($_COOKIE["userpassword"])) {
setcookie ("userpassword","");
				}
			}
	header('location:welcome.php');
	} else {
		$message = "Invalid Login";
	}
}
?>
