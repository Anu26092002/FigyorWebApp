<?php
include "includes/header.php";
if(isset($_SESSION['username']))
{
unset($_SESSION['username']);
$_SESSION['message']="<div class='chip green white-text'>You have been successfully Logged Out.</div>";
header("Location: login.php");
}
else
{
  $_SESSION['message']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location: login.php");
}
?>