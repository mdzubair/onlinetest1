<?php
@session_start();

if(!isset($_SESSION['member-name']))
{
header('Location: index');
}
else{$adminname = $_SESSION['member-name'];}
?>
