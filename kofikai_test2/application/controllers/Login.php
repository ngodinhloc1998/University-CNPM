<?php

    class Login extends CI_Controller{

        function __construct(){
            parent::__construct();
            echo "Duma";
        }

        function view($page="home"){
            
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }

            $this->load->view('templates/header');
            $this->load->view('templates/business/edit_table');
            $this->load->view('templates/footer');
        }

    }


?>