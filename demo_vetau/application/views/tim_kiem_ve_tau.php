<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Latest compiled JavaScript -->



    <script language="javascript" src="https://momentjs.com/downloads/moment.js"></script>
    <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.css">


    <style type="text/css">
    .container-box-book-ticket{
        position: relative;
        z-index: 1; 
        padding-bottom: 50px;
    }
    .container-box-book-ticket-bg {
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        content: "";
        position: absolute;
        background-image: url( "<?php echo base_url('public/background_image/background_0.jpg')?>");
        background-color: #cccccc;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        z-index: -1;
    }
    .box-book-ticket{
        width: 98%;
        padding-top: 5%;
        padding-left: 20px;
        margin: auto;
        margin-top: 7%;
        min-height: 60vh;
        background-color: rgba(0,0,0,0.6);
    }

    .autocomplete{
        display: inline-block;
        position: relative;
    }
    .autocomplete-items{
        background-color: #ffffff;
        padding: 10px;
        position: absolute;
        border: 1px solid DodgerBlue;
        margin-top: 20px;
        z-index: 99;
        width: 300%;
        height: 400%;
        overflow: auto;
    }

    .autocomplete-items div {
      padding: 5px;
      cursor: pointer;
      background-color: #fff;  
    }

    .autocomplete-items div:hover {
      /*when hovering an item:*/
      background-color: #4bbff4; 
    }

    .autocomplete-active {
    /*when navigating through the items using the arrow keys:*/
    background-color: DodgerBlue !important; 
    color: #ffffff; 
    }

    /* width */
    ::-webkit-scrollbar {
        width: 12px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        box-shadow: inset 0 0 5px #491b59; 
        border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #491b59; 
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #3a1647; 
    }

    @media only screen and (max-width: 576px){
        /*.container-box-book-ticket{
            height: 100vh !important;
        }
        */
        .autocomplete-items{
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 992px){
        /*.container-box-book-ticket{
            height: 100vh !important;
        }
        */
        .autocomplete-items{
            width: 100% !important;
        }
    }

    @media only screen and (max-width: 250px){
        /*.container-box-book-ticket{
            height: 100vh !important;
        }
        */ 
    }

</style>
</head>
<body>

    <!--Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Login</button>
                </div>
            </div>
        </div>
    </div>
    <!--EndModalBox-->


    <!-- Modal Error Messege -->
<div class="modal fade" id="error-message-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="error-message-modal">Loi Tim Kiem</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4 id="content-error-message" class="text-danger"></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <div class="container-fluid" style="height: 100vh;">
        <div class="row">
            <nav class="navbar navbar-expand-xl navbar-dark bg-dark" style="width: 100%;">
                <a class="navbar-brand" href="#">Easy Book Ticket Railway</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarsExample06">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Check Ticket</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown06" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown06">
                                <a class="dropdown-item" data-toggle="modal" data-target="#exampleModal" href="#">Login</a>
                                <a class="dropdown-item" href="#">Create Account</a>
                                <a style="display: none;" class="dropdown-item" href="#">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--Main Header --- Search Content-->
        <div class="row">
            <div class="col-sm-12 container-box-book-ticket">
                <div class="container-box-book-ticket-bg"></div>
                <div class="box-book-ticket">
                    <div class="row">
                        <div class="col-md-12 mb-2 text-center">
                            <h3 class="text-light">Ve Tau Hoa</h3>
                        </div>
                        <div class="col-md-12 mb-2">
                            <a href="#" class="text-warning"><i class="fa fa-eye"></i> Route Map</a>
                        </div>
                        <div class="col-md-12 mb-2">
                            <div class="form-check form-check-inline">
                                 <input type="radio" class="form-check-input" value="khu-hoi" id="type-ticket-khu-hoi" name="type-ticket" checked>
                                <label class="form-check-label text-light">Khu Hoi</label>
                            </div>
                            <div class="form-check form-check-inline">   
                                <input type="radio" class="form-check-input" value="mot-chieu" id="type-ticket-mot-chieu" name="type-ticket">
                                <label class="form-check-label text-light">Mot Chieu</label>
                            </div>
                        </div>
                    </div>
                    <form id="depart-info" action="<?php echo base_url('ve/booking'); ?>" method="POST">
                      <div class="form-row align-items-center">
                        <div class="col-lg-4 col-md-12 align-self-center">
                            <div class="row">
                                <div class="col-md-5 my-1 align-self-center">
                                    <label class="sr-only" for="input-noi-di">Noi di</label>
                                    <div class="autocomplete" id="group-input-noi-di">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <input autocomplete="off" type="text" class="form-control input-xs" id="input-noi-di" name="input-noi-di" placeholder="Noi di">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 align-self-center">
                                    <a id="swap-ga" href="javascript:void(0);"><i style="color: white;margin: auto;" class="fa fa-exchange" aria-hidden="true"></i></a>
                                </div>
                                <div class="col-md-5 my-1 align-self-center">
                                    <label class="sr-only" for="input-noi-den">Noi den</label>
                                    <div class="autocomplete" id="group-input-noi-den">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <input autocomplete="off" type="text" class="form-control input-xs" id="input-noi-den" name="input-noi-den" placeholder="Noi den">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12 align-self-center">
                            <div class="row">
                                <div class="col-md-3 my-1 align-self-center">
                                    <label class="sr-only" for="input-ngay-khoi-hanh">Ngay Khoi Hanh</label>
                                    <div class="input-group date">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control input-xs datepicker" id="input-ngay-khoi-hanh" name="input-ngay-khoi-hanh" placeholder="Ngay Khoi Hanh">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1 align-self-center" id="contaier-ngay-ve">
                                    <label class="sr-only" for="input-ngay-ve">Ngay Ve</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <input type="text" data-provider="datepicker" class="form-control datepicker input-xs" name="input-ngay-ve" id="input-ngay-ve" placeholder="Ngay den">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1 align-self-center">
                                    <label class="sr-only" for="so-khach">So Khach</label>
                                    <div class="input-group">
                                        <input type="number" name="so-khach" class="form-control input-xs" id="so-khack" placeholder="So Luong Khach">
                                    </div>
                                </div>
                                <div class="col-md-3 my-1 align-self-center">
                                    <button id="btn-tim-kiem" type="button" class="btn border-warning btn-outline-warning btn-md">Tim Kiem Ve Tau</button>
                                </div>
                            </div>
                          </div>
                        </div>
                    </form>
                </div>
            </div>          
        </div>

        <!-- End Main Header Search Content-->
        <!-- Footer -->
        <div class="row bg-dark d-md-none d-sm-none d-xs-none d-lg-block d-xl-block" style="height: 100px;">
            <div class="col-md-12 align-self-center" style="padding-top: 3%;padding-bottom: 1%;">
                <p class="text-light text-center">&copy;2018 <strong class="text-primary">Nguyen Kiet - Loc Ngo </strong>Website ban ve tau online</p>
            </div>
        </div>

        <!-- End Footer -->

    </div>

   
    <script type="text/javascript">
        
        function triggerDatepicker(){

            $('.datepicker').datepicker({
                startDate: '+1d',
                endDate: '+6m',
                todayHighlight: true
            });
            $('.datepicker').datepicker("setDate", new Date());
        }

        triggerDatepicker();

        function autocomplete(input,bigComponent,data){
            var currentFocus = -1;
            input.addEventListener("input",function(){
                var containerItems,select,optionItem;
                var value = this.value;
                closeAllLists();

                if(!value){
                    return false;
                }

                currentFocus = -1;

                containerItems = document.createElement("DIV");
                containerItems.setAttribute("class","form-group autocomplete-items");
                containerItems.setAttribute("id",this.id + "AutocompleteItems");
                bigComponent.appendChild(containerItems);


                for(var i = 0 ; i < data.length; i++){
                    if(value.toLowerCase() == data[i].substring(0,value.length).toLowerCase()){
                        option = document.createElement("DIV");
                        option.innerHTML = "<i class='fa fa-map-marker'></i> <strong>" + data[i].substr(0,value.length) + "</strong>";
                        option.innerHTML += data[i].substr(value.length);
                        option.innerHTML += "<input type='hidden' value='" + data[i] + "'>";

                        option.addEventListener("click",function(){
                            input.value = this.getElementsByTagName("input")[0].value;
                            closeAllLists();
                        });

                        containerItems.appendChild(option);
                        
                    }
                }

            });

            input.addEventListener("keydown",function(e){
                var containerItems = document.getElementById(this.id + "AutocompleteItems");
                if(containerItems){
                    containerItems = containerItems.getElementsByTagName("div");
                    //console.log(e);
                }
                if(e.keyCode == 40){
                    currentFocus += 1;
                    addActive(containerItems);
                }else if(e.keyCode == 38){
                    currentFocus -= 1;
                    addActive(containerItems);
                }else if(e.keyCode == 13){
                    e.preventDefault();
                    if(currentFocus > -1){
                        if(containerItems){
                            containerItems[currentFocus].click();
                        }
                    }
                }

            });

            function addActive(x){
            
                if(!x){
                    return false;
                }
                removeActive(x);
                if(currentFocus >= x.length){
                    currentFocus = 0;
                }
                if(currentFocus < 0){
                    currentFocus = x.length - 1;
                }
                //console.log(x);
                x[currentFocus].classList.add("autocomplete-active");
            }

            function removeActive(x){
                for(var i = 0; i < x.length; i++){
                    x[i].classList.remove("autocomplete-active");
                }
            }

            function closeAllLists(e){
                var flag = false;
                var x = bigComponent.getElementsByClassName("autocomplete-items");
                if(x.length > 0){
                    x = x[0];
                    for(var i = 0; i < data.length ; i++){
                        if(e != x[i] || e != input){
                            flag = true;
                            break;
                        }
                    }
                }

                if(flag){
                    //console.log(bigComponent.getElementsByClassName("autocomplete-items"));
                    if(bigComponent.getElementsByClassName("autocomplete-items").length > 0){
                        //console.log(bigComponent.getElementsByClassName("autocomplete-items"));
                        bigComponent.removeChild(bigComponent.getElementsByClassName("autocomplete-items")[0]);
                    }
                }
            }

            document.addEventListener("click", function (e) {
                    closeAllLists(e.target);
            });
        }        

        function changeBackgroundImage(){
            var i = 0;
            var newImage;
            var background = document.getElementsByClassName("container-box-book-ticket")[0];
            var intervalChangeBackgroundImage = setInterval(function(){
                $(".container-box-book-ticket-bg").fadeOut(300,function(){
                    i++;
                    if(i > 4){
                        i = 0;
                    }
                    //console.log(i);
                    newImage = "<?php echo base_url(); ?>" + "public/background_image/background_" + i + ".jpg";
                    $(".container-box-book-ticket-bg").css("background-image","url('"+newImage+"')");
                    $(".container-box-book-ticket-bg").fadeIn(1000);
                });
            },6000);
        }
        changeBackgroundImage();

        function chooseTypeTicket(){
            var motChieu = document.getElementById("type-ticket-mot-chieu");
            var khuHoi = document.getElementById("type-ticket-khu-hoi");
            
            motChieu.addEventListener("click",function(){
                $("#contaier-ngay-ve").fadeOut(1000);
            });

            khuHoi.addEventListener("click",function(){
                $("#contaier-ngay-ve").fadeIn(1000);
            });

        }

        function initSearch(){
            var inputNoiDi = document.getElementById("input-noi-di");
            var inputNoiDen = document.getElementById("input-noi-den");
            var objGa = '<?php echo $ga; ?>';
            objGa = JSON.parse(objGa);

            var data = [];
                var valueInputGaDen = document.getElementById("input-noi-den").value;
                for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDen.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                    }
            }

            autocomplete(document.getElementById("input-noi-di"),document.getElementById("group-input-noi-di"), data);

            autocomplete(document.getElementById("input-noi-den"),document.getElementById("group-input-noi-den"), data);


            inputNoiDi.addEventListener("input",function(){
                var data = [];
                var valueInputGaDen = document.getElementById("input-noi-den").value;
                for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDen.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                    }
                }
                //console.log(data);
                autocomplete(document.getElementById("input-noi-di"),document.getElementById("group-input-noi-di"), data);
            });

            inputNoiDen.addEventListener("input",function(){
                var data = [];
                var valueInputGaDi = document.getElementById("input-noi-di").value;
                for(var i = 0; i < objGa.length; i++){
                    if(objGa[i]["ten_ga"].toLowerCase() != valueInputGaDi.toLowerCase()){
                        data.push(objGa[i]["ten_ga"]);
                    }
                }
                autocomplete(document.getElementById("input-noi-den"),document.getElementById("group-input-noi-den"), data);
                //console.log(data);
            });
        }

        initSearch();

        chooseTypeTicket();

        function checkExistsStation(ga){
            var objGa = '<?php echo $ga; ?>';
            objGa = JSON.parse(objGa);
            for(var i = 0; i < objGa.length; i++){
                if(objGa[i]["ten_ga"] == ga.value){
                    return true;
                }
            }
            return false;
        }
        
        function validateInput(){
            var btnTimKiem = document.getElementById("btn-tim-kiem");
            btnTimKiem.addEventListener("click",function(){
                //check what's type ticket
                var typeTicket;
                var inputNoiDi = document.getElementById("input-noi-di");
                var inputNoiDen = document.getElementById("input-noi-den");
                var ngayDi = document.getElementById("input-ngay-khoi-hanh");
                var ngayVe = document.getElementById("input-ngay-ve");
                if(document.getElementById("type-ticket-khu-hoi").checked){
                    if(inputNoiDi.value && inputNoiDen.value && ngayVe.value && ngayDi.value){
                        if(checkExistsStation(inputNoiDi) && checkExistsStation(inputNoiDen)){
                            
                            if(Date.parse(ngayVe.value) >= (Date.parse(ngayDi.value) + 2*24*60*60*1000)){
                                var ngayDi = document.getElementById("input-ngay-khoi-hanh");
                                var ngayVe = document.getElementById("input-ngay-ve");
                                ngayDi.value = convertDate(ngayDi);
                                ngayVe.value = convertDate(ngayVe);
                                document.getElementById("depart-info").submit();
                            }else{
                                var errorMessage = document.getElementById("content-error-message");
                                errorMessage.innerHTML = "Ngay ve phai hon ngay di 2 ngay";
                                $("#error-message-modal").modal('show');
                            }
                        }else{
                            var errorMessage = document.getElementById("content-error-message");
                            errorMessage.innerHTML = "Thong tin ga di va ga den khong chinh xac";
                            $("#error-message-modal").modal('show');
                        }
                    }else{
                        var errorMessage = document.getElementById("content-error-message");
                        errorMessage.innerHTML = "Hay nhap day du thong tin de tien hanh dat ve";
                        $("#error-message-modal").modal('show');
                    }
                }else{
                    if(inputNoiDi.value && inputNoiDen.value && ngayDi.value){
                        if(checkExistsStation(inputNoiDi) && checkExistsStation(inputNoiDen)){
                            // TRue and redirect
                        }else{
                            var errorMessage = document.getElementById("content-error-message");
                            errorMessage.innerHTML = "Thong tin ga di va ga den khong chinh xac";
                            $("#error-message-modal").modal('show');
                        }    
                    }else{
                        var errorMessage = document.getElementById("content-error-message");
                        errorMessage.innerHTML = "Hay nhap day du thong tin de tien hanh dat ve";
                        $("#error-message-modal").modal('show');
                    }
                }
            });
        }

        validateInput();

        function swapGa(){
            document.getElementById("swap-ga").addEventListener("click",function(){
                var inputNoiDi = document.getElementById('input-noi-di');
                var inputNoiDen = document.getElementById('input-noi-den');
                var temp = inputNoiDi.value;
                inputNoiDi.value = inputNoiDen.value;
                inputNoiDen.value = temp;
            });
        }

        swapGa();

        function convertDate(date){
            var arrayDate = date.value.split("/");
            return arrayDate[2] + "-" + arrayDate[0] + "-" + arrayDate[1];
        }

    </script>

</body>
</html>