<?php @session_start(); 
include ('function/db.php');
global $conn;
include('function/session.php');
$selectVal2=$_POST['selectVal2'];
//$sql ="select DISTINCT brand from category WHERE sub_cat='$selectVal2'";
?>
<label class="label3">Select A Subject</label>


<select class="form-control" name="sub_nam" required="true" >
<option  value=''>Select A Subject</option>;
<?php
$get_blog_details = "select * from mst_subject WHERE coaching_id='$selectVal2'";
$run_blog = mysqli_query($conn, $get_blog_details);

while($row_blog = mysqli_fetch_array($run_blog)){
$sub_id = $row_blog['sub_id'];
$sub_name = $row_blog['sub_name'];

echo "<option  value='$sub_id'> $sub_name </option>";

} ?>
</select>


