<?php @session_start(); 
include('function/session.php');
include('function/db.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>OnlineTest.com</title>
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
<li class="active">Change Password</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
</div><!-- /.box-header -->
<div class="box-body">

<?php
/*-------------------------change password from add student table-----------*/

if(isset($_POST['changepassword']))
{	
$current_pass = $_POST['currentpass'];
$new_pass1 = $_POST['newpass1'];
$new_pass2 = $_POST['newpass2'];

/*-------------------get password from addstudent table---------------*/

$password  = "select * from addstudent where password='$current_pass' AND id='$user_id'";

$pass_query = mysqli_query($conn ,$password);
$rows = mysqli_num_rows($pass_query);

if($rows<=0)
{
echo "Your entered pasword is wrong";
}	

elseif($new_pass1 != $new_pass2)
{
echo "Confirm password not match to the new password";	
}

else
{
/*-------------------update password----------------------*/	
	
$update_password = "UPDATE `addstudent` SET password='$new_pass1' WHERE id='$user_id'";

$update_query = mysqli_query($conn,$update_password);

if($update_query>0)
{
echo "Password Change Successfully !";
}	
}

}
?>

<div class="login-box" style="background-color:#3C8DBC;color:#FFF;">
<div class="login-logo">
<a href="" style="color:#FFF;"><b>Change Your Password </b></a>
</div><!-- /.login-logo -->
<div class="login-box-body" style="background-color:#ECF0F5;">
<!--<p class="login-box-msg">Change Your Password Here</p>-->

<form method="post">
<div class="form-group has-feedback">
<input type="password" class="form-control" name="currentpass" placeholder="Current Password" required/>

<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" name="newpass1" placeholder="New Password" required/>
<span class="form-control-feedback"><i class="fa fa-key"></i></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" name="newpass2" placeholder="Confirm Password" required/>
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="row">
<div class="col-xs-7">
<input type="submit" class="btn btn-success" name="changepassword" value="Change Password" />
</div><!-- /.col -->
<div class="col-xs-5">
<a href="index" class="btn btn-info pull-right"> <i class="fa fa-arrow-circle-left"></i> Back</a>
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
