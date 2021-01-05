<?php
session_start();
include 'header.php';
include 'db.php';
// username and password sent from form


if(isset($_POST['login']))
{
if(empty($_POST['email']) || empty($_POST['password']))
{
	$error="Please enter all the details first";
}


$email=$_POST["email"];
$password=$_POST["password"];


// To protect MySQL injection (more detail about MySQL injection)
$email=mysqli_escape_string($conn,filter_var(strip_tags($email),FILTER_SANITIZE_STRIPPED));
$password=mysqli_escape_string($conn,filter_var(strip_tags($password),FILTER_SANITIZE_STRIPPED));
$sql="SELECT * FROM signupform WHERE email='$email'";
$result=mysqli_query($conn,$sql) or die("Your query is not right");
$row=mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

if (password_verify($password, $row['password'])) {

if($count==0){
$error="Email or Password incorrect";
}



// If result matched $email and $password, table row must be 1 row
if($count==1){

// Register $email, $password and redirect to file "payment.php"
//session_register('email');
$_SESSION['email'] = $email;
//session_register('password');
$_SESSION['password'] = $password;

$success="You have successfully logged in";

header("location:payment.php");

}
}else {
	echo '<h6 style="text-align:center; color:red; padding:20px;">Invalid Password.</h6>'; }
}
?>


<!-- Sign in  Form Area -->
<section>
<div class="sign-up-form text-center" >
  <div class="section-heading">
  <h2 class="text-center">Log In</h2>
  </div>
  <form action="" name="login" method="post">

    <div class="row">
      <div class="col-lg-12">
        <input type="email" class="formab-control" required name="email" placeholder="Email" >
      </div>
      <div class="col-12">
        <input type="password" class="formab-control" required name="password" placeholder="Password" >
      </div>
      <div class="col-12">
        <input type="submit" class="btn wynfb-btn" name="login" value="Log In">
      </div>
    </div>

  </form>
	<div style="text-align:left; padding-left: 20px;">
	  <p> Don't have an account? <a href="signup.php" class="btn">Sign Up</a>
			<span style="text-align:right; padding-left: 20px;"><a href="password_reset.php" class="btn"> Forgot Password? </a> </span>
			</p>
		</div>
</div>
</section>

<br>
<br>

<?php
 include 'footer.php';
   ?>
