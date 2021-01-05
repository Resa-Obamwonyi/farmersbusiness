<?php
 include 'header.php';
 include 'db.php';
?>

<?php

 // ENTER A NEW PASSWORD
if (isset($_POST['submit'])) {
  $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
  $confirm_newpass = mysqli_real_escape_string($conn, $_POST['confirm_newpass']);

  // Grab token that came from the email link
  $token = $_SESSION['token'];
  if (empty($new_pass) || empty($confirm_newpass)) array_push($error, "Password is required");
  if ($new_pass !== $confirm_newpass) array_push($error, "Password do not match");
  if (count($error) == 0) {
    // select email address of user from the password_reset table
    $sql = "SELECT email FROM password_resets WHERE token='$token' LIMIT 1";
    $results = mysqli_query($conn, $sql);
    $email = mysqli_fetch_assoc($results)['email'];

    if ($email) {
      $hash = password_hash($new_pass, PASSWORD_DEFAULT);
      $sql = "UPDATE signupform SET password ='$hash' WHERE email='$email'";
      $results = mysqli_query($conn, $sql);
      if ($results === TRUE){
          header("location:signin.php");
      }
    }

  }
}
?>


 <section>
  <!-- Signup Form Area -->
  <div class="sign-up-form text-center" >
    <div class="section-heading">
     <h2 class="text-center">Create New Password</h2>
    </div>
    <form action=" " method="post" enctype="multipart/form-data">
        <div class="col-12">
          <input type="password" class="forma-control" name="new_pass" placeholder="Enter New Password" required>
        </div>
        <div class="col-12">
          <input type="password" class="forma-control" name="confirm_newpass" placeholder="Confirm New Password" required>
        </div>
        <div class="col-12">
          <input type="submit" class="btn wynfb-btn" name="submit" value="Create New Password">
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
