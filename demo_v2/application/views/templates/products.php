    <?php //echo $_SERVER['REQUEST_URI']; ?>

<!-- Modal Delete Product-->
<div class="modal fade" id="modal-delete-product" tabindex="-1" role="dialog" aria-labelledby="label-delete-product" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="text-danger">Do you want delete this product ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Product-->
<div class="modal fade" id="modal-add-new-product" tabindex="-1" role="dialog" aria-labelledby="label-add-new-product" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group mb-2">
            <label for="type-product">Type</label>
            <select name="type-product" id="type-product" class="form-control">
              <option value="">Drink</option>
              <option value="">Food</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <label for="name-product">Name</label>
            <input type="text" name="name-product" id="name-product" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label for="price-product">Price</label>
            <input type="number" name="price-product" id="price-product" class="form-control" placeholder="VND">
          </div>
          <div class="form-group">
            <label for="image-product">Choose Image</label>
            <input type="file" name="image-product" id="image-product" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">Add</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="label-edit-product" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <div class="form-group mb-2">
            <label for="type-product">Type</label>
            <select name="type-product" id="type-product" class="form-control">
              <option value="">Drink</option>
              <option value="">Food</option>
            </select>
          </div>
          <div class="form-group mb-2">
            <label for="name-product">Name</label>
            <input type="text" name="name-product" id="name-product" class="form-control">
          </div>
          <div class="form-group mb-2">
            <label for="price-product">Price</label>
            <input type="number" name="price-product" id="price-product" class="form-control" placeholder="VND">
          </div>
          <div class="form-group mb-2">
            <label for="description-product">Description</label>
            <select name="description-product" id="description-product" class="form-control">
              <option value="Availabel">Available</option>
              <option value="Out of stock">Out of stock</option>
            </select>
          </div>
          <div class="form-group">
            <label for="image-product">Choose Image</label>
            <input type="file" name="image-product" id="image-product" class="form-control">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info">Add</button>
      </div>
    </div>
  </div>
</div>



    <!-- Page Content -->
      <div class="row">

        <div class="col-lg-12">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="<?php echo base_url('public/products/images/background1.jpg'); ?>" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('public/products/images/background2.jpg'); ?>" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="<?php echo base_url('public/products/images/background3.jpg'); ?>" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">

          <?php foreach($products as $product):?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="<?php echo base_url($product['image']); ?>" alt=""></a>
                <div class="card-body">
                  <h4 class="card-title">
                    <a href="#"><?php echo $product['name']; ?></a>
                  </h4>
                  <h5><?php echo $product['price']; ?> VND</h5>
                  <p class="card-text"><?php echo $product['description']; ?></p>
                  <!--=============EDIT================-->
                  <?php if(isset($type)){
                    if($type == 'permiss_edit'){?>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-edit-product" class="btn btn-outline-info">Edit</a>
                      <a href="javascript:void(0);" data-toggle="modal" data-target="#modal-delete-product" class="btn btn-outline-danger">Delete</a>
                  <?php }
                  }?>
                  <!--============ORDER=============-->
                  <?php if($_SERVER['REQUEST_URI'] == "/project/demo/index.php/manage_products/show_products"): ?>
                  <a id="btn-order-product-<?php echo $product['id'];?>" href="javascript:void(0);" class="btn btn-outline-success">Order</a>
                  <span id="is-choosen-<?php echo $product['id'];?>" 
                    style="<?php $flag = false; foreach($productsInvoice as $productInvoice){
                                                    if($productInvoice['id_product'] == $product['id']){
                                                      $flag = true;
                                                      break;
                                                    }
                                                }
                                                if($flag){?>
                                                  display: inline-block;
                                          <?php }else{?>
                                                  display: none;
                                          <?php }
                                    reset($productsInvoice);
                    ?>">
                    <i class="mdi mdi-check-circle">Choosen</i>
                  </span>
                  <?php endif;?>
                  <!--=========================-->
                </div>
                <div class="card-footer">
                  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                </div>
              </div>
            </div>
            
            <?php endforeach; ?>

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

      <script>
          <?php if($_SERVER['REQUEST_URI'] == "/project/demo/index.php/manage_products/show_products"): ?>
          function pressButtonsMenu(){
            <?php reset($products); ?>
            <?php foreach($products as $product): ?>
                var btnOrder = document.getElementById("btn-order-product-"+'<?php echo $product['id']; ?>');
                btnOrder.addEventListener("click",function(){
                  document.getElementById("is-choosen-<?php echo $product['id']; ?>").style.display = "inline-block";
                  var totalItems = document.getElementById("total-item");
                  totalItems.innerHTML = parseInt(totalItems.innerHTML) + 1;
                  AJAXUpdateDetailInvoice('<?php echo $product['id']; ?>');
                });
            <?php endforeach; ?>
          }
          pressButtonsMenu();
          <?php endif; ?>
      
          
          function AJAXUpdateDetailInvoice(id_product){
              $.ajax({
                type:"post",
                url:"<?php echo base_url('business/create_detail_invoice');?>",
                data:{"id_product":id_product}
              }).done(function(data){
                alert(data);
              }).fail(function(){
                alert("fail");
              }); 
          }

      </script>
