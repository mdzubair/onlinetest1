<?php 
session_start();
include('function/db.php');
global $conn;

function Encrypt($data, $secret)
{    
  $key = md5(utf8_encode($secret), true);
  $key .= substr($key, 0, 8);
  $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
  $len = strlen($data);
  $pad = $blockSize - ($len % $blockSize);
  $data .= str_repeat(chr($pad), $pad);
  $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');
  return base64_encode($encData);
}

$mname = $_GET['mn'];
$mpass = $_GET['mpas'];
$memails = $_GET['memail'];
$mphones = $_GET['mphone'];

$stmt = $conn->prepare("INSERT INTO mst_user(user_name, member_password,user_email,user_mobile) VALUES (?,?,?,?)");
$stmt->bind_param("ss", $mname, $mpass,$memails,$mphones);

//set parameters and execute
$mpass = $mpass;
$mname = $mname;
$memails = $memail;
$memails = $memail;
$stmt->execute();
$last_id = $conn->insert_id;

$newid = 'Ama-'.$last_id;
$query = mysqli_query($conn ,"UPDATE mst_user SET member_login = '$newid' where member_id='$last_id'");
if($query && $stmt)
{
echo "<span class='query-success'>Member Added Successfully with Login id</span> - <span class='newid'>$newid</span>";
}
else
{
echo "Somthing Went Wrong!";
}
//echo "name = '$mname' member id = '$mid' mem pass = '$newpass' mem dep = '$mdep' new id - '$newid'";
$stmt->close();

?>


