<!DOCTYPE html>
<html>
<title>Add Games</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="extra.css">
<style>
body{
background-image:url('add.jpg');
background-attachment:fixed;
background-size:100% 100%;
}
</style>
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">GO BACK &times;</button>
  <a href="welcome.php" class="w3-bar-item w3-button">HOME</a>
  <a href="del.php" class="w3-bar-item w3-button">DELETE GAME</a>
  <a href="request.php" class="w3-bar-item w3-button">REQUESTS</a>
  <a href="addw.php" class="w3-bar-item w3-button">ADD WALKTHROUGH</a>
 <a href="walkd.php" class="w3-bar-item w3-button">DELETE WALKTHROUGH</a>
<a href="answers.php" class="w3-bar-item w3-button">ANSWER</a>
</div>

<div class="w3-red">
  <button class="w3-button w3-red w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <h1 style="text-align:center;">GAME INFORMATION WEBSITE</h1>
    <h2 align="center">ADD GAMES</h2>
</div>
<center>
<div style="background-color:White; border: 2px solid White; border-radius: 5px; width:35% ">
  <form action="add1.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <br>
    <table border="0">
            <div class="form-group <?php echo (!empty($gname_err)) ? 'has-error' : ''; ?>">
                <tr>
                <td><label>Game Name :</label></td>
                <td><input type="text" name="gname" class="form-control"></td>
              </tr>
            </div>
            <div>
              <tr>
                <td><label>Rating: </label></td>
              <td><input type="text" name="arate" class="form-control"></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label>Game Cover: </label></td>
              <td><input type="file" name="image" id="image"></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label>Game Image 1: </label></td>
              <td><input type="file" name="image1" id="image1"></td>
            </tr>
            </div>
            <div>
              <tr>
                <td><label>Game Image 2: </label></td>
              <td><input type="file" name="image2" id="image2"></td>
            </tr>
            </div>            
            <div class="form-group <?php echo (!empty($gdetails_err)) ? 'has-error' : ''; ?>">
                <tr>
                  <td><label>Game Details: </label></td>
                <td><textarea name="gdetails" class="form-control" ></textarea></td>
              </tr>
            </div>    
            <div class="form-group <?php echo (!empty($gtrailer_err)) ? 'has-error' : ''; ?>">
              <tr>
                <td><label>Game Trailer: </label></td>
                <td><input type="text" name="gtrailer" class="form-control" ></td>
              </tr>
            </div>
            <div class="form-group <?php echo (!empty($gameplay_err)) ? 'has-error' : ''; ?>">
              <tr>
                <td><label>Gameplay: </label></td>
                <td><input type="text" name="gameplay" class="form-control" ></td>
              </tr>
            </div>
            <div class="form-group <?php echo (!empty($moreinfo_err)) ? 'has-error' : ''; ?>">
              <tr>
                <td><label>More Info: </label></td>
                <td><input type="text" name="moreinfo" class="form-control" ></td>
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

 $(document).ready(function(){  
      $('#submit').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });


</script>
     
</body>
</html>