<?php
@session_start();
include ('db.php');
global $conn;

if(isset($_POST['login-member']))
{
$loginid = $_POST['member-username'];
$pass = $_POST['member-pass'];

/*--------------------- admin login-----------------------*/
	
if( $_POST['member-username'] == "ashu" && $_POST['member-pass'] == "ashu@123" )
{
$_SESSION['adminname']="Admin";
$_SESSION['department']="Admin";
echo "<script>window.open('../admin/','_self')</script>";
}
//$query1  = "select * from mst_user where member_login='$loginid' and member_password='$pass'";

/*-----------------------------student login from addstudent table--------------------*/


$query1  = "select * from addstudent where student_id='$loginid' AND password='$pass'";

$query = mysqli_query($conn ,$query1);
$r1 = mysqli_fetch_array($query);
$student_id = $r1['student_id'];
$password = $r1['password'];
$student_name = $r1['student_name'];

$id = $r1['id'];
$coaching_id = $r1['coaching_id'];

if($_POST['member-username'] == $student_id && $_POST['member-pass'] == $password)
{
$_SESSION['member_id']=$id;	
$_SESSION['studentname']=$student_name;
$_SESSION['coaching_id']=$coaching_id;

echo "<script>window.open('../student/','_self')</script>";	
}
else
{
echo '<script language="javascript">';
echo 'alert("Invalid Login Id or Password")';
echo '</script>';	
echo "<script>window.open('../index','_self')</script>";
}	
}

if(isset($_GET['logout_id']) == 'logout')
{
    session_destroy();
          echo "<script>window.open('../index','_self')</script>";
          exit();
}


if(isset($_POST['member-profile']) == TRUE)
{
	
$member_name = $_POST['member-name'];
$member_email = $_POST['member-email'];
$member_contact = $_POST['member-contact'];
$member_city = $_POST['member-city'];
$member_address = $_POST['member-address'];
$member_id2 = $_POST['member-id'];

$member_id1 = substr($member_id2,4);



if(!file_exists($_FILES['member-file']['tmp_name']) || !is_uploaded_file($_FILES['member-file']['tmp_name'])) {

$member_upload1 = "update mst_user set user_name = '$member_name',
user_mobile = '$member_contact',user_email = '$member_email',
user_city = '$member_city',user_address = '$member_address' WHERE member_id='$member_id1'";


$run_member1 =  mysqli_query($conn, $member_upload1);
if($run_member1){
$_SESSION['member-msg'] = "Profile Update Succesfully!";
echo "<script>window.open('../myprofile','_self')</script>";}    
else{
$_SESSION['member-msg'] = mysqli_error($conn);
echo "<script>window.open('../profile','_self')</script>";
}


}
else{
$member_file = $_FILES['member-file']['name'];
$tmpName  = $_FILES['member-file']['tmp_name'];
move_uploaded_file($tmpName,"../library/userprofile/$member_file");	
$member_upload = "update mst_user set user_name = '$member_name',user_pic = '$member_file',
user_mobile = '$member_contact',user_email = '$member_email',
user_city = '$member_city',user_address = '$member_address' WHERE member_id='$member_id1'";
$run_member =  mysqli_query($conn, $member_upload);
if($run_member){
$_SESSION['member-msg'] = "Profile Update Succesfully!";
echo "<script>window.open('../myprofile','_self')</script>";}    
else{
$_SESSION['member-msg'] = "Sorry Check Your Internet Connection!";
echo "<script>window.open('../profile','_self')</script>";
}
	
}
}


 if(isset($_POST['mysubmition']))
 {
 
 
$userid = ($_POST['usid']);
$sub = 1;

$test_n = $_SESSION["testname"];
$sub_n = $_SESSION["subname"];


$result = mysqli_query($conn ,"update mst_useranswer set submit='$sub',testp_id='$test_n',sub_id='$sub_n' WHERE user_id = '$userid'");
if ($result){
$attemp = mysqli_query($conn ,"select * from mst_user WHERE member_id = '$userid'");
$row_mem = mysqli_fetch_array($attemp);
$mem_attemp = $row_mem['member_attampts'];
$mem_atm  = $mem_attemp  - 1 ;

$attempts = mysqli_query($conn ,"update mst_user set member_attampts='$mem_atm' WHERE member_id = '$userid'");
   
if($attempts )    
{    
echo "<script>window.open('../submit-test','_self')</script>";
}

}
 
 
 
 }


?>

