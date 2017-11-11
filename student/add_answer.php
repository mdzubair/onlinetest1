<?php @session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;
/*-------------------get question detail from mst_question by check test id existing or not---------------*/

$test_name = $_GET['test_name'];
$test_id = $_GET['test_id'];
$sub_id = $_GET['sub_id'];

$get_question="select * from mst_question WHERE test_id='".$test_id."' limit 0,1";
$query=mysqli_query($conn,$get_question);

$rows = mysqli_num_rows($query);

if($rows > 0)
{	
while($row=mysqli_fetch_assoc($query))
{	
$id = $row['que_id'];


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
}
else
{
//$msg = "please upload your question paper";
$id = '';
$q = '';
$a1 = '';
$a2 = '';
$a3 = '';
$a4 = '';
}	
?>

<?php
$test_id = $_GET['test_id'];
$get_test_duration = mysqli_query($conn, "SELECT * FROM mst_test WHERE test_id='$test_id'");

$test_rows = mysqli_num_rows($get_test_duration);

$test_data = mysqli_fetch_array($get_test_duration);

$duration = $test_data['duration'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Onlinetest.com</title>

<script type="text/javascript" async src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>

<?php include('include/links.php'); ?>
<style>


.checkbox .input-assumpte {
  display: none;
}
.input-assumpte + label:after {
  background-color: #fafafa;
  border: 1px solid #cacece;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  display: inline-block;
  transition-duration: 0.3s;
  width: 16px;
  height: 16px;
  content: '';
  margin-left: 10px;
}
.input-assumpte:checked + label:after {
  background-color: green;
}



.checkbox .input-assumpte1 {
  display: none;
}
.input-assumpte1 + label:after {
  background-color: #fafafa;
  border: 1px solid #cacece;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  display: inline-block;
  transition-duration: 0.3s;
  width: 16px;
  height: 16px;
  content: '';
  margin-left: 10px;
}

.input-assumpte1:checked + label:after {
  background-color: red;
}


.checkbox .input-assumpte2 {
  display: none;
}
.input-assumpte2 + label:after {
  background-color: #fafafa;
  border: 1px solid #cacece;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  display: inline-block;
  transition-duration: 0.3s;
  width: 16px;
  height: 16px;
  content: '';
  margin-left: 10px;
}

.input-assumpte2:checked + label:after {
  background-color: #fff;
}
.checkbox .input-assumpte3 {
  display: none;
}
.input-assumpte3 + label:after {
  background-color: #fafafa;
  border: 1px solid #cacece;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
  display: inline-block;
  transition-duration: 0.3s;
  width: 16px;
  height: 16px;
  content: '';
  margin-left: 10px;
}

.input-assumpte3:checked + label:after {
  background-color: #c258c2;
}
.MathJax_Display  {
     
    float: right !important;
    width: auto !important;
   
    margin: 0 !important;
    text-align: left !important;
	
	

}




</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script></script>
<script>
function countDown() {
sec--;
if (sec == -01) {
sec = 59;
min = min - 1;
if(min==-01)
{
min=59;
hour=hour-1;
}else
{
hour=hour;
}
} else {
min = min;
}
if (sec<=9) { sec = "0" + sec; }

time = (hour<=9 ? "0" + hour : hour) + " : " + (min<=9 ? "0" + min : min) + " : " + sec + "";
if (document.getElementById) { document.getElementById('timer').innerHTML = time; 

}
SD=window.setTimeout("countDown();", 1000);
if (hour=='00'&& min == '00' && sec == '00') 
{ 

//prr();
window.location = 'result.php';

}
}

function addLoadEvent(func) {
var oldonload = window.onload;
if (typeof window.onload != 'function') {
window.onload = func;
} else {
window.onload = function() {
if (oldonload) {
oldonload();
}
func();
}
}
}

addLoadEvent(function() {
countDown();
});

</script>
<script type="text/javascript" >
<?php
$hour=date('H', mktime(0,$duration));
$min=date('i', mktime(0,$duration));
$sec=date('s', mktime(0,$duration,0));


?>
var hour=<?php echo $hour; ?>;
var min=<?php echo $min; ?>;
var sec=<?php echo $sec; ?>;
</script>

<script>
$(document).ready(function(){

var id2=<?php echo $id;?>;

$('#'+id2).css("background","red");
});
</script>

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
Dashboard
<small>Control panel</small>
</h1>

<ol class="breadcrumb">
<li><a href="index"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Add Answer</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->




<div class="row">
<div class="col-xs-12">
<div class="box">
<div class="box-header">
<h3 class="box-title">Choose Correct Answer </h3> 
<h2>Duration : <span id="timer" class="timerclass"></span></h2>

</div><!-- /.box-header -->



<div class="box-body">

<div class="row myleadc">
<div class="col-md-12 myleads">




<script>

var str =0;
var opt="";
var s="";
function rad(vl,sdsf){
opt=vl;
//alert(opt);
s=sdsf;
//alert(s);
$('#'+s).css("background","green");
var test_id=<?php echo $test_id;?>;
//alert(test_id);
var sub_id=<?php echo $sub_id;?>;


var dataString='opt='+ opt + '&ques_id='+ s +'&test_id='+ test_id +'&sub_id='+ sub_id;
      
      $.ajax({
          url: 'saveansclick.php',
          
          async: false,
          type: "POST",
          data:dataString,

          success: function(data) {
             //window.location = "forms.php";
          }
        });





}

function pelette(xy,idd)
{

xyy =xy;

var abc = $('#'+idd).css("background","red");

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

if(xmlhttp.responseText==0){
window.location = "result.php";
}else{

document.getElementById("question").innerHTML = xmlhttp.responseText;
document.getElementById("btn").style.display="";
document.getElementById("btn1").style.display="none";
MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
}

}
}
xmlhttp.open("GET", "question_pallete.php?q="+xyy+"&qq="+s+"&qqq="+opt+"&test_id=<?php echo $test_id;?>"+"&qsid="+idd, true);
xmlhttp.send();

}	




