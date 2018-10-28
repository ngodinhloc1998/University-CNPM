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
        
        
        function createTable(data,type="show"){


            var container = document.getElementById("main-container");
            var tables = document.createElement("div");
            tables.classList.add("row");
            tables.classList.add("components");
            tables.setAttribute("id","tables");
            tables.style.display = "none";

            var wrapper,panel,panel_heading,panel_title,panel_body,card,card_body,card_title,card_text,btnOrder,btnPay,btnBook,btnCancel,card_img_top,src_img;
            for(var i = 0; i < data.length; i++){
                
                wrapper = document.createElement("div");
                wrapper.classList.add("col-md-3");

                
                panel = document.createElement("div");
                panel.classList.add("panel");
                panel.style.backgroundColor = "rgba(0,0,0,0.8)";
                panel.style.color = "#ffffff";
                
                panel_heading = document.createElement("div");
                panel_heading.classList.add("panel-heading");
                
                panel_title = document.createElement("h3");
                panel_title.classList.add("panel-title");
                panel_title.appendChild(document.createTextNode(data[i]['name']));

                panel_heading.appendChild(panel_title);
                panel.appendChild(panel_heading);

                panel_body = document.createElement("div");
                panel_body.classList.add("panel-body");

                card = document.createElement("div");
                card.classList.add("card");

                card_body = document.createElement("div");
                card_body.classList.add("card-body");

                card_title = document.createElement("h3");
                card_title.classList.add("card-title");
                card_title.appendChild(document.createTextNode(data[i]['status']));
                card_body.appendChild(card_title);

                card_text = document.createElement("p");
                card_text.classList.add("card-text");
                card_body.appendChild(card_text);

                if(data[i]['status'] == 'available'){

                    card_img_top = document.createElement("IMG");
                    card_img_top.classList.add("card-img-top");
                    card_img_top.src = '<?php echo base_url('template/assets/img/tables/available.svg');?>';
                    card.appendChild(card_img_top);

                    card.style.backgroundColor = '##2cf765';
                    var containerButton = document.createElement("div");
                    containerButton.classList.add("row");

                    btnOrder = document.createElement("div");
                    btnOrder.classList.add("btn");
                    btnOrder.classList.add("btn-primary");
                    btnOrder.classList.add("text-center");
                    btnOrder.classList.add("buttonTable");
                    btnOrder.classList.add("btnAvailable");
                    btnOrder.appendChild(document.createTextNode("Order"));
                    btnOrder.style.padding = "2px";
                    btnOrder.style.align = "center";
                    btnOrder.classList.add("col-md-4");
                    btnOrder.style.marginRight = "5px";
                    containerButton.appendChild(btnOrder);

                    btnBook = document.createElement("div");
                    btnBook.classList.add("btn");
                    btnBook.classList.add("btn-warning");
                    btnBook.classList.add("buttonTable");
                    btnBook.appendChild(document.createTextNode("Book"));
                    btnBook.style.padding = "2px";
                    btnBook.style.align = "center";
                    btnBook.classList.add("col-md-4");
                    btnBook.style.marginLeft = "5px";
                    containerButton.appendChild(btnBook) ;
                    
                    card_body.appendChild(containerButton);


                }else if(data[i]['status'] == 'active'){
                    
                    card.style.backgroundColor = '#ff2626';

                    btnOrder = document.createElement("div");
                    btnOrder.classList.add("btn");
                    btnOrder.classList.add("btn-primary");
                    btnOrder.classList.add("buttonTable");
                    btnOrder.appendChild(document.createTextNode("Order"));
                    card_body.appendChild(btnOrder);

                    btnPay = document.createElement("div");
                    btnPay.classList.add("btn");
                    btnPay.classList.add("buttonTables");
                    btnPay.classList.add("btn-success");
                    btnPay.classList.add("buttonTable");
                    btnPay.appendChild(document.createTextNode("Pay"));
                    card_body.appendChild(btnPay);


                }else if(data[i]['status'] == 'booked'){

                    card.style.backgroundColor = '#f9c60c';

                    btnOrder = document.createElement("div");
                    btnOrder.classList.add("btn");
                    btnOrder.classList.add("btn-primary");
                    btnOrder.classList.add("buttonTable");
                    btnOrder.appendChild(document.createTextNode("Order"));
                    card_body.appendChild(btnOrder);
                
                
                    btnCancel = document.createElement("div");
                    btnCancel.classList.add("btn");
                    btnCancel.classList.add("buttonTable");
                    btnCancel.classList.add("btn-danger");
                    btnCancel.appendChild(document.createTextNode("Cancel"));
                    card_body.appendChild(btnCancel);

                }
                
                

                card.appendChild(card_body);
                panel_body.appendChild(card);
                panel.appendChild(panel_body);
                wrapper.appendChild(panel);
                tables.appendChild(wrapper);
                container.appendChild(tables);

            }

            /*
            *Ajax order button
            */

                function updateStatusTable(type){
                    $.ajax({

                    }).done(function(data){

                    }).fail(function(jqXHR, textStatus,errThrown){
                        console.log(textStatus + ":" + errThrown);
                    });
                }

            /*
            *End Ajax order button
            */

            /*
            *Add event click button table
            */
                $(".buttonTable").click(function(){
                    if($(this).hasClass("btn-primary")){
                        if($(this).hasClass("btnAvailable")){
                            //AJAX update status of table
                        }
                    }
                });
            /*
            *Done add button click table
            */

        }


        
        function AJAXgetTablesData(){
            var tables;
            $.ajax({
                        url: "<?php echo base_url('manage_tables/getTables'); ?>",
                        type: "POST",
                        dataType: "json",
                        //data: {}
                    }).done(function(data){
                        //console.log(data);
                        createTable(data);
                    }).fail(function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus + ': ' + errorThrown);
            });
        }

        /*
        *Main Script
        */

        $(document).ready(function(){
           

            AJAXgetTablesData();

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


        /*
        *End Main Script
        */
    </script>


    <script>
        function taskEditTable(){
            //add table
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
                        data: {"tableName":tableName}
                    }).done(function(data){
                        console.log(data);
                    }).fail(function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus + ': ' + errorThrown);
                    });
                }
            });

            $('#btn-cancel-addTable').click(function(){
                $('#triggerAddTable').trigger('click');
            });


            //edit table
            $('#btn-save-editTable').click(function(){
                var tableName = $('#editTableName').val();
                var changeNameTable = $('#changeNameTable').val();
                if(tableName === '' || changeNameTable ===''){
                    alert("Please fill name of table");
                    $('#editTableName').focus();
                }
                else{
                    $.ajax({
                        url: "<?php echo base_url('manage_tables/edit'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {"tableName":tableName},
                        success : function(data){
                        },
                        error: function(data){
                        }
                    });
                }
            });

            $('#btn-cancel-editTable').click(function(){
                $('#triggerEditTable').trigger('click');
            });



            //delet table
            $('#btn-save-editTable').click(function(){
                var tableName = $('#deleteTableName').val();
                if(tableName === ''){
                    alert("Please fill name of table");
                    $('#deteleTableName').focus();
                }
                else{
                    $.ajax({
                        url: "<?php echo base_url('manage_tables/detele'); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {"tableName":tableName},
                        success : function(data){
                           
                        },
                        error: function(data){
                        }
                    });
                }
            });

            $('#btn-cancel-deleteTable').click(function(){
                $('#triggerDeleteTable').trigger('click');
            });

            //logout
            $('#btn-logout').click(function(){
                $.get("<?php echo base_url('users/logout'); ?>",function(data){
                    window.location.href = data;
                });
            });

            /*
            * DisplayTable, uncomplete
            */


            /*
            *Done DisplayTable
            */
            


            /*
            * DisplayMenu, uncomplete
            */


            /*
            *Done DisplayMenu
            */
        }

        taskEditTable();
    </script>

</body>

</html>
