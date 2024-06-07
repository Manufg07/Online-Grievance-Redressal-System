<?php
require_once "config.php";
$id = $_REQUEST['id'];
$ap = "deny";
$query = "UPDATE complaint
SET status='$ap'
WHERE cmpid=$id";
$result = mysqli_query($link,$query);
if($result)
{
    echo "<script>
                alert('Denied Successfully');
                window.close();
                </script>";
}
else
{
	echo "Error: " . $query . "<br>" . mysqli_error($link);
}
?>