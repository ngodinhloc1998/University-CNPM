<?php
    class Manage_tables extends CI_Controller{
        
        function __construct(){
            parent::__construct();
            $this->load->model('manage_tables_model');
        }

        function index(){
            echo "Hello World";
        }

        function add(){
            $tableName = $this->input->post('tableName');
            $this->manage_tables_model->addTables($tableName);
        }

        function edit(){
            
        }

        function delete(){
            
        }
    }
?>