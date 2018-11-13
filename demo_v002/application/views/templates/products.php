<?php echo var_dump($_SESSION); ?>
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
                  <a id="btn-order-product-<?php echo $product['id'];?>" href="javascript:void(0);" class="btn btn-outline-success">Order</a>
                  <a href="#" class="btn btn-outline-warning">Edit</a>
                  <a href="#" class="btn btn-outline-danger">Delete</a>
                  <!--=========================-->
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

          pressButtonsMenu();
      </script>
