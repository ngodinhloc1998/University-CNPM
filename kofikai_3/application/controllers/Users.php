<?php

    class Users extends CI_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model('users_model');
        }

        function index($page="login"){
            
            if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
                show_404();
            }

            $this->load->view('users/login');
            
        }

        function login(){
            if(isset($_POST['username']) && isset($_POST['password'])){
                $auth = array(
                    'username' => $_POST['username'],
                    'password' => $_POST['password']
                );

                $data = $this->users_model->login($auth);
                if($data){
                    var_dump($data);
                    $_SESSION['user'] = array(
                        'id' => $data['id'],
                        'name' => $data['name'],
                        'username' => $data['username']
                    );
                    unset($data);
                    $_SESSION['login'] = true;
                    $this->users_model->setActiveStatus($_SESSION['user']['id']);
                    redirect('business/index','refresh');
                 }
                 else{
                     redirect('users/index');
                 }

            }else{
                redirect('users/index');
            }
        }


        function logout(){
            $this->users_model->setInactiveStatus($_SESSION['user']['id']);
            session_destroy();
            echo base_url('users/index');
        }

        function login_view(){
            $this->load->view('view/users/login');
        }

    }


?>