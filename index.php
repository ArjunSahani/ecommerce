
<!--Header-->
<?php include('layouts/header.php'); ?>

      <!--Home-->
      <section id="home">
        <div class="container">
          <h5>NEW ARRIVALS</h5>
          <h1><span>Best Prices</span>This Seasons</h1>
          <p>We offers the best products for the most affordable prices</p>
          <!---->
          <a href="shop.php" class="btn">SHOP NOW</a>
          <!---->
        </div>
      </section>
 
      <!--brands-->
      <section id="brand" class="container">
        <div class="row">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand1.jpg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand2.jpg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand3.jpg"/>
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12" src="assets/imgs/brand4.jpg"/>
        </div>
      </section>

      <!--New-->
      <section id="new" class="w-100">
        <div class="row p-0 m-0">
          <!--One-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/imgs/1.jpeg"/>
          <div class="details">
            <h2>Roadster collections</h2>
            <a href="shop.php" class="btn">SHOP NOW</a>
          </div>
        </div>

        <!--Two-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/imgs/2.jpeg"/>
          <div class="details">
            <h2>Levi's collection</h2>
            <a href="shop.php" class="btn">SHOP NOW</a>
          </div>
        </div>

        <!--Three-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
          <img class="img-fluid" src="assets/imgs/3.jpeg"/>
          <div class="details">
            <h2>Jack&jones collection</h2>
            <a href="shop.php" class="btn">SHOP NOW</a>
          </div>
        </div>
      </div>
    </section>

<!--Featured-->
<section id="featured" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Our Products</h3>
    <hr class="mx-auto">
    <p>Here you can check out our new featured products</p>
  </div>
   <div class="row mx-auto container-fluid"> 

    <?php include('server/get_featured_products.php'); ?>
 
    <?php while($row= $featured_products->fetch_assoc()){ ?>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/<?php echo $row['product_image']; ?>"/>
       <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i> 
       </div>
     <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
     <h4 class="p-price">₹ <?php echo $row['product_price']; ?></h4>
     <a href="single_product.php?product_id=<?php echo $row['product_id'];?>" class="btn">BUY NOW</a>
    </div>


<?php } ?>

  </div>
</section>



<!--Banner-->
<section id="banner" class="my-5 py-5">
  <div class="container">
    <h4>MID SEASON'S SALE</h4>
    <h1><span>Summer Collection</span><br>UP to 30% OFF</h1>
    <a href="shop.php" class="btn">SHOP NOW</a>

  </div>
</section>

     <!--Products-->
     <section id="products" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
    <h3>Featured products</h3>
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

<!--footer-->
<?php include('layouts/footer.php'); ?>