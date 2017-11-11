<?php @session_start(); 
include('function/session.php');
include('function/db.php');
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
</h1>
<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Student Profile</li>
</ol>
</section>
<?php                    
$userid = $user_id;

/*--------------------------------get student profile detail---------------*/

//$get_student_detail = "SELECT * FROM addstudent WHERE id='$userid'";

$get_student_detail = "SELECT addstudent.email, addstudent.student_name, addstudent.phone, addstudent.stu_pic, mst_user.user_name FROM addstudent INNER JOIN mst_user ON addstudent.coaching_id=mst_user.member_login WHERE addstudent.id='$userid'";

$result = $conn->query($get_student_detail);
$row_cnt = $result->num_rows;
if(!$row_cnt)
{
echo "<script>window.open('error','_self')</script>";
}
else
{
$row = $result->fetch_assoc();
$stu_name = $row['student_name'];
$email = $row['email'];
$phone = $row['phone'];
$stu_pic = $row['stu_pic'];
$user_name = $row['user_name'];
}
?>              

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title"><?php echo $stu_name;?>'s information</h3> 
</div><!-- /.box-header -->
<div class="box-body">
<div class="row myleadhs">
<div class="col-md-3 myleads">
Title
</div>
<div class="col-md-9 myleads">
Details
</div>
</div>	
<div class="row myleadc1">
<div class="col-md-9">
<div class="row">
<div class="col-md-4 myleads myleadh">
Student Name :
</div>
<div class="col-md-8 myleads <?php if(!$stu_name){echo "empty";}?>">
<?php if(!$stu_name){echo "Name No Update";}else{echo $stu_name;} ?>   
</div>

<div class="col-md-4 myleads myleadh">
Student Email :
</div>	
<div class="col-md-8 myleads3 <?php if(!$email){echo "empty";}?>">
<?php if(!$email){echo "Email Not Updated";}else{echo $email;} ?>   
</div>



<div class="col-md-4 myleads myleadh">
Student Contact No :
</div>	
<div class="col-md-8 myleads3 <?php if(!$phone){echo "empty";}?>">
<?php if(!$phone){echo "Contact Not Updated";}else{echo $phone;} ?>   
</div>

<div class="col-md-4 myleads myleadh">
Coaching Name :
</div>	
<div class="col-md-8 myleads3 <?php if(!$user_name){echo "empty";}?>">
<?php if(!$user_name){echo "Coaching Name Not Updated";}else{echo $user_name;} ?>   
</div>


<div class="col-md-12 myleads myleadh">
<a href="student_profile.php" id="deletemember" class="btn btn-danger" style="cursor: pointer">Edit</a>
<input type="hidden" id="membid" value="" />
<input type="hidden" id="membname" value="" />
<span class="text-center query-success">

</span>

</div>
</div>
</div>

<div class="col-md-3 myleads3 <?php if(!$stu_pic){echo "empty";}?>">
<?php if(!$stu_pic){echo "Image Not Available";}else{echo "<img src='$stu_pic' width='100%' height='100%' />";} ?>

</div>
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
