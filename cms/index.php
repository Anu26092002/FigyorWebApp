<?php
include "includes/header.php";
?>
<?php
include "includes/navbar.php";
?>

<br><br><br><br><br><br>

<div class="row">
<!-- This is main content area-->
<div class="col l12 m12 s12 center">
<?php
$sql="select * from posts order by id DESC";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
  while($row=mysqli_fetch_assoc($res))
  {
?>
<div class="col l3 m4 s6">
<div class="card ">
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
</div>
<!-- This is sidebar area-->
<div class="col l12 m12 s12" >
<?php
include "includes/footer.php";
?>
</div>


