<?php
require_once "config.php";
// Initialize the session
session_start();
$name = $_SESSION['sname'];
$query="Select * from student where sname='$name'";
$result = mysqli_query($link,$query);
$row = mysqli_fetch_assoc($result);
$admno = $row["admno"];
?>
<!DOCTYPE html>
<html>
<title>Student | Askthecm</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('pc.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="stwelcome.php" class="w3-bar-item w3-button">STUDENT HOME</a>
  <a href="register_complaint.php" class="w3-bar-item w3-button">REGISTER COMPLAINTS</a>
  <a href="view_complaint.php" class="w3-bar-item w3-button">VIEW COMPLAINT</a>
  <a href="stfeedback.php" class="w3-bar-item w3-button">FEEDBACK</a>
</div>

<div class="w3-blue">
  <button class="w3-button w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
    <h2 align="center">ASK QUERIES</h2>
</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:65% ">  
    <p>
      YOU CAN ASK ANY DOUBTS RELATED TO COMPLAINTS AND COLLEGE ACTIVITES.<br>
      THERE IS AN OPTION TO MAKE QUERY PRIVATE OR PUBLIC.
      REPEATED QUESTIONS WILL BE DELETED.<br>
      QUESTIONS WILL BE ANSWERED WITHIN ONE OR TWO DAYS.<br>
    </p>
    <form action="ask.php" method="post"><table>
      <div class="form-group">
                <tr><td><label>Admission Number : </label></td>
             <td> <input type="text" name="admno" class="form-control" value="<?php echo($admno)?>" required readonly></td></tr>
        <tr><td><label>Query Type : </label></td>
                <td><select id="qtype" name="qtype">
                   <option>Type of Query</option>
                   <option value="Public">Public</option>
                   <option value="Private">Private</option>
                 </select></td></tr>
                <tr><td><label>Question : </label></td>
                <td><textarea name="tell" required></textarea></td></tr>
                <tr align="center"><td colspan="2"><input type="submit" name="submit" class="btn btn-primary" value="Submit"></td></tr>
      </div>
    </table>
     </form>
    <p>QUESTIONS AND ANSWERS</p>
      <table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><center>S.No.</center></th>
<th><center>Questions</center></th>
<th><center>Answers</center></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
$qa="Select * from queries order by qid";
$qaresult = mysqli_query($link,$qa);
while($row1 = mysqli_fetch_assoc($qaresult)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
<td align="center"><?php echo $row1["question"]; ?></td>
<td align="center"><?php echo $row1["answer"]; ?></td>
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
