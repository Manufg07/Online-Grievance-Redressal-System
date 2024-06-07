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
<title>Complaint Register</title>
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
  <a href="view_complaint.php" class="w3-bar-item w3-button">VIEW COMPLAINT</a>
  <a href="askthecm.php" class="w3-bar-item w3-button">ASK QUERIES</a>
  <a href="stfeedback.php" class="w3-bar-item w3-button">FEEDBACK</a>

</div>

<div class="w3-blue">
  <button class="w3-button w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
    <h2 align="center">COMPLAINT REGISTRATION</h2>
</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:35% ">
  <form action="register1.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <br>
    <table border="0">
            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <tr>
                <td><label><b>Name : </b></label></td>
               <b><td><input type="text" name="name" class="form-control" value="<?php echo($name)?>" reqired readonly ></td></b>
              </tr>
            </div>
            <div>
              <tr>
                <td><label><b>Admission Number: </b></label></td>
              <td><input type="text" name="admno" class="form-control" value="<?php echo($admno)?>" required readonly></td>
            </tr>
            </div>
            <div>
              <tr>
                 <td> <label for="ctype"><b>Type</b></label></td>
                   <td><select id="ctype" name="ctype">
                   <option>Type of complaint</option>
                   <option value="Harrasment">Harrasment</option>
                   <option value="Education">Education</option>
                   <option value="Canteen">Canteen</option>
                   <option value="Hostel">Hostel</option>
                   <option value="Others">Others</option>
                  </select></td>
              </tr>
            </div>
            <div class="form-group <?php echo (!empty($cdetails_err)) ? 'has-error' : ''; ?>">
                <tr>
                  <td><label><b>Complaint: </b></label></td>
                <td><textarea name="cdetails" class="form-control" ></textarea></td>
              </tr>
            </div> 
            <div>
              <tr>
                <td><label><b>Evidence: </b></label></td>
              <td><input type="file" name="myfile" id="image"></td>
            </tr>
            </div>   
            <div> 
            <tr>   
             <td><label for="type"><b>Type  :</b></label></td>
              <td><select id="type" name="type">
              <option value="anym">Anonymous</option>
              <option value="nonanym">Non-anonymous</option>
            </select></td>
           </tr>
          </div>
            <div class="form-group">
              <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" class="btn btn-primary" value="Submit"><br><br></td>
              </tr>
            </div>
          </table>
        </center>
   </form>
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