<?php
include('function/db.php');
global $conn;

if($_POST)
{
$q=$_POST['search'];
$sql_res = "SELECT * FROM mst_user WHERE (user_name like '%$q%' or member_login like '%$q%') order by member_id LIMIT 5";
$queryrun = mysqli_query($conn, $sql_res);
while($row=mysqli_fetch_array($queryrun))
{
$username=$row['user_name'];
$email=$row['member_login'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);

echo "<a href='results?d=$email&member=$username'>";?>
<ul class="show">
<li><?php echo $final_email ." :: ". $final_username; ?></li>

</ul>
<?php
echo "</a>";    
}
}
?>