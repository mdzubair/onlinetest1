<?php 
@session_start(); 
include('function/session.php');
include ('function/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">

<?php include('include/header.php'); ?>

<!-- Left side column. contains the logo and sidebar -->

<?php include('include/sidebar.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
Dashboard
</h1>
<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="test_result">Result</a></li>
<li class="active">View Test</li>
</ol>
</section>
<?php                    
$test_id = $_GET['test_id'];
$sub_id = $_GET['sub_id'];
$coaching_id = $_GET['coaching_id'];

/*-----------------get test name-------------------*/

//$get_test_detail = "SELECT  mt.test_name, mt.total_que, mt.duration, mco.coaching_name, ms.sub_name FROM mst_test mt INNER JOIN mst_coaching mco ON mt.coaching_id=mco.coaching_id INNER JOIN mst_subject ms ON mt.sub_id=ms.sub_id WHERE mt.test_id='$test_id'";
$get_test_detail = "SELECT mt.test_name FROM mst_useranswer mu INNER JOIN mst_test mt ON mu.testp_id=mt.test_id WHERE mu.user_id='$user_id'";

$result = $conn->query($get_test_detail);
$row_cnt = $result->num_rows;
if(!$row_cnt)
{
echo "<script>window.open('error','_self')</script>";
}
else
{
$row = $result->fetch_assoc();

$test_name = $row['test_name'];
//$total_que = $row['total_que'];
}

/*------------------------------- get total question --------------------*/

$get_question = "SELECT * FROM mst_question WHERE test_id='$test_id'";
$result = $conn->query($get_question);
$que_cnt = $result->num_rows;
if(!$que_cnt)
{
echo "<script>window.open('error','_self')</script>";
}
else
{
$que_row = $result->fetch_assoc();

$total_que = $que_cnt;
//$total_que = $row['total_que'];
}

/*-------- get attempt  question ------*/

$get_atempt_que = "SELECT useranswer_id FROM mst_useranswer WHERE user_id='$user_id' AND testp_id='$test_id'";
$result1 = $conn->query($get_atempt_que);
$row_attempt_count = $result1->num_rows;

/*---------count total right answer from mst_useranswer table by check user_id exists or not-------*/

$q2="select mq.test_id FROM mst_useranswer mu INNER JOIN mst_question mq ON mu.answer=mq.trueans AND mu.question_id=mq.que_id where mu.user_id='$user_id' AND mu.testp_id='$test_id'";
$result2=mysqli_query($conn,$q2);
$count_right_answer = mysqli_num_rows($result2);
$count_right_answer1 = $count_right_answer;

/*---------count total wrong answer from mst_useranswer table by check user_id exists or not-------*/

$q3="select mq.test_id FROM mst_useranswer mu INNER JOIN mst_question mq ON mu.answer != mq.trueans AND mu.question_id=mq.que_id where mu.user_id='$user_id' AND mu.testp_id='$test_id'";
$result3=mysqli_query($conn,$q3);
$count_wrong_answer = mysqli_num_rows($result3);
$count_wrong_answer1 = $count_wrong_answer;


?>              

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"><?php echo $test_name;?> information</h3> 
</div><!-- /.box-header -->
<div class="box-body">
<div class="row myleadhs">
<div class="col-md-3 myleads">
Title
</div>
<div class="col-md-9 myleads">
Details
</div>
</div>	
<div class="row myleadc1">
<div class="col-md-9">
<div class="row">
<div class="col-md-4 myleads myleadh">
Test Name :
</div>
<div class="col-md-8 myleads <?php if(!$test_name){echo "empty";}?>">
<?php if(!$test_name){echo "Test Name No Update";}else{echo $test_name;} ?>   
</div>

<div class="col-md-4 myleads myleadh">
Total Question :
</div>	
<div class="col-md-8 myleads3 <?php if(!$total_que){echo "empty";}?>">
<?php if(!$total_que){echo "Question Not Updated";}else{echo $total_que;} ?>   
</div>



<div class="col-md-4 myleads myleadh">
Attemp Question :
</div>	
<div class="col-md-8 myleads3 <?php if(!$row_attempt_count){echo "empty";}?>">
<?php if(!$row_attempt_count){echo "0";}else{echo $row_attempt_count;} ?>   
</div>

<div class="col-md-4 myleads myleadh">
Right answer :
</div>	
<div class="col-md-8 myleads3 <?php if(!$count_right_answer1){echo "empty";}?>">
<?php if(!$count_right_answer1){echo "0";}else{echo $count_right_answer1;} ?>   
</div>

<div class="col-md-4 myleads myleadh">
wrong Answer :
</div>	
<div class="col-md-8 myleads3 <?php if(!$count_wrong_answer1){echo "empty";}?>">
<?php if(!$count_wrong_answer1){echo "0";}else{echo $count_wrong_answer1;} ?>   
</div>
<?php
/*-------------------- get netgative marking---------------*/
$get_negative_mark = mysqli_query($conn, "SELECT negative_mark FROM negative_mark");
$count_negat_mark = mysqli_num_rows($get_negative_mark);
$get_negative = mysqli_fetch_array($get_negative_mark);
$negative_mark = $get_negative['negative_mark'];
?>

<div class="col-md-4 myleads myleadh">
Negative Marking :
</div>	
<div class="col-md-8 myleads3">
<?php if(!$negative_mark){echo "0";}else{echo $negative_mark;} ?>   
</div>

<div class="col-md-4 myleads myleadh">
Total Marks :
<?php
$total = $count_right_answer1*1-$count_wrong_answer1*$negative_mark;
//$total = $count_right_answer1-$negative_mark
?>
</div>	
<div class="col-md-8 myleads3 <?php if(!$total){echo "empty";}?>">
<?php if(!$total){echo "0";}else{echo $total;} ?>   
</div>


<div class="col-md-4 myleads myleadh">
View Correct Answer :
</div>	
<div class="col-md-8 myleads3">
<a href="correct_answer.php?test_id=<?php echo $test_id;?>&test_name=<?php echo $test_name;?>&sub_id=<?php echo $sub_id;?>&coaching_id=<?php echo $coaching_id;?>">View Correct Answers</a>
</div>


<div class="col-md-12 myleads myleadh">


</div>
</div>
</div>


</div>

</div>
</div>
</div>
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable">
<!-- Custom tabs (Charts with tabs)-->

<!-- Chat box -->
<!-- /.box (chat box) -->

<!-- TO DO List -->
<!-- TO DO List -->


<!-- quick email widget -->

</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-5 connectedSortable">

<!-- Map box -->
<!-- /.box -->

<!-- solid sales graph -->


</div><!-- /.box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include('include/footer.php'); ?>
<!-- Control Sidebar -->

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<?php include('include/links2.php'); ?>

<!-- jQuery 2.1.4 -->
</body>
</html>
