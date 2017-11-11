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
<?php
$test_name = $_GET['test_name'];
$sub_name = $_GET['sub_name'];
?>
<h3 class="box-title">Test Name : <?php echo $test_name; ?> AND Subject Name : <?php echo $sub_name; ?></h3> <span class="pull-right">

<small>
<a href="index" class="btn btn-info btn-xs">
<i class="fa fa-arrow-left"></i> Back to My Dashboard</a>
</small>
</span>
</div><!-- /.box-header -->
<div class="box-body">

<?php
if(isset($_GET['test_id']) || isset($_GET['sub_id'])|| isset($_GET['coaching_id']) || isset($_GET['test_name']) || isset($_GET['sub_name']))
{
$test_id = $_GET['test_id'];
$sub_id = $_GET['sub_id'];
$coaching_id = $_GET['coaching_id'];
$test_name = $_GET['test_name'];
$sub_name = $_GET['sub_name'];
//$memberid = substr($memberid1,4);

}
else
{
$test_id = "";
$sub_id = "";
$coaching_id = "";
$test_name = "";
$sub_name = "";
//$memberid = "";
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
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->
<div class="col-md-1">
No.
</div>
<div class="col-md-2">
Student Name
</div>
<div class="col-md-2">
Coaching Name
</div>
<div class="col-md-2">
Total Question
</div>
<div class="col-md-2">
Attempt Question
</div>
<div class="col-md-2">
view result
</div>
</div>
</li>

<?php 

/*---------count total question by check test id-------------*/

$questions = mysqli_query($conn, "SELECT * FROM mst_question WHERE test_id='$test_id'");
$count_question = mysqli_num_rows($questions);

/*----------- get result from mst_useranswer and add student-------------*/

$get_result = "SELECT DISTINCT addstudent.student_name, mst_user.user_name, mst_useranswer.user_id, mst_useranswer.testp_id, mst_useranswer.sub_id FROM mst_useranswer INNER JOIN addstudent ON mst_useranswer.user_id=addstudent.id INNER JOIN mst_user ON mst_user.member_login=addstudent.coaching_id WHERE mst_useranswer.testp_id='$test_id' AND mst_useranswer.sub_id='$sub_id'";                 

$memb = $conn->query($get_result);

$numberc = 1;
while($rows = $memb->fetch_assoc())
{
$student_name = $rows['student_name'];
$user_name = $rows['user_name'];
$user_id = $rows['user_id'];
$testp_id = $rows['testp_id'];
$sub_id1 = $rows['sub_id'];

/*-------------atmpt question-----------*/

$attempt = mysqli_query($conn, "SELECT answer FROM mst_useranswer WHERE user_id='$user_id' AND testp_id='$testp_id' ANd sub_id='$sub_id1'");
$atmp_rows = mysqli_num_rows($attempt);

?>
<li>
<div class="row" style="margin-right: 0;">
<div class="col-md-1">
<?php echo $numberc ; ?>
</div>
<div class="col-md-2">
<?php echo $student_name ; ?>
</div>
<div class="col-md-2">
<?php echo $user_name ; ?>
</div>
<div class="col-md-2">
<?php echo $count_question; ?>
</div>
<div class="col-md-2">
<?php echo $atmp_rows; ?>
</div>
<div class="col-md-2">
<?php echo "<a href='student_result?test_id=$testp_id&sub_id=$sub_id1&user_id=$user_id&student_name=$student_name&test_name=$test_name&sub_name=$sub_name'><i class='fa fa-gear'></i> View Result</a>"; ?>

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