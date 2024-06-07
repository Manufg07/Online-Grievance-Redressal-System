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
<title>Complaint Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<style>
body{
  
background-image:url('grey.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
.text
{ 
color: blue; }

</style>
</head>
<body>

<div style="margin-left:50px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($link, "select * FROM report where reportid='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  
		
    <tr>
      <td colspan="2"><b>MONTHLY REPORT</b></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>MONTH :</b></td>
      <td><?php echo htmlentities($row['month']); ?></td>
    </tr>
    <tr height="50">
      <td><b> YEAR:</b></td>
      <td><?php echo htmlentities($row['year']); ?></td>
    </tr>
    <tr height="50">
      <td><b>REPORT :</b></td>
      <td><?php echo htmlentities($row['details']); ?></td>
  <tr>
      <td colspan="2">   
      <br><input name="Submit" class="btn btn-primary" type="button" value="Close this window " onClick="return f2();" style="cursor: pointer;"  /></td>
    </tr>
    

   
    <?php } 

 
    ?>
 
</table>
</div>

</body>
</html>

     <?php } ?>