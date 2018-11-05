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
            $sql = "SELECT detail_invoice.id_product FROM invoice,detail_invoice WHERE invoice.id = ? AND detail_invoice.id_invoice = invoice.id;";
            try{
                $query = $this->db->query($sql,$id_invoice);
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
    }
?>