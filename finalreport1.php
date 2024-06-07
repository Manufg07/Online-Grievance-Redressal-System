<?php

require_once "config.php";

$feed = "";
$cmp = $_REQUEST['uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $feed = test_input($_POST["feed"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "UPDATE complaint
SET report='$feed',status='Report Submitted'
WHERE cmpid=$cmp";

if (mysqli_query($link,$sql)){
     echo "<script>
                alert('Remark Given and Status Updated');
                window.close();
                </script>";

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


?>