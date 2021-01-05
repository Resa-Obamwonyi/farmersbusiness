<?php
session_start();
  include 'db.php';
  include 'header.php';
  if(!$_SESSION['email']){
     echo '<script>window.location="signup.php"</script>';
   }

  ?>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {

       if(isset($_POST["submit"]))
       {

  $email=$_SESSION['email'];
  $acc_name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
  $acc_num=mysqli_escape_string($conn,filter_var(strip_tags($_POST['num']),FILTER_SANITIZE_STRIPPED));
  $bank=mysqli_escape_string($conn,filter_var(strip_tags($_POST['bank']),FILTER_SANITIZE_STRIPPED));
  $password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));

  $sql="SELECT * FROM signupform WHERE email='".$_SESSION['email']."'";
  $res=mysqli_query($conn,$sql) or die("Your query is not right");
  $row=mysqli_fetch_array($res);

  if (password_verify($password, $row['password'])) {

  $_SESSION['email']=$email;
       $sql = "INSERT INTO bank-details (email,name,acc_num,bank)
       VALUES ('$email','$acc_name','$acc_num','$bank')";

               if ($conn->query($sql) === TRUE) {
    echo '<h6 class="text-center">Your Account Details Have Been Successfully Saved.</h6>';
    header('Location: dashboard.php');
  } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
  }
}else {
  echo '<h6 class="text-center text-danger">Your Password Is Incorrect.</h6>';
}
     }
  }
  ?>



 <section>
  <!-- Signup Form Area -->
  <div class="sign-up-form text-center" >
    <div class="section-heading">

    <h2 class="text-center">Add Account Details</h2>
    </div>
    <form action=" " method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-12">
          <input type="hidden"  name="email" value="<?php echo  $email;?>"class="forma-control">
        </div>
        <div class="col-lg-12">
          <input type="text"  name="name" placeholder="Account Name" class="forma-control">
        </div>
        <div class="col-lg-12">
          <input type="text"  name="num" placeholder="Account Number" class="forma-control">
        </div>
        <div class="col-lg-12">
          <input type="text"  name="bank" placeholder="Bank Name" class="forma-control">
        </div>
        <div class="col-12">
          <input type="password" class="forma-control" name="password" placeholder=" Password" required>
        </div>
        <div class="col-12">
          <input type="submit" class="btn wynfb-btn" name="submit" value="Add Account">
        </div>
      </div>
    </form>

  </div>

  </section>
  <!-- ##### Sign up End ##### -->
 <br>
 <br>






 <?php
 include 'footer.php'
  ?>
