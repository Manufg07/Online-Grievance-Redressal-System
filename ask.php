<?php

require_once "config.php";

$que = $admn = $type = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $que = test_input($_POST["tell"]);
  $admn = test_input($_POST["admno"]);
  $type = test_input($_POST["qtype"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO queries (question, admno, visible)
VALUES ('$que', '$admn', '$type')";

if (mysqli_query($link,$sql)){
     echo "<script>
                alert('Question Added Successfully');
                window.location.href='askthecm.php';
                </script>";

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


?>