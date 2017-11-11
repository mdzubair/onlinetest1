
 <?php
 
 session_start();
 $email=$_SESSION['vister_id'];
		include("db.php");
		  $id=$_REQUEST['q'];
		 $sr=$_REQUEST['qq'];
		$opti=$_REQUEST['qqq'];
		$quiz_id=$_REQUEST['quiz_id'];
		
		$q1="select * from user_ans_quiz where user_email='$email' AND quiz_id='$quiz_id' AND question_id='$sr'";
    $result1=mysqli_query($conn,$q1);
	 $get_total_rows = mysqli_num_rows($result1);
	 if($get_total_rows > 0)
		
		{
			$s1="update user_ans_quiz set user_ans='$opti' where user_email='$email' AND quiz_id='$quiz_id' AND question_id='$sr'";
			$conn->query($s1);
		}
		else{
			$s="insert into user_ans_quiz(question_id,user_ans,user_email,quiz_id) values('$sr','$opti','$email','$quiz_id')" or die ("insert error");
			$conn->query($s);
			
		}
		
		
		
		$sql="select COUNT(*) AS ABC from gk_quiz_questions where tes_id='$quiz_id'";
    $res=mysqli_query($conn,$sql);
$ro=mysqli_fetch_array($res);
 $total= $ro['ABC'];

	if($id < $total){
$q="select * from gk_quiz_questions where tes_id='$quiz_id' limit $id,1 ";
    $result=mysqli_query($conn,$q);
	$get_total_rows = mysqli_num_rows($result);
	
      while($row=mysqli_fetch_array($result))
								{ 
							 $sr_no=$row['sr_no'];
		 $question_des=$row['question_des'];
		 $option_a=$row['option_a'];
		 $option_b=$row['option_b'];
		 $option_c=$row['option_c'];
		 $option_d=$row['option_d'];
		 $marks=$row['marks'];
		 $duration=$row['duration'];
		 
								}  ?>
								<div class="row">
<div class="col-md-1">
<div class="qu">Q.<?php echo $id+1;?></div>
</div>
<div class="col-md-3">
View In:<select class="select1" onchange="as(<?php echo $sr_no; ?>)" id="df">
<option >Language</option>
<option>Hindi</option>
<option>English</option>
</select>
</div>
<div class="col-md-4">
Marks:<button class="bb2">+<?php echo $marks;?></button><button class="bb1">0</button>
</div>
<div class="col-md-4">
Time Left: <b style="color: #1bb9ad;"><span id="timer" class="timerclass"></span></b>
</div>
</div>
						<div class="question" id="question">
						<div id="inst">
						
						
						
						
<p><?php echo $question_des;?></p>
<ul>
<li>(A) <input type="radio" value="A" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_a;?></li>
<li>(B) <input type="radio" value="B" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_b;?></li>
<li>(C) <input type="radio" value="C" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_c;?></li>
<li>(D) <input type="radio" value="D" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
<li>(E) <input type="radio" value="E" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
</ul>
</div>
</div>
<div class="btn-plat">
<li><button class="l-btn1" onclick="chgclr(<?php echo $sr_no;?>);">Mark For Review</button></li>
<li><button class="l-btn1" onclick="clrres(<?php echo $sr_no;?>);">Clear Responce</button></li>
<div  id="btn1" style="dilplay:none;"></div>
<button class="l-btn2" id="btn" onclick="prr(<?php echo $sr_no;?>);"value="Save & Next">Save & Next</button>
</div>
	<?php }
	else{
		echo "0";
	}
	
?>

