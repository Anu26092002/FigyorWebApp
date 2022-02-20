<?php
include "includes/navbar.php";
if(isset($_SESSION['username']))
{
?>
<div class="main">
<form action="write_check.php" method="POST" enctype="multipart/form-data">
<div class="card-panel">
<?php
if(isset($_SESSION['message']))
{
echo $_SESSION['message'];
unset($_SESSION['message']);
}
?>
<h5>Title For Post</h5>
<textarea name="title" class="materialize-textarea" placeholder="Title For Post"></textarea>
<h5>Featured Image</h5>
<div class="input-field file-field">
<div class="btn">
Upload file
<input type="file" name="image">
</div>
<div class="file-path-wrapper">
<input type="text" class="file-path">
</div>
</div>
<h5>Genre</h5>
<textarea name="genre" class="materialize-textarea" placeholder="Genre of the post"></textarea>
<h5>Post Content</h5>
<textarea name="ckeditor" id="ckeditor" class="ckeditor"></textarea>
<br>
<div class="center">
<input type="submit" value="Publish" name="publish" class="btn white-text"> 
</div>

</div>
</form>


</div>
    

    <script type="text/javascript" src="../js/ckeditor/ckeditor.js"></script>
    <?php

    include "includes/footer.php";
}
else
{
  $_SESSION['message']="<div class='chip red black-text'>Login To Continue</div>";
  header("Location:login.php");
}
    ?>

