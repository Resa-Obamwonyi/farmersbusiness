<?php
session_start();
 include 'db.php';
 include 'header.php';
 if(!$_SESSION['email']){
    echo '<script>window.location="checkout.php"</script>';
  }
  ?>

  <?php

      $token = 1;
      $sql = "UPDATE payment SET token ='$token' WHERE email= '".$_SESSION['email']."' AND token = 0  ORDER BY date_created  DESC LIMIT 1";
      $results = mysqli_query($conn, $sql);
      if ($results===TRUE) {
         header("location:dashboard.php");
      } else {
     echo "Update Failed";
    }
    ?>
