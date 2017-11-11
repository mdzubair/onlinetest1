<?php @session_start(); 
include('function/session.php');
include('function/db.php');
//global $conn;
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
</h1>
<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Result</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">

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
<div class="box box-primary">
<div class="box-header">
<i class="ion ion-clipboard"></i>
<h3 class="box-title">All Test</h3>
<span class="pull-right text-success">

</span>

</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list" style="max-height:300px;overflow-y: scroll">
<li>
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->

<div class="col-md-3">
S. No.
</div>

<div class="col-md-3">
Test Name
</div>

<div class="col-md-3">

View Result
</div>
</div>
</li>

<?php

/*----------------get attempt test name by check user id--------------------*/

$sql_res = "SELECT DISTINCT mst_test.test_id,mst_test.sub_id,mst_test.coaching_id,mst_test.test_name,mst_test.total_que,mst_test.duration FROM mst_test INNER JOIN mst_useranswer ON mst_test.test_id=mst_useranswer.testp_id WHERE mst_useranswer.user_id='$user_id'";

$queryrun = mysqli_query($conn, $sql_res);
$r = 1;
while($row=mysqli_fetch_array($queryrun))
{

	
$test_id = $row['test_id'];
$sub_id = $row['sub_id'];
$coaching_id = $row['coaching_id'];
$test_name = $row['test_name'];
$total_que = $row['total_que'];
$duration = $row['duration'];

?>
<!-- TO DO List -->
<!-- TO DO List -->

<li>
<div class="row" style="margin-right: 0;">

<div class="col-md-3">
<?php if(!$r){echo "----";}else{echo $r;} ?>

<!-- Emphasis label -->
</div>

<div class="col-md-3">
<?php if(!$test_name){echo "----";}else{echo $test_name;} ?>

<!-- Emphasis label -->
</div>

<div class="col-md-3">
<?php echo "<a href='view_test?test_id=$test_id&sub_id=$sub_id&coaching_id=$coaching_id'>View Result</a>"; ?>

</div>
</div>
</li>


<?php 
$r++;
} 

?>                    
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
