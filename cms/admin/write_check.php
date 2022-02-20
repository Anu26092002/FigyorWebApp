<?php
include "includes/header.php";
if(isset($_POST['publish']))
{
  $data=$_POST['ckeditor'];
  // $data=mysqli_real_escape_string($conn,$data);
  // $data = htmlentities($data);
  $title=$_POST['title'];
  $title=mysqli_real_escape_string($conn,$title);
  $title=htmlentities($title);
  $image=$_FILES['image'];
  $img_name=$_FILES['image']['name'];
  $img_size=$_FILES['image']['size'];
  $tmp_dir=$_FILES['image']['tmp_name'];
  $type=$_FILES['image']['type'];
  if($type=="image/jpeg" || $type=="image/png" || $type=="image/jpg")
  {
    if($img_size <=2097152)
    {
      move_uploaded_file($tmp_dir,"../img/".$img_name);
      $sql="insert into posts (title,content,feature_image) value('$title','$data','$img_name')";
      $res=mysqli_query($conn,$sql);
      if($res)
      {
      $_SESSION['message']="<div class='chip green white-text'> Post is Published</div>";
      header("Location: write.php");
      }
      else
      {
        $_SESSION['message']="<div class='chip red black-text'> Sorry,Something went wrong.</div>";
        header("Location: write.php");
      }
    }
    else
    {
      $_SESSION['message']="<div class='chip red black-text'> Sorry, Image size exceded 2mb.</div>";
        header("Location: write.php");
    }
  }
  else
  {
    $_SESSION['message']="<div class='chip red black-text'> Sorry, Image format is not supported.</div>";
    header("Location: write.php");
  }

}
?>
