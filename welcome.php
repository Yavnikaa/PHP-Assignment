<!DOCTYPE html>
<html>    
<head>        
 <meta charset="UTF-8">
 <title>VibeChat Registered Users</title>
</head>
<body>

<a href="logout.php"> Logout </a>

<h2>Registered Users on the platform</h2>

<?php
include 'config.php';

$result = $mysqli->query("SELECT username FROM yav_users");

echo $result;

?>

</body>
</html>