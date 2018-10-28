<?php
    class Manage_tables extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('manage_tables_model');
        }

        function index(){
            if(!($_SESSION['login'])){
                redirect('users/index');
                return;
            }
            echo "Hello World";
        }

        function add(){
            if(!($_SESSION['login'])){
                redirect('users/index');
                return;
            }
            if(isset($_POST['tableName'])){
                $result = $this->manage_tables_model->getTables();
                echo json_encode($result);
                $tableName = $this->input->post('tableName');
                $this->manage_tables_model->addTables($tableName);
                die();
            }
            else{
                echo "Error";
                die();
            }
        }

        function edit(){
            if(!($_SESSION['login'])){
                redirect('users/index');
                return;
            }
        }

        function delete(){
            if(!($_SESSION['login'])){
                redirect('users/index');
                return;
            }
        }


        function getTables(){
            echo json_encode($this->manage_tables_model->getTables());
            return;
        }
    }
?>