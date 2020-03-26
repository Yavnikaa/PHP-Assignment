
	
<?php
  include 'config.php';
    if (isset($_POST['update_profile'])) {
 $user = $_GET['user'];
 $name = $_POST['name'];
 $email = $_POST['email'];
 $gender = $_POST['gender'];
 $phone = $_POST['phone'];
 $update_profile = $mysqli->query("UPDATE yav_info SET name = '$name',
                      gender = '$gender', email = '$email', phone = '$phone'
                      WHERE username ='$user'");
     if ($update_profile) {
    header("Location: profile.php?user=$user");
     } else {
   echo $mysqli->error;
     }
 }
?>