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
<h3 class="box-title">All Result </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">





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
<div class="box box-primary <?php echo $hiddens ; ?>">
<div class="box-header">
<i class="ion ion-clipboard"></i>
<h3 class="box-title">Result...</h3>
</div><!-- /.box-header -->
<div id="demo"></div>
<div class="box-body">
<ul class="todo-list" style="max-height:300px;overflow-y: scroll">
<li>
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->
<div class="col-md-1">
No.
</div>
<div class="col-md-3">
Test Name
</div>
<div class="col-md-4">
Subject
</div>
<div class="col-md-3">
View Report
</div>
</div>
</li>

<?php 
/*------------------- get result from mst_test and mst_subject-------------------*/
                   
$get_result = "select mst_test.test_id,mst_test.test_name,mst_test.sub_id,mst_test.coaching_id,mst_subject.sub_name FROM mst_test INNER JOIN mst_subject WHERE mst_test.sub_id=mst_subject.sub_id";
$memb = $conn->query($get_result);
$numberc = 1;
while($rows = $memb->fetch_assoc())
{
$test_id = $rows['test_id'];
$sub_id = $rows['sub_id'];
$test_name = $rows['test_name'];
$sub_name = $rows['sub_name'];
$coaching_id = $rows['coaching_id'];
?>
<li>
<div class="row" style="margin-right: 0;">
<div class="col-md-1">
<?php echo $numberc ; ?>
</div>
<div class="col-md-3">
<?php echo $test_name ; ?>
</div>
<div class="col-md-4">
<?php echo $sub_name; ?>
</div>
<div class="col-md-3">
<?php //echo "<a href='result?p=$papername&s=$subname&m=$memberloginid1'><i class='fa fa-gear'></i> View Report</a>"; ?>
<?php echo "<a href='result?test_id=$test_id&sub_id=$sub_id&coaching_id=$coaching_id&test_name=$test_name&sub_name=$sub_name'><i class='fa fa-gear'></i> View Report</a>"; ?>

</div>
</div>
</li>


<?php $numberc = $numberc + 1 ; } ?>				
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
<!--<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
$(function(){
$("#searchmember").keyup(function() 
{ 
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
$.ajax({
type: "POST",
url: "search1.php",
data: dataString,
cache: false,
success: function(html)
{
$("#result").html(html).show();
}
});
}return false;    
});

jQuery("#result").live("click",function(e){ 
var $clicked = $(e.target);
var $name = $clicked.find('.name').html();
var decoded = $("<div/>").html($name).text();
$('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) { 
var $clicked = $(e.target);
if (! $clicked.hasClass("search")){
jQuery("#result").fadeOut(); 
}
});
$('#searchid').click(function(){
jQuery("#result").fadeIn();
});
});
</script>-->