                </div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="<?php echo base_url('template/assets/vendor/jquery/jquery.min.js');?>"></script>
	<script src="<?php echo base_url('template/assets/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('template/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js');?>"></script>
    <script src="<?php echo base_url('template/assets/scripts/klorofil-common.js');?>"></script>
    <script src="<?php echo base_url('template/assets/js/main.js');?>"></script>
    <script type="text/javascript">
        $(document).ready(function(){
           
            createTable(10);

            function displaySideBar(){
                $(".sideBarElement").click(function(event){
                    event.preventDefault();
                    $(".sideBarElement").removeClass("active");
                    $(this).addClass("active");
                    $(".collapseSideBar").hide();
                    if(!($(this).hasClass("collapsed"))){
                        $(".components").fadeOut(200);
                        console.log($(this).attr("href"));
                        console.log(!($(this).hasClass("collapsed")));
                        $($(this).attr("href")).fadeIn(1000);
                        $(".collapseSideBar").hide();

                    }
                    else{
                       if(!$($(this).attr('href')).hasClass("in")){
                        console.log(!$($(this).attr('href')).hasClass("in"));
                        console.log(!($(this).hasClass("collapsed")));
                        $($(this).attr("href")).show(); 
                       }
                    }
                });
            }


            function displayEditTable(){
                $('#clickEditTable').click(function(){
                    $('#menuEditTable').show(500);
                });
            }

            displayEditTable();
            displaySideBar();
            
        });
    </script>


    <script>
        function taskEditTable(){
            
            $('#btn-save-addTable').click(function(){
                var tableName = $('#addTableName').val();
                if(tableName === ''){
                    alert("Please fill name of table");
                    $('#addTableName').focus();
                }
                else{
                    $.ajax({
                        url: "<?php echo base_url('manage_tables/add'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {"tableName":tableName},
                        success : function(data){
                            alert("Success");
                        },
                        error: function(data){
                            alert("Failed");
                        }
                    });
                }
            });
        }

        taskEditTable();
    </script>

</body>

</html>
