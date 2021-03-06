<!DOCTYPE HTML>
<html>

<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link rel='stylesheet' type='text/css' media='screen' href='stylex.css'>
<script src='validate.js'> </script>
</head>

<body>
<?php
$name_err=$gender_err=$email_err=$phone_err="";
$name=$email=$phone=$gender=$username=$password="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fullname"])) {
      $name_err = "Name is required";
    } else {
      $name = test_input($_POST["fullname"]);
      
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $name_err = "Only letters and white space allowed";
      }
    }
    
   if (empty($_POST["email"])) {
     $email_err = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
     
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format";
      }
    }

    if (empty($_POST["gender"])) {
        $gender_err = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }

    if (empty($_POST["phone"])){
        $phone_err="Phone is required";
    } else {
        $phone=test_input($_POST["phone"]);

        if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{3}$/",$phone)) {
            $phone_err="Invalid phone number";
        }
     }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>

<h1> Sign Up</h1>
<p> Please fill this form to create an account.</p>
<br>
<p><span class="error">* Required Field</span></p>
<hr>

<form name="myForm" style="border:1px solid #ccc" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
enctype="multipart/form-data" onsubmit="validate()">

<div class="container">  

  Name: <input type="text" name="fullname" placeholder="Enter your name" value="<?php echo $name;?>" required>
  <span class="error">* <?php echo $name_err;?></span>
  <br><br>
  E-mail: <input type="text" id="mail" name="email" placeholder="Enter your email-id" value="<?php echo $email;?>" required>
  <span class="error">* <?php echo $email_err;?></span>
  <br><br>
  Phone: <input type="number" id="phn" name="phone" placeholder="Enter your phone-number" value="<?php echo $phone;?>" required>
  <span class="error">*<?php echo $phone_err;?></span>
  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $gender_err;?></span>
  <br><br>
  Username:<input type="text" id="txt_username" name="username" placeholder="Choose a username" value="<?php echo $username;?>" >
  <div id="uname_response" ></div>
  <br><br>
  Password:<input type="password" id="psw" 
        title="Must contain at least one number and one uppercase and lowercase letter,
         and at least 8 or more characters" placeholder="Enter password" name="userpassword" value="<?php echo $password;?>" required>
         <div id="message">
    <h3>Password must contain the following:</h3>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
         </div>
  <br><br>
  Confirm Password: <input type="password" id="psw-repeat" placeholder="Enter password again" name="password-repeat"  required>
  <br><br>


  <form action="upload.php" method="post" enctype="multipart/form-data">
  Photo: <input type="file" name="fileToUpload" id="fileToUpload" >
  </form>



  <div class="clearfix">
  <input type="submit" name="submit" value="Sign up" class="button">
  </div>

  </form>
  
    <?php
  include "config.php";

    if(isset($_POST['submit']))
    {
  if(empty($_POST["email"])||empty($_POST["gender"])||empty($_POST["phone"])||empty($_POST["username"])||empty($_POST["fullname"])||empty($_POST["userpassword"])||empty($_POST["password-repeat"]))
  echo "<script>alert('Some input missing!!')</script>";
 else
 {


  $name=mysqli_real_escape_string($con, $_REQUEST["fullname"]);
  $email=mysqli_real_escape_string($con, $_REQUEST["email"]);
  $gender=mysqli_real_escape_string($con, $_REQUEST["gender"]);
  $phone=mysqli_real_escape_string($con, $_REQUEST["phone"]);
  $username=mysqli_real_escape_string($con, $_REQUEST["username"]);
  $password=mysqli_real_escape_string($con, md5($_REQUEST["userpassword"]));

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<script>alert('Email entered Invalid')</script>";
  }

  else{

 $method="signup";
  $sql = "INSERT INTO yav_info ( fullname,email,phone,gender,username,userpassword) VALUES ('$name' ,'$email','$phone' ,'$gender','$username' , '$password')";
if(mysqli_query($con, $sql))
 header("profile.php");

  }

 }
 }


mysqli_close($con);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

   $("#txt_username").keyup(function(){

      var username = $(this).val().trim();

      if(username != ''){

         $.ajax({
            url: 'ajaxfile.php',
            type: 'post',
            data: {username: username},
            success: function(response){

                $('#uname_response').html(response);

             }
         });
      }else{
         $("#uname_response").html("");
      }

    });

 });

</script>



<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $phone;
echo "<br>";
echo $gender;
?>

</div>

    </body>
    </html>
