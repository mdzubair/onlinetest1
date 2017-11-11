<?php @session_start(); 
include('function/session.php');
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
<h3 class="box-title">Search a Student </h3> <span class="pull-right"><a href="index" class="pull-right btn-xs btn-info" style=" cursor: pointer">Go Back to Dashboard</a></span>
</div><!-- /.box-header -->
<div class="box-body">
<div class="row myleadhs">
<div class="col-md-12 myleads">
Search a Student Here
</div>
</div>	
<form>
<div class="row myleadc1">
<div class="col-md-4 myleads myleadh">
Search Student By Name or ID:
</div>	
<div class="col-md-8 myleads">
<input type="search" class="form-control" id="searchmember" placeholder="Enter Member Name or ID" />
<div id="result"></div>
</div>
</div>
</form>


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
<div class="box box-primary">
<div class="box-header">
<i class="ion ion-clipboard"></i>
<h3 class="box-title">All Student</h3>
<span class="pull-right text-success">
<?php if(isset($_SESSION['profileupdate'])){
echo $_SESSION['profileupdate'];
unset($_SESSION['profileupdate']);
}?>

</span>

</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list" style="max-height:300px;overflow-y: scroll">
<li>
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->
<div class="col-md-1">

</div>
<div class="col-md-2">
Student Name
</div>
<div class="col-md-2">

Student Email
</div>
<div class="col-md-2">

View Student
</div>
<div class="col-md-2">

Edit Student
</div>
</div>
</li>

<?php
include ('function/db.php');
global $conn;

$sql_res = "SELECT * FROM addstudent order by id";
$queryrun = mysqli_query($conn, $sql_res);
while($row=mysqli_fetch_array($queryrun))
{
$stu_id = $row['student_id'];
$s_name = $row['student_name'];
$s_email = $row['email'];
$s_phone = $row['phone'];
$s_pics = $row['stu_pic'];
$s_attampts = $row['test_amt'];
?>
<!-- TO DO List -->
<!-- TO DO List -->

<li>
<div class="row" style="margin-right: 0;">
<!-- drag handle -->
<div class="col-md-1">

<?php if(!$s_pics){echo "Image Not Available";}else{echo "<img src='$s_pics' width='25' height='25' />";} ?>

<!-- checkbox -->
<!-- todo text -->
</div>
<div class="col-md-2">
<?php if(!$s_name){echo "----";}else{echo $s_name;} ?>

<!-- Emphasis label -->
</div>
<div class="col-md-2">
<?php if(!$s_email){echo "----";}else{echo $s_email;} ?>

</div>
<div class="col-md-2">
<?php echo "<a href='s_profile?d=$stu_id&member=$s_name'>View Profile</a>"; ?>

</div>
<div class="col-md-2">
<?php echo "<a href='edit_student?d=$stu_id&member=$s_name'>Edit Profile</a>"; ?>

</div>
</div>
</li>


<?php } ?>                    
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
<script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
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
url: "s_search.php",
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
</script>