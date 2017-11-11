<?php 
@session_start();
 include('db.php');
 global $conn;


if(isset($_GET['id']) == 'logout')
{
session_unset();
session_destroy();
echo "<script>window.open('../../','_self')</script>";
}
if(isset($_GET['member_id']))
{
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if(isset($_POST['addsubject']) == TRUE)
{
    $sub_name = $_POST['subjectsname'];
if($sub_name == "")
{
$_SESSION['wrongmessage_s'] = "Insert Subject!";
echo "<script>window.open('../setexam','_self')</script>";
}
else
{
	$query_s = mysqli_query($conn ,"insert into mst_subject(sub_name)values('$sub_name')");
	if($query_s)
	{
    $_SESSION['message_s'] = "Your Subject has been Added!";
	}
 else {
$_SESSION['wrongmessage_s'] = "Sorry Somthing went Wrong!";
		}
}
echo "<script>window.open('../setexam','_self')</script>";
}

/*--------------------add coaching name--------------*/

if(isset($_POST['addsubject']) == TRUE)
{
    $coaching_name = $_POST['coachingname'];
if($coaching_name == "")
{
$_SESSION['wrongmessage_s'] = "Insert Coaching!";
echo "<script>window.open('../setexam','_self')</script>";
}
else
{
	$query_s = mysqli_query($conn ,"insert into mst_coaching(coaching_name)values('$coaching_name')");
	if($query_s)
	{
    $_SESSION['message_s'] = "Your subject and coaching has been added!";
	}
 else {
$_SESSION['wrongmessage_s'] = "Sorry Somthing went Wrong!";
		}
}
echo "<script>window.open('../setexam','_self')</script>";
}



if(isset($_POST['setAtest']) == TRUE)
{
	$coaching_id = $_POST['coaching_nam'];
    $sub_id = $_POST['sub_nam'];
    $test_name = $_POST['test-name'];
	
    $test_no = $_POST['test-no'];
	
	$query_s = mysqli_query($conn ,"insert into mst_test(sub_id,coaching_id,test_name,total_que)values('$sub_id','$coaching_id','$test_name','$test_no')");
	if($query_s)
	{
    $_SESSION['message_t'] = "Your Test has been Set!";
	}
else {
$_SESSION['wrongmessage_t'] = "Sorry Somthing went Wrong!";
}
echo "<script>window.open('../setexam','_self')</script>";
}

if(isset($_GET['deletememb']) && isset($_GET['mname']))
{
$member_lid = $_GET['deletememb'];
$member1 = $_GET['mname'];

$result = mysqli_query($conn ,"DELETE FROM mst_user WHERE member_login='$member_lid' AND user_name='$member1'");
if (mysqli_affected_rows($conn)==1){
$_SESSION['profileupdate'] = "Member Deleted Successfully!";
echo "<script>window.open('../search-member','_self')</script>";
}
else{
$_SESSION['profileupdate'] = "Somthing went wrong!";
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}

// function Encrypt($data, $secret)
// {    
  // $key = md5(utf8_encode($secret), true);
  // $key .= substr($key, 0, 8);
  // $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
  // $len = strlen($data);
  // $pad = $blockSize - ($len % $blockSize);
  // $data .= str_repeat(chr($pad), $pad);
  // $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');
  // return base64_encode($encData);
// }


// if(isset($_POST['changepassword']))
// {

        // $newpass = $_POST['currentpass'];
        // $newpass1 = $_POST['newpass1'];
        // $newpass2 = $_POST['newpass2'];
        // $memid = $_POST['membid'];
		
// $csi = "YSzjhRm3UMQMA3vfFiYxVjLyFMIo+PXgg";
// $currentpass = Encrypt($newpass, $csi);
// $newmd5 = Encrypt($newpass2, $csi);
// $newmd6 = Encrypt($newpass1, $csi);
		
// $chck = $conn->query("select * from admins WHERE user_id='$memid'");
// $r = $chck->fetch_assoc();
// $opass = $r['user_pass'];
		
// if($newpass1 != $newpass2)
// {
// $_SESSION['passwordchange'] = "<span class='query-wrong'>New Password Not Match!</span>";
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
// else if($currentpass != $opass)
// {
// $_SESSION['passwordchange'] = "<span class='query-wrong'>Your Current Password not Match!</span>";
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
// else{

// $result = mysqli_query($conn ,"update admins set user_pass='$newmd5' WHERE user_id='$memid'");
// $match = $conn->query("select * from admins WHERE user_id='$memid'");
// $row = $match->fetch_assoc();
// $npass = $row['user_pass'];
// if($newmd6 == $npass)
// {
// $_SESSION['passwordchange'] = "<span class='query-success'>Your Password Has Been Successfully Changed!</span>";
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
// else
// {
// $_SESSION['passwordchange'] = "<span class='query-wrong'>Something Went wrong!</span>";	
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
// }
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }


// if(isset($_POST['sendleads']))
// {
// include('db.php');
// global $conn;


// $sl0 = $_POST['l0'];
// $sl1 = $_POST['l1'];
// $sl2 = $_POST['l2'];
// $sl3 = $_POST['l3'];
// $sl4 = $_POST['l4'];
// $sl5 = $_POST['l5'];
// $sl6 = $_POST['l6'];
// $sl7 = $_POST['l7'];
// $sl8 = $_POST['l8'];
// $sl9 = $_POST['l9'];

// $sl10 = $_SESSION['adminid'];

// date_default_timezone_set("Asia/Kolkata");
// $sl11 = date('d-m-Y');

// $stmt = $conn->prepare("INSERT INTO marketing_leads(marketing_lead_ownername, marketing_lead_title, marketing_lead_source, marketing_lead_post, marketing_lead_description, marketing_lead_action, marketing_lead_email, marketing_lead_mobile, marketing_lead_address, marketing_lead_comment, posted_by) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
// $stmt->bind_param("sssssssssss",$l1,$l2,$l3,$l11,$l4,$l5,$l6,$l7,$l8,$l9,$l10);

// //set parameters and execute
// $l1 = $sl1;
// $l2 = $sl2;
// $l3 = $sl3;
// $l4 = $sl4;
// $l5 = $sl5;
// $l6 = $sl6;
// $l7 = $sl7;
// $l8 = $sl8;
// $l9 = $sl9;
// $l10 = $sl10;
// $l11 = $sl11;
// $stmt->execute();

// $last_id = $conn->insert_id;





// $st = $conn->prepare("UPDATE leads SET lead_sends=? WHERE lead_id='$sl0'");
// $st->bind_param("s",$m0);

// //set parameters and execute
// $m0 = "Lead has been Sent";
// $st->execute();









// if($stmt && $st)
// {
// $_SESSION['leadsend'] = "Leads has been successfully send to Marketing team! with id = $last_id";
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
// else
// {
// $_SESSION['leadsend'] = "Something Went wrong!";	
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// }
// header('Location: ' . $_SERVER['HTTP_REFERER']);

// }


?>
