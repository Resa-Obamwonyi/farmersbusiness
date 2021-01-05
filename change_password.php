<?php
 session_start();
 include 'header.php';
 include 'db.php';
 if(!$_SESSION['email']){
    echo '<script>window.location="signup.php"</script>';
  }

 ?>

 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
              $email = $_SESSION['email'];
              $old_pass = $_POST['old_pass'];
 			        $new_pass = $_POST['new_pass'];
              $confirm_newpass = $_POST['confirm_newpass'];
              $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);

if ($new_pass === $confirm_newpass) {

               if(isset($_POST["submit"]))
          			{

            $new_pass=mysqli_escape_string($conn,filter_var(strip_tags($_POST['new_pass']),FILTER_SANITIZE_STRIPPED));
            $confirm_newpass=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirm_newpass']),FILTER_SANITIZE_STRIPPED));


            // Send password change email
             $headers .= "From: Farmers Business<info@farmersbusinessonline.com> \r\n";
                    $to      = $email;
                    $subject = 'Welcome to Farmers Business';
                    $message_body = 'Hello, Your password has been successfully changed.
                    Thank you.'	;

                    mail( $to, $subject, $message_body,$headers );

 			           $sql = "UPDATE signupform SET password ='$new_hash' where email = '$email' " ;

 							           if ($conn->query($sql) === TRUE) {
               echo '<script>window.location="dashboard.php"</script>'; ;
           } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


}
} else {
  header('location: change_password.php?error=password');
  exit;
}
}
 ?>





<section>
 <!-- Signup Form Area -->
 <div class="sign-up-form text-center" >
   <div class="section-heading">

<?php
if (isset($_REQUEST['error']) && ($_REQUEST['error'] === 'password')) {
   echo '<h5 style="color:red; padding-bottom:30px; padding-top:20px;">Passwords Do not Match!</h5>';

}
 ?>

   <h2 class="text-center">Change Password</h2>
   </div>
   <form action=" " method="post" enctype="multipart/form-data">
     <div class="row">
       <div class="col-12">
         <input type="password" class="forma-control" name="old_pass" placeholder="Old Password" required>
       </div>
       <div class="col-12">
         <input type="password" class="forma-control" name="new_pass" placeholder="Enter New Password" required>
       </div>
       <div class="col-12">
         <input type="password" class="forma-control" name="confirm_newpass" placeholder="Confirm New Password" required>
       </div>
       <div class="col-12">
         <input type="submit" class="btn wynfb-btn" name="submit" value="Change Password">
       </div>
     </div>
   </form>



 </div>
 </div>
 </div>

 </div>
 </div>
 </section>

<br>
<br>



<?php
 include 'footer.php';
 ?>
