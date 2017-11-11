<?php 
$lang=$_POST['selectV'];
$qus_id=$_POST['iid'];
@session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;
mysqli_set_charset($conn,'utf8');
if($lang =='Hindi')
{
mysqli_set_charset($conn,'utf8');
$q="select * from mst_question where que_id='$qus_id'";
$result=mysqli_query($conn,$q);


while($row=mysqli_fetch_array($result))
{ 
$id=$row['que_id'];	
$que_image = $row['que_image'];	
$q=$row['que_hindi'];
$a1=$row['opta_hindi'];
$a2=$row['optb_hindi'];
$a3=$row['optc_hindi'];
$a4=$row['optd_hindi'];
$a1_image = $row['ans1_image'];
$a2_image = $row['ans2_image'];
$a3_image = $row['ans3_image'];
$a4_image = $row['ans4_image'];

}
?>
<div id='question' class='question'>
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
View In:<select class="select1" onchange="as(<?php echo $id; ?>)" id="df">
<option >Language</option>
<option >Hindi</option>
<option >English</option>
</select>
</div>
<h2 class='questions' id="qname"><?php echo $q;?></h2>

<h2>(A) <input type="radio" value="1" onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"><?php echo $a1; ?></h2>

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
<h2>(B) <input type="radio" value="2" onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"><?php echo $a2; ?></h2>

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
<h2>(C) <input type="radio" value="3" onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"><?php echo $a3; ?></h2>

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
<h2>(D) <input type="radio" value="4" onclick="rad(this.value,<?php echo $id1; ?>);" name="opti"><?php echo $a4; ?></h2>

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
</div>


<?php
}
else
{

$q="select * from mst_question where que_id='$qus_id'";
$result=mysqli_query($conn,$q);


while($row=mysqli_fetch_array($result))
{ 
$id=$row['que_id'];	
$que_image=$row['que_image'];
$q=$row['que_name'];
$a1=$row['ans1'];
$a2=$row['ans2'];
$a3=$row['ans3'];
$a4=$row['ans4'];
$a1_image = $row['ans1_image'];
$a2_image = $row['ans2_image'];
$a3_image = $row['ans3_image'];
$a4_image = $row['ans4_image'];
}?>
<div id='question' class='question'>
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
View In:<select class="select1" onchange="as(<?php echo $id; ?>)" id="df">
<option >Language</option>
<option >Hindi</option>
<option >English</option>
</select>
</div>
<h2 class='questions' id="qname"> <?php echo $q;?></h2>

<h2>(A) <input type="radio" value="1"  onclick="rad(this.value,<?php echo $id; ?>);" name="opti"> <?php echo $a1;?></h2>
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
<h2>(B) <input type="radio" value="2" onclick="rad(this.value,<?php echo $id; ?>);" name="opti"> <?php echo $a2;?></h2>
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
<h2>(C) <input type="radio" value="3" onclick="rad(this.value,<?php echo $id; ?>);" name="opti"> <?php echo $a3;?></h2>
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

<h2>(D) <input type="radio" value="4" onclick="rad(this.value,<?php echo $id; ?>);" name="opti">  <?php echo $a4;?></h2>
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

</div>

<?php }
?>						


