<?php
require_once "config.php";
$sid = $_REQUEST['id'];
$query = "DELETE FROM student where admno='$sid' ";
$result = mysqli_query($link,$query);
if($result)
{
    echo "<script>
                alert('Deleted Successfully');
                window.location.href='stdntdet.php';
                </script>";
}
else
{
	echo "Error: " . $query . "<br>" . mysqli_error($link);
}
?>