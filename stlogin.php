<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["sloggedin"]) && $_SESSION["sloggedin"] === true){
  header("location: stwelcome.php");
  exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT sname, password FROM student WHERE sname = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt))
            {
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["sloggedin"] = true;
                            $_SESSION["sname"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: stwelcome.php");
                        } else
                        {
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else
                {
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else
            {
                echo "Oops! Something went wrong. Please try again later.";
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
<title>Student | Log in</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 80px;
  text-align: center;
  background: #1abc9c;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: #333;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 65%; /* IE10 */
  flex: 65%;
  background-color: #f1f1f1;
  padding: 30px;
}

/* Main column */
.main {   
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: white;
  padding: 20px;

   background-image:url('tech.jpeg');
  background-size: cover;
  background-repeat:no-repeat;
  font-family: 'Varela Round', sans-serif;
}

/* Fake image, just for this example */
.fakeimg {
   background-image:url('clg.jpg');
  background-attachment: ;
  background-size:100% 100%;
  background-color: #aaa;
  width: 100%;
  padding: 20px;

}

/* Footer */
.footer {
  padding: 30px;
  background-image:url('hm.jpeg');
  text-align: center;
  background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
body {
  
}
</style>
</head>
<body>

<div class="header">
  <h1>GOVERNMENT COLLEGE KASARAGOD</h1>
  <H2>ONLINE GRIEVANCE REDRESSAL SYSTEM</H2>
</div>

<div class="navbar">
  <a href=".html">Home</a>
  <a href=".html"></a>
  <a href="about_us.php" class="right">About us</a>
</div>
  <div class="row">
  <div class="side">
  <h2>OGRS</h2>
    <div class="fakeimg" style="height:300px;"></div>
    <p><i><b>Govt College,Kasaragod the Grievance Redressal Cell attempts to address genuine problems and complaints of students whatever be the nature o f the problem.
Students are encouraged to use the suggestion boxes placed on different sections of the campus to express constructive suggestions and grievances.
They may also approach the members of the cell or any of their other teachers as is comfortable to them.

The Grievance cell is also empowered to look into matters of harassment.
Anyone with a genuine grievance may approach the department members in person, or in consultation with the officer in-charge Student's Grievance Cell.
In case the person is unwilling to appear in self, grievances may be dropped in writing at the letterbox/ suggestion box of the Grievance Cell at Administrative Block.
officer in-charge of Student's Grievance Cell.

The objective of the Grievance Cell is to develop a responsive and accountable attitude among all the stakeholders in order to maintain a harmonious educational atmosphere in the institute.
A Grievance Cell should be constituted for the redressal of the problems reported by the Students of the College with the following objectives:

Upholding the dignity of the College by ensuring strife free atmosphere in the College through promoting cordial Student-Student relationship and Student-teacher relationship etc.
Encouraging the Students to express their grievances / problems freely and frankly, without any fear of being victimized.
Suggestion / complaint Box is installed in front of the Administrative Block in which the Students, who want to remain anonymous, put in writing their grievances and their suggestions for improving the Academics / Administration in the College.
Advising Students of the College to respect the right and dignity of one another and show utmost restraint and patience whenever any occasion of rift arises.
Advising All the Students to refrain from inciting Students against other Students, teachers and College administration Advising all staffs to be affectionate to the Students and not behave in a vindictive manner towards any of them for any reason.
Ragging in any form is strictly prohibited in and outside the institution. Any violation of ragging and disciplinary rules should be urgently brought to the notice of the Principal.</b></i></p>
    <br> 
  </div>
 <div class="main">
<form action="stwelcome.php">
  <div class="body">
  <img src="tech.jpeg" height=100 width=100>
</form>
</div>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
 <center>
    	 <h2 style="color:white">STUDENT LOGIN</h2>
    <div class="wrapper" style="background-color:White; border: 2px solid White; border-radius: 5px;"><big>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" autocomplete="off">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Forgot Password? <a href="stforgot.php">Click Here</a></p>
            <p>Don't have an account? <a href="stregister.php">Sign up now</a>.</p>
        </big>
        </form>
    </div>  
    </center>  
</body>
</html>