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
<li><a href="search_student.php"><i class=""></i> Manage Student</a></li>
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
<h3 class="box-title">Edit Student Profile</h3> <span class="pull-right"><small><a href="index" class="btn btn-info btn-xs"><i class="fa fa-arrow-left"></i> Back to My Dashboard</a></small></span>
</div><!-- /.box-header -->
<div class="box-body">

<div id="gid" class="text-center">
<h4>

</h4>
</div>



<?php
include('function/db.php');
$student_id = $_GET['d'];	
if(isset($_POST['submit']))
{
$student_id = $_GET['d'];	

$stu_name = $_POST['stu_name'];
$stu_email = $_POST['stu_email'];
$stu_phone = $_POST['stu_phone'];
$stu_pass = $_POST['stu_pass'];

if(!empty($_FILES['file']['name']))
{
$file_name = $_FILES['stu_pic']['name'];
$file_tmp =$_FILES['stu_pic']['tmp_name'];
$data = "images/".$file_name;
move_uploaded_file($file_tmp,"images/".$file_name);
}
else
{	
$get_student_pic = mysqli_query($conn, "SELECT * FROM addstudent WHERE student_id='$student_id'"); 
$student_pic = mysqli_fetch_array($get_student_pic);

$data = $student_pic['stu_pic'];
}

$sql="UPDATE `addstudent` SET student_name='$stu_name', email='$stu_email', phone='$stu_phone', password='$stu_pass', stu_pic='$data' WHERE student_id='$student_id'";

$res= mysqli_query($conn,$sql);
if($res==1)
{
$mes= "Student Profile Update Successfully";
echo $mes;
}
}
?>


<div class="login-box" style="background-color:#3C8DBC;color:#FFF;">
<div class="login-logo">
<a href="" style="color:#FFF;"><b>Student Profile Edit</b></a>
</div><!-- /.login-logo -->
<div class="login-box-body" style="background-color:#ECF0F5;">

<form method="post" enctype="multipart/form-data">

<?php
/*-------------get student detail by check existing student_id------------------*/

$get_student = mysqli_query($conn, "SELECT * FROM addstudent WHERE student_id='$student_id'"); 

$student_data = mysqli_fetch_array($get_student);
$stu_name = $student_data['student_name'];
$stu_email = $student_data['email'];
$stu_phone = $student_data['phone'];
$stu_pass = $student_data['password'];
$stu_pic = $student_data['stu_pic'];
?>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="stu_name" value="<?php echo $stu_name;?>" required />
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="stu_email" value="<?php echo $stu_email;?>"  required/>
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="stu_phone" value="<?php echo $stu_phone;?>" required />
<span class="form-control-feedback"><i class="fa fa-info"></i></span>
</div>

<div class="form-group has-feedback">
<input type="text" class="form-control" name="stu_pass" value="<?php echo $stu_pass;?>" required />
<span class="form-control-feedback"><i class="fa fa-key"></i></span>
</div>

<div class="form-group has-feedback">
<img src="<?php echo $stu_pic;?>" width="100" height="100" id="blah"/>
</div>

<div class="form-group has-feedback">
<input type="file" class="form-control" name="stu_pic" onchange="readURL(this);"/>
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
