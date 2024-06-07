<?php

require_once "config.php";

$id = $_REQUEST['id'];
$ans = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ans = test_input($_POST["priority"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "UPDATE complaint
SET priority='$ans',status='approve'
WHERE cmpid=$id";

if (mysqli_query($link,$sql)){
     echo "<script>
                alert('Priority Added and Approved Successfully');
                window.close();
                </script>";

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


?>