<?php
  // Start the session
  session_start();
   include 'db.php';
   include 'header.php';
   if(!$_SESSION['email']){
      echo '<script>window.location="signin.php"</script>';
    }



  if(isset($_POST["submit"])) {

    $v1=rand(1111,9999);

    $fnm=$_FILES["image"]["name"];
    $dst="./img/users-img/".$v1.$fnm;
    $dst1="./img/users-img/".$v1.$fnm;
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);
    $imageFileType = strtolower(pathinfo($dst1,PATHINFO_EXTENSION));

    $email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['email']),FILTER_SANITIZE_STRIPPED));
    $name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));

    // Allow certain file formats, this also confirms if file is an image
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {

         echo '<h6 style="text-align:center; color:red; padding:20px;">Sorry, only JPG, JPEG & PNG  files are allowed.</h6>';


      } else {

        // Check file size
       if ($_FILES["image"]["size"] > 1500000) {
          echo '<h6 style="text-align:center; color:red; padding:20px;">Sorry, Your File is too Large. Maximum size should be 1.5MB.</h6>';

       }else{

        $sql1 = "INSERT INTO users (name, email, image)
        VALUES ('$name', '$email', '$dst1')";
         $result = $conn->query($sql1);

              if ($result === TRUE) {

             echo '<h6 style="text-align:center; color:black; padding:20px;">Photo Has Been Updated!</h6>';
               header('Location: dashboard.php');
      } else {
         echo '<h6 style="text-align:center; color:black; padding:20px;">Image Upload Failed. Please Retry.</h6>';
      }
    }
}
      }


    ?>




    <section>
  <!-- Signup Form Area -->
  <div class="sign-up-form text-center" >
    <div class="section-heading">
    <h2 class="text-center">Edit Photo</h2>
    </div>

    <form action=" " method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-12">
          <input type="file" value="image" name="image" class="forma-control">
        </div>
        <?php
        $sql="SELECT * FROM signupform WHERE email= '".$_SESSION['email']."'";
        $res=mysqli_query($conn,$sql) or die("Your query is not right");
        $row=mysqli_fetch_array($res);
         ?>
        <div class="col-lg-12">
          <input type="hidden"  name="email" value="<?php echo  $row['email'];?>"class="forma-control">
        </div>
        <div class="col-lg-12">
          <input type="hidden"  name="name" value="<?php echo  $row['name'];?>"class="forma-control">
        </div>
        <div class="col-12">
          <input type="submit" class="btn wynfb-btn" name="submit" value="Edit Display Photo">
        </div>
      </div>
    </form>

  </div>

  </section>

  <br>
  <br>

  <?php
 include 'footer.php';
  ?>
