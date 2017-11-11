<?php @session_start(); 
include('function/session.php');
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
<?php
include('function/db.php');
if(isset($_POST['submit']))
{
$date=date('dmy');
$t=time();
$id=$date+$t."-sid";
$coname=$_POST['chname'];
//$testamt=$_POST['tamt'];
$cname=$_POST['stub_name'];
$cemail=$_POST['stub_email'];
$cphone=$_POST['stub_phone'];
$cpass=$_POST['stub_pass'];
$file_name = $_FILES['file']['name'];
$file_tmp =$_FILES['file']['tmp_name'];
$data = "images/".$file_name;

$sql="INSERT INTO `addstudent`(`student_id`,`coaching_id`, `student_name`,`email`,`phone`,`password`,`stu_pic`) VALUES ('$id','$coname','$cname','$cemail','$cphone','$cpass','$data')";
move_uploaded_file($file_tmp,"../student/images/".$file_name);
$res= mysqli_query($conn,$sql);
if($res==1)
{
$fsql="select * from addstudent order by id desc limit 0,1";
$fres=mysqli_query($conn,$fsql);
$row=mysqli_fetch_assoc($fres);
$cid=$row['student_id'];
$pass=$row['password'];
$mes= "Coaching Student add successfully Added";
}
}
?>
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
<h3 class="box-title">Add Student </h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">

<div id="gid" class="text-center">
<h4>
<?php
if(isset($_POST['submit']))
{
echo "Your login id-".$cid."<br>";
echo "Your password-".$pass."<br>";
echo $mes;
}
?>
</h4>
</div>

<div class="login-box" style="background-color:#3C8DBC;color:#FFF;">
<div class="login-logo">
<a href="" style="color:#FFF;"><b>Coaching Student Add </b></a>
</div><!-- /.login-logo -->
<div class="login-box-body" style="background-color:#ECF0F5;">
<form method="POST" enctype="multipart/form-data">
<div class="form-group has-feedback">
<select style="    width: 100%;
height: 32px;
margin-bottom: 17px;" name="chname" required>
<option value="" hidden>Select Coaching center </option>
<?php
include('function/db.php');
$sql="select * from mst_user ";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($res))
{
?>
<option value="<?php echo $row['member_login'];?>"><?php echo $row['user_name'];?> </option>
<?php } ?>
</select>
<div/>
<div class="form-group has-feedback">
<!--<select style="    width: 100%;
height: 32px;
margin-bottom: 17px;" name="tamt" required>
<option value="" hidden>Test Attempt Student </option>
<option value="1" >one</option>
<option value="2" >two</option>
<option value="3" >three </option>
<option value="4" >four</option>
</select>-->
<div/>
<div class="form-group has-feedback">
<input type="text" class="form-control" name="stub_name" placeholder="Coaching Student Name" required />
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="stub_email" placeholder="Coaching Student email"  required/>
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control" name="stub_phone" placeholder="Coaching Student phone"required />
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>
<div class="form-group has-feedback">
<input type="text" class="form-control" name="stub_pass" placeholder="Coaching Student Password"required />
<span class="form-control-feedback"><i class="fa fa-key"></i></span>
</div>
<div class="form-group has-feedback">
<input type="file" name="file" id="file">

</div>

<div class="row">
<div class="col-xs-7">
<input class="btn btn-primary" type="submit"  name="submit"/>
</div><!-- /.col -->
<div class="col-xs-5 pull-right">
<button class="btn btn-info pull-right" type="reset">Reset</button>
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
<!-- Custom tabs (Charts with tabs)-->

<!-- Chat box -->
<!-- /.box (chat box) -->

<!-- TO DO List -->
<!-- TO DO List -->


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
