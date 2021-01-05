<?php
 session_start();
 include 'db.php';
 include 'header.php';
 if(!$_SESSION['email']){
    echo '<script>window.location="signup.php"</script>';
  }
 ?>

 <?php

 $sql = "SELECT * FROM signupform where email = '".$_SESSION['email']."'";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {
 // output data of each row
 while($row = $result->fetch_assoc()) {
 ?>


<section>

 <div class="table-responsive">
   <h2 style="text-align:center; padding:20px;"> Edit Profile </h2>

  <table id="customers">
   <tr>
     <th>Name</th>
     <th>Email</th>
     <th>Password</th>
   </tr>

   <tr>
     <td><?php echo $row["name"];?> <span style="float:right;"><a href="change_name.php">Edit</a></span></td>
     <td><?php echo $row["email"];?> <span style="float:right;"><a href="change_email.php">Edit</a></span></td>
     <td> <span><a href="change_password.php">Edit Password</a></span></td>
   </tr>
  </table>
 </div>

 <?php
 }
 } else {
 echo "unable to make changes";
 }

 ?>
 <br>
 <br>
</section>



 <?php
  include 'footer.php';
  ?>
