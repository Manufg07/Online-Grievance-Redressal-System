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
<title>Admin | Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('zq.png');
background-attachment:fixed;
background-size:100% 100%;


}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="student_details.php" class="w3-bar-item w3-button">STUDENT DETAILS</a>
  <a href="cellmember_details.php" class="w3-bar-item w3-button">CELL MEMBER DETAILS</a>
  <a href="complaint_details.php" class="w3-bar-item w3-button">VIEW COMPLAINTS</a>
  <a href="acmpdet.php" class="w3-bar-item w3-button">APPROVED COMPLAINTS</a>
  <a href="dcmpdet.php" class="w3-bar-item w3-button">DENIED COMPLAINTS</a>
  <a href="monthly_report.php" class="w3-bar-item w3-button">MONTHLY REPORT</a>
  <a href="final_report.php" class="w3-bar-item w3-button">FINAL REPORT</a>
</div>


<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
  <h2 style="color:White; text-align:center">ADMIN PANEL</h2>

</div>
<div class="w3-container">
  <center>
<h1 style="color:black">Hello, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome.</h1>
<div style="background-color:white; color:; border: 2px solid White; border-radius: 5px; width:35% " >
  
<?php
require_once "config.php";
$sbc="Select count(status) from complaint where status ='submitted' ";
$apc="Select count(status) from complaint where status ='approve' ";
$dec="Select count(status) from complaint where status ='deny' ";
$result1 = mysqli_query($link,$sbc);
$row1 = mysqli_fetch_array($result1);
$result2 = mysqli_query($link,$apc);
$row2 = mysqli_fetch_array($result2);
$result3 = mysqli_query($link,$dec);
$row3 = mysqli_fetch_array($result3);
?>
  <table width="100%" border="1" style="border-collapse:collapse;">
    <tr><td>Unchecked Complaints : </td>
      <td><?php echo $row1[0]; ?></td></tr>
    <tr><td>Approved Complaints : </td>
      <td><?php echo $row2[0]; ?></td></tr>
    <tr><td>Denied Complaints : </td>
      <td><?php echo $row3[0]; ?></td></tr>
  </table></div>
<p style="color:White">
        <a href="logout.php" class="btn btn-danger">SIGN OUT OF YOUR ACCOUNT</a>
    </p>
    <center>
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
