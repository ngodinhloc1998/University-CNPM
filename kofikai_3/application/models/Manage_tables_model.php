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
            $sql = "SELECT * FROM tables ORDER BY  LENGTH(name),CAST(name AS SIGNED) ASC,name ASC";
            try{
                $query = $this->db->query($sql);
                $result = $query->result_array();
            }catch(Exception $e){
                log_message( 'error', $e->getMessage( ) . ' in ' . $e->getFile() . ':' . $e->getLine() );
            }

            return $result;

        }

        function deleteTable(){

        }
    }
?>