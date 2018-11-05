<?php
    class Business extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model("tables_model");  
            $this->load->model('invoice_model');
            $this->load->model('users_model');
        }

        function home($place="home"){
            if(!isset($_SESSION['user'])){
                redirect(base_url('users/login'));
                return;
            }
            $this->load->view('templates/dashboard');
        }

        function manage_table(){
            if(!isset($_SESSION['user'])){
                redirect(base_url('users/login'));
                return;
            }
            unset($_SESSION['id_table']);
            $tables = $this->tables_model->getTables();
            $title = "Manage Tables";
            $data = array('title' => $title,'tables' => $tables);
            $this->load->view('templates/header.php',$data);
            $this->load->view('templates/manage_tables.php');
            $this->load->view('templates/footer.php');
        }

        function show_products(){
            $this->load->view('templates/header');
            $this->load->view('templates/products');
            $this->load->view('templates/footer');
        }

        function show_order(){
            $this->load->view('templates/header');
            $this->load->view('templates/shopping_list');
            $this->load->view('templates/footer');    
        }

        function create_invoice($id_table){
            if(!empty($id_table)){
                $id_employee = $this->users_model->getIdEmployeeByUsername($_SESSION['user']);
                var_dump($id_employee);
                if(!empty($id_employee)){
                    $data = array(
                        'id_table' => $id_table,
                        'id_customer' => 1,
                        'id_employee' => $id_employee,
                        'status' => 'processing'
                    );
                    $this->tables_model->updateWhenTableIsOrdered($id_table);
                    $this->invoice_model->create_invoice($data);
                    unset($_POST);
                    redirect('manage_products/show_products');
                    return true;
                }
            }
            echo "Somthing went wrong";
            unset($_POST);
            return false;
        }

        function show_shopping_list(){
            try{
                if($result = $this->invoice_model->get_invoice($_SESSION['id_table'])){
                    $data = array(
                        'products' => $result['products'],
                        'invoice' => $result['invoice']
                    );
                    $this->load->view('templates/header');
                    $this->load->view('templates/shopping_list',$data);
                    $this->load->view('templates/footer');
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }

        function create_detail_invoice(){
            $id_product = $_POST['id_product'];
            $this->invoice_model->create_detail_invoice($_SESSION['id_table'],$id_product);
        }

        function test_invoice_view(){
            $this->load->view('templates/header');
            $this->load->view('templates/invoice');
            $this->load->view('templates/footer');
        }
        
    }
?>