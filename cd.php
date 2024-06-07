<?php
require_once "config.php";
// Initialize the session
session_start();
$name = $_SESSION['username'];
$query="Select * from student where sname='$name'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);
$admno = $row["admno"];

$name = $_SESSION['username'];
$query="Select * from complaint where name='$name'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);
$cdetails = $row["cdetails"];
$ctype = $row["ctype"];
$type = $row["type"];
$regDate = $row["regDate"];
?>
<!DOCTYPE html>
<html>
<title>Complaint Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('pc.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>
<div>
  
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
    <h2 align="center">COMPLAINT DETAILS</h2>
</div>
<div style="margin-left:50px;"; style="background-color:White; border: 0px solid White; border-radius: 10px; width:35% ">
	<center>
	 <table width="100%" border="0" cellspacing="0" cellpadding="0">
             <tr>
      <td colspan="2"><b><?php echo $row['name'];?>'s complaint details</b></td>
      
    </tr>
     <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Reg Date:</b></td>
      <td><?php echo htmlentities($row['regDate']); ?></td>
    </tr>

                <tr>
                <td><label><b>Name : </b></label></td>
               <b><td><input type="text" name="name" class="form-control" value="<?php echo($name)?>" reqired readonly ></td></b>
              </tr>
            </div>
            <div>
              <tr>
                <td><label><b>Admission Number: </b></label></td>
              <td><input type="text" name="admno" class="form-control" value="<?php echo($admno)?>" required readonly></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label><b>Complaint: </b></label></td>
              <td><input type="text" name="complait" class="form-control" value="<?php echo($cdetails)?>" required readonly></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label><b>Complaint type: </b></label></td>
              <td><input type="text" name="ctype" class="form-control" value="<?php echo($ctype)?>" required readonly></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label><b>Type: </b></label></td>
              <td><input type="text" name="type" class="form-control" value="<?php echo($type)?>" required readonly></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label><b>Register Date: </b></label></td>
              <td><input type="text" name="regDate" class="form-control" value="<?php echo($regDate)?>" required readonly></td>
            </tr>
            </div>

            
            







     
</body>
</html>