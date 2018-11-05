<?php
    class Manage_products extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model('products_model');
            $this->load->model('invoice_model');
        }

        function show_products(){
            $products = $this->products_model->getProducts();
            $id_invoice = $this->invoice_model->get_id_invoice_processing($_SESSION['id_table']);
            $id_products_in_invoice = $this->products_model->get_id_products_in_invoice($id_invoice);
            $data = array(
                'products' => $products,
                'productsInvoice' => $id_products_in_invoice
            );
            $numItems = 0;
            if($id_products_in_invoice){
                $numItems = array('numItems' => count($id_products_in_invoice));
            }
            $this->load->view('templates/header',$numItems);
            $this->load->view('templates/products',$data);
            $this->load->view('templates/footer');
        }

    }
?>