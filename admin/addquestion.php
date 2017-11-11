<?php @session_start(); 
include('function/session.php');
include ('function/db.php');
global $conn;
mysqli_set_charset($conn,'utf8');
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
<h3 class="box-title">Add Question Paper </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->



<div class="box-body">
<div class="row myleadc">
<div class="col-md-12 myleads">
<form>
<h2>Select a Test Paper to upload Your Question Paper</h2>	
<h2><select class="form-control" id="test_nam" name="test_nam" style="width:200px;">
<option  value=''>Select A Test Paper</option>;
<?php

//$get_blog_details1 = "SELECT mst_test.test_name , mst_test.test_id , mst_subject.sub_name FROM mst_test INNER JOIN mst_subject ON mst_test.sub_id = mst_subject.sub_id ORDER BY mst_test.sub_id DESC";
$get_blog_details1 = "SELECT mst_test.test_name , mst_test.test_id , mst_subject.sub_name , mst_user.user_name FROM mst_test INNER JOIN mst_subject ON mst_test.sub_id = mst_subject.sub_id INNER JOIN mst_user ON mst_test.coaching_id = mst_user.member_id ORDER BY mst_test.sub_id DESC ";

$run_blog1 = mysqli_query($conn, $get_blog_details1);
while($row_blog = mysqli_fetch_array($run_blog1)){
$test_id = $row_blog['test_id'];
$test_name = $row_blog['test_name'];
$subject_name = $row_blog['sub_name'];
$coaching_name = $row_blog['user_name'];
echo "<option  value='$test_id'> $test_name [$subject_name][$coaching_name]</option>";
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog" style>
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h3 class="modal-title" id="myModalLabel">Read Carefully</h3>
</div>
<div class="container">
<h4>Question Paper Uploding Instruction</h4>
<ol>
<li class="text-justify">
<table class="table">
<tr><th>A</th><th>B</th><th>C</th><th>D</th><th>F</th><th>G</th></tr>
<tr><td>Your First Question Must be Here </td>
<td>ans11</td><td>ans12</td><td>ans13</td><td>ans14</td><td>right ans must be in digit (1)</td></tr>
<tr><td>Your Second Question Must be Here </td><td>ans21</td><td>ans22</td><td>ans23</td><td>ans24</td><td>right ans must be in digit (2)</td></tr>
<tr><td>Your Third Question Must be Here </td><td>ans31</td><td>ans32</td><td>ans33</td><td>ans34</td><td>right ans must be in digit (3)</td></tr>
<tr><td>and so on ...</td><td>and so on ...</td><td>and so on ...</td><td>and so on ...</td><td>and so on ...</td><td>and so on ...</td></tr>
</table>
</li>
<li class="text-justify">
Your Excel Sheet Must be in above formate
</li>
<li class="text-justify">
Download the formate <a href="msallen.xlsx" target="_blank">click here</a><br/>
Open in new tab image <a href="exelsheet.png" target="_blank">click here</a>
</li>
</ol>					
<button type="close" class="btn btn-primary" data-dismiss="modal">Let Me Upload</button>
<br/>
<br/>
</div>
</div>
</div>
</div>



<div class="col-md-12 myleads uploding">
<form name="import" method="post" enctype="multipart/form-data">
<div class="col-md-6">
<span class="pull-left">Upload Your Question Paper</span>
</div>
<div class="col-md-6">
<input type="file" name="file" class="form-control" accept=".xls,.xlsx,.jpeg,.jpg" required="true" />
</div>
<div class="col-md-12">
<input type="hidden" id="test_nam1" name="test_nam1" />
<input type="submit" name="addquestionpaper" class="btn btn-primary" value="Upload" />
</div>
</form>	
</div>
</div>	
</div>	

<?php 
if(isset($_POST["addquestionpaper"]))
{
$test_id = $_POST['test_nam1'];
if(!$test_id)
{
echo "<span class='text-red'>First Select Subject!</span>";
}
else
{
if (isset($_FILES['file'])) 
{

require_once "msallenexcel.php"; 

$xlsFile = $_FILES['file']['tmp_name'];

$xlsx = new SimpleXLSX( $_FILES['file']['tmp_name'] ); 
list($cols,) = $xlsx->dimension(); 
foreach($xlsx->rows() as $k => $r) {
	
$que_name =  ( (isset($r[0])) ? $r[0] : '&nbsp;' );

$strFindMe="$$";
 $result = strpos($que_name,$strFindMe);
  if($result !== false){
	  $que_name=addslashes($que_name);
  }

$ans1 =  ( (isset($r[1])) ? $r[1] : '&nbsp;' );

$result1 = strpos($ans1,$strFindMe);
  if($result1 !== false){
	  $ans1=addslashes($ans1);
  }
$ans2 =  ( (isset($r[2])) ? $r[2] : '&nbsp;' );
$result2 = strpos($ans2 ,$strFindMe);
  if($result2 !== false){
	  $ans2=addslashes($ans2);
  }
$ans3 =  ( (isset($r[3])) ? $r[3] : '&nbsp;' );
$result3 = strpos($ans3 ,$strFindMe);
  if($result3 !== false){
	  $ans3=addslashes($ans3);
  }
$ans4 =  ( (isset($r[4])) ? $r[4] : '&nbsp;' );
$result4 = strpos($ans4 ,$strFindMe);
  if($result4 !== false){
	  $ans4=addslashes($ans4);
  }
$rightque =  ( (isset($r[5])) ? $r[5] : '&nbsp;' );
$que_hindi =  ( (isset($r[6])) ? $r[6] : '&nbsp;' );
$result5 = strpos($que_hindi,$strFindMe);
  if($result5 !== false){
	  $que_hindi=addslashes($que_hindi);
  }


$opta_hindi =  ( (isset($r[7])) ? $r[7] : '&nbsp;' );
$result6 = strpos($opta_hindi,$strFindMe);
  if($result6 !== false){
	  $opta_hindi=addslashes($opta_hindi);
  }
$optb_hindi =  ( (isset($r[8])) ? $r[8] : '&nbsp;' );
$result7 = strpos($optb_hindi,$strFindMe);
  if($result7 !== false){
	  $optb_hindi=addslashes($optb_hindi);
  }
$optc_hindi =  ( (isset($r[9])) ? $r[9] : '&nbsp;' );
$result8 = strpos($optc_hindi,$strFindMe);
  if($result8 !== false){
	  $optc_hindi=addslashes($optc_hindi);
  }
$optd_hindi =  ( (isset($r[10])) ? $r[10] : '&nbsp;' );
$result9 = strpos($optd_hindi,$strFindMe);
  if($result9 !== false){
	  $optd_hindi=addslashes($optd_hindi);
  }
 


$sql = mysqli_query($conn ,"insert into mst_question(test_id,que_name,ans1,ans2,ans3,ans4,trueans,que_hindi,opta_hindi,optb_hindi,optc_hindi,optd_hindi)values('$test_id','$que_name','$ans1','$ans2','$ans3','$ans4','$rightque','$que_hindi','$opta_hindi','$optb_hindi','$optc_hindi','$optd_hindi')");

}
if($sql == 1)
{
echo "Your Test Paper Set Successfully !";
}
else
{
echo "Your Test Paper NOT Set!";
}	
}
} 
}

?>




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
<h3 class="box-title">Tips...</h3>
</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list">
<li>
<!-- drag handle -->
<span class="handle">
<i class="fa fa-ellipsis-v"></i>
<i class="fa fa-ellipsis-v"></i>
</span>
<!-- checkbox -->
<!-- todo text -->
<span class="text">Look at each page of your website and all landing pages, and decide if it would be clear to a prospect what his next step should be.</span>
<!-- Emphasis label -->
<small class="label label-success"><i class="fa fa-clock-o"></i> Ist </small>
<!-- General tools such as edit or delete-->
</li>



<li>
<span class="handle">
<i class="fa fa-ellipsis-v"></i>
<i class="fa fa-ellipsis-v"></i>
</span>
<span class="text">Focus on your targets, implement strategic programs, and measure the results to know where you should continue your efforts.</span>
<small class="label label-success"><i class="fa fa-clock-o"></i> 2nd</small>
</li>
<li>
<span class="handle">
<i class="fa fa-ellipsis-v"></i>
<i class="fa fa-ellipsis-v"></i>
</span>
<span class="text">This is one of the most important lead generation tips. Social Media is here to stay. Gone are the days of relying on your website and SEO alone to drive traffic to your site.</span>
<small class="label label-success"><i class="fa fa-clock-o"></i> 3rd</small>
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
