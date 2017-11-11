<?php @session_start(); 
include ('function/db.php');
global $conn;
include('function/session.php');

$test_id = $_GET['id'];

/*-----------------delete test by test id FROm mst_test--------------------*/

$delete_test = mysqli_query($conn, "DELETE FROM mst_test WHERE test_id='$test_id'");
if($delete_test == 1)
{
/*-----------------delete question by test id FROm mst_question--------------------*/

$delete_test_question = mysqli_query($conn, "DELETE FROM mst_question WHERE test_id='$test_id'");
	
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Test Deleted successfully !')
window.location.href='setexam.php';
</SCRIPT>");

}
else
{
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Error in Deleted test !')
window.location.href='setexam.php';
</SCRIPT>");
}	
?>