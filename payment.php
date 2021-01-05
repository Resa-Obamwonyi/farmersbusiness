<?php
// Start the session
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
if(empty($_POST['email']) ||empty($_POST['name']) ||empty($_POST['product']) ||empty($_POST['unit'])|| empty($_POST['totalbill']))
{
	$error="Please enter all the details first";
	$success="Units Requested";
}



$email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
$name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
$product=mysqli_escape_string($conn,filter_var(strip_tags($_POST['product']),FILTER_SANITIZE_STRIPPED));
$unit=mysqli_escape_string($conn,filter_var(strip_tags($_POST['unit']),FILTER_SANITIZE_STRIPPED));
$totalbill= $product *$unit*100;
$token= 0;


$csql= "SELECT SUM(unit) AS unit_sum FROM payment WHERE product = '".$product."' AND token = 1";

$results = $conn->query($csql);
$row = mysqli_fetch_assoc($results);

$available = 25 - $row['unit_sum'];

if ($unit > $available) {
   echo '<h6 style="text-align:center; color:red;"> Available Units Surpassed. There are only '.$available.' units available </h6>';
 }else{
$_SESSION['email']=$email;
			$sql = "INSERT INTO payment (email,name,product,unit,totalbill,token)
			VALUES ('$email','$name','$product', '$unit','$totalbill','$token')";
							if ($conn->query($sql) === TRUE) {
   echo '<script>window.location="checkout.php"</script>'; ;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

			}
}
?>

<section>
<div class="sign-up-form text-center" >
  <div class="section-heading">
  <h2 class="text-center">Complete Investment</h2>
  </div>

  <form action="" name="payment" method="post">

    <?php

  $sql = "SELECT * FROM signupform where email = '".$_SESSION['email']."'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    ?>

    <div class="row">

      <div class="col-lg-12">
        <input type="hidden" id="email" name="email" value="<?php echo  $row['email'];?>"class="formab-control">
      </div>

      <div class="col-lg-12">
        <input type="hidden" id="name" name="name" value="<?php echo  $row['name'];?>"class="formab-control">
      </div>

        <div class="col-12">
          <select class="forma-control" placeholder="Select Investment" name="product" required style="color: black;">
            <option value="15000">Piggery ₦15,000</option>
            <option value="10000">Poultry ₦10,000</option>
            <option value="7500">Watermelons ₦7,500</option>
            <option value="20000">Rice Fields ₦20,000</option>
          </select>
        </div>

      <div class="col-12">
        <input type="number" class="forma-control" required name="unit" placeholder="Number of Units" >
      </div>

      <div class="col-12">
        <input type="submit" class="btn wynfb-btn" name="submit" value="Check Out">
      </div>
    </div>
  </form>

  <?php
  }
  } else {
  echo "not selected";
  }

  ?>

</div>
</section>

<br>
<br>



 <?php
  include 'footer.php';
  ?>
