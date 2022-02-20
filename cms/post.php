<?php 
include "includes/header.php";
?>
<?php 
include "includes/navbar.php";
?>
<br><br><br><br><br><br>
<div class="row">
<!--main post ares area-->

<div class="col l9 m9 s12">
  
<?php
if(isset($_GET['id']))
{
  
  $id=$_GET['id'];
  $id=mysqli_real_escape_string($conn,$id);
  $id=htmlentities($id);
  $sql="select * from posts where id=$id";
  $res=mysqli_query($conn,$sql);
  if(mysqli_num_rows($res)>0)
  {
    // $sql2="select view from posts where id=$id";
    // $res2=mysqli_query($conn,$sql2);
    // $row2=mysqli_fetch_assoc($res2);
    // $view=$row2['view'];
    // $view=$view+1;
    // $sql3="update posts set view=$view where id=$id";
    // mysqli_query($conn,$sql3);
    $row=mysqli_fetch_assoc($res);
    $title=$row['title'];
    $content=$row['content'];
    $feature_image=$row['feature_image'];
?>

<div class="card-panel">
<h5 class="center"><?php echo ucwords($title);?></h5>
<div class="flow-text"><?php echo ucwords($content);?></div>
<!-- <div class="card-panel">
<div class="row">
<div class="col l8 offset-l2 m10 offset-m1 s12">
<h5>Write Comment</h5>
<?php
if(isset($_SESSION['message']))
{
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}
?>
<form action="post.php?id=<?php echo $id;?>" method="POST">
<div class="input-field">
<input type="email" name="email" class="validate" placeholder="Enter Email">
<label for="email" data-error="Invalid Email Format"></label>
</div>
<div class="input-field">
<textarea name="comment" class="materialize-textarea" placeholder="Your Comment Goes Here..."></textarea>
</div>
<div class="center">
<input type="submit" value="Comment" name="submit" class="btn">
</div>
</form>
<h5>Comments</h5>
<ul class="collection">
<?php
$sql4="select * from comment where post_id=$id and status=1 order by id DESC";
$res4=mysqli_query($conn,$sql4);
if(mysqli_num_rows($res4)>0)
{
  while($row=mysqli_fetch_assoc($res4))
  {
?>
<li class="collection-item">
<?php echo $row['comment_text']; ?>
<span class="secondary-content">
<?php echo $row['email']; ?>
</span>
</li>
<?php

  }
}
?>

</ul>
</div>
</div>
</div> -->


<h5>Related Blogs</h5>

<div class="row">
<?php
$sql="select * from posts order by rand() limit 5";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>
<div class="col l3 m4 s6">
<div class="card">
<div class="card-image">
<img src="img/<?php echo $row['feature_image'];?>" alt="">

</div>
<div class="card-content truncate">
<span class="card-title black-text truncate"><?php echo $row['title']?></span>
</div>
<div class="card-action amber center">
<a href="post.php?id=<?php echo $row['id'];?>" class="white-text">Read More</a>
</div>
</div>
</div>
<?php
  }
}
?>

<!--Sidebar area-->

</div>

</div>


<?php
}

}
else
{
  header("Location: index.php");
}
?>


</div>
<div class="col l3 m3 s12">
  <div class="card">
    <div class="card-image">
      <img src="img/<?php echo $feature_image;?>"  alt="">
    </div>
  </div>
</div>
<div class="col l12 m12 s12" >
<?php
include "includes/footer.php";
?>
</div>



</div>




<?php
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$comment=$_POST['comment'];
$id1=$_GET['id'];
$email=mysqli_real_escape_string($conn,$email);
$email=htmlentities($email);
$comment=mysqli_real_escape_string($conn,$comment);
$comment=htmlentities($comment);
$id1=mysqli_real_escape_string($conn,$id1);
$id1=htmlentities($id);
$sql3="insert into comment (email,comment_text,post_id) values('$email','$comment',$id)";
$res3=mysqli_query($conn,$sql3);
if($res3)
{
  $_SESSION['message']="<div class='chip green white-text'>Comment Added Successfully.</div>";
  header("Location: post.php?id=$id1");
}
else
{
  $_SESSION['message']="<div class='chip red black-text'> Sorry, Something Went Wrong.</div>";
  header("Location: post.php?id=$id1");
}
}
?>
