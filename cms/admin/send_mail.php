
<?php
include "includes/navbar.php";
?>

<div class="main">
<div class="row">
<div class="col l12 m12 s12">
<ul class="collection with-header">
<li class="collection-header amber">
<h5 class="white-text">Recent Posts</h5>
<span id="message"></span>
</li>
<?php
$sql="select * from posts order by id desc";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
while($row=mysqli_fetch_assoc($res))
{
?>
<li class="collection-item">
<a href=""><?php echo $row['title']?></a>
<div class="col l6 m6 s12">
<span><a href="mail_admins.php?id=<?php echo $row['id']; ?>">Send mail to admins</a>|<a href="mail_users.php?id=<?php echo $row['id']; ?>">Send mail to users</a></span>
</div>
</li>

<?php
}
}
else
{
  echo "<div class='chip red white-text'>No Post in Database</div>";
}
?> 
</ul>
</div>
</div>
</div>