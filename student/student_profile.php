<?php 
@session_start(); 
include('function/session.php');
include('function/db.php');
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

<script>
function readURL(input) {
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
$('#blah')
.attr('src', e.target.result)
.width(100)
.height(100);
};

reader.readAsDataURL(input.files[0]);
}
}

</script>

</head>



<?php


if(isset($_POST['submit']))
{
$student_id = $user_id;	

$name=$_POST['stu_name'];
$phone=$_POST['phone'];

if(!empty($_FILES['file']['name']))
{
$file_name = $_FILES['file']['name'];
$file_tmp =$_FILES['file']['tmp_name'];
$data = "images/".$file_name;
move_uploaded_file($file_tmp,"images/".$file_name);
}
else
{
$get_student_pic = mysqli_query($conn, "SELECT * FROM addstudent WHERE id='$user_id'"); 
$student_pic = mysqli_fetch_array($get_student_pic);

$data = $student_pic['stu_pic'];

}	

/*------------------update student profile--------------*/
	
$update_profile="UPDATE `addstudent` SET student_name='$name', phone='$phone', stu_pic='$data' WHERE id='$user_id'";

$res= mysqli_query($conn,$update_profile);

if($res==1)
{
$mes= "Your Profile Updated Successfully !";
}
else
{
$mes= "Your Profile Not Updated !";
}	
}
?>


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
<li><a href="profile.php"> Student Profile</a></li>
<li class="active">Edit Profile</li>
</ol>
</section>




<!-- Main content -->
<section class="content">



<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"></h3> 
</div><!-- /.box-header -->
<div class="box-body">

<div id="gid" class="text-center">
<h4>

</h4>
</div>

<?php if(isset($mes)) { echo $mes; }?>

<div class="login-box" style="background-color:#3C8DBC;color:#FFF;">
<div class="login-logo">
<a href="" style="color:#FFF;"><b>Edit Your Profile</b></a>
</div><!-- /.login-logo -->
<div class="login-box-body" style="background-color:#ECF0F5;">

<?php
/*-------------get student detail------------------*/

$get_student = mysqli_query($conn, "SELECT addstudent.email, addstudent.student_name, addstudent.phone, addstudent.stu_pic, mst_user.user_name FROM addstudent INNER JOIN mst_user ON addstudent.coaching_id=mst_user.member_login WHERE addstudent.id='$user_id'"); 
$student_data = mysqli_fetch_array($get_student);
$name = $student_data['student_name'];
$email = $student_data['email'];
$phone = $student_data['phone'];

$stu_pic = $student_data['stu_pic'];
$user_name = $student_data['user_name'];
?>

<form method="post" enctype="multipart/form-data">

<div class="form-group has-feedback">
<input type="text" class="form-control" name="stu_name" value="<?php echo $name;?>" required />
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="email" value="<?php echo $email;?>"  readonly/>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="phone" value="<?php echo $phone;?>" required />
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="test_atm" value="<?php echo $user_name;?>" readonly/>
</div>

<div class="form-group has-feedback">
<img src="<?php echo $stu_pic;?>" width="100" height="100" id="blah"/>
</div>


<div class="form-group has-feedback">
<input type="file" class="form-control" name="file" value="" onchange="readURL(this);"/>
</div>

<div class="row">
<div class="col-xs-7 pull-right">
<input class="btn btn-primary" type="submit"  name="submit" value="Update"/>
</div><!-- /.col -->
<!--<div class="col-xs-5 pull-right">
<button class="btn btn-info pull-right" type="reset">Reset</button>
</div>--><!-- /.col -->
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
