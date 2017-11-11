<?php
@session_start(); 
include('function/session.php');
include('function/db.php');
global $conn;
$conn->set_charset("utf8");
$id=$_POST['id'];
$strFindMe="$$";


$quename = $_POST['que'];
$result = strpos($quename,$strFindMe);
if($result !== false){
	  $quename=addslashes($quename);
	  
  }

$quehindi = $_POST['quehindi'];
$result1 = strpos($quehindi,$strFindMe);
if($result1 !== false){
	  $quehindi=addslashes($quehindi);
	  
  }
$que_file = $_FILES['quefile']['name'];

$ans1 = $_POST['ans1'];

$result2 = strpos($ans1,$strFindMe);
if($result2 !== false){
	  $ans1=addslashes($ans1);
	  
  }
$anshindi1 = $_POST['anshindi1'];
$result3 = strpos($anshindi1,$strFindMe);
if($result3 !== false){
	  $anshindi1=addslashes($anshindi1);
	  
  }

$ans1_file = $_FILES['ans1file']['name'];

$ans2 = $_POST['ans2'];
$result4 = strpos($ans2,$strFindMe);
if($result4 !== false){
	  $ans2=addslashes($ans2);
	  
  }
$anshindi2 = $_POST['anshindi2'];

$result5 = strpos($anshindi2,$strFindMe);
if($result5 !== false){
	  $anshindi2=addslashes($anshindi2);
	  
  }

$ans2_file = $_FILES['ans2file']['name'];

$ans3 = $_POST['ans3'];
$result6 = strpos($ans3,$strFindMe);
if($result6 !== false){
	  $ans3=addslashes($ans3);
	  
  }
$anshindi3 = $_POST['anshindi3'];
$result7 = strpos($anshindi3,$strFindMe);
if($result7 !== false){
	  $anshindi3=addslashes($anshindi3);
	  
  }

$ans3_file = $_FILES['ans3file']['name'];

$ans4 = $_POST['ans4'];
$result8 = strpos($ans4,$strFindMe);
if($result8 !== false){
	  $ans4=addslashes($ans4);
	  
  }

$anshindi4 = $_POST['anshindi4'];
$result9 = strpos($anshindi4,$strFindMe);
if($result9 !== false){
	  $anshindi4=addslashes($anshindi4);
	  
  }
$ans4_file = $_FILES['ans4file']['name'];

$trueans = $_POST['trueans'];

$folder="uploads/";

$quefile_loc = $_FILES['quefile']['tmp_name'];
$quefilename = $folder.$que_file;
move_uploaded_file($quefile_loc,$quefilename);

$opt1_loc = $_FILES['ans1file']['tmp_name'];
$ans1filename = $folder.$ans1_file;
move_uploaded_file($opt1_loc,$ans1filename);


$opt2_loc = $_FILES['ans2file']['tmp_name'];
$ans2filename = $folder.$ans2_file;
move_uploaded_file($opt2_loc,$ans2filename);

$opt3_loc = $_FILES['ans3file']['tmp_name'];
$ans3filename = $folder.$ans3_file;
move_uploaded_file($opt3_loc,$ans3filename);

$opt4_loc = $_FILES['ans4file']['tmp_name'];
$ans4filename = $folder.$ans4_file;
move_uploaded_file($opt4_loc,$ans4filename);

/*-----------------question update----------------------*/

if(!empty($_FILES['quefile']['name']))
{	
$sql=mysqli_query($conn, "UPDATE mst_question SET que_name='$quename', que_hindi='$quehindi', que_image='$quefilename' WHERE que_id='$id'");
}
else
{	
/*---------------------get que_image from mst_question table------------------*/

$get_que_image = mysqli_query($conn, "SELECT que_image FROM mst_question WHERE que_id='$id'");
$que_image_row = mysqli_num_rows($get_que_image);
$que_image_data = mysqli_fetch_assoc($get_que_image);
$que_image = $que_image_data['que_image'];
$sql=mysqli_query($conn, "UPDATE mst_question SET que_name='$quename', que_hindi='$quehindi', que_image='$que_image' WHERE que_id='$id'");
	
}

