<?php
@session_start(); 
include('function/db.php');
$id=$_GET['id'];
$delsql="select * from addstudent where student_id='$id'";
$res=mysqli_query($conn,$delsql);
$name=mysql_fetch_assoc($res);
$delname=$name['stu_pic'];
unlink("images/".$delname);
$sql1="DELETE FROM `addstudent`  WHERE `student_id`='$id'";
mysqli_query($conn,$sql1);
header('location:search_student.php');
?>