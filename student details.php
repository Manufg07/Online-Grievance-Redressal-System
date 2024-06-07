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
<title>Admin | Student Details</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('stked.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="welcome.php" class="w3-bar-item w3-button">ADMIN HOME</a>
  <a href="cellmember details.php" class="w3-bar-item w3-button">CELL MEMBER DETAILS</a>
  <a href="complaint details.php" class="w3-bar-item w3-button">VIEW COMPLAINTS</a>
  <a href="approve.php" class="w3-bar-item w3-button">APPROVED COMPLAINTS</a>
  <a href="deny.php" class="w3-bar-item w3-button">DENIED COMPLAINTS</a>
  <a href="monthly report.php" class="w3-bar-item w3-button">MONTHLY REPORT</a>
</div>


<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
  <h2 style="color:White; text-align:center">STUDENT DETAILS</h2>

</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:65% " >
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><center>S.No.</center></th>
<th><center>Admission No.</center></th>
<th><center>Name</center></th>
<th><center>Course</center></th>
<th><center>Email</center></th>
<th><center>Mobile number</center></th>
</tr>
</thead>
<tbody>
<?php
require_once "config.php";
$count=1;
$sel_query="Select admno, sname, course, email, phone from student order by admno";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["admno"]; ?></td>
<td align="center"><?php echo $row["sname"]; ?></td>
<td align="center"><?php echo $row["course"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["phone"]; ?></td>
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
