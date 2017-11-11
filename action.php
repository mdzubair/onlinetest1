<?php
include('function/db1.php');
if(isset($_POST['content']))
{
$content=mysql_real_escape_string($_POST['content']);
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("insert into comment(msg,ip_add) values ('$content','$ip')");
$fetch= mysql_query("SELECT msg,id FROM comment order by id desc");
$row=mysql_fetch_array($fetch);
}
?>
