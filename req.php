<!DOCTYPE html>
<html>
<head><title>Request</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;
background-image:url('req.jpg');
background-attachment:fixed;
background-size:100% 100%;
}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>
</head>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="home.php" class="w3-bar-item w3-button">HOME</a>
  <a href="gamelist.php" class="w3-bar-item w3-button">GAMES</a>
  <a href="walkthroughlist.php" class="w3-bar-item w3-button">WALKTHROUGH</a>
  <a href="asktheadmin.php" class="w3-bar-item w3-button">ASK US</a>
</div>
<div class="w3-blue">
  <button class="w3-button w3-blue w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
    <h1 style="text-align:center;">GAME INFORMATION WEBSITE</h1>
    <h2 align="center">REQUEST</h2>
  </div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:65% ">
    <p>
      YOU CAN REQUEST DETAILS OF GAMES AND WALTHROUGH HERE.<br>
      GAME STAGE/LEVEL/MISSION MUST BE SPECIFIED WHEN REQUESTING WALKTHROUGH.<br>
      FORMAT FOR REQUESTING GAME IS <b>G:GAME_NAME</b> AND FOR WALKTHROUGH IS <b>W:GAME_NAME:LEVEL</b>.<br> 
      CANNOT ADD ALREADY ADDED GAMES AND WALKTHROUGHS.
    </p>
    <form action="reqa.php" method="post">
    <div class="form-group">
                <label>Request</label>
                <input type="text" name="reqwg" class="form-control" >
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
            </div>
     </form>
     <p>REQUESTED GAMES AND WALKTHROUGHS WILL BE SUBMITTED WITHIN 2 DAYS.</p>
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
