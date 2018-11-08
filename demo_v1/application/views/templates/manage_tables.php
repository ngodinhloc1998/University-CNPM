<div class="row el-element-overlay">
    <?php foreach($tables as $row): ?>
    <?php $temp = preg_replace('/[^0-9]/','',$row['name']);?>
    <div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="el-card-item">
                <div class="el-card-avatar el-overlay-1"> 
                    <?php if($row['status'] == 'available'): ?>
                    <img id="image-table-<?php echo $temp;?>" src="<?php echo base_url('public/assets/images/big/tables/available.svg');?>" alt="user" />
                    <?php elseif($row['status'] == 'booked'): ?>
                    <img id="image-table-<?php echo $temp;?>" src="<?php echo base_url('public/assets/images/big/tables/booked.svg');?>" alt="user" />
                    <?php else: ?>
                    <img id="image-table-<?php echo $temp;?>" src="<?php echo base_url('public/assets/images/big/tables/active.svg');?>" alt="user" />
                    <?php endif; ?>
                </div>
                <div class="el-card-content">
                    <h4 class="m-b-0"><?php echo $row['name']; ?></h4>
                    <div class="m-b-0">
                        <p>Status <strong class="text-success" id="status-table-<?php echo $temp;?>"><?php echo $row['status'];?></strong></p>
                    </div>
                    <div id="group-button-tables-<?php echo $temp;?>" class="row m-b-0">
                        <?php if($row['status'] == 'available'):?>
                            <div class="col-md-6 text-muted">
                                <button id="btnLeft-<?php echo $temp;?>" class="btn btn-outline-success">Order</button>
                            </div>
                            <div class="col-md-6 text-muted">
                                <button id="btnRight-<?php echo $temp;?>" class="btn btn-outline-info">Book</button>
                            </div>
                        <?php elseif($row['status'] == 'booked'):?>
                             <div class="col-md-6 text-muted">
                                <button id="btnLeft-<?php echo $temp;?>" class="btn btn-outline-success">Order</button>
                            </div>
                            <div class="col-md-6 text-muted">
                                <button id="btnRight-<?php echo $temp;?>" class="btn btn-outline-danger">Danger</button>
                            </div>
                        <?php else:?>
                            <div class="col-md-6 text-muted">
                                <button id="btnLeft-<?php echo $temp;?>" class="btn btn-outline-success">Order</button>
                            </div>
                            <div class="col-md-6 text-muted">
                                <button id="btnRight-<?php echo $temp;?>" class="btn btn-outline-warning">Pay</button>
                            </div>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>                
   
<script>
    
    <?php reset($tables);?>
    <?php foreach($tables as $table): ?>
        updateStatusTables('<?php echo $table['name'];?>','<?php echo $table['id']; ?>');
    <?php endforeach; ?>

    function updateStatusTables(index,id){
        index = index.replace(/\D/g,'');
        var btnLeft = document.getElementById('btnLeft-'+index);
        var btnRight = document.getElementById('btnRight-'+index);
        btnLeft.addEventListener("click",function(){
            status = document.getElementById('status-table-'+index).innerHTML.toLowerCase();
            var btnLeft = document.getElementById('btnLeft-'+index);
            var btnRight = document.getElementById('btnRight-'+index);
            var image = document.getElementById('image-table-'+index);
            var statusTable = document.getElementById('status-table-'+index);
            if(status == 'available'){
                statusTable.innerHTML = 'active';
                statusTable.classList.remove('text-success');
                statusTable.classList.add('text-danger');
                image.src = '<?php echo base_url('public/assets/images/big/tables/active.svg');?>';
                btnRight.innerHTML = "Pay";
                btnRight.classList.remove('btn-outline-info');
                btnRight.classList.add('btn-outline-warning');
                window.location.href = '<?php echo base_url('middleware/redirect_new_order/') ?>'+id;
            }else if(status == 'booked'){
                statusTable.innerHTML = 'active';
                statusTable.classList.remove('text-warning');
                statusTable.classList.add('text-danger');
                image.src = '<?php echo base_url('public/assets/images/big/tables/active.svg');?>';
                btnRight.innerHTML = "Pay";
                btnRight.classList.remove('btn-outline-danger');
                btnRight.classList.add('btn-outline-warning');
                window.location.href = '<?php echo base_url('middleware/redirect_new_order/') ?>'+id;
            }else{
                window.location.href = '<?php echo base_url('middleware/redirect_order/') ?>'+id;
            }
            
        });
        btnRight.addEventListener("click",function(){
            status = document.getElementById('status-table-'+index).innerHTML.toLowerCase();
            var btnLeft = document.getElementById('btnLeft-'+index);
            var btnRight = document.getElementById('btnRight-'+index);
            var image = document.getElementById('image-table-'+index);
            var statusTable = document.getElementById('status-table-'+index);
            if(status == 'available'){
                statusTable.innerHTML = 'booked';
                statusTable.classList.remove('text-success');
                statusTable.classList.add('text-warning');
                image.src = '<?php echo base_url('public/assets/images/big/tables/booked.svg');?>';
                this.innerHTML = "Cancel";
                this.classList.remove('btn-outline-info');
                this.classList.add('btn-outline-danger');
            }else if(status == 'booked'){
                statusTable.innerHTML = 'available';
                statusTable.classList.remove('text-warning');
                statusTable.classList.add('text-success');
                image.src = '<?php echo base_url('public/assets/images/big/tables/available.svg');?>';
                this.innerHTML = "Book";
                this.classList.remove('btn-outline-danger');
                this.classList.add('btn-outline-info');
            }else{
                statusTable.innerHTML = 'available';
                statusTable.classList.remove('text-danger');
                statusTable.classList.add('text-success');
                image.src = '<?php echo base_url('public/assets/images/big/tables/available.svg');?>';
                this.innerHTML = "Book";
                this.classList.remove('btn-outline-warning');
                this.classList.add('btn-outline-info');
            }
        });        
    }
   
</script>