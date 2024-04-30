<?php

session_start();

include('../server/connection.php');

//if user already registered, then take user to account page
if(isset($_SESSION['admin/logged_in'])){
  header('location: login.php');
  exit;
}








if(isset($_POST['register'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];


//if paaswords dont match
  if($password !== $confirmPassword){
     header('location: register.php?error=passwords dont match');



  //if password <6 char
}else if(strlen($password) <6){
    header('location: register.php?error=password must be atleast 6 charachters');



  //if ther is no error
}else{
 //check weather there is a user with this email
$stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email=?");
$stmt1->bind_param('s',$email);
$stmt1->execute();
$stmt1->bind_result($num_rows);
$stmt1->store_result();
$stmt1->fetch();


//if there is a user already regestered with this email
 if($num_rows != 0){
  header('location: register.php?error=user with this email already exists');

  //if no user registered with email before
 }else{
 
       //create a new user
        $stmt = $conn->prepare("INSERT INTO users(user_name,user_email,user_password)
         VALUES (?,?,?)");

          $stmt->bind_param('sss',$name,$email,$password); //md5 is user for hashing password


           //if account was created sucessfully
          if($stmt->execute()){
                $user_id = $stmt->insert_id;
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_email'] = $email;
                $_SESSION['user_name'] = $name;
                $_SESSION['logged_in'] = true;
                header('location: account.php?register_success=You registered sucessfully');

              //account could not be created
          }else{
            header('location: account.php?register=could not create an account at the movement');

          }


      }
}



}





?>



<!--Header-->
<?php include('layouts/header.php'); ?>


<!--Register-->
<section class="my-5 py-5">
    <div class="container text-center mt-3 py-5">
        <h3 class="form-weight-bold">Register</h3>
        <hr class="mx-auto">
    </div>
<div class="mx-auto container">
    <form id="register-form" method="POST" action="register.php">
      <p style="color:red;"><?php if(isset($_GET['error'])){ echo $_GET['error']; }?></p>
        <div class="form-group">
            <label>Name</label> 
            <input type="text" class="form-control" id="register-name" name="name" placeholder="Name" required/>
        </div>  

        <div class="form-group">
          <label>Email</label> 
          <input type="text" class="form-control" id="register-email" name="email" placeholder="Email" required/>
      </div>  

        <div class="form-group">
            <label>Password</label> 
            <input type="text" class="form-control" id="register-password" name="password" placeholder="Password" required/>
        </div> 
        
        <div class="form-group">
          <label>Confirm Password</label> 
          <input type="text" class="form-control" id="register-confirm-password" name="confirmPassword" placeholder="ConfirmPassword" required/>
      </div> 
      

        <div class="form-group">     
            <input type="submit" class="btn" id="register-btn" name="register" value="Register"/>
        </div> 

        <div class="form-group">     
            <a id="login-url" class="btn" href="login.php">Already have an account? Login</a>
        </div> 

    </form>
</div>
 

</section>








<!--Footer-->
<?php include('layouts/footer.php'); ?>
