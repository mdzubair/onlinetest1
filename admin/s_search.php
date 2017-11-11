<?php
include('function/db.php');
global $conn;

if($_POST)
{
$q=$_POST['search'];
$sql_res = "SELECT * FROM addstudent WHERE (student_name like '%$q%' or student_id like '%$q%') order by id LIMIT 5";
$queryrun = mysqli_query($conn, $sql_res);
while($row=mysqli_fetch_array($queryrun))
{
$username=$row['student_name'];
$email=$row['student_id'];
$b_username='<strong>'.$q.'</strong>';
$b_email='<strong>'.$q.'</strong>';
$final_username = str_ireplace($q, $b_username, $username);
$final_email = str_ireplace($q, $b_email, $email);

echo "<a href='s_profile?d=$email&member=$username'>";   ?>
<ul class="show">
<li><?php echo $final_email ." :: ". $final_username; ?></li>
</ul>
    <?php
echo "</a>";    
}
}
?>