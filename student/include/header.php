<header class="main-header">
<!-- Logo -->
<a href="index" class="logo">
<!-- mini logo for sidebar mini 50x50 pixels -->
<!-- logo for regular state and mobile devices -->

<?php
/*--------------------get coaching name----------------*/

$coaching  = "select * from mst_user where member_login='$coaching_id'";

$coaching_query = mysqli_query($conn ,$coaching);
$data = mysqli_fetch_array($coaching_query);
$coaching_name = $data['user_name'];
//$stu_pic = $data['stu_pic'];

/*----------------get student photo--------------*/
$student  = "select * from addstudent where id='$user_id'";

$student_query = mysqli_query($conn ,$student);
$data1 = mysqli_fetch_array($student_query);
$stu_pic = $data1['stu_pic'];
$stu_name = $data1['student_name'];
?>
<span class="logo-mini"><b><?php echo $coaching_name;  ?></b></span>


<span class="logo-lg"><b style="font-size:17px;"><?php echo $coaching_name ?></b></span>
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<span class="sr-only">Toggle navigation</span>
</a>
<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->

<!-- Notifications: style can be found in dropdown.less -->

<!-- Tasks: style can be found in dropdown.less -->

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<img src="<?php echo $stu_pic;?>" class="user-image" alt="User Image" />
<span class="hidden-xs"><?php echo $stu_name;?></span>
</a>
<ul class="dropdown-menu capital">
<!-- User image -->
<li class="user-header">
<img src="<?php echo $stu_pic;?>" class="img-circle" alt="User Image" />
<p><b>
<?php echo $session; ?></b>
<small>Member Id - <b><?php echo $stu_name; ?></b></small>
</p>
</li>
<!-- Menu Body -->
<li class="user-body">
<div class="col-xs-12 text-center">
<a href="changepassword"><button class="btn btn-primary btn-sm">Change Password</button></a>
</div>
</li>
<!-- Menu Footer-->
<li class="user-footer">
<div class="pull-right">
<a href="function/function.php?id=logout" class="btn btn-danger btn-flat">Sign out</a>
</div>
</li>
</ul>
</li>
<!-- Control Sidebar Toggle Button -->
</ul>
</div>
</nav>
</header>
