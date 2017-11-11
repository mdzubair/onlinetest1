<?php
include('function/db.php');
global $conn;
$id=$_POST['id'];
$sql="DELETE FROM `mst_question` WHERE `que_id`='$id'";
$res=mysqli_query($conn,$sql);
?>