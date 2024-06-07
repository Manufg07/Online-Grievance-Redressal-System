<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["sloggedin"]) || $_SESSION["sloggedin"] !== true){
    header("location: stlogin.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<title>Student | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('newh.JPEG');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="register_complaint.php" class="w3-bar-item w3-button">REGISTER COMPLAINTS</a>
  <a href="view_complaint.php" class="w3-bar-item w3-button">VIEW COMPLAINT</a>
  <a href="askthecm.php" class="w3-bar-item w3-button">ASK QUERIES</a>
  <a href="stfeedback.php" class="w3-bar-item w3-button">FEEDBACK</a>
</div>


<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
  <h2 style="color:White; text-align:center">STUDENT HOME</h2>

</div>
<div class="w3-container">
  <center>
<h1 style="color:White">Hello, <b><?php echo htmlspecialchars($_SESSION["sname"]); ?></b>. Welcome.</h1>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:35% " >
  You have,
<?php
require_once "config.php";
$name = $_SESSION['sname'];
$sbc="Select count(status) from complaint where name = '$name' and status ='submitted' ";
$apc="Select count(status) from complaint where name = '$name' and status ='approve' ";
$dec="Select count(status) from complaint where name = '$name' and status ='deny' ";
$ipc="Select count(status) from complaint where name = '$name' and status ='processing' ";
$clc="Select count(status) from complaint where name = '$name' and status ='closed' ";
$result1 = mysqli_query($link,$sbc);
$row1 = mysqli_fetch_array($result1);
$result2 = mysqli_query($link,$apc);
$row2 = mysqli_fetch_array($result2);
$result3 = mysqli_query($link,$dec);
$row3 = mysqli_fetch_array($result3);
$result4 = mysqli_query($link,$ipc);
$row4 = mysqli_fetch_array($result4);
$result5 = mysqli_query($link,$clc);
$row5 = mysqli_fetch_array($result5);
?>
  <table width="100%" border="1" style="border-collapse:collapse;">
    <tr><td>Submitted Complaints : </td>
      <td><?php echo $row1[0]; ?></td></tr>
    <tr><td>Approved Complaints : </td>
      <td><?php echo $row2[0]; ?></td></tr>
    <tr><td>Denied Complaints : </td>
      <td><?php echo $row3[0]; ?></td></tr>
    <tr><td>Processing Complaints : </td>
      <td><?php echo $row4[0]; ?></td></tr>
    <tr><td>Closed Complaints : </td>
      <td><?php echo $row5[0]; ?></td></tr>
  </table></div>
  <p style="color:White">
        <a href="stlogout.php" class="btn btn-danger">SIGN OUT OF YOUR ACCOUNT</a>
 </p>
   </center>
</div>
     
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
