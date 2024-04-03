<?php
include"conn.php";
$ID=$_GET['id'];
$delete="DELETE FROM `product` WHERE id=$ID";
mysqli_query($con,$delete);
header("location:view.php");
?>