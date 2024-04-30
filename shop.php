<?php

include('server/connection.php');

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

$adjacents = "2";

$total_no_of_pages = ceil($total_records/$total_records_per_page);


//4. get all products
$stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category=? AND product_price<=? LIMIT $offset,$total_records_per_page");
$stmt2->bind_param("si",$category,$price);
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


<!--Header-->
<?php include('layouts/header.php'); ?>



<!--search-->

<section id="search" class="my-5 py-5 ms-2">
  <div class="container mt-5 py-5">
    <p>Search Products</p>
    <hr>
  </div>

  
        <form action="shop.php" method="POST">
          <div class="row mx-auto container">
            <div class="col-lg-12 col-md-12 col-sm-12">

            <p>Category</p>
            <div class="form-check">
              <input class="form-check-input" value="polo_tshirt" type="radio" name="category" id="category_one">
              <label class="form-check-label" for="flexRadioDefault1">
               Polo Tee
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" value="tshirt" type="radio" name="category" id="category_two">
              <label class="form-check-label" for="flexRadioDefault2">
               T-shirt
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" value="shirt" type="radio" name="category" id="category_two">
              <label class="form-check-label" for="flexRadioDefault2">
               Shirt
              </label>
            </div>


            <div class="row mx-auto container mt-5">
               <div class="col-lg-12 col-md-12 col-sm-12">

                <p>Price</p>
                <input type="range" class="form-range w-75" name="price" value="600" min="1" max="1000" id="customRange2">
                <div class="w-75">
                  <span style="float:left;">1</span>
                  <span style="float:right;">1000</span>
                </div>
             </div>
            </div> 

        </form>

        <div class="form-group my-3 mx-3">
              <input type="submit" name="search" value="Search" class="btn">
            </div>

 </section>
 
 


<!--Shop-->
<section id="content" class="my-5 py-5 ms-2 ">
  <div class="container text-right mt-5 py-5">
    <h3>Our Collections</h3>
    <hr class="mx-auto">
  </div>
   <div class="row mx-auto container"> 

    <?php include('server/get_featured_products.php'); ?>
 
    <?php while($row= $products->fetch_assoc()){ ?>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
      
     <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
     <h4 class="p-price">₹ <?php echo $row['product_price']; ?></h4>
     <a href="single_product.php?product_id=<?php echo $row['product_id'];?>" class="btn">BUY NOW</a>
    </div>


<?php } ?>

  </div>
</section>





      <nav aria-label="Page navigation example" class="mx-auto">
        <ul class="pagination mt-5 mx-auto">

        <li class="page-item <?php if($page_no<=1){echo 'disabled';}?>">
          <a class="page-link" href="<?php if($page_no <= 1){echo '#';}else{echo "?page_no=".($page_no-1);}?>">Previous</a>
      </li>

        <li class="page-item"><a class="page-link" href="page_no=1">1</a></li>
        <li class="page-item"><a class="page-link" href="page_no=2">2</a></li>
        <?php if($page_no >=3) {?>
        <li class="page-item"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="<?php echo "?page_no=".$page_no;?>"<?php echo $page_no?>>Next</a></li>
        <?php } ?>

        
        <li class="page-item <?php if($page_no >= $total_no_of_pages){echo 'disabled';}?>">
      <a class="page-link" href="#"></a></li>

        </ul>
      </nav>


    </div>
  </section>      


<!--Footer-->
<?php include('layouts/footer.php'); ?>
