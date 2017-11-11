<?php
@session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;
$conn->set_charset("utf8");
$id=$_GET['id'];

?>

<div class="box box-primary">
<div class="box-header">
<?php  $sql="SELECT * FROM `mst_question` WHERE `test_id`='$id'";
$res=mysqli_query($conn,$sql);
$n=mysqli_num_rows($res);?>
<i class="ion ion-clipboard"></i>
<h3 class="box-title">Total Question : <?php echo $n; ?></h3>
</div><!-- /.box-header -->
<div class="box-body">
<ul class="todo-list" style="    overflow-x: hidden;">
<?php

while($row=mysqli_fetch_assoc($res))
{

$q = $row['que_name'];	
$a1 = $row['ans1'];
$a2 = $row['ans2'];
$a3 = $row['ans3'];
$a4 = $row['ans4'];
$que_image = $row['que_image'];
$trueanswer = $row['trueans'];
$que_hindi = $row['que_hindi'];
$opta_hindi = $row['opta_hindi'];
$optb_hindi = $row['optb_hindi'];
$optc_hindi = $row['optc_hindi'];
$optd_hindi = $row['optd_hindi'];
$ans1_image = $row['ans1_image'];
$ans2_image = $row['ans2_image'];
$ans3_image = $row['ans3_image'];
$ans4_image = $row['ans4_image'];
?>

<div class="row"><div class="col-sm-12">  <span class="handle">
<i class="fa fa-ellipsis-v"></i>
<i class="fa fa-ellipsis-v"></i>
</span>
<!-- checkbox -->
<!-- todo text -->
<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $que_image; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{
?>
<span class="text"><img src="<?php echo $que_image;?>" height="50" width="50"></span>
<?php
}
}
/*else
{
?>
<span class="text">No Image Available</span>
<?php
}	*/
?>

<span class="text"><?php echo $row['que_name']; ?></span><br/>
<span class="text"><?php echo $que_hindi; ?></span>

<!-- Emphasis label -->
<div class="" style="float: right;">
<a href="#" data-toggle="modal" data-target="#dlt-model<?php echo $row['que_id']; ?>" class="btn btn-success">
<i class="fa fa-trash-o" aria-hidden="true"></i>
</a>
<a href="#" class="btn btn-success" data-toggle="modal" data-target="#edit-model<?php echo $row['que_id']; ?>">
<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</a>
</div>
<!-- General tools such as edit or delete--></div></div> 
<!-- drag handle -->
<div class="row"><div class="col-sm-offset-1 col-sm-2">

<?php
$type2=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname2 = $ans1_image; //get image name here

$extnt = explode(".",$imgname2); //explode and find value after dot

if(isset($extnt[1]))
{
if((in_array($extnt[1],$type2))) //check image extension not in the array $type
{
?>
<b>1-</b><span class="text"><img src="<?php echo $ans1_image;?>" height="50" width="50"></span>
<?php
}
}
	
?>

<b>1-</b>  <?php echo $row['ans1'];?><br/>
<b></b>  <?php echo $opta_hindi;?>
</div>



<div class="col-sm-2">
<?php
$type1=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname1 = $ans2_image; //get image name here

$extn = explode(".",$imgname1); //explode and find value after dot

if(isset($extn[1]))
{
if((in_array($extn[1],$type1))) //check image extension not in the array $type
{
?>
<b>2-</b><span class="text"><img src="<?php echo $ans2_image;?>" height="50" width="50"></span>
<?php
}
}
?>
<b>2-</b> <?php echo $row['ans2']; ?><br/>
<b></b> <?php echo $optb_hindi; ?>

</div>
<div class="col-sm-2">
<?php
$type3=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname3 = $ans3_image; //get image name here

$extnt = explode(".",$imgname3); //explode and find value after dot

if(isset($extnt[1]))
{
if((in_array($extnt[1],$type3))) //check image extension not in the array $type
{
?>
<b>3-</b><span class="text"><img src="<?php echo $ans3_image;?>" height="50" width="50"></span>
<?php
}
}
	
?>

<b>3-</b> <?php echo $row['ans3']; ?><br/>
<b></b> <?php echo $optc_hindi; ?>
</div>
<div class="col-sm-2">
<?php
$type4=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname4 = $ans4_image; //get image name here

$extntt = explode(".",$imgname4); //explode and find value after dot

if(isset($extntt[1]))
{
if((in_array($extntt[1],$type4))) //check image extension not in the array $type
{
?>
<b>4-</b><span class="text"><img src="<?php echo $ans4_image;?>" height="50" width="50"></span>
<?php
}
}
?>

<b>4-</b> <?php echo $row['ans4']; ?><br/>
<b></b> <?php echo $optd_hindi; ?>
</div>
<div class="col-sm-3"><p style="color:Green;float:left;">Correct Option - </p><b> <?php echo $row['trueans']; ?> </b></div>
</div>

