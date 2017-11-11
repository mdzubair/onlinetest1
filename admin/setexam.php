<?php @session_start(); 
include ('function/db.php');
global $conn;
include('function/session.php');

?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<!------------ Including  jQuery Date UI with CSS -------------->
<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js">
</script>
<script>
$(function(){
$( "#datepicker" ).datepicker();
//Pass the user selected date format
$( "#format" ).change(function() {
$( "#datepicker" ).datepicker( "option", "dateFormat", $(this).val() );
});
});

</script>

<script>

$(document).ready(function () {

$('#coaching_nam').change(function () {

var selectVal2 = $('#coaching_nam :selected').val();

var dataString='selectVal2='+ selectVal2 ;

$.ajax({
url: 'subject_ajax.php',

async: false,
type: "POST",
data:dataString,

success: function(data) {
$('#brand').html(data);
}
})
});
});
</script>

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
<div class="col-md-6">



<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Add Exam Subject </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">
<div class="row">
<form action="function/function.php" method="post">
<div class="col-md-12" style="padding:0 20px;">

<div class="form-group">
<label>Coaching Name :</label> <span id="fir" class="danger"></span> <span id="sec" class="danger">*</span>
<!--<input type="text" class="form-control" name="coachingname" placeholder="Coaching Name" required="true" />-->

<select class="form-control" name="coachingname" required="true" >
<option  value=''>Select A Coaching</option>;
<?php

/*------------------------get coaching name-------------------*/

$get_coaching_details = "select * from mst_user ORDER BY member_id DESC";
$run_coaching = mysqli_query($conn, $get_coaching_details);

while($row = mysqli_fetch_array($run_coaching)){
$member_id1 = $row['member_id'];
$coaching_name1 = $row['user_name'];

echo "<option  value='$member_id1'> $coaching_name1 </option>";

} ?>
</select>


</div>

<div class="form-group">
<label>Exam Subject Name :</label> <span id="fir" class="danger"></span> <span id="sec" class="danger">*</span>
<input type="text" class="form-control" name="subjectsname" placeholder="Subject Name" required="true" />
</div><!-- /.form-group -->
<div class="form-group">
<input type="submit" class="btn btn-primary" name="addsubject" value="Add This" />
</div><!-- /.form-group -->

<!-- /.form-group -->
<!-- /.form-group -->

<div class="form-group">
<span class="query-success">
<?php if(isset($_SESSION['message_s'])){
echo $_SESSION['message_s'];
unset($_SESSION['message_s']);
}?></span><span class="text-danger">
<?php if(isset($_SESSION['wrongmessage_s'])){
echo $_SESSION['wrongmessage_s'];
unset($_SESSION['wrongmessage_s']);
}?></span>

</div>
</div>
</form>
</div>	

</div>
</div>
</div>
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
<h3 class="box-title">Recent Added Subjects</h3>
</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list" style="max-height:300px;overflow-y: scroll">
<li>
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->
<div class="col-md-1">

</div>
<div class="col-md-4">
Subject Name
</div>
<div class="col-md-4">
Coaching Name
</div>
</div>

</li>
<?php

/*------------------------------get subject name----------------------*/

//$get_blog_details = "select mst_subject.sub_id, mst_subject.sub_name, mst_coaching.coaching_name from mst_subject INNER JOIN mst_coaching ORDER BY sub_id DESC";

$get_blog_details = "select mst_subject.sub_id, mst_subject.sub_name, mst_user.user_name from mst_subject INNER JOIN mst_user ON mst_subject.coaching_id=mst_user.member_id";

$run_blog = mysqli_query($conn, $get_blog_details);

$number = 1;
while($row_blog = mysqli_fetch_array($run_blog)){
$sub_name = $row_blog['sub_name'];
$coaching_name = $row_blog['user_name'];
?>

<li>

<form method="post">
<div class="row" style="margin-right: 0;">
<!-- drag handle -->
<div class="col-md-1">
<?php echo $number ; ?>
</div>

<div class="col-md-4">
<?php echo $sub_name; ?>

</div>

<div class="col-md-4">
<?php echo $coaching_name ; ?>

</div>
</div>
</form>

</li>


<?php $number = $number + 1 ; 
} 

?>                    

</ul>





</div><!-- /.box-body -->





</div><!-- /.box -->

<!-- quick email widget -->

</section><!-- /.Left col -->
</div>

<div class="col-md-6">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Set A Test Paper </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">
<div class="row">
<form action="function/function.php" method="post">

<div class="col-xs-12 col-md-12">
<div class="form-group">
<label class="label3">Select A Coaching</label>
<select class="form-control" name="coaching_nam" id="coaching_nam" required="true" >
<option  value=''>Select A Coaching</option>;
<?php

