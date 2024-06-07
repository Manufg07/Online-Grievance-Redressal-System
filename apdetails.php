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
      <td><b>Admission No:</b></td>
      <td><?php echo htmlentities($row['admno']); ?></td>
    </tr>
    <tr height="50">
      <td><b>Complaint Id:</b></td>
      <td><?php echo htmlentities($row['cmpid']); ?></td>
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
      <td><b>Registered Date and Time:</b></td>
      <td><?php echo htmlentities($row['date']); ?></td>
    </tr>

        <tr height="50">
      <td><b>Feedback by us(if any):</b></td>
      <td><?php echo htmlentities($row['feedback']); ?></td>
    </tr>

    <tr height="50">
      <td><b>Remarks (if any):</b></td>
      <td><?php echo htmlentities($row['remark']); ?></td>
    </tr>

    <tr height="50">
      <td><b>Priority:</b></td>
      <td><?php echo htmlentities($row['priority']); ?></td>
    </tr>


        <tr height="50">
      <td><b>Status:</b></td>
      <td><?php echo htmlentities($row['status']); ?></td>
    </tr>  

     <tr height="50">
      <td><b>Active or Inactive:</b></td>
      <td><?php if($row['status']=='approve'||$row['status']=='Processing')
      { echo "Active";
} else{
  echo "Inactive";
}
        ?></td>
    </tr>
    <tr height="50"><td><b>Priority :</b></td>
    <td><form action="cprior.php?id=<?php echo $row["cmpid"]; ?>" method="post">
  <select id="priority" name="priority">
    <option>Select</option>
                   <option value="3">Low</option>
                   <option value="2">Medium</option>
                   <option value="1">High</option>
                   <input type="submit" name="submit" class="btn btn-primary" value="Change Priority">
                 </select>
               </td></tr>
             </form>
  
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