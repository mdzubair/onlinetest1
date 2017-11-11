<?php 
include("function/db.php");
$member_id = substr($adminname,4);
$query = mysqli_query($conn ,"select * from mst_user_profile where member_id='$member_id'");
$row_member = mysqli_fetch_array($query);

	if(mysqli_num_rows($query)<1)
	{
$member_name = $adminname;
$member_pic = "cyberexam.jpg";
	}
	else
	{
$member_name = $row_member['user_name'];
$member_pic = $row_member['user_pic'];
	}

?>

<div class="sidebar-mainbar">
    <div class="container">
               <div class="row">
			 
			       
                       <ul class="sidebar-nav">
                           <li class="nonelist">
						   <img src='library/userprofile/aa.jpg' align='middle' width='150' height='150' /> 
                                   <h4 style="color: #fff;">Student Name</h4>
                               </li>
                           <li><a href="dashboard" ><i class="fa fa-home"></i> Dasboard</a></li>
                           <li><a href="myprofile" ><i class="fa fa-group"></i> Profile</a></li>
                           <li><a href="select-subject" ><i class="fa fa-book"></i> Online Exam</a></li>
                           <li><a href="myresullts" ><i class="fa fa-envelope"></i> Exam Result</a></li>
                           <li><a href="requestcertificate" ><i class="fa fa-certificate"></i> Certificate</a></li>

							
							
                           <li><a href="function/function.php?logout_id='logout'"><i class="fa fa-rocket"></i> Logout</a></li>
                           
                       </ul>
                   
			 
			    </div>
				</div><!--//header-main-->
</div>

