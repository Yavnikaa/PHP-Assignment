<!DOCTYPE HTML>
<HTML>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<?php
include "config.php";

if(isset($_POST['username'])){
   $username = $_POST['username'];

   $query = "select count(*) as cntUser from yav_users where username='".$username."'";

   $result = mysqli_query($con,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available.</span>";
      }
   
   }

   echo $response;
   die;
}
?>

</html> 