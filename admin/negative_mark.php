<?php @session_start(); 
include('function/session.php');
include('function/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); ?>

<style type="text/css">
.red{
display: none;
margin-top:20px;
}
.green{
margin-top:20px;
}
.radio1{width:50%;}
</style>

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
<h3 class="box-title">Add Negative Mark</h3> 
<span class="pull-right"><small>
<a href="index" class="btn btn-info btn-xs">
<i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">

<div id="gid" class="text-center">

</div>

<div class="login-box" style="background-color:#3C8DBC;color:#FFF;">
<div class="login-logo">
<a href="" style="color:#FFF;"><b>Negative Mark Add</b></a>
</div><!-- /.login-logo -->
<?php
/*-------------------get negative mark-----------------*/
if(isset($_POST['negative_mark']))
{	
$n_mark = $_POST['negative_marking'];

/*----------------select negative mark from negative mark table-----------*/

$get_mark = mysqli_query($conn, "SELECT negative_mark FROM negative_mark");
$count_row = mysqli_num_rows($get_mark);
if($count_row<=0)
{
$insert_mark = mysqli_query($conn, "INSERT INTO negative_mark(negative_mark) VALUES('$n_mark')");
if($insert_mark == 1)
{
echo '<script language="javascript">';
echo 'alert("Negative Marks add successfully !")';
echo '</script>';
}	
}	
else
{	
$update_marks = mysqli_query($conn, "UPDATE negative_mark SET negative_mark='$n_mark'");
if($update_marks==1)
{
echo '<script language="javascript">';
echo 'alert("Negative Marks add successfully !")';
echo '</script>';
}	
}
}
?>
<div class="login-box-body" style="background-color:#ECF0F5;">
<form method="POST">

<div class="form-group has-feedback">
<input type="text" class="form-control" name="negative_marking" placeholder="Negative Marks" />

</div>

<div class="row">
<div class="col-xs-7">
<!--<input class="btn btn-primary" type="submit"  name="submit"/>-->
</div><!-- /.col -->
<div class="col-xs-5 pull-right">
<input class="btn btn-primary" type="submit" name="negative_mark" value="Add"/>
</div><!-- /.col -->
</div>
</form>
</div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</div>
</div>
</div>
</div><!-- /.row -->
<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-12 connectedSortable">


</section><!-- /.Left col -->

<section class="col-lg-5 connectedSortable">

</div><!-- /.box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php include('include/footer.php'); ?>

<div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->

<?php include('include/links2.php'); ?>

<!-- jQuery 2.1.4 -->
</body>
</html>
