<?php
  // Start the session
  session_start();
   include 'db.php';
   include 'header.php';
   if(!$_SESSION['email']){
      echo '<script>window.location="signup.php"</script>';
    }

  ?>


 <!--parallax image before About us -->
 <div class="hero-area">
   <div class="welcome-slides owl-carousel">
 <!-- Single Welcome Slides -->
 <div class="single-welcome-slides bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/m2.jpg); height: 400px;">
   <div class="container h-100">
     <div class="row h-100 align-items-center">
       <div class="col-12">
         <div class="welcome-content" style="text-align: center; font-size: 50px;">
           <h2 >Check-Out</h2>
         </div>
       </div>
     </div>
   </div>
 </div>

 </div>
 </div>
 <!--end of parallax -->


 <section>
     <div>
      <h2 style="padding-top: 40px; padding-bottom: 20px; text-align: center;"><strong>Bill</strong></h2>
     </div>
     
 		     <div class="table-responsive">
 				    <table id="customers" style="margin-bottom:50px";>
               <tr>
                  <th width="50%"><strong>Name</strong></th>
                  <th width="20%"><strong>Product</strong></th>
 	                <th width="10%"><strong>Unit(s)</strong></th>
 	                <th width="20%"><strong>Total Bill</strong></th>
              </tr>

      <?php
      $sql = "SELECT * FROM payment where email = '".$_SESSION['email']."' AND token = 0 ORDER BY date_created DESC LIMIT 1";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
      ?>
       <tr>
          <td><?php echo $row["name"];?></td>
          <td><?php echo $row["product"];?></td>
          <td><?php echo $row["unit"];?></td>
          <td>₦<?php echo $row["totalbill"]/100;?></td>
 	    </tr>
      </table>
</div>
</section>


<br>
<br>

    <div class="col-12" style="padding-bottom: 40px; text-align: center;">
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <button style="text-align:center;" type="button" onclick="payWithPaystack()" name="submit" class="btn wynfb-btn"> Pay </button>
</div>
 

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_cf1b9a14924b002efea8f13717889cf4182cb7d0',
      email: '<?php echo $row["email"];?>',
      amount: '<?php echo $row ["totalbill"];?>',
      currency: "NGN",
      metadata: {
         custom_fields: [
            {
                display_name: "Email",
                variable_name: "email",
                value: "<?php echo $row["email"];?>"
            }
         ]
      },
      callback: function(response){
          window.location="update.php";
          alert('Your Investment was successful. transaction ref is ' + response.reference);
      },
      onClose: function(){
          alert('Sorry, Payment was canceled, please try again');
      }
    });
    handler.openIframe();
  }
</script>



<?php
}
} else {
echo "unable to checkout";
}

?>
<?php
 include 'footer.php';
 ?>
