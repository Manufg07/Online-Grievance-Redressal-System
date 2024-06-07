<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
$username = $email = $password = $confirm_password = "";
$username_err = $password_err = $email_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Validate username
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Please enter a username.";
    }else
    {
        $username = trim($_POST["username"]);
    }
    if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter a email.";     
    } else
    {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
         $email_err = "Invalid email format";
        }
    }

    // Validate password
    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    } else
    {
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm password.";     
    } else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "Password did not match.";
        }
    }
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err))
    {
    $new_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE admin
    SET password='$new_password'
    WHERE aname='$username' AND email='$email'";

     if (mysqli_query($link,$sql))
     {
     echo "<script>
                alert('Password Changed Successfully');   
                window.location.href='login.php';
                </script>";

    }else
    {
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
    }
    mysqli_close($link);
    }
}



?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body style="background-image: url('ll.jpeg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
	<br><br>
    <center>
    	 <h2 style="color:White">FORGOT PASSWORD</h2>
    <div class="wrapper" style="background-color:White; border: 2px solid White; border-radius: 5px;"><big>
        <p>Please fill in your credentials to reset password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit" >
            </div>
            <p>Go Back <a href="login.php">Click Here</a></p>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </big>
        </form>
    </div>  
    </center>  
</body>
</html>