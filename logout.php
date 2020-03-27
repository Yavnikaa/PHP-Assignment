<?php
session_start();

unset($_SESSION['login']);
unset($_SESSION['userid']);


$hour = time() — (3600 *24 * 30);

setcookie("user_login", “”, $hour);
setcookie("userpassword", “”, $hour);

session_destroy();

header("Location:vibechat.html");
exit;
?>