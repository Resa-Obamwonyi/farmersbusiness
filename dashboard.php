<?php
  // Start the session
  session_start();
   include 'db.php';
   include 'header.php';
   if(!$_SESSION['email']){
      echo '<script>window.location="signin.php"</script>';
    }

 $sql="SELECT * FROM users WHERE email= '".$_SESSION['email']."' ORDER BY id DESC LIMIT 1";
        $res=mysqli_query($conn,$sql) or die("Your query is not right");
        $row=mysqli_fetch_array($res);

$sql1="SELECT * FROM signupform WHERE email= '".$_SESSION['email']."' ";
        $res1=mysqli_query($conn,$sql1) or die("Your query is not right");
        $row1=mysqli_fetch_array($res1);

  ?>



  <section>

<div>

    <table id="custom" style="margin-bottom:50px;">
       <tr>
       <th>
         <img src="<?=((isset($row['image']))? $row['image'] :'img/bg-img/bw.png');?> " alt="" style="border-radius:48%; height:400px; width:400px; background-size:contain; text-align: center; ">
       </th>
       </tr>

       <tr>
       <td><?php echo $row1["name"];?></td>
       </tr>
   </table>

 </div>

  		<div class="table-responsive">

  				<table id="customers" style="margin-bottom:50px";>
             <p style="padding-left:130px; font-size:20px;"><img src="img/core-img/sprout.png"> </p>
               <tr>
                  <th width="25%">Current Investments</th>
                  <th width="10%">Unit(s)</th>
                  <th width="15%">Total Investment</th>
  	              <th width="20%">Returns/Expected Income</th>
                  <th width="15%">Withdrawal Date</th>
                  <th width="25%">Make Withdrawal</th>
               </tr>
               <?php

               $sql = "SELECT * FROM payment where email = '".$_SESSION['email']."' AND token = 1";
               $result = $conn->query($sql);
               $row = $result->fetch_assoc();
               $date = $row["date_created"];
               $cashdate = date('Y-m-d',strtotime($date. '+ 6 months'));
               $timezone= date_default_timezone_get();
               $current_date = date('Y-m-d',time());
               if ($result->num_rows > 0) {
               // output data of each row
               while($row = $result->fetch_assoc()) {

               ?>
               <tr>
                  <td><?php echo $row["product"];?></td>
                  <td><?php echo $row["unit"];?></td>
                  <td>₦<?php echo $row["totalbill"]/100;?></td>
                  <td>₦<?php echo $row["totalbill"]*3/200; ?></td>
                  <td><?php echo date('Y-m-d',strtotime($date. '+ 6 months')); ?></td>
                  <td><?php if ($current_date===$cashdate){

                   echo '<a href="withdraw.php" class="btn wynfb-btn">Withdraw</a>';
                }
          ?> </td>

  	           </tr>

                <?php
                }
                } else {
                echo '<h6 style="text-align:center; color:red; padding:20px;">Sorry, Unable to Checkout.</h6>';
                }

                ?>


           </table>

       </div>



 </section>

 <?php
 include 'footer.php';
  ?>
