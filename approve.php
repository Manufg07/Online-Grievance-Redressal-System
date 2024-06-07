<?php
require_once "config.php";
$id = $_REQUEST['id'];
$ap = "approve";
$query = "UPDATE complaint
SET approval='$ap'
WHERE cmpid=$id";
$result = mysqli_query($link,$query);
if($result)
{
    echo "<script>
                alert('Approved Successfully');
                window.location.href='cmpdet.php';
                </script>";
}
else
{
	echo "Error: " . $query . "<br>" . mysqli_error($link);
}
?>