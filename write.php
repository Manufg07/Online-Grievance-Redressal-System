<?php
session_start();
require_once "config.php";
if(!isset($_SESSION["cloggedin"]) || $_SESSION["cloggedin"] !== true){
    header("location: cmlogin.php");
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
  
background-image:url('bl.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
.text
{ 
color: white; }

</style>
</head>
<body>

<div style="margin-left:50px;">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?php 

$ret1=mysqli_query($link, "select * FROM queries where qid='".$_GET['uid']."'");
while($row=mysqli_fetch_array($ret1))
{
?>
  
  <form action="tell.php?id=<?php echo $row["qid"]; ?>" method="post" class="color">
    <tr height="50">
      <td><b>Answer : </b></td>
    <td><textarea name="tell" required></textarea></td></tr>
    <tr><td colspan="2"><input type="submit" name="submit" class="btn btn-primary" value="Submit"></td></tr>
      <tr>
        <td colspan="2"><input name="Submit" type="button" class="btn btn-primary" value="Close this window " onClick="return f2();" style="cursor: pointer;"/></td>
    </tr>
     </form>
    

   
    <?php } 

 
    ?>
 
</table>
</div>

</body>
</html>

     <?php } ?>
