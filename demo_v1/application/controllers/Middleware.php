<?php
    class Middleware extends CI_Controller{
        function __construct(){
            parent::__construct();
        }

        function redirect_new_order($id){
            $_SESSION['id_table'] = $id;
            //var_dump($id);
            //var_dump($_SESSION['id_table']);
           redirect('business/create_invoice/'.$id);
        }

        function redirect_order($id){
            $_SESSION['id_table'] = $id;
            //var_dump($id);
            //var_dump($_SESSION['id_table']);
            redirect('manage_products/show_products');
        }
    }
?>