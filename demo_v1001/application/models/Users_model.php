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

        /*****************************Permissions*******************/
        function getRoleId(){     
            try{
                $username = $_SESSION['user'];
                $sql = "SELECT id_role FROM users_roles,users WHERE users.username = ? AND users.id = users_roles.id_user";
                if($query = $this->db->query($sql,$username)){
                    $result = $query->result_array();
                    //var_dump($result);
                    return $result;
            }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege().'<br>';
            }
            return false;
        }

        function getPermissionId($id_role){
            try{
                $sql = "SELECT id_permission FROM roles_permissions WHERE id_role = ?";
                if($query = $this->db->query($sql,$id_role)){
                    $result = $query->result_array();
                    //var_dump($result);
                    return $result;
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;       
        }

        function getIdPermissionsByFunctionality($functionality){
            try{
                $sql = "SELECT id FROM permissions WHERE description = ?";
                if($query = $this->db->query($sql,$functionality)){
                    $result = $query->first_row();
                    //var_dump($result);
                    if(!empty($result)){
                        return $result->id;
                    }
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }

        function checkPermission($functionality){
            $resultRoles = $this->getRoleId();
            $id_permission = $this->getIdPermissionsByFunctionality($functionality);
            //var_dump($id_permission);
            //echo "<br>";
            foreach($resultRoles as $userRole){
                $userPermissions = $this->getPermissionId($userRole); 
                //var_dump($userPermissions);
                //echo "<br>";
                foreach($userPermissions as $key => $value){
                    //var_dump($value);
                    //echo "<br>";
                    if($value['id_permission'] == $id_permission){
                        echo "You can do this <br>";
                        return true;
                    }
                }
            }       
            echo "You can't do this <br>";
            return false;
        }

        /*****************************Permissions*******************/
    }
?>