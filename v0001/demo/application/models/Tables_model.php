<?php
    class Tables_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function getTables(){
            $sql = "SELECT * FROM tables ORDER BY  LENGTH(name),CAST(name AS SIGNED) ASC,name ASC";
            $query = $this->db->query($sql);
            $rows = $query->result_array();
            if(!empty($rows)){
                return $rows;
            }
            return false;
        }

        function getIdTableByName($name){
            $sql = "SELECT id FROM tables WHERE name = ?";
            try{
                if($query = $this->db->query($sql,$name)){
                    echo $query->first_row();
                    return $query->first_row();
                }
            }catch(Exception $e){
                echo "Something went wrong";
            }
            return false;
        }

        function updateWhenTableIsOrdered($id){
            $sql = "UPDATE tables SET status = 'active' WHERE id = ?";
            $query = $this->db->query($sql,$id);
        }
    }
?>