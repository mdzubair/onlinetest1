<?php 
@session_start(); 
include('function/session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>
<?php include('include/links.php'); ?>
<link rel="shortcut icon" href="dist/img/icon.png">
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
<li><a href="search-member.php"><i class=""></i> Manage coaching</a></li>
<li class="active">Edit Coaching</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Edit Coaching Member</h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">

<div id="gid" class="text-center">
<h4>

</h4>
</div>



<?php
include('function/db.php');
$member_id = $_GET['member_id'];	
if(isset($_POST['submit']))
{
$member_id = $_GET['member_id'];

$cname=$_POST['memb_name'];
$cemail=$_POST['memb_email'];
$cphone=$_POST['memb_phone'];
$cpass=$_POST['memb_pass'];
//$sql="INSERT INTO `mst_user`(`member_login`,`user_name`, `user_email`,`user_mobile`,`member_password`) VALUES ('$id','$cname','$cemail','$cphone','$cpass')";
$sql="UPDATE `mst_user` SET user_name='$cname', user_email='$cemail', user_mobile='$cphone', member_password='$cpass' WHERE member_login='$member_id'";

$res= mysqli_query($conn,$sql);

if($res==1)
{
$mes= "Coaching member update successfully";
echo $mes;
}
}
?>


<div class="login-box" style="background-color:#3C8DBC;color:#FFF;">
<div class="login-logo">
<a href="" style="color:#FFF;"><b>Coaching Member Edit</b></a>
</div><!-- /.login-logo -->
<div class="login-box-body" style="background-color:#ECF0F5;">

<?php
/*-------------get coaching member detail------------------*/

$get_coaching = mysqli_query($conn, "SELECT * FROM mst_user WHERE member_login='$member_id'"); 
$coaching_data = mysqli_fetch_array($get_coaching);
$mem_pass = $coaching_data['member_password'];
$user_name = $coaching_data['user_name'];
$user_mobile = $coaching_data['user_mobile'];
$user_email = $coaching_data['user_email'];
?>

<form method="post">

<div class="form-group has-feedback">
<input type="text" class="form-control" name="memb_name" value="<?php echo $user_name;?>" required />
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="memb_email" value="<?php echo $user_email;?>"  required/>
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="memb_phone" value="<?php echo $user_mobile;?>" required />
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="memb_pass" value="<?php echo $mem_pass;?>" required />
<span class="form-control-feedback"><i class="fa fa-key"></i></span>
</div>

<div class="row">
<div class="col-xs-7">
<input class="btn btn-primary" type="submit"  name="submit" value="Update"/>
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
