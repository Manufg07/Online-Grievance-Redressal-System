<?php
session_start();
require_once "config.php";
if(!isset($_SESSION["sloggedin"]) || $_SESSION["sloggedin"] !== true){
    header("location: stlogin.php");
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
<title>Student | Complaint Details</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
<style>
body{
  font-family: all; 
background-image:url('grey.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}

.text
{ 
color: black; }
</style>
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($link, "select * FROM complaint where cmpid='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>

    
  
		
    <tr>
      <td colspan="2"><b><?php echo $row['name'];?>'s Complaint</b></td>
      
    </tr>
    
    
    <tr>
      <td  >&nbsp;</td>
      <td >&nbsp;</td>
    </tr>
    <tr height="50">
      <td><b>Complaint Subject:</b></td>
      <td><?php echo htmlentities($row['ctype']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Complaint Details:</b></td>
      <td><?php echo htmlentities($row['cdetails']); ?></td>
    </tr>

    <tr height="50">
      <td><b>Evidence(if any):</b></td>
      <td><img src="imageview.php?id=<?php echo htmlentities($row['cmpid']); ?>" class="img-radius"alt="NO_EVIDENCE_PROVIDED" height=300 width=300></td>
   </tr>  

   <tr height="50">
      <td><b>Register Date and Time:</b></td>
      <td><?php echo htmlentities($row['date']); ?></td>
    </tr>
    


        <tr height="50">
      <td><b>Complaint Type:</b></td>
      <td><?php echo htmlentities($row['type']); ?></td>
    </tr>



        <tr height="50">
      <td><b>Feedback by us(if any):</b></td>
      <td><?php echo htmlentities($row['feedback']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Remarks from Authorities(if any):</b></td>
      <td><?php echo htmlentities($row['remark']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Status:</b></td>
      <td><?php echo htmlentities($row['status']); ?></td>
    </tr>  

     <tr height="50">
      <td><b>Active or Inactive:</b></td>
      <td><?php if($row['status']=='submitted'||$row['status']=='approve'||$row['status']=='processing')
      { echo "Active";
} else{
  echo "Inactive";
}
        ?></td>
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