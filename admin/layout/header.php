<?php session_start(); ?>

<?php
    include('../server/connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
  

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     


     <style>
.bd-placeholder-img{
font-size: 1.125rem;
text-anchor: middle;
-webkit-user-select: none;
-moz-user-select: none;
user-select: none;
}
@media (min-width: 768px){
  .bd-placeholder-img-lg{
    font-size: 3.5rem;
  }
}

  </style>

<link rel="stylesheet" href="/admin/assets/adminstyle.css"/>
</head>
<body>




    <!--Navbar-->
    <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top">
        <div class="container">
          <img class="logo" src="../assets/imgs/logo.jpg" width="30px"/>
          <h2>rtistic</h2>
   
          
          <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <?php if(isset($_SESSION['admin_logged_in'])) { ?>
                <a  class="nav-link px-3" href="logout.php?logout=1">Sign out</a>
                <?php } ?>
            </div>
        </div>
      </nav>

      </header>
