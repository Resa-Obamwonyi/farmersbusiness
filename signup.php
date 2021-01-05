<?php
 session_start();
 include 'header.php';
 include 'db.php';
 ?>

 <?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
              $name = $_POST['name'];
              $email = $_POST['email'];
 			        $password = $_POST['password'];
              $confirm_password = $_POST['confirm_password'];
              $hash = password_hash($password, PASSWORD_DEFAULT);
              $token = 0;

              $sql_u = "SELECT * FROM signupform WHERE name='$name'";
  	          $sql_e = "SELECT * FROM signupform WHERE email='$email'";
  	          $res_u = mysqli_query($conn, $sql_u);
  	          $res_e = mysqli_query($conn, $sql_e);

  	          if (mysqli_num_rows($res_u) > 0) {
  	           echo '<h6 style="text-align:center; color:red; padding:20px;">Sorry, Name Already Exists In Database.</h6>';
  	          }else if(mysqli_num_rows($res_e) > 0){
  	           echo '<h6 style="text-align:center; color:red; padding:20px;">Sorry, Email Already Exists In Database.</h6>';
  	          }else{


if (strlen($password) < 6) {
                echo '<h6 style="text-align:center; color:red; padding:20px;">Password must be at least six characters.</h6>';
              }else {


if ($password === $confirm_password) {



               if(isset($_POST["submit"]))
          			{


            $email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
            $name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
            $password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));
            $confirm_password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirm_password']),FILTER_SANITIZE_STRIPPED));
            $token = $token;

            $_SESSION['email']=$email;
            // Send registration confirmation link (verify.php)
 	           $headers = "From: Farmers Business<info@farmersbusinessonline.com> \r\n";
                    $to      = $email;
                    $subject = 'Welcome to Farmers Business';
                    $message_body = 'Hello '.$name.'.Your account with Farmers Business has been successfully created.
                    Thank you.'	;

                    mail( $to, $subject, $message_body,$headers );


 			           $sql = "INSERT INTO signupform (email,name,password,token)
 			           VALUES ('$email','$name','$hash','$token')";

 							           if ($conn->query($sql) === TRUE) {
               echo '<script>window.location="payment.php"</script>'; ;
           } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }


}
} else {
  header('location: signup.php?error=password');
  exit;
}
}
}
}
 ?>


  <!-- ##### Breadcrumb Area Start ##### -->
    
  <div class="wynfb-breadcrumb">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- ##### Breadcrumb Area End ##### -->



  <!-- ##### Contact Area Start ##### -->
    <div class="container">
      <div class="row justify-content-between">

        <!-- Contact Content -->
        <div class="col-12 col-lg-12">
          <div class="sign-up-form text-center" >
            <!-- Section Heading -->
            <div class="section-heading">
              <h2><span>Sign Up</span></h2>
              <img src="img/core-img/decor.png" alt="">
            </div>
            <!-- Contact Form Area -->
            <div class="contact-form-area">
<form action=" " method="post" enctype="multipart/form-data">
     <div class="row">
       <div class="col-lg-12">
         <input type="text" class="forma-control" name="name" placeholder=" First Name and Surname" required>
       </div>
       <div class="col-lg-12">
         <input type="email" class="forma-control" name="email" placeholder=" Email" required>
       </div>
       <div class="col-12">
         <input type="password" class="forma-control" name="password" placeholder="Enter Password" required>
       </div>
       <div class="col-12">
         <input type="password" class="forma-control" name="confirm_password" placeholder="Confirm Password" required>
       </div>
       <div class="col-12">
         <input type="submit" class="btn wynfb-btn" name="submit" value="Sign Up">
       </div>
     </div>
   </form>
   <div style="text-align:left; padding-left: 20px;">
  <p> Already have an account? <a href="signin.php" class="btn">Sign In</a></p>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- ##### Contact Area End ##### -->

  <?php
 include 'footer.php';
   ?>
