<?php
include 'config.php';
session_start();
if (isset($_GET['user']))
{
$user = $_GET['user'];
$get_user = $mysqli->query("SELECT * FROM yav_info WHERE username = '$user'");
if ($get_user->num_rows == 1)
{
    $profile_data = $get_user->fetch_assoc();
           
}
       
} 
?>
<!DOCTYPE html>
<html>    
<head>        
 <meta charset="UTF-8">
 <title><?php echo $profile_data['username'] ?>'s Profile</title>
</head>
<body>
 <?php echo $profile_data['username'] ?>'s Profile        
<h3>Personal Information | <?php $visitor = $_SESSION['username'];

           if ($user == $visitor)
{ ?>            <a href="edit-profile.php?user=<?php echo $profile_data['username'] ?>">Edit Profile</a>            <?php
}
        ?>  </h3>  
    
        <a href="welcome.php"> Welcome to Vibechat!</a>

        <table>
                    <tr>                
                     <td>Name:</td><td><?php echo $profile_data['name'] ?></td>   
                    </tr>
                    <tr>                
                     <td>Email:</td><td><?php echo $profile_data['email'] ?></td> 
                    </tr> 
                    <tr>
                        <td>Gender:</td><td><?php echo $profile_data['gender'] ?></td>
                    </tr>
                    <tr>
                        <td>Phone:</td><td><?php echo $profile_data['phone'] ?></td> 
                    </tr>        
        </table> 
    </body>
</html> 
