<?php 
session_start();
  $lang=$_POST['selectV'];
$qus_id=$_POST['qid'];
$i=$_POST['srn'];
$test_id=$_SESSION['tst_id'];
include('function/db.php');
global $conn;
if($lang =='Hindi'){
mysqli_set_charset($conn,'utf8');
$q="select * from mst_question WHERE que_id='$qus_id'";
    $result=mysqli_query($conn,$q);
	
	
		while($row=mysqli_fetch_array($result))
								{ 
						$id = $row['que_id'];	
		 $q = $row['que_hindi'];
$a1 = $row['opta_hindi'];
$a2 = $row['optb_hindi'];
$a3 = $row['optc_hindi'];
$a4 = $row['optd_hindi'];
		
		 
								}?>
								<div id='cont1'>
							<div id='question<?php echo $i;?>' class='cont'> 
<?php
if (!filter_var($q, FILTER_VALIDATE_URL) === false) 
{
?>
<h2 class='questions' id="qname<?php echo $i;?>">Q. <img src="<?php echo $q;?>" alt="" height="120" width="120"> </h2>
<?php
}
else
{	
?>
<div style="float: right;">
View In:<select class="select1" onchange="ass(<?php echo $id; ?>,<?php echo $i?>)" id="dff">
<option >Language</option>
<option >Hindi</option>
<option >English</option>
</select>
</div>
<h2 class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $q;?></h2>
<?php
}
?>

<h2>(A) <input type="radio" value="1" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a1; ?> </h2>
<br/>
<h2>(B) <input type="radio" value="2" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a2; ?> </h2>
<br/>
<h2>(C) <input type="radio" value="3" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a3; ?> </h2>
<br/>
<h2> (D) <input type="radio" value="4" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a4; ?> </h2>
<br/>
<input type="radio" checked='checked' style='display:none' value="5"  id='radio1_<?php echo $id;?>' name='<?php echo $id;?>'/>                                                                     
<br/>
<input type="hidden" id=" " value="<?php echo $test_id; ?>" />
<button id='<?php echo $i;?>' class='next btn btn-info pull-right' onclick="nxtcount(<?php echo $duration;?>)" type='button'>Save & Next</button>
</div>
</div>
<?php
}
else
{

	$q="select * from mst_question WHERE que_id='$qus_id'";
    $result=mysqli_query($conn,$q);
	
	
		while($row=mysqli_fetch_array($result))
								{ 
						$id = $row['que_id'];	
		 $q = $row['que_name'];
$a1 = $row['ans1'];
$a2 = $row['ans2'];
$a3 = $row['ans3'];
$a4 = $row['ans4'];
		
		 
								}?>
								<div id='cont1'>
							<div id='question<?php echo $i;?>' class='cont'> 
<?php
if (!filter_var($q, FILTER_VALIDATE_URL) === false) 
{
?>
<h2 class='questions' id="qname<?php echo $i;?>">Q. <img src="<?php echo $q;?>" alt="" height="120" width="120"> </h2>
<?php
}
else
{	
?>
<div style="float: right;">
View In:<select class="select1" onchange="ass(<?php echo $id; ?>,<?php echo $i?>)" id="dff">
<option >Language</option>
<option >Hindi</option>
<option >English</option>
</select>
</div>
<h2 class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $q;?></h2>
<?php
}
?>

<h2>(A) <input type="radio" value="1" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a1; ?> </h2>
<br/>
<h2>(B) <input type="radio" value="2" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a2; ?> </h2>
<br/>
<h2>(C) <input type="radio" value="3" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a3; ?> </h2>
<br/>
<h2> (D) <input type="radio" value="4" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);" name='<?php echo $id;?>'/> <?php echo $a4; ?> </h2>
<br/>
<input type="radio" checked='checked' style='display:none' value="5"  id='radio1_<?php echo $id;?>' name='<?php echo $id;?>'/>                                                                     
<br/>
<input type="hidden" id="test_id" value="<?php echo $test_id; ?>" />
<button id='<?php echo $i;?>' class='next btn btn-info pull-right' onclick="nxtcount(<?php echo $duration;?>)" type='button'>Save & Next</button>
</div>
</div>
<?php }
?>						
								

