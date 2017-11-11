<?php @session_start(); 
include('function/session.php');
include('function/db.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); $num_rows = 1; ?>
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
<!--<small>Control panel<?php //echo $user_id;?></small>-->
</h1>
<!--<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Student Dashboard</li>
</ol>-->
</section>



<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-lg-3 col-xs-6">
<!-- small box -->

</div><!-- ./col -->

<div class="col-lg-3 col-xs-6">
<!-- small box -->
<!--<div class="small-box bg-green">
<div class="inner">
<h3><i class="fa fa-gears"></i></h3>
<p>Set Exam</p>
</div>
<div class="icon" style="color:#fff;">
<i class="fa fa-paste"></i>
</div>
<a href="setexam" class="small-box-footer">Set Now <i class="fa fa-arrow-circle-right"></i></a>
</div>-->
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<!--<div class="small-box bg-purple">
<div class="inner">
<h3><i class="fa fa-gears"></i></h3>
<p>Set Question Paper</p>
</div>
<div class="icon" style="color:#fff;">
<i class="fa fa-book"></i>
</div>
<a href="addquestion" class="small-box-footer">Set Now <i class="fa fa-arrow-circle-right"></i></a>
</div>-->
</div><!-- ./col -->
<div class="col-lg-3 col-xs-6">
<!-- small box -->
<!--<div class="small-box bg-teal">
<div class="inner">
<h3><i class="fa fa-gears"></i></h3>
<p>See all Result</p>
</div>
<div class="icon" style="color:#fff;">
<i class="fa fa-calendar"></i>
</div>
<a href="results" class="small-box-footer">See Now <i class="fa fa-arrow-circle-right"></i></a>
</div>-->
</div><!-- ./col -->
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable">
<!-- Custom tabs (Charts with tabs)-->

<!-- Chat box -->
<!-- /.box (chat box) -->



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
</div><!-- ./wrapper -->
<?php include('include/footer.php'); ?>
<!-- Control Sidebar -->

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>


<?php include('include/links2.php'); ?>

<!-- jQuery 2.1.4 -->
</body>
</html>
