<?php

require_once "config.php";

$id = $_REQUEST['id'];
$ans = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ans = test_input($_POST["tell"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "UPDATE status
SET report='$report'
WHERE cmpid=$cmpid";

if (mysqli_query($link,$sql)){
     echo "<script>
                alert('Answer Added Successfully');
                window.location.href='sts.php';
                </script>";

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


?>