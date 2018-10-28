<?php
    class Business extends CI_Controller{

        function __construct(){
            parent::__construct();
            
        }

        function index($page="home"){
            
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            if(!($_SESSION['login'])){
                redirect('users/index');
                return;
            }
            $this->load->view('templates/header');
            $this->load->view('templates/business/edit_table');
            $this->load->view('templates/footer');
            
        }

    }
?>