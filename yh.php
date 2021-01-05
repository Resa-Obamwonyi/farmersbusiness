
if(isset($_POST["submit"]))	{
  if(empty($_POST['email']) ||empty($_POST['name']) ||empty($_POST['password']) ||empty($_POST['confirm_password']))
    {

      if ($password == $confirm_password) {


      $error="Please enter all the details first";
      $success="Sign Up Successful";


     $email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
     $name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
     $password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));
     $confirm_password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirm_password']),FILTER_SANITIZE_STRIPPED));

     $_SESSION['email']=$email;
     // Send registration confirmation link (verify.php)
     $headers .= "From: Farmers Business<info@farmersbusinessonline.com> \r\n";
     $to      = $email;
     $subject = 'Welcome to Farmers Business';
           $message_body = 'Hello '.$name.'.Your account with Farmers Business has been successfully created.
     Thank you.'	;

           mail( $to, $subject, $message_body,$headers );

        $sql = "INSERT INTO signupform (email,name,password)
        VALUES ('$email','$name','$password')";
                if ($conn->query($sql) === TRUE) {
      echo '<script>window.location="payment.php"</script>'; ;

    }
    }         else {
          echo '<h5 style="text-align:center; color:red; padding: 20px;"> Error: Passwords Do not Match </h5> <br>' . $conn->error;

          }

     } else {
        echo 'Error'.$sql. '<br>' . $conn->error;
        echo '<h5 style="text-align:center; color:red; padding: 20px;"> Error: Passwords Do not Match </h5> <br>' . $conn->error;
      }

  }