/*-----------------option a update----------------------*/

if(!empty($_FILES['ans1file']['name']))
{	
$update_opta = mysqli_query($conn, "UPDATE mst_question SET ans1='$ans1', ans1_image='$ans1filename', opta_hindi='$anshindi1' WHERE que_id='$id'");
}
else
{
/*---------------------get opta_image from mst_question table------------------*/

$get_opta_image = mysqli_query($conn, "SELECT ans1_image FROM mst_question WHERE que_id='$id'");
$opta_image_row = mysqli_num_rows($get_opta_image);
$opta_image_data = mysqli_fetch_assoc($get_opta_image);
$opta_image = $opta_image_data['ans1_image'];
$update_opta=mysqli_query($conn, "UPDATE mst_question SET ans1='$ans1', opta_hindi='$anshindi1', ans1_image='$opta_image' WHERE que_id='$id'");
	
}


/*-----------------option b update----------------------*/


if(!empty($_FILES['ans2file']['name']))
{	
$update_optb = mysqli_query($conn, "UPDATE mst_question SET ans2='$ans2', ans2_image='$ans2filename', optb_hindi='$anshindi2' WHERE que_id='$id'");
}
else
{	
/*---------------------get optb_image from mst_question table------------------*/

$get_optb_image = mysqli_query($conn, "SELECT ans2_image FROM mst_question WHERE que_id='$id'");
$optb_image_row = mysqli_num_rows($get_optb_image);
$optb_image_data = mysqli_fetch_assoc($get_optb_image);
$optb_image = $optb_image_data['ans2_image'];
$update_optb=mysqli_query($conn, "UPDATE mst_question SET ans2='$ans2', optb_hindi='$anshindi2', ans2_image='$optb_image' WHERE que_id='$id'");
	
}


/*-----------------option c update----------------------*/


if(!empty($_FILES['ans3file']['name']))
{	
$update_optc = mysqli_query($conn, "UPDATE mst_question SET ans3='$ans3', ans3_image='$ans3filename', optc_hindi='$anshindi3' WHERE que_id='$id'");
}
else
{	
/*---------------------get optc_image from mst_question table------------------*/

$get_optc_image = mysqli_query($conn, "SELECT ans3_image FROM mst_question WHERE que_id='$id'");
$optc_image_row = mysqli_num_rows($get_optc_image);
$optc_image_data = mysqli_fetch_assoc($get_optc_image);
$optc_image = $optc_image_data['ans3_image'];
$update_optc = mysqli_query($conn, "UPDATE mst_question SET ans3='$ans3', optc_hindi='$anshindi3', ans3_image='$optc_image' WHERE que_id='$id'");
	
}


/*-----------------option d update----------------------*/


if(!empty($_FILES['ans4file']['name']))
{	
$update_optd = mysqli_query($conn, "UPDATE mst_question SET ans4='$ans4', ans4_image='$ans4filename', optd_hindi='$anshindi4' WHERE que_id='$id'");
}
else
{	
/*---------------------get optd_image from mst_question table------------------*/

$get_optd_image = mysqli_query($conn, "SELECT ans4_image FROM mst_question WHERE que_id='$id'");
$optd_image_row = mysqli_num_rows($get_optd_image);
$optd_image_data = mysqli_fetch_assoc($get_optd_image);
$optd_image = $optd_image_data['ans4_image'];
$update_optd = mysqli_query($conn, "UPDATE mst_question SET ans4='$ans4', optd_hindi='$anshindi4', ans4_image='$optd_image' WHERE que_id='$id'");
	
}

/*----------------------- update true ans---------------------------*/

$update_ture_ans = mysqli_query($conn, "UPDATE mst_question SET trueans='$trueans' WHERE que_id='$id'");

?>