<!--Modal Detail-->
<?php //var_dump($data); ?>
<div class="modal fade choose-ticket-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12 col-sm-12 col-lg-6">
        		<div class="row">
        			<div class="col-md-12">
        				<ul class="nav nav-pills mb-3" id="container-toa-ve" role="tablist">
        				  <!-- Content will generate here through ajax -->
        				</ul>
        				<div class="row mt-3 mb-3">
        					<div class="col-sm-4 text-center align-center">
        						<div class="ghe ml-4"></div>Ghe con trong
        					</div>
        					<div class="col-sm-4 text-center align-center">
        						<div class="ghe ghe-da-duoc-dat ml-4"></div>Ghe da duoc dat
        					</div>
        					<div class="col-sm-4 text-center align-center">
        						<div class="ghe ghe-dang-chon ml-4"></div>Ghe dang chon
        					</div>
        				</div>
        			</div>
        			<div class="col-md-12">
   						<div class="tab-content" id="tab-content-ve">
   							<!--Noi in ve-->
   						</div>
        			</div>
        		</div>	
        	</div>
        	<div class="col-lg-6 col-md-12 col-sm-12">
        		<!--Noi in thong tin ve-->
            <div class="card text-center"> 
              <div class="card-header">Ve Cua Ban</div>
              <div class="card-body">
                <div>
                  <table style="font-size: 12px;padding: 2px;" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 8.33%;" scope="col">#</th>
                        <th style="width: 8.33%;">Toa</th>
                        <th style="width: 33.32%;" scope="col">Loai ghe</th>
                        <th style="width: 24.99%;" scope="col">So ghe</th>
                        <th style="width: 24.99%;" scope="col">Gia</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>Ngoi Mem</td>
                        <td>1</td>
                        <td>500,000 VND</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>Ngoi Mem</td>
                        <td>1</td>
                        <td>500,000 VND</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>Ngoi Mem</td>
                        <td>1</td>
                        <td>500,000 VND</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>Ngoi Mem</td>
                        <td>1</td>
                        <td>500,000 VND</td>
                      </tr>
                      <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>Ngoi Mem</td>
                        <td>1</td>
                        <td>500,000 VND</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <td colspan="2">
                        <button class="btn btn-primary">Thanh Toan</button>
                      </td>
                      <td colspan="3">Tong Cong 2,500,000 VND</td>
                    </tfoot>
                  </table>
                </div>
              </div>
              <div class="card-footer text-muted">
                <p  class="text-success">Chuc ban co mot chuyen di vui ve</p>
              </div>
            </div>
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huy</button>
        <button type="button" class="btn btn-primary">Tiep Tuc</button>
      </div>
    </div>
  </div>
</div>
<!--End Modal Detail-->

<div class="row mt-3 mb-2">
	<div class="col-md-12">
		<ul class="nav nav-pills nav-wizard">
			<li class="nav-item"><a class="nav-link" href="#">Trang Chu</a></li>
			<li class="nav-item"><a class="nav-link" href="#">Ve Tau Hoa</a></li>
			<li class="nav-item"><a class="nav-link active" href="#">Ket Qua Tim Kiem</a></li>
		</ul>
	</div>
</div>

