<?php @session_start(); 
include('function/session.php');
include('function/db.php');
?>
<!DOCTYPE html>
<?php
$test_id = $_GET['test_id'];
$test_name = $_GET['test_name'];
$sub_id = $_GET['sub_id'];
/*------------check user id and test id exists or not in mst_useranswer table------*/

$check_test_atm = mysqli_query($conn, "SELECT * FROM mst_useranswer WHERE testp_id='$test_id' AND user_id='$user_id'");
$rows = mysqli_num_rows($check_test_atm);

if($rows<=0)
{	

?>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!--<script type="text/javascript">
/*--------------------count time in seconds-------------------*/

function countdown() {
var i = document.getElementById('counter');
if (parseInt(i.innerHTML)<=0) {
location.href = 'add_answer.php?test_id=<?php //echo $test_id;?>&test_name=<?php //echo $test_name;?>';
}
i.innerHTML = parseInt(i.innerHTML)-1;
}
setInterval(function(){ countdown(); },1000);
</script>-->

<script>
function exefunction()
{

if(document.getElementById("check").checked)
{

window.location = 'add_answer.php?test_id=<?php echo $test_id;?>&test_name=<?php echo $test_name;?>&sub_id=<?php echo $sub_id;?>';

}
else
{
alert('please accept terms and conditions before proceeding');	
}	


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
</h1>
<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="online_test"> Online Test</a></li>

<li class="active"> Instruction</li>
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
<h2 class="box-title">Instructions</h2>
<!--<h2>Duration : <span id="counter">20</span> second(s).</h2>-->

</div><!-- /.box-header -->
<div class="box-body">
<h2 style="text-align:center;">Please read the instructions carefully </h2>

<h2>1. General Instructions :</h2>

<div>
<!--<p>1.1. Duration of examination is 50 second per question.</p>-->
<p>1.1. Duration of examination is 30 minutes per test.</p>
<p>1.2. The clock will be set at the server. The countdown timer in the top right corner of screen will display the remaining time available for you to complete the examination. When the timer reaches zero, the examination will end by itself. You will not be required to end or submit your examination.</p>
<p>1.3. The Question Palette displayed on the right side of screen will show the status of each question using one of the following symbols: </p>
<p>1.4. You can click on the ">" arrow which appears to the left of question palette to collapse the question palette thereby maximizing the question window. To view the question palette again, you can click on "<" which appears on the right side of question window.</p>
</div>

<div>
<h2>2. Navigating to a Question:</h2>
<p>2.1. Click on the question number in the Question Palette at the right of your screen to go to that numbered question directly. Note that using this option does NOT save your answer to the current question.</p>
<p>2.2. Click on Save & Next to save your answer for the current question and then go to the next question.</p>
<p>2.3. Click on Mark for Review & Next to save your answer for the current question, mark it for review, and then go to the next question.</p>
</div>

<div>
<h2>3. Answering a Question : </h2>
<p>3. Procedure for answering a multiple choice type question: </p>
<p>3.1. To select your answer, click on the button of one of the options</p>
<p>3.2. To deselect your chosen answer, click on the button of the chosen option again or click on the Clear Response button</p>
<p>3.3. To change your chosen answer, click on the button of another option</p>
<p>3.4. To save your answer, you MUST SELECT an option given below.</p>
<p>3.5. To mark the question for review, click on the Mark for Review & Next button. If an answer is selected for a question that is Marked for Review, that answer will be considered in the evaluation. </p>
<p>3.6 Question plates of Yellow color is indicating SELECTED question.</p>
</div>



<div>
<p><input type="checkbox" name="check" value="chk" id="check"/> I have read and understood the instructions. All computer hardware allotted to me are in proper working condition. I declare that I am not in possession of / not wearing / not carrying any prohibited gadget like mobile phone, bluetooth devices etc. /any prohibited material with me into the Examination Hall.I agree that in case of not adhering to the instructions, I shall be liable to be debarred from this Test and/or to disciplinary action, which may include ban from future Tests / Examinations.</p>

</div>

<div>
<!--<a href="add_answer.php?test_id=<?php //echo $test_id; ?>&test_name=<?php //echo $test_name; ?>" class='next btn btn-info pull-right' type='button' onclick="exefunction()">I am ready to begin ></a>-->
<button class='next btn btn-info pull-right' onclick="exefunction()">I am ready to begin ></button>

</div>


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
<?php
}
else
{
?>	
<script type="text/javascript">
alert("already attempt this test !");
window.location.href = "online_test.php";
</script>
<?php	
}	
?>	
