<?php

include('server/connection.php');


if(isset($_GET['product_id'])){


  $product_id = $_GET['product_id'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_id= ?");
  $stmt->bind_param("i",$product_id);

  $stmt->execute();
  
  $products = $stmt->get_result(); 
  


  //no product id was given//
}else{

header('location: index.php');

} ?>

<!--Header-->
<?php include('layouts/header.php'); ?>


          <!--Single product-->
<section class="container single-product my-5 pt-5">
<div class="row mt-5">

<?php while($row= $products->fetch_assoc()){ ?>

  <div class="col-lg-5 col-md-6 col-sm-12">
    <img class="img-fluid w-100 pd-1" src="assets/imgs/<?php echo $row['product_image'];?>" id="MainImg">
    <div class="small-img-group">
      <div class="small-img-col">
        <img src="assets/imgs/<?php echo $row['product_image'];?>" width="100%" class="small-img"/>
      </div>
      <div class="small-img-col">
        <img src="assets/imgs/<?php echo $row['product_image2'];?>" width="100%" class="small-img"/>
      </div>
      <div class="small-img-col">
        <img src="assets/imgs/<?php echo $row['product_image3'];?>" width="100%" class="small-img"/>
      </div>
      <div class="small-img-col">
        <img src="assets/imgs/<?php echo $row['product_image4'];?>" width="100%" class="small-img"/>
      </div>
    </div> 
  </div>

  

<div class="col-lg-6 col-md-6 col-12">
  <h6><?php echo $row['product_category']; ?></h6>
  <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
  <h2>₹<?php echo $row['product_price']; ?></h2>

  
  <form method="POST" action="cart.php">
   <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
   <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
   <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
   <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>

     <input type="number" name="product_quantity" value="1"/>
     <button class="btn" type="submit" name="add_to_cart">Add To Cart</button>
  </form>

 
  <h4 class="mt-5 mb-5">Product details</h4>
  <span><?php echo $row['product_description']; ?>
  </span>
</div>   



<?php } ?>

</div>
</section>




<!--Realated products-->
<section id="realated-products" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Realated products</h3>
    <hr class="mx-auto">
  </div>
   <div class="row mx-auto container-fluid"> 

    <?php include('server/get_related_products.php'); ?>
 
    <?php while($row= $related_products->fetch_assoc()){ ?>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
     <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
     <h4 class="p-price">₹ <?php echo $row['product_price']; ?></h4>
     <a href="single_product.php?product_id=<?php echo $row['product_id'];?>" class="btn">BUY NOW</a>
    </div>
<?php } ?>
  </div>
</section>
          
 
<!--Footer-->
<?php include('layouts/footer.php'); ?>

<!--product_img-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

      <script> 
var MainImag=document.getElementById('MainImg');
var SmallImg=document.getElementsByClassName('small-img');

for(let i=0; i<4; i++){
SmallImg[i].onclick = function(){
  MainImg.src = SmallImg[i].src;
}
}
      </script>
         