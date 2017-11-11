<?php 
  $lang=$_POST['selectV'];
$qus_id=$_POST['iid'];
include("db.php");
if($lang =='Hindi'){
mysqli_set_charset($conn,'utf8');
$q="select * from gk_quiz_questions where sr_no='$qus_id'";
    $result=mysqli_query($conn,$q);
	
	
		while($row=mysqli_fetch_array($result))
								{ 
						$sr_no=$row['sr_no'];	
		 $question_des=$row['ques_hindi'];
		 $option_a=$row['opta_hindi'];
		 $option_b=$row['optb_hindi'];
		 $option_c=$row['optc_hindi'];
		 $option_d=$row['optd_hindi'];
		
		 
								}?>
								
								<p><?php echo $question_des;?></p>

<ul>
<li>(A) <input type="radio" value="A"  onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_a;?></li>
<li>(B) <input type="radio" value="B" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_b;?></li>
<li>(C) <input type="radio" value="C" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_c;?></li>
<li>(D) <input type="radio" value="D" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
<li>(E) <input type="radio" value="E" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
</ul>
<?php
}
else
{

	$q="select * from gk_quiz_questions where sr_no='$qus_id'";
    $result=mysqli_query($conn,$q);
	
	
		while($row=mysqli_fetch_array($result))
								{ 
							$sr_no=$row['sr_no'];	
						$question_des=$row['question_des'];
		 $option_a=$row['option_a'];
		 $option_b=$row['option_b'];
		 $option_c=$row['option_c'];
		 $option_d=$row['option_d'];
		 
								}?>
								
								<p><?php echo $question_des;?></p>

<ul>
<li>(A) <input type="radio" value="A"  onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_a;?></li>
<li>(B) <input type="radio" value="B" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_b;?></li>
<li>(C) <input type="radio" value="C" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_c;?></li>
<li>(D) <input type="radio" value="D" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
<li>(E) <input type="radio" value="E" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
</ul>
<?php }
?>						
								

