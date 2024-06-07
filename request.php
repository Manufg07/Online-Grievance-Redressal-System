<!DOCTYPE html>
<html>
<title>Request</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('request.jpg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="welcome.php" class="w3-bar-item w3-button">HOME</a>
  <a href="add.php" class="w3-bar-item w3-button">ADD GAME</a>
  <a href="del.php" class="w3-bar-item w3-button">DELETE GAME</a>
  <a href="addw.php" class="w3-bar-item w3-button">ADD WALKTHROUGH</a>
   <a href="walkd.php" class="w3-bar-item w3-button">DELETE WALKTHROUGH</a>
<a href="answers.php" class="w3-bar-item w3-button">ANSWER</a>
</div>

<div class="w3-red">
  <button class="w3-button w3-red w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">GAME INFORMATION WEBSITE</h1>
    <h2 align="center">VIEW AND MANAGE REQUEST</h2>
</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:35% ">
  <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><center>R.No.</center></th>
<th><center>Request</center></th>
<th><center>Delete</center></th>
</tr>
</thead>
<tbody>
<?php
require_once "config.php";
$count=1;
$sel_query="Select req,rid  from request order by rid";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["req"]; ?></td>
<td align="center">
<a href="reqd.php?id=<?php echo $row["rid"]; ?>">Delete</a>
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