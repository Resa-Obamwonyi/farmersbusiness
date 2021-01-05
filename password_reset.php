<?php
session_start();
include 'header.php';
include 'db.php';
// username and password sent from form


if(isset($_POST['reset']))
{
if(empty($_POST['email']))
{
	$error="Please enter your email first";
}

$email=$_POST["email"];

// To protect MySQL injection (more detail about MySQL injection)
$email=mysqli_escape_string($conn,filter_var(strip_tags($email),FILTER_SANITIZE_STRIPPED));
$sql="SELECT * FROM signupform WHERE email='$email'";
$result=mysqli_query($conn,$sql) or die("Your query is not right");
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

if($count==0){
$error="Email incorrect";
}

// If result matched $email and $password, table row must be 1 row
if($count==1){

    $token = bin2hex(random_bytes(50));

    if (count($error) == 0) {
      // store token in the password-reset database table against the user's email
      $sql = "INSERT INTO password_resets(email, token) VALUES ('$email', '$token')";
      $results = mysqli_query($conn, $sql);

      // Send email to user with the token in a link they can click on
      $to = $email;
      $subject = "Farmers' Business: Password Reset";
      $msg = "Hi there, click on this \"http://farmersbusinessonline.com/reset.php?token=" . $token . "\" to reset your password on our site";
      $msg = wordwrap($msg,70);
			$msg = stripslashes($msg);
      $headers = "From: Farmers Business<info@farmersbusinessonline.com> \r\n";
      mail($to, $subject, $msg, $headers);
      header('location: pending.php?email=' . $email);
    }


} else {
  echo '<h6 style="text-align:center; color:red; padding:20px;">Username does not exist in database</h6>';
}
}

?>


 <section>
 <div class="sign-up-form text-center" >
   <div class="section-heading">
   <h2 class="text-center">Reset Password</h2>
   </div>
   <form action="" name="reset" method="post">

     <div class="row">
       <div class="col-lg-12">
         <input type="email" class="formab-control" required name="email" placeholder="Enter Email" >
       </div>
       <div class="col-12">
         <input type="submit" class="btn wynfb-btn" name="reset" value="Reset Password">
       </div>
     </div>

   </form>

 </div>
 </section>
 <br>
 <br>

 <?php
include 'footer.php';
  ?>
