<?php
 include 'header.php';
 include 'db.php';
 ?>


 	<form class="formab" action="login.php" method="post" style="text-align: center;">
 		<p>
 			We sent an email to  <b><?php echo $_GET['email'] ?></b> to help you recover your account.
 		</p>
 	    <p>Please login into your email account and click on the link we sent to reset your password</p>
 	</form>

 </body>
 </html>



 <?php
  include 'footer.php';
  ?>
