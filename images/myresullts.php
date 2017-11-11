<?php include("function/session.php");?>
<?php include('include/header.php'); ?>
        <!-- Latest Work -->
        <div class="cyber-inner container">
            <div class="row">
                <div class="col-md-3 col-xs-12">
					
					
					<?php include('include/sidebar.php') ?>
            


					
                </div>

<div class="col-md-9 col-xs-12">
 <div class="faq-form form-profile">
<br/>
<h2>Exam Review</h2>
   <div class="row">
	<div class="col-xs-12 col-md-12">
                            <label class="label3">Select your Test Paper</label>
 <select class="form-control" name="sub_nam" required>
<option  value=''>Select Test Paper</option>;
<?php

include ('function/db.php');
global $conn;

$get_blog_detail = "select * from mst_test ORDER BY test_id DESC";
$run_b = mysqli_query($conn, $get_blog_detail);

while($ro = mysqli_fetch_array($run_b)){
    $sub_id = $ro['test_id'];
    $sub_name = $ro['test_name'];

   echo "<option  value='$sub_id'> $sub_name </option>";

	} ?>
  </select>

	</div>
    </div>




 <?php

include ('function/db.php');
global $conn;

$adminname = $_SESSION['member-name'];
$member_id = substr($adminname,4);

$trueque = 0;
$wrong = 0;
$final = 0;


$get_blog_details2 = "SELECT mst_useranswer.user_id , mst_useranswer.answer , mst_question.trueans FROM mst_useranswer INNER JOIN mst_question ON mst_useranswer.question_id = mst_question.que_id WHERE mst_useranswer.user_id='$member_id'";
$run_blog2 = mysqli_query($conn, $get_blog_details2) or die(mysqli_error($conn));
$nofrow = mysqli_num_rows($run_blog2);
while($row_blog2 = mysqli_fetch_array($run_blog2)){
    $que_id = $row_blog2['user_id'];
    $ans = $row_blog2['answer'];
    $trueans = $row_blog2['trueans'];

if($ans == $trueans){
$trueque = 	$trueque +1;
}
if($ans != $trueans){
$wrong = $wrong +1;
}

} 

$final = $trueque - ($wrong * .25);
$percent = $final * 10;
?>
		
<hr/>

<h3 class='text-center test-name'>Objective Test in Cyber Security ( Attempts 1 )</h3>

<h2 class='text-center'>Your Score <span class='score'><?php echo $trueque ; ?></span></h2>

		        <div class="skills">
		          <div class="row">
		          <div class="col-md-3 col-xs-12">
					<div class='border-b'><h3><?php echo $nofrow ; ?></h3>
					<p class='textbest'>Total Questions</p></div>
					<hr/>
					<div class='border-o'><h3><?php echo $trueque .'/'. $nofrow ; ?></h3>
					<p class='textbest'>Marks</p></div>
		          </div>
		          <div class="col-md-5 col-xs-12">
		            <div class="percentage easyPieChart" data-percent="<?php echo $percent; ?>" data-delay="100"><span><?php echo $percent; ?></span>%<canvas width="165" height="165"></canvas></div>
						<small>Required Score : 50%</small>
					</div>
		          <div class="col-md-4 col-xs-12">
					<div class='border-g'><h3><?php echo $trueque ; ?></h3>
					<p class='textbest'>Correct</p></div>
					<hr/>
					<div class='border-r'><h3><?php echo $wrong ; ?></h3>
					<p class='textbest'>Wrong</p></div>
		          </div>
					</div>
		        </div>
	<!-- Javascript Files
	================================================== -->
	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.js"></script>
	<!-- PrettyPhoto -->
	<!-- Animated Pie -->
	<script type="text/javascript" src="js/jquery.easy-pie-chart.js"></script>


	<!-- Template custom -->
	<script type="text/javascript" src="js/custom.js"></script>

<div class='gap-40'></div>

	</div>
	</div>

				</div>
				</div>
			
			

        <!-- Testimonials -->

     

<?php include('include/footer.php'); ?>
