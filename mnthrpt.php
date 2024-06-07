<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<title>Admin Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('stked.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{  
if(!popUpWin.closed) popUpWin.close();
}

popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+1000+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="welcome.php" class="w3-bar-item w3-button">ADMIN HOME</a>
  <a href="student_details.php" class="w3-bar-item w3-button">STUDENT DETAILS</a>
  <a href="cellmember_details.php" class="w3-bar-item w3-button">CELL MEMBER DETAILS</a>
  <a href="complaint_details.php" class="w3-bar-item w3-button">VIEW COMPLAINTS</a>
  <a href="acmpdet.php" class="w3-bar-item w3-button">APPROVED COMPLAINTS</a>
  <a href="dcmpdet.php" class="w3-bar-item w3-button">DENIED COMPLAINTS</a>
  <a href="final_report.php" class="w3-bar-item w3-button">FINAL REPORT</a></div>

</div>


<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
  <h2 style="color:White; text-align:center">MONTHLY REPORT

</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:65% " >
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><center>S.No.</center></th>
<th><center>Month</center></th>
<th><center>Year</center></th>
<th><center>Report</center></th>
</tr>
</thead>
<tbody>
<?php
require_once "config.php";
$count=1;
$sel_query="Select * from report order by reportid";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["month"]; ?></td>
<td align="center"><?php echo $row["year"]; ?></td>
<td align="center">
<a href="javascript:void(0);" onClick="popUpWindow('http://localhost/og/mcreport.php?uid=<?php echo htmlentities($row['reportid']);?>');" title="Details">
<button type="button" class="btn btn-primary">Click Here</button></a>
</td>
</tr>
<?php $count++; } ?>
</tbody>
</table>
</div>
</center>
     
<script>
function openLeftMenu() {
  document.getElementById("leftMenu").style.display = "block";
}

function closeLeftMenu() {
  document.getElementById("leftMenu").style.display = "none";
}


</script>
    
</body>
</html>
