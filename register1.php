<?php

require_once "config.php";

$name = $admno = $sub = $cdetails = $ctype = $type = $imgData = $imageProperties ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
      $imgData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));
      $imageProperties = getimageSize($_FILES['myfile']['tmp_name']);
    }
}
  $name = test_input($_POST["name"]);
  $admno = test_input($_POST["admno"]);
  $cdetails = test_input($_POST["cdetails"]);
  $ctype = test_input($_POST["ctype"]);
  $type = test_input($_POST["type"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



$sql = "INSERT INTO complaint (name,admno,cdetails,ctype,type,status,image,imgtype)
VALUES ('$name','$admno','$cdetails','$ctype','$type','submitted','{$imgData}','{$imageProperties['mime']}')";

if (mysqli_query($link,$sql)){
     echo "<script>
                alert('Added Successfully');
                window.location.href='register_complaint.php';
                </script>";

}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($link);
}


?>