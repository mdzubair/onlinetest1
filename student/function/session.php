<?php 
@session_start();
if(!isset($_SESSION['studentname']))
{
echo "<script>window.open('../','_self')</script>";
}
else{
$session = $_SESSION['studentname'];
$user_id = $_SESSION['member_id'];
$logintype = $_SESSION['studentname'];
$coaching_id = $_SESSION['coaching_id'];
}
/*if($session == $student_name)
{
$logintype = $_SESSION['studentname'];
$coaching_id = $_SESSION['coaching_id'];
}
else{
echo "<script>window.open('../','_self')</script>";
}*/


?>