function prr(id){
var nw_qid=id+1;

str =str+1;

$('#'+nw_qid).css("background","red");

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

if(xmlhttp.responseText==0){

//alert('hello');	

}else{

document.getElementById("question").innerHTML = xmlhttp.responseText;
document.getElementById("btn").style.display="";
document.getElementById("btn1").style.display="none";
MathJax.Hub.Queue(["Typeset",MathJax.Hub]);
}

}
}
xmlhttp.open("GET", "answer.php?sr="+str+"&que_id="+s+"&qqq="+opt+"&test_id=<?php echo $test_id;?>&sub_id=<?php echo $sub_id;?>", true);

xmlhttp.send();
}

function review(id){
var nw_qid=id;

str =str+1;

$('#'+nw_qid).css("background","#c258c2");

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

if(xmlhttp.responseText==0){

//alert('hello');	

}else{

document.getElementById("question").innerHTML = xmlhttp.responseText;
document.getElementById("btn").style.display="";
document.getElementById("btn1").style.display="none";
}

}
}
xmlhttp.open("GET", "answer.php?sr="+str+"&que_id="+s+"&qqq="+opt+"&test_id=<?php echo $test_id;?>&sub_id=<?php echo $sub_id;?>", true);

xmlhttp.send();
}

</script>

<b style ="font-size:20px;"><?php // if(isset($msg)){ echo $msg;} ?><b/>

<div id='question' class='question'> 
<div id="inst">
<?php
$type=Array(1 => 'jpg', 2 => 'jpeg', 3 => 'png', 4 => 'gif'); //store all the image extension types in array

$imgname = $que_image; //get image name here

$ext = explode(".",$imgname); //explode and find value after dot

if(isset($ext[1]))
{
if((in_array($ext[1],$type))) //check image extension not in the array $type
{

//print_r('../admin/$q');
/*if (!filter_var($q, FILTER_VALIDATE_URL) === false) 
{*/
?>
<h2 class='questions' id="qname">Q. <img src="../admin/<?php echo $que_image;?>" height="250" width="250"> </h2>
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
<h2 style="padding-bottom: 50px; float:left; width:auto;" class='questions' id="qname">
  <div style="width:auto; float:left;  "> <?php echo $q_sec_fst;?></div>
  <div style="width:auto; float:left; padding-left:25px;"><?php echo $q_sec;?></div>
</h2>


<div class="clearfix"></div>
<h2 style="padding-bottom: 50px; float:left; width:auto; "><div style="width:auto; float:left; ">(A) <input type="radio" value="1" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);"  name="opti"/> </div><div style="width:auto; float:left; "> <?php echo $option_a_sec_fst;?></div><div style="width:auto; float:left; "><?php echo $option_a_sec;?></div></h2>



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
<h2 style="padding-bottom: 50px; float:left; width:auto;  "><div style="width:auto; float:left; ">(B) <input type="radio" value="2" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);"  name="opti"/> </div><div style="float:left; width:auto;"><?php echo $option_b_sec_fst;?></div><div style="float:left; width:auto;"><?php echo $option_b_sec;?></div></h2>
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


