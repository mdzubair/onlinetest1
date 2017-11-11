
<aside class="main-sidebar" style="background-color:#367fa9;">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
<?php
/*----------------get student photo--------------*/
$student  = "select * from addstudent where id='$user_id'";

$student_query = mysqli_query($conn ,$student);
$data1 = mysqli_fetch_array($student_query);
$stu_pic = $data1['stu_pic'];
$stu_name = $data1['student_name'];
?>
<!-- Sidebar user panel -->
<div class="user-panel">
<div class="pull-left image">
<img src="<?php echo $stu_pic;?>" class="img-circle" alt="User Image" style="height:45px;"/>
</div>
<div class="pull-left info">
<p><?php echo $stu_name;?></p>
<a href=""><i class="fa fa-circle text-success"></i> Online</a>
</div>
</div>
<!-- search form -->

<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->

<ul class="sidebar-menu">
<li class="header">MAIN NAVIGATION</li>
<li class="active treeview">
<a href="profile.php">
<i class="fa fa-user-plus"></i> <span>Student Profile</span> <i class="fa"></i>
</a>

</li>

<li class="active treeview">
<a href="online_test.php">
<i class="fa fa-tasks"></i> <span>Online Test</span> <i class="fa"></i>
</a>

</li>


<li class="active treeview">
<a href="test_result.php">

<i class="fa fa-gear"></i> <span>Result Section</span> <i class="fa"></i>
</a>

</li>


</ul>

</section>
<!-- /.sidebar -->
</aside>
