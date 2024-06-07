<!DOCTYPE html>
<html>
<title>status</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('home.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="stwelcome.php" class="w3-bar-item w3-button">STUDENT HOME</a>
  <a href="sanym.php" class="w3-bar-item w3-button">REGISTER COMPLAINTS</a>
  <a href="cdts.php" class="w3-bar-item w3-button">VIEW COMPLAINT</a>
  <a href="stfeedback.php" class="w3-bar-item w3-button">FEEDBACK</a>
  <a href="abtus.php" class="w3-bar-item w3-button">ABOUT US</a>

</div>

<center>
<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
  <h2 style="color:White; text-align:center">UPDATE STATUS</h2>

</div>

<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:80% ">
  <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><center>S.No.</center></th>
<th><center>Complaint id</center></th>
<th><center>Complaint</center></th>
<th><center>Status</center></th>
<th><center></center></th>
</tr>
</thead>
<tbody>
<?php
require_once "config.php";
$count=1;
$sel_query="Select * from status order by cmpid";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["cmpid"]; ?></td>
<td align="center"><?php echo $row["complaint"]; ?></td>
<td align="center"><?php echo $row["sts"]; ?></td>
<td align="center">
  <form action="rpt.php?id=<?php echo $row["report"]; ?>" method="post">
    <textarea name="report"></textarea>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</td>
<td align="center">
<a href="askd.php?id=<?php echo $row["report"]; ?>">Delete</a>
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