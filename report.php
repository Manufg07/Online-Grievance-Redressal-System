<?php
require_once "config.php";
// Initialize the session
session_start();
?>
<!DOCTYPE html>
<html>
<title>Cell member | Monthly report</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('cl1.jpeg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="cmwelcome.php" class="w3-bar-item w3-button">CELL MEMBER HOME</a>
  <a href="nonanonymous.php" class="w3-bar-item w3-button">NON ANONYMOUS COMPLAINTS</a>
  <a href="anonymous.php" class="w3-bar-item w3-button">ANONYMOUS COMPLAINTS</a>
  <a href="recomplain.php" class="w3-bar-item w3-button">REINSTATE REQUEST</a>
  <a href="answer.php" class="w3-bar-item w3-button">GIVE ANSWERS</a>
  <a href="cmfinalreport.php" class="w3-bar-item w3-button">FINAL REPORT</a>

</div>

<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">ONLINE GRIEVANCE REDRESSAL SYSTEM</h1>
    <h2 align="center">MONTHLY REPORT</h2>
</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:35% ">
  <form action="mreport.php" method="post" autocomplete="off">
    <br>
    <table border="0">
            <div>
            	<tr>
            	   <td> <label for="month"><b>Month : </b></label></td>
                   <td><select id="month" name="month" required>
                   <option >Select Month</option>
                   <option value="January">January</option>
                   <option value="February">February</option>
                   <option value="March">March</option>
                   <option value="April">April</option>
                   <option value="May">May</option>
                   <option value="June">June</option>
                   <option value="July">July</option>
                   <option value="August">August</option>
                   <option value="September">September</option>
                   <option value="October">October</option>
                   <option value="November">November</option>
                   <option value="December">December</option>
                  </select></td>
              </tr>
            </div>
             <div>
              <tr>
                <td><label><b>Year : </b></label></td>
              <td><input type="text" name="year" class="form-control" required></td>
            </tr>
            </div>
            <div class="form-group <?php echo (!empty($cdetails_err)) ? 'has-error' : ''; ?>">
                <tr>
                  <td><label><b>Report : </b></label></td>
                <td><textarea name="report" class="form-control" required></textarea></td>
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