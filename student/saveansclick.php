<?php

@session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;

$que_id=$_REQUEST['ques_id'];



$opti=$_REQUEST['opt'];

$test_id=$_REQUEST['test_id'];

$sub_id =$_REQUEST['sub_id']; 



$q1="select * from mst_useranswer where user_id='$user_id' AND testp_id='$test_id' AND question_id='$que_id'";


$result1=mysqli_query($conn,$q1);
$get_total_rows = mysqli_num_rows($result1);
if($get_total_rows > 0)

{
$s1="update mst_useranswer set answer='$opti' where user_id='$user_id' AND testp_id='$test_id' AND question_id='$que_id'";
$conn->query($s1);
}
else{
$s="insert into mst_useranswer(question_id,answer,user_id,testp_id,sub_id) values('$que_id','$opti','$user_id','$test_id','$sub_id')" or die ("insert error");
$conn->query($s);

}


?>