<div class="container-fluid pl-2 pr-2">	
	<div class="row mb-2 d-none d-lg-block">
		<div class="col-md-12">
			<img style="width: 100%; height: 100%;" src="<?php echo base_url('public/chi_tiet_hanh_trinh.jpg');?>">
		</div>
	</div>
	<div class="row">
		<div class="col-md-8 route-info pt-3 pb-3">
			<div class="float-left mr-3"><?php echo $_SESSION['input-noi-di']; ?></div>
			<div class="float-left mr-3"><i class="fa fa-long-arrow-right"></i></div>
			<div class="float-left"><?php echo $_SESSION['input-noi-den']; ?></div>
		</div>
		<div class="col-md-4 route-info pt-3 pb-3">
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-left"></i></a></div>
			<div class="float-left"><?php echo $_SESSION['input-ngay-khoi-hanh']; ?></div>
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-right"></i></a></div>
		</div>	
	</div>
	<?php foreach($data as $chi_tiet_tuyen): ?>
	<div class="container-depart-info mb-5">
		<div class="row p-5 general-depart-info">
			<div class="col-auto col-md-2 col-sm-12">
				<div class="float-left"><?php echo $chi_tiet_tuyen['gio_khoi_hanh']; ?></div>
				<div class="ml-2 float-left d-block d-md-none d-lg-none d-xl-none"> <?php echo $chi_tiet_tuyen['so_luong_ghe']; ?> ghe</div>
			</div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-di'] ?></div>
			<div class="col-auto col-md-1 col-sm-2"><i class="fa fw fa-angle-right"></i></div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-den']; ?></div>
			<div class="col-auto col-md-1 col-sm-5 d-none d-lg-block d-xl-block"><?php echo $chi_tiet_tuyen['so_luong_ghe']; ?> ghe</div>
			<div class="col-auto col-md-2 col-sm-8 price-ticket text-center"> <?php echo number_format($chi_tiet_tuyen['gia_ve']); ?> VND<i class="fa fa-angle-down"></i></div>
			<div class="col-auto col-md-2 col-sm-4 text-right pr-2">
				<button id="btn-choose<?php echo $chi_tiet_tuyen['id']; ?>" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".choose-ticket-modal">Chon ve</button>
			</div>
		</div>
		<div class="row p-2 sub-info general-depart-info">
			<div class="col-sm-4 text-left">
				<img class="size-image-logo" src="<?php echo base_url('public/logo/logo_dsvn.png');?>">
			</div>
			<div class="col-sm-4 text-left">
				<?php echo $chi_tiet_tuyen['ten_tau']; ?>
			</div>
			<div class="col-sm-4 text-right">
				<a href="#">Detail <i class="fa fa-angle-down"></i></a>
			</div>
		</div>
	</div>

	<?php endforeach; ?>

	<?php if(!empty($_SESSION['input-ngay-ve'])): ?>
	<!--Luot Ve-->
		<?php foreach($comeBackTrains as $comeBack): ?>
	<div class="row">
		<div class="col-md-8 route-info pt-3 pb-3">
			<div class="float-left mr-3"><?php echo $_SESSION['input-noi-den']; ?></div>
			<div class="float-left mr-3"><i class="fa fa-long-arrow-right"></i></div>
			<div class="float-left"><?php echo $_SESSION['input-noi-di']; ?></div>
		</div>
		<div class="col-md-4 route-info pt-3 pb-3">
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-left"></i></a></div>
			<div class="float-left"><?php echo $_SESSION['input-ngay-ve']; ?></div>
			<div class="float-left"><a href="#"><i class="fa fa-fw fa-angle-right"></i></a></div>
		</div>	
	</div>
	<div class="container-depart-info mb-5">
		<div class="row p-5 general-depart-info">
			<div class="col-auto col-md-2 col-sm-12">
				<div class="float-left"><?php echo $comeBack['gio_khoi_hanh']; ?></div>
				<div class="ml-2 float-left d-block d-md-none d-lg-none d-xl-none"> <?php echo $comeBack['so_luong_ghe']; ?> ghe</div>
			</div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-den']; ?></div>
			<div class="col-auto col-md-1 col-sm-2"><i class="fa fw fa-angle-right"></i></div>
			<div class="col-auto col-md-2 col-sm-5"><?php echo $_SESSION['input-noi-di']; ?></div>
			<div class="col-auto col-md-1 col-sm-5 d-none d-lg-block d-xl-block"><?php echo $comeBack['so_luong_ghe']; ?> ghe</div>
			<div class="col-auto col-md-2 col-sm-8 price-ticket text-center"><?php number_format($comeBack['gia_ve']); ?> VND <i class="fa fa-angle-down"></i></div>
			<div class="col-auto col-md-2 col-sm-4 text-right pr-2">
				<button id="btn-choose-<?php echo $comeBack['id']; ?>" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".choose-ticket-modal">Chon ve</button>
			</div>
		</div>
		<div class="row p-2 sub-info general-depart-info">
			<div class="col-sm-4 text-left">
				<img class="size-image-logo" src="<?php echo base_url('public/logo/logo_dsvn.png');?>">
			</div>
			<div class="col-sm-4 text-left">
				<?php echo $comeBack['ten_tau']; ?>
			</div>
			<div class="col-sm-4 text-right">
				<a href="#">Detail <i class="fa fa-angle-down"></i></a>
			</div>
		</div>
	</div>
		<?php endforeach; ?>
	<?php endif; ?>

</div>


<script type="text/javascript">
	function AJAXProcessingSearchTicket(id){
		$.ajax({
			type: "post",
			url: "<?php echo base_url('ajax_rendering/createTabToa'); ?>",
			data: {id_chi_tiet_hanh_trinh: id}
		}).done(function(data){
			document.getElementById("container-toa-ve").innerHTML = data;
		}).fail(function(data){
			alert("Failed to call ajax");
		});

    $.ajax({
      type: "post",
      url: "<?php echo base_url('ajax_rendering/createVe'); ?>",
      data: {id_chi_tiet_hanh_trinh: id}
    }).done(function(data){
      document.getElementById("tab-content-ve").innerHTML = data;
    }).fail(function(data){
      alert("Failed to call ajax");
    });
	}



	function triggerChooseVe(id){
		var buttonChoose = document.getElementById('btn-choose'+id);
		buttonChoose.addEventListener("click",function(){
			AJAXProcessingSearchTicket(id);
		});
	}
	<?php reset($data); ?>
	<?php foreach($data as $item): ?>
		triggerChooseVe(<?php echo $item['id']; ?>);
	<?php endforeach; ?>

</script>

