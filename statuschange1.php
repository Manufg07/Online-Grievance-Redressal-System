<?php

require_once "config.php";

$feed = $st = "";
$cmp = $_REQUEST['uid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $feed = test_input($_POST["feed"]);
  $st = test_input($_POST["qtype"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "UPDATE complaint
SET remark='$feed',status='$st'
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