<h2 style="padding-bottom: 50px; float:left; width:auto;  "> <div style="width:auto; float:left; ">(C) <input type="radio" value="3" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);"  name="opti"/> </div> <div style="float:left; width:auto;"><?php echo $option_c_sec_fst;?></div><div style="float: left;
width: auto; padding-left: 15px;"><?php echo $option_c_sec;?></div></h2>
<div class="clearfix"></div>


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
<h2 style="padding-bottom: 50px; float:left; width:auto;   "><div style="width:auto; float:left; ">(D) <input type="radio" value="4" id='radio1_<?php echo $id;?>' onclick="rad(this.value,<?php echo $id; ?>);"  name="opti"/> </div> <div style="float:left; width:auto !important;"><?php echo $option_d_sec_fst;?></div><div style="float:left; width:auto;  "><?php echo $option_d_sec;?></div></h2>




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


<input type="radio" checked='checked' style='display:none' value="5"  id='radio1_<?php echo $id;?>' name='<?php echo $id;?>'/>                                                                     

</div>
<div class="clearfix"></div>
<div  id="btn1" style="display:none;"></div>


<button id='btn' class='next btn btn-info pull-right' onclick="prr(<?php echo $id; ?>);" type='button'>Save & Next</button>
<button id='btn' class='next btn btn-info pull-right' onclick="review(<?php echo $id; ?>);" type='button'>Review</button>

</div> 



<div>
<a href="result.php" id='btn' class='next btn btn-info pull-right' type='button'>Submit</a>

<b>Questions Palette</b><br/><br/>

<?php
$xy=0;

$x=1;

$qq="select * from mst_question where test_id='$test_id'";

$result1=mysqli_query($conn,$qq);
$i = 1; 
while($row1=mysqli_fetch_array($result1))
{ 
$que_id=$row1['que_id'];	
?>



<button class="pallete btn btn-default btn-circle" id="<?php echo $que_id;?>" value="<?php echo $que_id;?>" onclick="pelette('<?php echo $xy; ?>','<?php echo $que_id;?>');"> <?php echo $i;?></button>



<?php 
$x=$x+1;
$xy=$xy+1; 

$i++;
} 
?>

</div>


</div>	
</div>	

</div>




<div class="checkbox" style="float:right;margin-right:30%;margin-top:2%;">
  <input type="checkbox" class="input-assumpte" id="input-confidencial" checked disabled/>
  <label for="input-confidencial" style="font-size:20px;">Answered :</label>
  
  <input type="checkbox" class="input-assumpte1" id="input-confidencial" checked disabled/>
  <label for="input-confidencial" style="font-size:20px;">Not Answered :</label>
  
  <input type="checkbox" class="input-assumpte2" id="input-confidencial" checked disabled/>
  <label for="input-confidencial" style="font-size:20px;">Not Visited :</label>
  
  <input type="checkbox" class="input-assumpte3" id="input-confidencial" checked disabled/>
  <label for="input-confidencial" style="font-size:20px;">Review :</label>
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



<script>


function as(iid){

var selectV = $('#df :selected').val();

var dataString='selectV='+ selectV + '&iid='+ iid;


$.ajax({
url: 'change_language.php',

async: false,
type: "POST",
data:dataString,

success: function(response) {
$('#inst').html(response);
}
});;
}
</script>
<style>
 #MathJax-Span-130 {
    padding-left: 15px;
}

          *::after, *::before {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}element {width: 13.613em;display: inline-block;}#MathJax-Span-1 {padding-left: 15px;}
		  
		  #MathJax-Span-101 {
    padding-left: 15px;
}
 
</style>
</body>
</html>
