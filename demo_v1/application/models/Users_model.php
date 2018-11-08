<?php
    class Users_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function checkCMND($cmnd){
            $sql = "SELECT cmnd FROM users WHERE cmnd = ?;";
            $query = $this->db->query($sql,$cmnd);
            $rows = $query->result_array();
            if(count($rows) == 1){
                return true;
            }else{
                return false;
            }
        }

        function checkUsername($username){
            $sql = "SELECT username FROM users WHERE username = ?;";
            $query = $this->db->query($sql,$username);
            $rows = $query->result_array();
            if(count($rows) == 1){
                return true;
            }else{
                return false;
            }
        }

        function checkPassword($user){
            $sql = "SELECT password FROM users WHERE username = ? ;";
            $query = $this->db->query($sql,$user[0]);
            $rows = $query->result_array();
            if(count($rows) == 1){
                if(password_verify($user[1],$rows[0]['password'])){
                    return true;
                }
            }
            return false;
        }

        function createNewAccount($user){
            $sql = "INSERT INTO users(name,cmnd,username,password) VALUES(?,?,?,?);";
            if($this->db->query($sql,$user)){
                return true;
            }else{
                return false;
            }
        }

        function getIdEmployeeByUsername($name){
            $sql = "SELECT id FROM users WHERE username = ?";
            try{
                if($query = $this->db->query($sql,$name)){
                    $result = $query->first_row();
                    var_dump($result);
                    return $result->id;
                }
            }catch(Exception $e){
                echo "Something went wrong";
            }
            return false;
        }
    }
?>