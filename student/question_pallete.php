<?php
@session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;
$id=$_REQUEST['q'];
$sr=$_REQUEST['qq'];
$opti=$_REQUEST['qqq'];
$test_id=$_REQUEST['test_id'];
$qsid=$_REQUEST['qsid'];


$sql="select COUNT(*) AS ABC from mst_question where test_id='$test_id'";
$res=mysqli_query($conn,$sql);
$ro=mysqli_fetch_array($res);
$total= $ro['ABC'];
if($id < $total){
$q="select * from mst_question where test_id='$test_id' limit $id,1 ";
$result=mysqli_query($conn,$q);
$get_total_rows = mysqli_num_rows($result);

while($row=mysqli_fetch_array($result))
{ 
$id1=$row['que_id'];
$q=$row['que_name'];
$q_sec = substr($q, strpos($q, "@" ) +1);    
$q_sec_fst = strtok($q, '@');

$que_image=$row['que_image'];

$option_a=$row['ans1'];
if (($pos = strpos($option_a, "@")) !== FALSE) { 
    $option_a_sec = substr($option_a, $pos+1); 
}
  
$option_a_sec_fst = strtok($option_a, '@');

$option_b=$row['ans2'];
 if (($pos = strpos($option_b, "@")) !== FALSE) { 
    $option_b_sec = substr($option_b, $pos+1); 
}
 
$option_b_sec_fst = strtok($option_b, '@');

$option_c=$row['ans3'];
 if (($pos = strpos($option_c, "@")) !== FALSE) { 
    $option_c_sec = substr($option_c, $pos+1); 
}
    
$option_c_sec_fst = strtok($option_c, '@');

 $option_d=$row['ans4'];
 if (($pos = strpos($option_d, "@")) !== FALSE) { 
    $option_d_sec = substr($option_d, $pos+1); 
}
 
$option_d_sec_fst = strtok($option_d, '@');
 
$a1_image = $row['ans1_image'];
$a2_image = $row['ans2_image'];
$a3_image = $row['ans3_image'];
$a4_image = $row['ans4_image'];
}  
?>
<?php 
$qqq="select * from mst_useranswer where question_id='$qsid' AND user_id='$user_id'";
$res=mysqli_query($conn,$qqq);
$ro=mysqli_fetch_array($res);
$user_ans=$ro['answer'];

		
?>

<div id="inst">

<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array
$imgname = $que_image; 

$ext = explode(".",$imgname); 
if(isset($ext[1]))
{	
if((in_array($ext[1],$type))) 
{
?>
<h2 class='questions' id="qname">Q. <img src="../admin/<?php echo $que_image;?>" alt="" height="250" width="250"> </h2>
<?php
}
}	
?>
<div style="float: right;">
View In:<select class="select1" onchange="as(<?php echo $id1; ?>)" id="df">
<option >Language</option>
<option >Hindi</option>
<option >English</option>
</select>
</div>
<h2 style="padding-bottom: 50px; float:left; width:auto;" class='questions' id="qname"><div style="width:auto; float:left;  "> <?php echo $q_sec_fst;?></div>
<div style="width:auto; float:left; padding-left:25px;"><?php echo $q_sec;?></div></h2>
<div class="clearfix"></div>
<h2 style="padding-bottom: 50px; float:left; width:auto; "><div style="width:auto; float:left; ">(A) <input type="radio" value="1"  <?php if ($user_ans == '1'){ echo 'checked'; } ?>  onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"> </div><div style="width:auto; float:left; "> <?php echo $option_a_sec_fst;?></div><div style="width:auto; float:left; "><?php echo $option_a_sec;?></div></h2>

<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $a1_image; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{
?>
<img src="../admin/<?php echo $a1_image;?>" height="250" width="250">
<?php
}
}

?>
<div class="clearfix"></div>
<h2 style="padding-bottom: 50px; float:left; width:auto;  "><div style="width:auto; float:left; ">(B) <input type="radio" value="2"  <?php if ($user_ans == '2'){ echo 'checked'; } ?> onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"> </div><div style="float:left; width:auto;"><?php echo $option_b_sec_fst;?></div><div style="float:left; width:auto;"><?php echo $option_b_sec;?></div></h2>
<div class="clearfix"></div>
<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $a2_image; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{
?>
<img src="../admin/<?php echo $a2_image;?>" height="250" width="250">
<?php
}
}	
?>
<div class="clearfix"></div>
<h2 style="padding-bottom: 50px; float:left; width:auto;  "> <div style="width:auto; float:left; ">(C) <input type="radio" value="3"  <?php if ($user_ans == '3'){ echo 'checked'; } ?> onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"> </div> <div style="float:left; width:auto;"><?php echo $option_c_sec_fst;?></div><div style="float: left;
width: auto; padding-left: 15px;"><?php echo $option_c_sec;?></div></h2>

<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $a3_image; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{
?>
<img src="../admin/<?php echo $a3_image;?>" height="250" width="250">
<?php
}
}	
?>
<div class="clearfix"></div>
<h2 style="padding-bottom: 50px; float:left; width:auto;   "><div style="width:auto; float:left; ">(D) <input type="radio" value="4"  <?php if ($user_ans == '4'){ echo 'checked'; } ?> onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"> </div> <div style="float:left; width:auto !important;"><?php echo $option_d_sec_fst;?></div><div style="float:left; width:auto;  "><?php echo $option_d_sec;?></div></h2>

<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $a4_image; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{
?>
<img src="../admin/<?php echo $a4_image;?>" height="250" width="250">
<?php
}
}	
?>

</div>

<div class="clearfix"></div>

<div  id="btn1" style="display:none;"></div>


<button id='btn' class='next btn btn-info pull-right' onclick="prr(<?php echo $id1; ?>);" type='button'>Save & Next</button>
<button id='btnn' class='next btn btn-info pull-right' onclick="review(<?php echo $id1; ?>);" type='button'>Review</button>
<?php }
else{
echo "0";
}

?>
<script>
function clrres(id){

$('input[name=opti]').attr('checked',false);
$('#'+id).css("background","red");
}
</script>





<!--<script>
function review(qid){
	//alert(qid);
	$('#'+qid).css("background","#c258c2");
}
</script>-->