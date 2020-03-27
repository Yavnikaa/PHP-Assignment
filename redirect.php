
<?php
if(isset($_POST['submit'])){

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
if($name !=''&& $email !=''&& $gender !=''&& $phone !='')
{

//  To redirect form on the profile page
header("Location:profile.php");
}
else{
?> <span><?php echo "Please fill all fields.!";?></span> <?php
}
}
?>


