<?php
    class Manage_products extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('products_model');
            $this->load->model('invoice_model');
        }

        private function checkLogin(){
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                return true;
            }
            redirect("users/login");
        }

        function show_products(){
            $this->checkLogin();
            $products = $this->products_model->getProducts();
            $id_invoice = $this->invoice_model->get_id_invoice_processing($_SESSION['id_table']);
            $id_products_in_invoice = $this->products_model->get_id_products_in_invoice($id_invoice);
            $data = array(
                'products' => $products,
                'productsInvoice' => $id_products_in_invoice,
                'type' => 'order'
            );
            $numItems = 0;
            if($id_products_in_invoice){
                $numItems = array('numItems' => count($id_products_in_invoice));
            }
            $this->load->view('templates/header',$numItems);
            $this->load->view('templates/products',$data);
            $this->load->view('templates/footer');
        }


        function update_quantities_product(){
            $this->checkLogin();
            if(isset($_POST['id_product']) && isset($_POST['quantities'])){
                $id = $_POST['id_product'];
                $value = $_POST['quantities'];
                if($result = $this->products_model->update_quantities_product_detail_invoice($id,$value)){
                    unset($_POST['id_product']);
                    unset($_POST['quantities']);
                    echo json_encode($result);
                    return true;
                }

            }
            unset($_POST['id_product']);
            unset($_POST['quantities']);
            return false;
        }

        function detele_product_in_detail_invoice(){
            $this->checkLogin();
            if(isset($_POST['id'])){
                $id = $_POST['id'];
                try{
                    if($result = $this->products_model->detele_product_in_detail_invoice($id)){
                        unset($id);
                        echo $result;
                        return $result;
                    }
                }catch(Exception $e){
                    echo "Cause error ".$e->getMessege()."<br>";
                }
            }
            return false;
        }

        function list_products(){
            unset($_SESSION['id_table']);
            $this->checkLogin();
            $products = $this->products_model->getProducts();
            //$id_invoice = $this->invoice_model->get_id_invoice_processing($_SESSION['id_table']);
            //$id_products_in_invoice = $this->products_model->get_id_products_in_invoice($id_invoice);
            $data = array(
                'products' => $products,
                //'productsInvoice' => $id_products_in_invoice,
                'type' => 'view'
            );
            $numItems = 0;
            //if($id_products_in_invoice){
                //$numItems = array('numItems' => count($id_products_in_invoice));
            //}
            $this->load->view('templates/header',$numItems);
            $this->load->view('templates/products',$data);
            $this->load->view('templates/footer');
        }

        function edit_products(){
            unset($_SESSION['id_table']);
            $this->checkLogin();
            $products = $this->products_model->getProducts();
            //$id_invoice = $this->invoice_model->get_id_invoice_processing($_SESSION['id_table']);
            //$id_products_in_invoice = $this->products_model->get_id_products_in_invoice($id_invoice);
            $data = array(
                'products' => $products,
                //'productsInvoice' => $id_products_in_invoice,
                'type' => 'permiss_edit'
            );
            $numItems = 0;
            //if($id_products_in_invoice){
                //$numItems = array('numItems' => count($id_products_in_invoice));
            //}
            $this->load->view('templates/header',$numItems);
            $this->load->view('templates/products',$data);
            $this->load->view('templates/footer');
        }
    }
?>