
<!--Header-->
<?php include('layout/header.php'); ?>





<?php

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
   header('location: dashboard.php');
   exit;
}

if(isset($_POST['login_btn'])){


$email = $_POST['email'];
$password = $_POST['password'];


$stmt = $conn->prepare("SELECT admin_id, admin_name, admin_email, admin_password FROM admins WHERE admin_email = ? AND admin_password = ? LIMIT 1");

$stmt->bind_param('ss', $email,$password);


if($stmt->execute()){
     $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
     $stmt->store_result();

      if($stmt->num_rows() ==1){
        $stmt->fetch();
 
        $_SESSION['admin_id'] = $admin_id;
        $_SESSION['admin_name'] = $admin_name;
        $_SESSION['admin_email'] = $admin_email;
        $_SESSION['admin_logged_in'] = true;

        header('location: dashboard.php?login_success=logged in successfully');

      }else{
        header('location: login.php?error=could not verify your account');
      }


}else{
 //error
header('location: login.php?error=something went worng');
 
}

}

?>





      <!--Login-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 py-5">
        <h3 class="form-weight-bold">Login</h3>
        <hr class="mx-auto">
    </div>
<div class="mx-auto container">
    <form id="login-form" method="POST" action="login.php">
    <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
        <div class="form-group">
            <label>Admin Email</label> 
            <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
        </div>  

        <div class="form-group">
            <label>Admin Password</label> 
            <input type="text" class="form-control" id="login-password" name="password" placeholder="Password" required/>
        </div> 
        
        <div class="form-group">     
            <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login"/>
        </div>
        
    </form>
</div>
 

</section>



 <!--Footer-->
 <?php include('layout/footer.php'); ?>