<?php 
@session_start(); 
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
</h1>
<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li><a href="test_result">Result</a></li>
<li><a href="view_test?test_id=<?php echo $_GET['test_id'];?>&sub_id=<?php echo $_GET['sub_id'];?>&coaching_id=<?php echo $_GET['coaching_id'];?>">View Test</a></li>
<li class="active">Correct Answer</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->


<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Correct Answers</h3>
<h2>Test Name  :  <?php echo $_GET['test_name']; ?></h2>	
</div><!-- /.box-header -->



<div class="box-body">
<div class="row myleadc">
<div class="col-md-12 myleads">

<form method="post">

<!----------------------- get questions and answers from mst_question------------------>

<?php
$test_name = $_GET['test_name'];
$test_id = $_GET['test_id'];
$get_question="select * from mst_question WHERE test_id='".$test_id."'";
$query=mysqli_query($conn,$get_question);

$rows = mysqli_num_rows($query);

$i=1;
while($row=mysqli_fetch_assoc($query))
{	
$id = $row['que_id'];
$q = $row['que_name'];
$a1 = $row['ans1'];
$a2 = $row['ans2'];
$a3 = $row['ans3'];
$a4 = $row['ans4'];
$trueans = $row['trueans'];
$ans1 = '1';
$ans2 = '2';
$ans3 = '3';
$ans4 = '4';

?>
<div id="question<?php echo $i;?>" class='cont'>
<!--<h2>Q. <?php //echo $q;?></h2>-->
<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $q; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{
?>
<h2>Q.<?php echo $i;?>  <img src="../admin/<?php echo $q;?>" alt="" height="120" width="120"> </h2>

<?php
}
}
else
{	
?>
<h2>Q. <?php echo $q;?></h2>
<?php
}
?>

<?php
if($ans1 == $trueans)
{	
?>
<h2>(A)   <input type="radio" name="a1" value='1' id='radio1_<?php echo $row['que_id'];?>'/> <label style="color:green;"> <?php echo $a1;?> </label> </h2>
<?php
}
else
{
?>
<h2>(A)   <input type="radio" name="a1" value='1' id='radio1_<?php echo $row['que_id'];?>'/> <label> <?php echo $a1;?> </label> </h2>
<?php
}
if($ans2 == $trueans)
{		
?>
<h2>(B)   <input type="radio" name="a1" value='2' id='radio1_<?php echo $row['que_id'];?>'/> <label style="color:green;"> <?php echo $a2;?> </label> </h2>
<?php
}
else
{
?>
<h2>(B)   <input type="radio" name="a1" value='2' id='radio1_<?php echo $row['que_id'];?>'/> <label> <?php echo $a2;?> </label> </h2>
<?php
}	
if($ans3 == $trueans)
{	
?>
<h2>(C)   <input type="radio" name="a1" value='3' id='radio1_<?php echo $row['que_id'];?>'/> <label style="color:green;"> <?php echo $a3;?> </label> </h2>
<?php
}
else
{
?>
<h2>(C)   <input type="radio" name="a1" value='3' id='radio1_<?php echo $row['que_id'];?>'/> <label> <?php echo $a3;?> </label> </h2>
<?php
}	
if($ans4 == $trueans)
{	
?>
<h2>(D)   <input type="radio" name="a1" value='4' id='radio1_<?php echo $row['que_id'];?>'/> <label style="color:green;"> <?php echo $a4;?> </label></h2>
<?php
}
else
{
?>
<h2>(D)   <input type="radio" name="a1" value='4' id='radio1_<?php echo $row['que_id'];?>'/> <label> <?php echo $a4;?> </label></h2>
<?php
}	
?>
</div>
<?php
$i++;
}
?>
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
