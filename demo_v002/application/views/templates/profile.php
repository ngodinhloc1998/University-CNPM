<div class="row justify-content-center">
    <div class="col-md-8 align-self-center">
        <div class="card">
            <div class="card-header">
                <h4 class="text-info">Your Profile</h4>
            </div>
            <div class="card-body">
                <p>Name <strong><?php //echo $name ?></strong></p>
                <p>Username <strong><?php //echo $username ?></strong></p>
                <p>Identity Card <strong><?php //echo $cmnd ?></strong></p>
            </div>
            <div class="card-footer">
                <div class="btn btn-primary" id="btn-change-password">Change Password</div>
                    <form class="form-group" style="display: none;" id="container-change-password">
                        <div class="row mt-2 mb-2">
                            <div class="col-sm-4">
                                <p>Old Password*</p>
                            </div>
                            <div class="col-sm-8">
                                <input style="border: 1px solid;" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <p>New Password*</p>
                            </div>
                            <div class="col-sm-8">
                                <input style="border: 1px solid;" type="password" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-2 justify-content-center">
                            <div class="col-sm-4">
                                <p>Passoword Validation*</p>
                            </div>
                            <div class="col-sm-8">
                                <input type="password" style="border: 1px solid;" class="form-control">
                            </div>
                            <div class="col-sm-4 mt-2">
                                <div id="btn-save-change-password" class="btn btn-primary">Save</div>
                                <div id="btn-cancel-change-password" class="btn btn-danger">Cancel</div>
                            </div>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function changePassword(){
        var btnChangePassword = document.getElementById('btn-change-password');
        var btnSaveChangePassword = document.getElementById('btn-save-change-password');
        var btnCancelChangePassword = document.getElementById('btn-cancel-change-password');
        var containerForm = document.getElementById('container-change-password');
        btnChangePassword.addEventListener("click",function(){            
            containerForm.style.display = 'block';
        });
        btnCancelChangePassword.addEventListener('click',function(){
            containerForm.style.display = 'none';
        });
    }
    changePassword();
    function validationPassword(){
        
    }
</script>