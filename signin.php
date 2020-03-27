<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<link rel='stylesheet' type='text/css' media='screen' href='vibechat.css'>
</head>

<body>
<div class="main">
<form action="login.php" method="post" id="login">
<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
<h4> Welcome to vibechat!</h4>
<div class="field-group">
<div><label for="login">Username</label></div>
<div>
<input name="username" type="text" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>" class="input-field">
</div>
<div class="field-group">
		<div><label for="password">Password</label></div>
		<div><input name="userpassword" type="password" value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>" class="input-field">
	</div>
	<div class="field-group">
		<div><input type="checkbox" name="remember" id="remember" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />
		<label for="remember-me">Remember me</label>
	</div>
	<div class="field-group">
		<div><input type="submit" name="login" value="Login" class="form-submit-button"></span></div>
	</div>
</form>
</div>

</body>

</HTML>
