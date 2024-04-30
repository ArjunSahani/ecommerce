<!--Header-->
<?php include('layout/header.php'); ?>

<?php
if (!isset($_SESSION['admin_logged_in'])) {
  header('location: login.php');
  exit();
}

?>

<?php


//search
if(isset($_POST['search'])){
 //1. determine page no
 if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
  //if user has already entered page then page number is the one that they selected
  $page_no = $_GET["page_no"];
}else{
  //if user just entered the page the default page is 1
  $page_no = 1;
}

$stmt = $conn->prepare("SELECT COUNT(*) As total_records FROM products FROM products WHERE product_category=? AND product_price<=?");
$stmt->bind_param("si",$category,$price);
$stmt->execute();
$stmt->bind_result($total_records);
$stmt->store_result();
$stmt->fetch();




$category = $_POST['category'];
$price = $_POST['price'];

$stmt = $conn->prepare("SELECT * FROM products FROM products WHERE product_category=? AND product_price<=?");



//3. products per page
$total_records_per_page = 8;

$offset = ($page_no-1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;



$total_no_of_pages = ceil($total_records/$total_records_per_page);


//4. get all products
$stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
$stmt2->execute();
$products = $stmt2->get_result();//[]
   

//return all products

}else{

  //1. determine page no
  if(isset($_GET['page_no']) && $_GET['page_no'] !=""){
    //if user has already entered page then page number is the one that they selected
    $page_no = $_GET["page_no"];
  }else{
    //if user just entered the page the default page is 1
    $page_no = 1;
  }
//2. retuen number of products
$stmt1 = $conn->prepare("SELECT COUNT(*) As total_records FROM products");
$stmt1->execute();
$stmt1->bind_result($total_records);
$stmt1->store_result();
$stmt1->fetch();
 

//3. products per page
$total_records_per_page = 8;

$offset = ($page_no-1) * $total_records_per_page;

$previous_page = $page_no - 1;
$next_page = $page_no + 1;

$adjacents = "2";

$total_no_of_pages = ceil($total_records/$total_records_per_page);



//4. get all products
$stmt2 = $conn->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
$stmt2->execute();
$products = $stmt2->get_result();


}



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

      <h2>Products</h2>

      <?php if(isset($_GET['product_created'])) {?>
        <p class="text-center" style="color: green;"><?php echo $_GET['product_created'];?></p>
      <?php } ?>

      <?php if(isset($_GET['product_failed'])) {?>
        <p class="text-center" style="color: red;"><?php echo $_GET['product_failed'];?></p>
      <?php } ?>




      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Product Id</th>
              <th scope="col">Product Image</th>
              <th scope="col">Product Name</th>
              <th scope="col">Product Price</th>
              <th scope="col">Product Category</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody>


          



            <tr>
            <?php foreach($products as $product){ ?>
  
<td>
   <span><?php echo $product['product_id']; ?></span>
</td> 

<td>
  <span><img src="<?php echo "../assets/imgs/". $product['product_image']; ?>" style="width: 50px;"/></span>
</td>

<td>
  <span><?php echo $product['product_name']; ?></span>
</td>

<td>
  <span><?php echo $product['product_price']; ?></span>
</td> 

<td>
  <?php echo $product['product_category']; ?></span>
</td>
<form action="delete.php">
<input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
<td><input type="submit" name="button" class="red" value="Delete"/></td>
</form>

</tr>

 </tbody>

   <?php }?>

</table>



      </div>









    </main>


  </div>