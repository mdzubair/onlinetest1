<?php @session_start(); 
include('function/session.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cyber Security Lead Head | Dashboard - CRM</title>
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
            Oops!
            <small> Error</small>
          </h1>
          <ol class="breadcrumb">
            <li class="active">
<a href="index" class="btn btn-primary btn-xs" style="color: #fff;"><i class="fa fa-arrow-circle-left"></i>  Back to Home</a>
			</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
			<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <i class="fa fa-remove"></i> Error </h3> 
                </div><!-- /.box-header -->
                <div class="box-body">
                        <img src="error.png" style="text-align: center;top: 0;left: 0;bottom: 0;right: 0;margin: auto;display:block;width:100%;" />
                    <br/><br/>
                    <a href="index" class="btn btn-primary"><i class="fa fa-arrow-circle-left"></i>  Back to Home</a>
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
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Tips...</h3>
                 </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="todo-list">
                    <li>
                      <!-- drag handle -->
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <!-- checkbox -->
                      <!-- todo text -->
                      <span class="text">Look at each page of your website and all landing pages, and decide if it would be clear to a prospect what his next step should be.</span>
                      <!-- Emphasis label -->
                      <small class="label label-success"><i class="fa fa-clock-o"></i> Ist </small>
                      <!-- General tools such as edit or delete-->
                    </li>
                               
                   
                    
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <span class="text">Focus on your targets, implement strategic programs, and measure the results to know where you should continue your efforts.</span>
                      <small class="label label-success"><i class="fa fa-clock-o"></i> 2nd</small>
                    </li>
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <span class="text">This is one of the most important lead generation tips. Social Media is here to stay. Gone are the days of relying on your website and SEO alone to drive traffic to your site.</span>
                      <small class="label label-success"><i class="fa fa-clock-o"></i> 3rd</small>
                    </li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

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
