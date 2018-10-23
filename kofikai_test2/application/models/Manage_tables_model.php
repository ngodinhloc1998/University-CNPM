<?php
    class Manage_tables_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }


        function addTables($tableName){
            $sql = "INSERT INTO tables (name) VALUES (?)";
            try{
                $this->db->query($sql,$tableName);
            }catch(Exception $e){
                log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
            }
           
        }

        function editTables(){

        }

        function getTable($name){

        }

        function getTables(){

        }

        function deleteTable(){

        }
    }
?>