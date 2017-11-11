<?php 
@session_start();
if(!isset($_SESSION['adminname']))
{
	 echo "<script>window.open('../','_self')</script>";
}
else{
$session = $_SESSION['adminname'];
if($session == 'Admin')
{
$logintype = $_SESSION['adminname'];
$department = $_SESSION['department'];
}
else{
echo "<script>window.open('../','_self')</script>";
}
}
?>