<div class="modal fade" id="dlt-model<?php echo $row['que_id']; ?>" role="dialog">
<div class="modal-dialog" style="width: 20%;border: 2px solid red;">

<!------------------delete dialog box-------------------->

<!-- Modal content-->

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">Confirmation</h4>
</div>
<div class="modal-body" style="    color: red;
text-align: center;
font-size: 35px;">
<i class="fa fa-question-circle" aria-hidden="true"></i>
<p>Are you sure???</p>
</div>
<div class="modal-footer" style="text-align:center;">
<a href="javascript:deletequestion('<?php echo $id.":".$row['que_id']; ?>');" class="btn btn-success" ><i class="fa fa-check" aria-hidden="true"></i> Yes</a>
<a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> No</a>

</div>
</div>

</div>
</div>

<!------------------update dialog box-------------------->

<div class="modal fade" id="edit-model<?php echo $row['que_id']; ?>" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->

<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>

<h4 class="modal-title">Update the Question</h4>
</div>
<div class="modal-body">


<form class="updatepppo" id="form<?php echo $row['que_id']; ?>" method="post" enctype="multipart/form-data">

<div class="row">
<div class="col-sm-12">
<label>Question</label>
<input id="id<?php echo $row['que_id']; ?>" type="hidden" value="<?php echo $id; ?>" name="id"></input>
<input id="qid<?php echo $row['que_id']; ?>" type="hidden" value="<?php echo $row['que_id']; ?>" name="id"></input>

<textarea id="que" name="que" class="form-control"><?php echo $row['que_name']; ?></textarea><br/>

<textarea id="quehindi" name="quehindi" class="form-control"><?php echo $que_hindi; ?></textarea><br/>

<input type="file" name="quefile" id="quefile"/>

</div>

</div>
<div class="row">
<div class="col-sm-6"><label>Option 1</label>
<input type="text" id="ans1<?php echo $row['que_id']; ?>" class="form-control" value="<?php echo $row['ans1']; ?>"  name="ans1"></input><br/>
<input type="text" id="anshindi1" class="form-control" value="<?php echo $opta_hindi; ?>" name="anshindi1"></input><br/>

<input type="file" name="ans1file" class="" id="ans1file<?php echo $row['que_id']; ?>"/>
</div>


<div class="col-sm-6"><label>Option 2</label>
<input type="text" id="ans2<?php echo $row['que_id']; ?>" class="form-control" value="<?php echo $row['ans2']; ?>"  name="ans2"></input><br/>
<input type="text" id="anshindi2" class="form-control" value="<?php echo $optb_hindi; ?>" name="anshindi2"></input><br/>

<input type="file" name="ans2file" class="" id="ans2file<?php echo $row['que_id']; ?>"/>
</div>
</div>

<div class="row">
<div class="col-sm-6"><label>Option 3</label>
<input type="text" id="ans3<?php echo $row['que_id']; ?>" class="form-control" value="<?php echo $row['ans3']; ?>"  name="ans3"></input><br/>
<input type="text" id="anshindi3" class="form-control" value="<?php echo $optc_hindi; ?>" name="anshindi3"></input><br/>

<input type="file" name="ans3file" class="" id="ans3file<?php echo $row['que_id']; ?>"/>
</div>

<div class="col-sm-6"><label>Option 4</label>
<input type="text" id="ans4<?php echo $row['que_id']; ?>" class="form-control" value="<?php echo $row['ans4']; ?>"  name="ans4"></input><br/>
<input type="text" id="anshindi4" class="form-control" value="<?php echo $optd_hindi; ?>" name="anshindi4"></input><br/>

<input type="file" name="ans4file" class="" id="ans4file<?php echo $row['que_id']; ?>"/>
</div>
</div>

<div class="row">
<div class="col-sm-6"><label>Correct Option</label>
<input type="text" id="tans<?php echo $row['que_id']; ?>" class="form-control" value="<?php echo $row['trueans']; ?>"  name="trueans" onkeypress="return isNumber(event)"></input>
</div>
<div class="col-sm-6"><label style="    visibility: hidden;">Correct Option</label><br/>
<a href="javascript:updatep(<?php echo $row['que_id']; ?>);" class="btn btn-success">Update</a>

<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</form>

</div>

</div>

</div>
</div>          
<?php
} 
?>


</ul>
</div><!-- /.box-body -->
</div><!-- /.box -->

<script>
function isNumber(evt) {
evt = (evt) ? evt : window.event;
var charCode = (evt.which) ? evt.which : evt.keyCode;
if (charCode > 31 && (charCode < 48 || charCode > 57)) {
return false;
}
return true;
}

</script>