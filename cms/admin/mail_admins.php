<?php
include "includes/navbar.php";
?>
<?php
$user=$_SESSION['username'];
$sql2="select email from admins where username='$user'";
$res2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($res2);

if(isset($_GET['id']))
{
 $id= $_GET['id'];
 $id=mysqli_real_escape_string($conn,$id);
 $id=htmlentities($id);
$sql="select * from posts where id=$id";
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
  $row=mysqli_fetch_assoc($res);
?>

<?php
$sql3="select * from admins order by id desc";
$res3=mysqli_query($conn,$sql3);
if(mysqli_num_rows($res3)>0)
{
while($row3=mysqli_fetch_assoc($res3))
{
?>


<?php
$to = $row3['email'];
$subject = $row['title'];
$from = $row2['email'];
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = $row['content'];

// Sending email
if(mail($to, $subject, $message, $headers)){
    echo "<div class='chip red white-text' style='float:left' >mail sent to $to</div>";
} else{
    echo "<div class='chip red white-text' style='float:left'>couldnt send your email to $to</div>";
}
?>
<?php
}
}
}
else
{
  redirect("Location: send_mail.php");
}
}

?>