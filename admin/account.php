<!--Header-->
<?php include('layout/header.php'); ?>



<div class="container-fluid">
 <div class="row" style="min-height: 1000px;">

 <!--sidemenu-->
<?php include('sidemenu.php');?>
 <!---->


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-warp flex-md-nowrap align-items-center pt-5 pb-1 mb2 bg-light">
<h1>Account info</h1>
<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">

  </div>
</div>
</div>
<hr class="mx-auto">
      <div class="account-info">
        <p>Name: <span><?php if(isset($_SESSION['admin_name'])){ echo $_SESSION['admin_name']; }?></span></p>
        <p>Email: <span><?php if(isset($_SESSION['admin_name'])){ echo $_SESSION['admin_email']; }?></span></p>
        <p><a class="btn" href="logout.php?logout=1" id="logout-btn">Logout</a></p>
      </div>



</main>


</div>

  






<!--Account
<div class="container-fluid">
 <div class="row" style="min-height: 1000px;">
<div class="row container mx-auto">
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<div class="d-flex justify-content-between flex-warp flex-md-nowrap align-items-center my-5 py-5 bg-light">
<h1 class="h2">Account info</h1>

<div class="btn-toolbar mb-2 mb-md-0">
  <div class="btn-group me-2">
    <p class="text_center" style="color:coral;"><?php if(isset($_GET['login_success'])){ echo $_GET['login_success']; }?></p>
    
      
      <hr class="mx-auto">
      <div class="account-info">
        <p>Name: <span><?php if(isset($_SESSION['admin_name'])){ echo $_SESSION['admin_name']; }?></span></p>
        <p>Email: <span><?php if(isset($_SESSION['admin_name'])){ echo $_SESSION['admin_email']; }?></span></p>
        <p><a href="logout.php?logout=1" id="logout-btn">Logout</a></p>
      </div>

      </section>
</main>
</div-->