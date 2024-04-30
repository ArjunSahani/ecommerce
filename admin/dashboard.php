<!--Header-->
<?php include('layout/header.php'); ?>

<?php
if (!isset($_SESSION['admin_logged_in'])) {
  header('location: login.php');
  exit();
}

?>

<?php



//get orders

  

  $stmt = $conn->prepare("SELECT * FROM orders");

  $stmt->execute();

  $orders = $stmt->get_result();





?>




<div class="container-fluid">
  <div class="row" style="min-height: 1000px;">

    <!--sidemenu-->
    <?php include('sidemenu.php'); ?>
    <!---->


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-warp flex-md-nowrap align-items-center pt-5 pb-2 mb3 bg-light">
        <h1>Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">

          </div>
        </div>
      </div>

      <h2>Orders</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Order Id</th>
              <th scope="col">Order Status</th>
              <th scope="col">User Id</th>
              <th scope="col">Order Date</th>
              <th scope="col">User Phone</th>
              <th scope="col">User Address</th>
            </tr>
          </thead>
          <tbody>


          <?php foreach($orders  as $order ){ ?>



            <tr>

  
<td>
   <span><?php echo $order['order_id']; ?></span>
</td> 

<td>
  <span>₹<?php echo $order['order_status']; ?></span>
</td>

<td>
  <span><?php echo $order['user_id']; ?></span>
</td>

<td>
  <span><?php echo $order['order_date']; ?></span>
</td> 

<td>
  <span><?php echo $order['user_phone']; ?></span>
</td>

<td>
  <span><?php echo $order['user_address']; ?></span>
</td>
</tr>



          </tbody>

        <?php }?>

        </table>



      </div>









    </main>


  </div>