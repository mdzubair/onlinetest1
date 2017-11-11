<?php @session_start(); 
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

<script type="text/javascript">
function autoload(str){

$('#get_question').load('get-question.php?id='+str);
}
</script>
<script type="text/javascript">
function deletequestion(str1){

var id=str1.split(":");
var f=id[0];
var t=id[1];
$.ajax({
url: 'dlt-ques.php',
type: 'POST',
data: { id: t },
success:function(response){
$('.modal').modal('hide');
$('.modal-backdrop').hide();
$("body").removeClass("modal-open");

$('#get_question').load('get-question.php?id='+f);
$("body").css("padding-right", "0px");
}
});

}
</script>
<script type="text/javascript">
function updatep(stro)
{

var a1="id"+stro;
//alert(a1);
var b1=document.getElementById(a1).value;
//alert(b1);
var formData = new FormData($('#form'+stro)[0]);

$.ajax({
url: "update-ques.php",
type: "POST",
data:  formData,
contentType: false,
cache: false,
processData:false,

success: function(response)
{
$('.modal').modal('hide');
$('.modal-backdrop').hide();
$("body").removeClass("modal-open");
$('#get_question').load('get-question.php?id='+b1);
$("body").css("padding-right", "0px");	
},
error: function(e) 
{

} 	        
});

}
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
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Update Question Paper </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">
<div class="row myleadc">
<div class="col-md-12 myleads">
<form>

<h2>Select a Test Paper to change Your Question Paper</h2>	
<h2><select class="form-control" id="test_nam" name="test_nam" style="width:200px;" onchange="autoload(this.value);">
<option  value=''>Select A Test Paper</option>;
<?php

$get_blog_details1 = "SELECT mst_test.test_name , mst_test.test_id , mst_subject.sub_name FROM mst_test INNER JOIN mst_subject ON mst_test.sub_id = mst_subject.sub_id ORDER BY mst_test.sub_id DESC";
$run_blog1 = mysqli_query($conn, $get_blog_details1);
while($row_blog = mysqli_fetch_array($run_blog1)){
$test_id = $row_blog['test_id'];
$test_name = $row_blog['test_name'];
$subject_name = $row_blog['sub_name'];
echo "<option  value='$test_id'> $test_name [$subject_name]</option>";
} ?>
</select></h2>
</form>
</div>
<script>
$('#test_nam').on('change', function() {
document.getElementById("test_nam1").value =  $(this).val();
$('#myModal').modal('toggle');
});
</script>

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
<div id="get_question">
<div class="box box-primary">
<div class="box-header">
<i class="ion ion-clipboard"></i>
<h3 class="box-title">Total Question</h3>
</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list" style="    overflow-x: hidden;">
<li>
<div class="row"><div class="col-sm-12">  <span class="handle">
<i class="fa fa-ellipsis-v"></i>
<i class="fa fa-ellipsis-v"></i>
</span>
<!-- checkbox -->
<!-- todo text -->
<span class="text">List of question will be here!!!</span>
<!-- Emphasis label -->
<small class="label label-success" style="float: right;"><i class="fa fa-clock-o"></i> Ist </small>
<!-- General tools such as edit or delete--></div></div> 
<!-- drag handle -->

</li>




</ul>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
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