/*------------------------get coaching name-------------------*/

$get_coaching_details = "select * from mst_user ORDER BY member_id DESC";
$run_coaching = mysqli_query($conn, $get_coaching_details);

while($row = mysqli_fetch_array($run_coaching)){
$member_id = $row['member_id'];
$coaching_name = $row['user_name'];

echo "<option  value='$member_id'> $coaching_name </option>";

} ?>
</select>
</div>
</div>


<div class="col-xs-12 col-md-12">
<div class="form-group" id="brand">


</div>
</div>

<div class="col-xs-10 col-md-12">
<div class="form-group">
<label class="label3">Enter Test Name</label>
<input class="form-control" name="test-name" placeholder="Test Name" type="text" required="true" />
</div>
</div>

<div class="col-xs-10 col-md-12">
<div class="form-group">
<label class="label3">Select Date</label>
<input class="form-control" name="test-date" placeholder="" type="text" id="datepicker" required="true" />
</div>
</div>

<div class="col-xs-2 col-md-6">
<div class="form-group">
<label class="label3">Questions No</label>
<input class="form-control" name="test-no" placeholder="No of Question" type="text" required="true" />
</div>
</div>

<div class="col-xs-2 col-md-6">
<div class="form-group">
<label class="label3">Exam Time</label>
<input class="form-control" name="test-time" placeholder="Exam Time" type="text" required="true" />
</div>
</div>	

<div class="col-xs-12 col-md-12">
<div class="form-group">
<input class="btn btn-primary" name="setAtest" type="submit" value=" Add a Test " required />
</div>
<div class="form-group">
<span class="query-success">
<?php if(isset($_SESSION['message_t'])){
echo $_SESSION['message_t'];
unset($_SESSION['message_t']);
}?></span><span class="query-error">
<?php if(isset($_SESSION['wrongmessage_t'])){
echo $_SESSION['wrongmessage_t'];
unset($_SESSION['wrongmessage_t']);
}?></span>

</div>
</div>
</form>
</div>

</div>
</div>
</div>
<!-- Left col -->

<form method="post">

<section class="col-lg-12 connectedSortable">
<div class="box box-primary">
<div class="box-header">
<i class="ion ion-clipboard"></i>
<h3 class="box-title">Recently Added Test Paper</h3>
</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list" style="max-height:300px;overflow-y: scroll">
<li>
<div class="row" style="margin-right: 0;color:#0F9646;">
<!-- drag handle -->
<div class="col-md-1">

</div>
<div class="col-md-2">
Test Name
</div>
<div class="col-md-2">
Subject Name
</div>
<div class="col-md-2">
Date
</div>
<div class="col-md-2">
Total Questions
</div>

<div class="col-md-2">
Delete 
</div>
</div>
</li>
<?php


$get_blog_details1 = "SELECT mst_test.test_name , mst_test.date , mst_test.total_que , mst_test.test_id , mst_subject.sub_name FROM mst_test INNER JOIN mst_subject ON mst_test.sub_id = mst_subject.sub_id ORDER BY mst_test.sub_id DESC";
$run_blog1 = mysqli_query($conn, $get_blog_details1);
$number1 = 1;

while($row_blog1 = mysqli_fetch_array($run_blog1)){
$test_name = $row_blog1['test_name'];
$subject_name = $row_blog1['sub_name'];
$test_question = $row_blog1['total_que'];
$test_id = $row_blog1['test_id'];
$date = $row_blog1['date'];
?>


<li>
<div class="row" style="margin-right: 0;">
<!-- drag handle -->
<div class="col-md-1">
<?php echo $number1 ; ?>
</div>
<div class="col-md-2">
<?php echo $test_name ; ?>
</div>
<div class="col-md-2">
<?php echo $subject_name ; ?>
</div>
<div class="col-md-2">
<?php echo $date ; ?>
</div>
<div class="col-md-2">
<?php echo $test_question ; ?>
</div>
<div class="col-md-2">
<!--<input class="btn btn-primary" name="delete" type="submit" value="Delete Test" onclick="return confirm('Are you sure want to delete this test?')"/>-->
<a class="btn btn-primary" href="delete_test.php?id=<?php echo $test_id;?>" onclick="return confirm('Are you sure want to delete this test?')">DELETE</a>
</div>
</div>
</li>
<?php $number1 = $number1 + 1 ; } ?>                    
</ul>
</div><!-- /.box-body -->
</div><!-- /.box -->
</section><!-- /.Left col -->

</form>

</div>
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
