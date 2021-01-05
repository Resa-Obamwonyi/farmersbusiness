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
  $email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
  $name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
  $product=mysqli_escape_string($conn,filter_var(strip_tags($_POST['product']),FILTER_SANITIZE_STRIPPED));
  $amount=mysqli_escape_string($conn,filter_var(strip_tags($_POST['amount']),FILTER_SANITIZE_STRIPPED));
  $password=mysqli_escape_string($conn,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));

  $_SESSION['email']=$email;
       $sql = "INSERT INTO cashout (email,name,product,amount)
       VALUES ('$email','$name','$product', '$amount')";
               if ($conn->query($sql) === TRUE) {
    echo '<script>window.location="dashboard.php"</script>';
  } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
  }
       }
  }
  ?>



 <section>
  <!-- Signup Form Area -->
  <div class="sign-up-form text-center" >
    <div class="section-heading">

    <h2 class="text-center">Make Withdrawal</h2>
    </div>
    <form action=" " method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-12">
          <input type="hidden"  name="email" value="<?php echo  $email;?>"class="forma-control">
        </div>

        <div class="col-lg-12">
          <input type="hidden"  name="name" value="<?php echo  $name;?>"class="forma-control">
        </div>
        <div class="col-lg-12">
          <input type="text" class="forma-control" name="product" placeholder="Product" required>
        </div>
        <div class="col-lg-12">
            <input type="number" class="forma-control" required name="amount" placeholder="₦" >
        </div>
        <div class="col-12">
          <input type="password" class="forma-control" name="password" placeholder=" Password" required>
        </div>
        <div class="col-12">
          <input type="submit" class="btn wynfb-btn" name="submit" value="Make Withdrawal">
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
