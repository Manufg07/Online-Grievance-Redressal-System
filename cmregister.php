<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $email = $des = $phone = $password = $confirm_password =  "";
$username_err = $password_err = $email_err = $des_err = $phone_err = $confirm_password_err =  "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    // Validate username
    if(empty(trim($_POST["username"])))
    {
        $username_err = "Please enter a username.";
    } else
    {
        // Prepare a select statement
        $sql = "SELECT cname FROM cellmember WHERE cname = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }

    if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter your email.";     
    } else
    {
        $email = trim($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
         $email_err = "Invalid email format";
        }
    }

     if(empty(trim($_POST["des"])))
    {
        $des_err = "Please enter your Designation.";     
    } else
    {
        $des = trim($_POST["des"]);
    }
    
     if(empty(trim($_POST["phone"])))
    {
        $phone_err = "Please enter your Phone number.";     
    } else
    {
        $phone = trim($_POST["phone"]);
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
    
    // Check input errors before inserting in database
   if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($des_err))
    {
        
        // Prepare an insert statement
        $sql = "INSERT INTO cellmember (cname, email, des, phone, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_username, $param_email,  $param_des, $param_phone, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_des = $des;
            $param_phone = $phone;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Redirect to login page
                echo "<script>
                alert('Signup Successfull');
                window.location.href='cmlogin.php';
                </script>";

            } else
            {
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cell member | Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body style="background-image: url('rg.jpeg'); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
    <center>
         <h2 style="color:White">Sign Up</h2>
    <div class="wrapper" style="background-color:White; border: 2px solid White; border-radius: 5px;">
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username :</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email :</label>
                <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($des_err)) ? 'has-error' : ''; ?>">
                <label>Designation :</label>
                <input type="text" name="des" class="form-control" value="<?php echo $des; ?>" >
                <span class="help-block"><?php echo $des_err; ?></span>
            </div><br>   
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label>Phone number :</label>
                <input type="text" maxlength="10" name="phone" class="form-control" value="<?php echo $phone; ?>" >
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div><br>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password :</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password :</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" >
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="cmlogin.php">Login here</a>.</p>
        </form>
    </div>   
    </center> 
    <script type="text/javascript">
        
    </script>
</body>
</html>