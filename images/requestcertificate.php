<?php include("function/session.php");?>
<?php include('include/header.php'); ?>
        <!-- Latest Work -->
        <div class="cyber-inner container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
					<?php include('include/sidebar.php') ?>
                </div>

                <div class="col-md-9 col-xs-12">
<?php
include("function/db.php");
$member_id = substr($adminname,4);
$query = mysqli_query($conn ,"select * from mst_user_profile where member_id='$member_id'");
$row_member = mysqli_fetch_array($query);

$member_name = $row_member['user_name'];
$member_id1 = $row_member['user_id'];


?>
<div id="mprofile">
<div class="faq-form form-profile">
   <div class="row">
	<div class="col-xs-12 col-md-12">
            <h2>Generate Certificate</h2>
	</div>
    </div>
  <div class="gap-20"></div>
<form method="post" name="form" action="">
   <div class="row">
	<div class="col-xs-12 col-md-6">
            <div class="form-group">
                <h4 style='color:#002B55;'>Confirm Your Name <small> ( as print on certificate )</small></h4>
                <input id='mname' class="form-control" name="member_name" value="<?php echo $member_name  ; ?>" type="text" maxlength="35" required />
			</div>

	</div>
	<div class="col-xs-12 col-md-6">
            <div class="form-group">
                <h4 style='color:#002B55;'>Member id</h4>
                <h4 style='color:#008817;'><?php echo 'CSI-'.$member_id  ; ?></h4>
                <input id='mid' class="form-control" name="member_id" value="<?php echo 'CSI-'.$member_id  ; ?>" type="hidden" maxlength="35" required />
            </div>
	</div>
	    </div>
           <div class="gap-20"></div>         
        
                <input id='submits' class="btn btn-primary" value=" Generate My Certificate" type='submit'/>
           <div class="gap-20"></div>         
		   </div>                    
    </form>
  </div>      

	<div class="faq-form form-profile">
   <div class="row margin-all">
<div id="flash"></div>
<div id="display"></div>
        </div>
        </div>

	
            </div>
			
			
        </div>
        </div>

        <!-- Testimonials -->
     

<?php include('include/footer.php'); ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/
libs/jquery/1.3.0/jquery.min.js">
</script>
<script type="text/javascript" >
$(function() {
$("#submits").click(function() {

var mname = $("#mname").val();
var mid = $("#mid").val();
var dataString = 'mname='+ mname+'&mid='+mid;

if(mname=='')
{
alert("Please Enter Some Text");
}
else
{
$("#flash").show();
$("#flash").fadeIn(400).html('<img src="ajax-loader-bar.gif" align="absmiddle"> <span class="loading">Loading Comment...</span>');

$.ajax({
type: "POST",
url: "generate.php",
data: dataString,
cache: false,
success: function(html){
$("#display").after(html);
$('#mprofile').hide();
$("#flash").hide();
}
});
} return false;
});
});


</script>