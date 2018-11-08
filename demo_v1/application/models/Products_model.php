<?php
    class Products_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }

        function getProducts(){
            $sql = "SELECT products.*,price_release.price FROM products,price_release WHERE products.id = price_release.id_product";
            $query = $this->db->query($sql);
            $result = $query->result_array();
            //var_dump($result);
            return $result;
        }

        function getArrayIdProducts(){
            $sql = "SELECT id FROM detail_invoice";
            $query = $this->db->query($sql);
            if($result = $query->result_array()){
                return $result;
            }
            return false;
        }

        function get_id_products_in_invoice($id_invoice){
            $sql = "SELECT detail_invoice.id_product FROM invoice,detail_invoice WHERE invoice.id = ? AND detail_invoice.id_invoice = invoice.id AND  detail_invoice.status = ?;";
            try{
                $query = $this->db->query($sql,array($id_invoice,'existed'));
                if($query){
                    $result = $query->result_array();
                    //var_dump($result);
                    return $result;
                }
                return false;
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }

        function update_quantities_product_detail_invoice($id,$value){
            if(isset($id) && isset($value)){
                try{
                    $sql = "UPDATE detail_invoice SET quantities = ? WHERE id = ?";
                    if($this->db->query($sql,array($value,$id))){
                        $sql = "SELECT total FROM detail_invoice WHERE id = ?";
                        if($query = $this->db->query($sql,$id)){
                            $result = $query->first_row();
                            return $result->total;
                        }
                    }
                }catch(Exception $e){
                    echo "Cause error ".$e->getMessege()."<br>";
                }
            }
            return false;
        }

        function detele_product_in_detail_invoice($id){
            $sql = "UPDATE detail_invoice SET status = ? WHERE id = ?";
            try{
                if($query = $this->db->query($sql,array('deleted',$id))){
                    $sql = "SELECT invoice.total FROM invoice,detail_invoice WHERE detail_invoice.id = ? AND detail_invoice.id_invoice = invoice.id;";
                    if($query = $this->db->query($sql,$id)){
                        $result = $query->first_row();
                        return $result->total;
                    }
                }   
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }
    }
?>