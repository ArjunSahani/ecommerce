<?php

session_start();

if(isset($_POST['order_pay_btn']) ){
   $order_status = $_POST['order_status'];
   $order_total_price = $_POST['order_total_price'];
}

?>

<!--Header-->
<?php include('layouts/header.php'); ?>


<!--Payment-->

<section class="my-5 py-5">
    <div class="container text-center mt-3 py-5">
        <h3 class="form-weight-bold">Payment</h3>
        <hr class="mx-auto">
    </div>
<div class="mx-auto container text-center">
    
       <?php if(isset($_SESSION['total']) && $_SESSION['total'] !=0){?>
              <p>Total Payment: ₹<?php echo $_SESSION['total']; ?> </p>
              <input class="btn" type="submit" value="Pay Now"/> 
   

              <?php } else if(isset($_POST['order_status']) && $_POST['order_status'] =="not paid"){ ?>
                   <p>Total Payment: ₹<?php echo $_POST['order_total_price']; ?> </p>
                    <input class="btn" type="submit" value="Pay Now"/>

              <?php } else { ?>
                     <p>You don't have an order</p>

                     
        <?php } ?>


</div>
 

</section>








     
<!--Footer-->
<?php include('layouts/footer.php'); ?>
  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
  </html> 