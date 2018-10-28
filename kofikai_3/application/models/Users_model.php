<?php
    class Users_model extends CI_Model{

        function __construct(){
            parent::__construct();
            $this->load->database();
        }


        function login($data){

            $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
            $query = $this->db->query($sql,$data);
            
            $rows = $query->row_array();
            return $rows;
        }

        function setActiveStatus($id){
            $sql = "UPDATE users SET account_status = ? WHERE id = ?";
            $query = $this->db->query($sql,array('active',$id));
        }

        function setInactiveStatus($id){
            $sql = "UPDATE users SET account_status = ? WHERE id = ?";
            $query = $this->db->query($sql,array('inactive',$id));
        }

    }
?>