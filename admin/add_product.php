
<?php include('layout/header.php'); ?>




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

      <h2>Add product</h2>
      <div class="table-responsive">
        

      <div class="mx-auto container">
        <form id="create-form" enctype="multipart/form-data" method="POST" action="create_product.php">
            <P></P>
            <div class="form-group mt-2">
                <label>Title</label>
                <input type="text" class="form-control" name="name" id="product-title" placeholder="Title" required/>

            </div>

            <div class="form-group mt-2">
                <label>Description</label>
                <input type="text" class="form-control" name="description" id="product-desc" placeholder="description" required/>

            </div>

            <div class="form-group mt-2">
                <label>Price</label>
                <input type="text" class="form-control" name="price" id="product-price" placeholder="price" required/>

            </div>


            <div class="form-group mt-2">
                <label>Special offer/Sale</label>
                <input type="text" class="form-control" name="offer" id="product-sale" placeholder="Sale%" required/>

            </div>
            

            <div class="form-group mt-2">
                <label>Category</label>
                <select class="form-select" required name="category">
                    <option value="bags">Bags</option>
                    <option value="shoes">Shoes</option>
                    <option value="watches">Watches</option>
                    <option value="clothes">Clothes</option>
                </select>
            </div>


            <div class="form-group mt-2">
                <label>Color</label>
                <input type="text" class="form-control" name="color" id="product-color" placeholder="Color" required/>


            <div class="form-group mt-2">
                <label>Image 1</label>
                <input type="file" class="form-control" name="image1" id="image1" placeholder="Image-1" required/>
            </div>

            <div class="form-group mt-2">
                <label>Image 2</label>
                <input type="file" class="form-control" name="image2" id="image2" placeholder="Image-2" required/>
            </div>

            <div class="form-group mt-2">
                <label>Image 3</label>
                <input type="file" class="form-control" name="image3" id="image3" placeholder="Image-3" required/>
            </div>

            <div class="form-group mt-2">
                <label>Image 4</label>
                <input type="file" class="form-control" name="image4" id="image4" placeholder="Image-4" required/>
            </div>

            <div class="form-group mt-3">
                <input type="submit" class="btn" name="create_product" value="create"/>
            </div>




        </form>

      </div>




      </div>









    </main>


  </div>