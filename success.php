<?php
// Start the session
session_start();
include ('header.php');
include 'db.php';

?>
<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];




    $conn = new mysqli('localhost','root','','farmersbusiness');
    if ($conn->connect_error) {
      die('connection failed: '.$conn->$connect_error);
    }else {

      $stmt = $conn->prepare("insert into signupform(name, email, password) values(?, ?, ?)");
      $stmt->bind_param("sss", $name, $email, $password);
      $stmt->execute();
      $stmt->close();
      $conn->close();
    }

?>

	<section>
		<div>
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div>
			   			<div class="text-center" style="text-align: center;padding-top: 50px; padding-bottom:100px;">
			   				<div>
			   					<h4><strong>Hello <?php  echo"".$_POST['name']. " ";?>, Your account has been successfully created.</strong></h4>
									<h5>Thank you very much.</h5>
									<p><a class="btn wynfb-btn" href="payment.php">Complete Investment</a></p>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
	  	</div>
	</section>

	<?php

	include ('footer.php');
	?>
