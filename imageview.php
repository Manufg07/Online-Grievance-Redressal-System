<?php

include 'config.php';
$ret=mysqli_query($link, "select * FROM complaint where cmpid='".$_GET['id']."'");
while($row=mysqli_fetch_array($ret))
{
header("Content-type: " . $row["imgtype"]);
echo $row["image"];
}
?>