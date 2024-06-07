<?php
session_start();
require_once "config.php";
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
else{

 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Student Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">

</head>
<style>
body{
   
background-image:url('hmst.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}

.text
{ 
color: white; }
</style>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table class=text width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($link, "select * FROM student where admno='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  
		
    <tr>
      <td colspan="2"><u><i><b><?php echo $row['sname'];?>'s Details</b></i></u></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Admission No :</b></td>
      <td><?php echo htmlentities($row['admno']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Course :</b></td>
      <td><?php echo htmlentities($row['course']); ?></td>
    </tr>
    
    <tr height="50">
      <td><b>Phone Number :</b></td>
      <td><?php echo htmlentities($row['phone']); ?></td>
    </tr>


      <tr height="50">
      <td><b>Email :</b></td>
      <td><?php echo htmlentities($row['email']); ?></td>
    </tr>
    




        <tr height="50">
      <td><b>No. of Complaint Sent :</b></td>
      <?php
      $admn = $row['admno'];
      $sbc="Select count(*) from complaint where admno ='$admn' ";
      $result1 = mysqli_query($link,$sbc);
      $row1 = mysqli_fetch_array($result1); ?>
      <td><?php echo htmlentities($row1[0]); ?></td>
    </tr>
    
    <tr>
  
      <td colspan="2">   
      <input name="Submit" type="submit" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
   
    <?php } 

 
    ?>
 
</table>
 </form>
</div>

</body>
</html>

     <?php } ?>