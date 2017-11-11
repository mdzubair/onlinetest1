<?php 
@session_start(); 
include('function/session.php');
include ('function/db.php');
global $conn;
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
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Admin Dashboard</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">

<h3 class="box-title">Student Name : <?php echo $_GET['student_name']; ?> , Test Name : <?php echo $_GET['test_name'];?> ,  Sub Name : <?php echo $_GET['sub_name'];?> </h3> <span class="pull-right">

<small>
<a href="index" class="btn btn-info btn-xs">
<i class="fa fa-arrow-left"></i> Back to My Dashboard</a>
</small>
</span>
</div><!-- /.box-header -->
<div class="box-body">

<?php
if(isset($_GET['test_id']) || isset($_GET['sub_id'])|| isset($_GET['user_id']))
{
$test_id = $_GET['test_id'];
$sub_id = $_GET['sub_id'];
$user_id = $_GET['user_id'];
}
else
{
$test_id = "";
$sub_id = "";
$user_id = "";
}
?>		
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
<div class="box box-primary">
<div class="box-header">
<i class="ion ion-clipboard"></i>
<h3 class="box-title">Result...</h3>
</div><!-- /.box-header -->
<div id="demo"></div>
<div class="box-body">
<ul class="todo-list" style="max-height:300px;overflow-y: scroll">
<li>

<?php
/*-------------------- get netgative marking---------------*/
$get_negative_mark = mysqli_query($conn, "SELECT negative_mark FROM negative_mark");
$count_negat_mark = mysqli_num_rows($get_negative_mark);
$get_negative = mysqli_fetch_array($get_negative_mark);
$negative_mark = $get_negative['negative_mark'];
?>
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->
<div class="col-md-1">
No.
</div>

<div class="col-md-2">
Correct Answer
</div>
<div class="col-md-2">
Wrong Answer
</div>
<div class="col-md-2">
Negative Marks
</div>
<div class="col-md-2">
Total Marks
</div>
</div>
</li>

<?php 
/*----------- get result from mst_useranswer and add student-------------*/

$get_result = mysqli_query($conn, "select mq.test_id FROM mst_useranswer mu INNER JOIN mst_question mq ON mu.answer=mq.trueans AND mu.question_id=mq.que_id where mu.user_id='$user_id' AND mu.testp_id='$test_id' AND mu.sub_id='$sub_id'");                 

$count_correct_answer = mysqli_num_rows($get_result);


/*---------count total wrong answer from mst_useranswer table by check user_id exists or not-------*/

$q3="select mq.test_id FROM mst_useranswer mu INNER JOIN mst_question mq ON mu.answer != mq.trueans AND mu.question_id=mq.que_id where mu.user_id='$user_id' AND mu.testp_id='$test_id' AND mu.sub_id='$sub_id'";
$result3=mysqli_query($conn,$q3);
$count_wrong_answer = mysqli_num_rows($result3);
$count_wrong_answer1 = $count_wrong_answer;


$total = $count_correct_answer*1-$count_wrong_answer1*$negative_mark;


?>
<li>
<div class="row" style="margin-right: 0;">
<div class="col-md-1">
1
</div>
<div class="col-md-2">
<?php echo $count_correct_answer;?>
</div>
<div class="col-md-2">
<?php echo $count_wrong_answer1; ?>
</div>
<div class="col-md-2">
<?php echo $negative_mark; ?>
</div>
<div class="col-md-2">
<?php echo $total;?>
</div>

</div>
</li>
	
</ul>
</div><!-- /.box-body -->
</div><!-- /.box -->

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
