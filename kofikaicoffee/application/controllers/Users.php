<?php
    class Users extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('users_model');
        }


        function index(){
            $this->load->view("auth/login");
        }

        function login(){
            if(isset($_POST['username']) && isset($_POST['password'])){

                if($this->users_model->checkUsername($_POST['username'])){
                    $user = array($_POST['username'],$_POST['password']);
                    if($this->users_model->checkPassword($user)){
                        $_SESSION['user'] = $_POST['username'];
                        unset($_POST);            
                        redirect(base_url("business/home"));
                        return true;
                    }
                }

            } 
            $this->load->view("auth/login");
            return false;
        }

        function registration(){
            $this->load->view('auth/registration');
        }

        function createAccount(){
            if($this->users_model->checkUsername($_POST['username'])){
                echo "Username da ton tai";
                return;
            }
            if($this->users_model->checkCMND($_POST['cmnd'])){
                echo "CMND da ton tai";
                return;
            }else{
                $user = array(
                    'name' => $_POST['name'],
                    'cmnd' => $_POST['cmnd'],
                    'username' => $_POST['username'],
                    'password' => password_hash($_POST['password'],PASSWORD_DEFAULT)
                );
                if($this->users_model->createNewAccount($user)){
                    unset($_POST);
                    redirect(base_url('users/login'));
                }else{
                    echo "Failed";
                }
                
            }
        }
    }
?>