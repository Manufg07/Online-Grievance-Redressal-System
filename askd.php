<?php
require_once "config.php";
$id = $_REQUEST['id'];
$query = "DELETE FROM queries where qid=$id";
$result = mysqli_query($link,$query);
if($result)
{
    echo "<script>
                alert('Deleted Successfully');
                window.location.href='answer.php';
                </script>";
}
else
{
	echo "Error: " . $query . "<br>" . mysqli_error($link);
}
?>