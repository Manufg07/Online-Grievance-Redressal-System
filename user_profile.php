<?php
require_once "config.php";
session_start();

$name = $_SESSION['username'];
$query="Select * from student where sname='$name'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);
$admno = $row["admno"];

include('includes/config.php');
if(strlen($_SESSION['stlg']))
  { 
header('location:stwelcome.php');
}
else


date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
$sname=$_POST['sname'];
$admnno=$_POST['admno'];
$email=$_POST['email'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$course=$_POST['course'];
$dob=$_POST['dob'];
$query=mysqli_query($bd, "update student set fullName='$sname',contactNo='$phone',address='$address',Email='$email',course='$course',Dob='$dob' where sname='".$_SESSION['stlg']."'");
if($query)
{
$successmsg="Profile Successfully !!";
}
else
{
$errormsg="Profile not updated !!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  	 <title>OGRS | user profile</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-daterangepicker/daterangepicker.css" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

 <body>

  <section id="container" >
     <?php include("includes/header.php");?>
     <?php include("includes/sidebar.php");?>
     <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Profile info</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">


                  	 
 <?php $query=mysqli_query($bd, "select * from student where sname='".$_SESSION['stlg']."'");
 while($row=mysqli_fetch_array($query)) 
 
 ?>                  

 <h4 class="mb"><i class="fa fa-user"></i>&nbsp;&nbsp;<?php echo htmlentities($row['sname']);?>'s Profile</h4>
    <h5><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($row['updationDate']);?></h5>
                      <form class="form-horizontal style-form" method="post" name="profile" >
<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Full Name</label>
<div class="col-sm-4">
<input type="text" name="fullname" required="required" value="<?php echo htmlentities($row['sname']);?>" class="form-control" readonly>
 </div>
<label class="col-sm-2 col-sm-2 control-label">User Email </label>
 <div class="col-sm-4">
<input type="email" name="useremail" required="required" value="<?php echo htmlentities($row['email']);?>" class="form-control" >
</div>
 </div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Contact</label>
 <div class="col-sm-4">
<input type="text" name="contactno" required="required" value="<?php echo htmlentities($row['phone']);?>" class="form-control">
</div>

<label class="col-sm-2 col-sm-2 control-label">Address </label>
<div class="col-sm-4">
<textarea  name="address" required="required" class="form-control"><?php echo htmlentities($row['address']);?></textarea>
</div>
</div>

<label class="col-sm-2 col-sm-2 control-label">Course </label>
<div class="col-sm-4">
<input type="text" name="course" required="required" value="<?php echo htmlentities($row['course']);?>" class="form-control">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Dob</label>
<div class="col-sm-4">
<input type="text" name="dob" maxlength="6" required="required" value="<?php echo htmlentities($row['dob']);?>" class="form-control">
</div>
<label class="col-sm-2 col-sm-2 control-label">Reg Date </label>
<div class="col-sm-4">
<input type="text" name="regdate" required="required" value="<?php echo htmlentities($row['regDate']);?>" class="form-control" readonly>
 </div>
</div>

<?php  ?>

                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
          	
          	
		</section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

	<!--custom switch-->
	<script src="assets/js/bootstrap-switch.js"></script>
	
	<!--custom tagsinput-->
	<script src="assets/js/jquery.tagsinput.js"></script>
	
	<!--custom checkbox & radio-->
	
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
	
	
	<script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php  ?>

























