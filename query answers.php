
<!DOCTYPE html>
<html>
<title>Cellmember | Query Answers</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('ans1.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="cmwelcome.php" class="w3-bar-item w3-button">CELLMEMBER HOME</a>
 <a href="non anonymous.php" class="w3-bar-item w3-button">COMPLAINTS</a>
  <a href="anonymous.php" class="w3-bar-item w3-button">ANONYMOUS COMPLAINTS</a>
  <a href="status.php" class="w3-bar-item w3-button">UPDATE STATUS</a>
  <a href="feedback.php" class="w3-bar-item w3-button">FEEDBACK</a>
  <a href="cm monthly report.php" class="w3-bar-item w3-button">MONTHLY REPORT</a>
  <a href="final report.php" class="w3-bar-item w3-button">FINAL REPORT</a>
</div>

</div>
<center>
<div class="w3- light grey">
  <button class="w3-button w3-black w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center";>ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
    <h2 align="center">QUERY ANSWERS</h2>
</div>

<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:80% ">
  <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><center>S.No.</center></th>
<th><center>Questions</center></th>
<th><center>Answers</center></th>
<th><center>Submit Answers</center></th>
<th><center>Delete</center></th>
</tr>
</thead>
<tbody>
<?php
require_once "config.php";
$count=1;
$sel_query="Select questions,answers,qid  from queries order by qid";
$result = mysqli_query($link,$sel_query);
while($row = mysqli_fetch_assoc($result)) { 
?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row["questions"]; ?></td>
<td align="center"><?php echo $row["answers"]; ?></td>
<td align="center">
  <form action="tell.php?id=<?php echo $row["qid"]; ?>" method="post">
    <textarea name="tell"></textarea>
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</td>
<td align="center">
<a href="askd.php?id=<?php echo $row["qid"]; ?>">Delete</a>
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