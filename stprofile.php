<?php
session_start();
error_reporting(0);
include('config.php');
if(!isset($_SESSION["sloggedin"]) || $_SESSION["sloggedin"] !== true){
header('location: stwelcome.php');
   }
else{
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );
    if(isset($_POST['submit']))
    {
$sname=$_POST['sname'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$course=$_POST['course'];
$query=mysqli_query($link, "update student set sname='$sname',phone='$phone',address='$address',dob='$dob',course='$course' where email='".$_SESSION['sloggedin']."'");

}
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Dashboard">
<meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

<title>Student Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<!-- Bootstrap core CSS -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/style-responsive.css" rel="stylesheet">

<style>
body{
background-image:url('home.jpeg');
background-attachment:fixed;
background-size:100% 100%;
color: black;
}
</style>


  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
    <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
    <a href="stprofile.php" class="w3-bar-item w3-button" style="padding=7px 16px;">MY PROFILE</a>
    <a href="sanym.php" class="w3-bar-item w3-button">REGISTER COMPLAINTS</a>
    <a href="cdts.php" class="w3-bar-item w3-button">VIEW COMPLAINT</a>
    <a href="sts.php" class="w3-bar-item w3-button">CHECK STATUS</a>
    <a href="stfeedback.php" class="w3-bar-item w3-button">FEEDBACK</a>
    <a href="abtus.php" class="w3-bar-item w3-button">ABOUT US</a>
  </div>


  <div class="w3-blue">
    <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
    <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
    <h2 style="color:White; text-align:center">STUDENT</h2>
  </div>

  <center>
<h2 style="color: white;"><?php echo htmlspecialchars($_SESSION["sname"]); ?>'s Profile</h2>

<?php if($successmsg)
                     {?>
                     <div class="alert alert-success alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                   <?php }?>

 <?php if($errormsg)
                     {?>
                     <div class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                     <?php }?>

   <?php
require_once "config.php";
$sname = $_SESSION['sname'];
$sbc="Select email from student where sname = '$sname'";
$sbb="Select phone from student where sname = '$sname'";
$sbg="Select admno from student where sname = '$sname'";
$sbh="Select course from student where sname = '$sname'";
$sbd="Select address from student where sname = '$sname'";
$sbe="Select state from student where sname = '$sname'";
$sbf="Select country from student where sname = '$sname'";
$result1 = mysqli_query($link,$sbc);
$result2 = mysqli_query($link,$sbb);
$result3 = mysqli_query($link,$sbd);
$result4 = mysqli_query($link,$sbe);
$result5 = mysqli_query($link,$sbf);
$result6 = mysqli_query($link,$sbg);
$result7 = mysqli_query($link,$sbh);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
$row3 = mysqli_fetch_array($result3);
$row4 = mysqli_fetch_array($result4);
$row5 = mysqli_fetch_array($result5);
$row6 = mysqli_fetch_array($result6);
$row7 = mysqli_fetch_array($result7);
 ?>



<form class="form-horizontal style-form" method="post" name="profile" >
<section id="qqq" style="margin:50px 50px 50px 200px;">

<div class="form-group" style="color: white;">
<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="sname" required="required" value="<?php echo htmlentities($_SESSION['sname']);?>" class="form-control" >
 </div>
<label class="col-sm-2 col-sm-2 control-label">User Email </label>
 <div class="col-sm-4">
<input type="email" name="email" required="required" value="<?php echo $row1[0]; ?>" class="form-control" readonly>
</div>
 </div>


 <div class="form-group" style="color: white;">
 <label class="col-sm-2 col-sm-2 control-label">Admission Number</label>
 <div class="col-sm-4">
 <input type="text" name="admno" required="required" value="<?php echo $row6[0]; ?>" class="form-control" readonly>
  </div>
 <label class="col-sm-2 col-sm-2 control-label">Course</label>
  <div class="col-sm-4">
 <input type="text" name="course" required="required" value="<?php echo $row7[0]; ?>" class="form-control">
 </div>
  </div>


<div class="form-group" style="color: white;">
<label class="col-sm-2 col-sm-2 control-label">Contact</label>
 <div class="col-sm-4">
<input type="text" name="phone" required="required" value="<?php echo $row2[0]; ?>" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Address </label>
<div class="col-sm-4">
<textarea  name="address" required="required" class="form-control"><?php echo $row3[0]; ?></textarea>
</div>
</div>

<div class="form-group" style="color: white;">
<label class="col-sm-2 col-sm-2 control-label">State</label>
<div class="col-sm-4">
<input type="text" name="state" required="required" value="<?php echo $row4[0]; ?>" class="form-control">
</div>
</div>
<label class="col-sm-2 col-sm-2 control-label" style="color: white; padding: 0px">Country </label>
<div class="col-sm-4">
<input type="text" name="country" required="required" value="<?php echo $row5[0]; ?>" class="form-control">
</div>


                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>




                          </section>
		</section>


    <script>
    function openLeftMenu() {
      document.getElementById("leftMenu").style.display = "block";
    }

    function closeLeftMenu() {
      document.getElementById("leftMenu").style.display = "none";
    }
    // //custom select box
    //
    //      $(function(){
    //          $('select.styled').customSelect();
    //      });


    </script>

    </body>
</html>
<?php } ?>
