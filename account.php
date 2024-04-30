<?php

session_start();

include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
  header('location: login.php'); 
  exit;
}


if(isset($_GET['logout'])){
  if(isset($_SESSION['logged_in'])){
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    header('location: login.php');
    exit;
  }

}

if(isset($_POST['change_password'])){
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];
  $user_email = $_SESSION['user_email'];


  // if password dont match
if($password !== $confirmPassword){
  header('location: account.php?error=passwords dont match');



//if password <6 char
}else if(strlen($password) <6){
 header('location: account.php?error=password must be atleast 6 charachters');


 //no error
}else{
  $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
  $stmt->bind_param('ss',$password,$user_email);

  if($stmt->execute()){
    header('location: account.php?message=pasword has been updated successfully'); 
  }else{
    header('location: account.php?error=could not update password');
  }

}


}


//get orders
if(isset($_SESSION['logged_in'])){
   
  $user_id = $_SESSION['user_id'];

  $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");

  $stmt->bind_param('i',$user_id);

  $stmt->execute();

  $orders = $stmt->get_result();

}





?>

<!--Header-->
<?php include('layouts/header.php'); ?>

<!--Account-->
<section class="my-5 py-5">
  <div class="row container mx-auto">
    <div class="text center pt-5 col-lg-6 col-md-12 col-sm-12">
    <p class="text_center" style="color:coral;"><?php if(isset($_GET['register_success'])){ echo $_GET['register_success']; }?></p>
    <p class="text_center" style="color:coral;"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }?></p>
    
      <h3>Account info</h3>
      <hr class="mx-auto">
      <div class="account-info">
        <p>Name: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; }?></span></p>
        <p>Email: <span><?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_email']; }?></span></p>
        <p><a href="#orders" id="order-btn">My Orders</a></p>
        <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
      </div>
    </div> 

     <div class="pt-2 col-lg-6 col-md-12 col-sm-12">
      <form id="account-form" method="POST" action="account.php">
      <p class="text_center" style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
      <p class="text_center" style="color:coral;"><?php if(isset($_GET['message'])){ echo $_GET['message']; }?></p>
        <h2>Change Password</h2>
        <hr class="mx-auto"> 
        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" id="account-password" name="password"  placeholder="Password" required/>
        </div>

        <div class="form-group">
          <label>Confirm Password</label>
          <input type="password" class="form-control" id="account-password-confirm" name="confirmPassword"  placeholder="Password" required/>
        </div>

               <div class="form-group">
                <input type="submit" value="Change password" name="change_password" class="btn" id="change-password-btn">

               </div>

      </form>
     </div>


  </div>
</section>

<!--Orders-->
<section id="orders" class="orders container my-5 py-3">
  <div class="container mt-2">
    <h2 class="font-weight-bold text-center">My Orders</h2>
     <hr class="mx-auto">
  </div>

  <table class="mt-5 pt-5">
     <tr>
          <th>Order id</th>
          <th>Order cost</th>
          <th>Order status</th>
          <th>Date</th>
          <th>Order details</th>
    </tr>

    <?php while($row = $orders->fetch_assoc() ){ ?>

    <tr>

  
            <td>
               <span><?php echo $row['order_id']; ?></span>
            </td> 

            <td>
              <span>₹<?php echo $row['order_cost']; ?></span>
            </td>

            <td>
              <span><?php echo $row['order_status']; ?></span>
            </td>

            <td>
              <span><?php echo $row['order_date']; ?></span>
            </td> 

            <td>
              <form method="POST" action="order_details.php">
              <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status"/>
                <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id"/>
                <input class="btn" name="order_details_btn" type="submit" value="details"/>
              </form>
            </td>
    </tr>

   <?php } ?>

  </table>

</section>



<!--Footer-->

<?php include('layouts/footer.php'); ?>


