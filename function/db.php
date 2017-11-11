<?php

$servername = "localhost";
$username = "trendzco";
$password = "techsist1@prince";
$dbname = "trendzco_delhivai_exam";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if($conn)
{
   // echo "connected";
}
 else {
die("Connection failed: " . mysqli_connect_error());
}

?>
