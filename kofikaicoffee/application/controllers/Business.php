<?php
    class Business extends CI_Controller{
        function __construct(){
            parent::__construct();
            //$this->load->model("");
            
        }

        function home($place="home"){
            if(!isset($_SESSION['user'])){
                redirect(base_url('users/login'));
                return;
            }
            echo "Hello World";
        }
    }
?>