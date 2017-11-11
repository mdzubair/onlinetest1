<?php @session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;
?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); ?>

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
<h3 class="box-title">Choose Correct Answer </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>

</div><!-- /.box-header -->



<div class="box-body">
<div class="row myleadc">
<div class="col-md-12 myleads">

<form method="post">

<?php
/*-------------count total answered question from mst_useranswer table by check user_id exists or not-------*/
$test_id = $_GET['test_id'];
$q1="select * from mst_useranswer where user_id='$user_id' AND testp_id='$test_id'";
$result1=mysqli_query($conn,$q1);
$get_total_rows = mysqli_num_rows($result1);
$count_answered_question = $get_total_rows;

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
<div id="" class='cont'>

<h2></h2>	
<h2></h2>

<h2>Right answer : <label> <?php echo $count_right_answer1; ?></label> </h2>
<h2>Wrong answer : <label> <?php echo $count_wrong_answer1; ?></label> </h2>
<h2>Total no. of Answered question : <label><?php echo $count_answered_question; ?></label> </h2>
</div>

</form>



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
