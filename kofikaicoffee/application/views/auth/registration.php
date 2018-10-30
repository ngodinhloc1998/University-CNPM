<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <form id="registrationForm" action="<?php echo base_url('users/createAccount');?>" method="POST" class="form-group" onsubmit="return validateRegister();">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" <?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>>
        <label for="cmnd">CMND</label>
        <input type="text" class="form-control" id="cmnd" name="cmnd" <?php echo isset($_POST['cmnd']) ? $_POST['cmnd'] : ''; ?>>
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username" <?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>>
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <label for="validatePassword">Password Validate</label>
        <input type="password" type="validatePassword" class="form-control" id="validatePassword" name="validatePassword">
        <button class="btn btn-primary form-control" id="submit">
            Submit
        </button>
    </form>

    <script>
        function validateRegister(){
            var regisForm = document.getElementById("registrationForm");
            var btnSubmit = document.getElementById("submit");
                
                if(!(regisForm['name'].value =="") && !(regisForm['cmnd'].value=="") && !(regisForm['username'].value=="") && !(regisForm['password'].value=="") && !(regisForm['validatePassword'].value == "")){
                    if((regisForm['password'].value == regisForm['validatePassword'].value)){
                        alert("Ok");
                        return true;
                    }else{
                        alert("Xac nhan lai mat khau");
                        return false;
                    }
                }
                alert("Nhap cho dung");
                return false;
        }

    </script>
</body>
</html>