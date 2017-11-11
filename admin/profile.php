<?php @session_start(); 
include('function/session.php');
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
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cyber Exam</li>
          </ol>
        </section>
<?php                    
 include ('function/db.php');
 global $conn;

$memberloginid = $_GET['d'];
$member1 = $_GET['member'];


$get_member_detail = "SELECT * FROM mst_user WHERE member_login='$memberloginid' AND user_name='$member1'";
$result = $conn->query($get_member_detail);
$row_cnt = $result->num_rows;
if(!$row_cnt)
{
	echo "<script>window.open('error','_self')</script>";
}
else
{
		$row = $result->fetch_assoc();
        $member_lid = $row['member_login'];
        $member_name = $row['user_name'];
        $member_email = $row['user_email'];
        $member_mobile = $row['user_mobile'];
        $member_pics = $row['user_pic'];
       
}
        ?>              

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
			<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $member_name;?>'s information</h3> <span class="pull-right"><a href="search-member" class="pull-right btn-xs btn-info" style=" cursor: pointer">Search another</a></span>
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
	Coaching Name :
	</div>
	<div class="col-md-8 myleads <?php if(!$member_name){echo "empaty";}?>">
<?php if(!$member_name){echo "Name No Update";}else{echo $member_name;} ?>   
	</div>

	<div class="col-md-4 myleads myleadh">
	Coaching Email :
	</div>	
	<div class="col-md-8 myleads3 <?php if(!$member_email){echo "empaty";}?>">
<?php if(!$member_email){echo "Email Not Updated";}else{echo $member_email;} ?>   
	</div>

	
	
		<div class="col-md-4 myleads myleadh">
	Coaching Contact No :
	</div>	
	<div class="col-md-8 myleads3 <?php if(!$member_mobile){echo "empaty";}?>">
<?php if(!$member_mobile){echo "Contact Not Updated";}else{echo $member_mobile;} ?>   
	</div>

	
	<div class="col-md-12 myleads myleadh">
    <a id="deletemember" class="btn btn-danger" style="cursor: pointer">Remove Member</a>
	<input type="hidden" id="membid" value="<?php echo $member_lid;?>" />
	<input type="hidden" id="membname" value="<?php echo $member_name;?>" />
	<span class="text-center query-success">
	<?php if(isset($_SESSION['profileupdate'])){
	echo $_SESSION['profileupdate'];
	unset($_SESSION['profileupdate']);
	}?>
	</span>

	</div>
	</div>
	</div>

	<div class="col-md-3 myleads3 <?php if(!$member_pics){echo "empaty";}?>">
	<?php if(!$member_pics){echo "Image Not Available";}else{echo "<img src='../library/userprofile/$member_pics' width='100%' height='100%' />";} ?>
	</div>
	</div>
<script type="text/javascript">
$(document).ready(function(){
    $("#deletemember").click(function(){
	if(confirm('Sure To Delete This Member?'))
     {
		 var id = $("#membid").val();
		 var name = $("#membname").val();
         window.location.href='function/function.php?deletememb='+id+'&mname='+name;
     }
    });
});

</script>

	
	
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
