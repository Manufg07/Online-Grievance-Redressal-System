<?php

require_once "config.php";

$month = $year = $report = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $month = test_input($_POST["month"]);
  $year = test_input($_POST["year"]);
  $report = test_input($_POST["report"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "INSERT INTO report(month, year, details)
VALUES ('$month', '$year', '$report')";

if (mysqli_query($link,$sql)){
     echo "<script>
                alert('Report Added Successfully');
                window.location.href='report.php';
                </script>";

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


?>