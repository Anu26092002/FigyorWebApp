<?php
include "includes/header.php";
if(isset($_POST['signup']))
{
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$email=mysqli_real_escape_string($conn,$email);
$username=mysqli_real_escape_string($conn,$username);
$password=mysqli_real_escape_string($conn,$password);
$email=htmlentities($email);
$username=htmlentities($username);
$password=htmlentities($password);
$password=password_hash($password,PASSWORD_BCRYPT);
$sql1="select * from admins where email='$email' or username='$username'";
$res1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($res1)>0)
{
  header("Location: login.php");
  $_SESSION['message']="<div class='chip red black-text'>Account Already Exists,Please Login to Continue</div>";
}
else
{
  $sql="insert into admins(email,username,password) values('$email','$username','$password')";
  $res=mysqli_query($conn,$sql);
  if($res)
  {
    header("Location: login.php");
    $_SESSION['message']="<div class='chip green white-text'>You Have been Successfully Registered, Login To Continue</div>";
  }
  else
  {
    header("Location: login.php");
    $_SESSION['message']="<div class='chip red black-text'>Sorry Something Went Wrong,Please Signup Again</div>";
  }
}

}
