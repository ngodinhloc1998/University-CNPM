<?php
    class Business extends CI_Controller{
        function __construct(){
            parent::__construct();
            $this->load->model("tables_model");  
            $this->load->model('invoice_model');
            $this->load->model('users_model');
            $this->load->model('products_model');
        }

        private function checkLogin(){
            if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
                return true;
            }
            redirect("users/login");
            return false;
        }

        function home($place="home"){
            if(!isset($_SESSION['user'])){
                redirect(base_url('users/login'));
                return;
            }
            $this->load->view('templates/dashboard');
        }

        function manage_table(){
            $this->checkLogin();
            unset($_SESSION['id_table']);
            $tables = $this->tables_model->getTables();
            $title = "Manage Tables";
            $data = array('title' => $title,'tables' => $tables);
            $this->load->view('templates/header.php',$data);
            $this->load->view('templates/manage_tables.php');
            $this->load->view('templates/footer.php');
        }

        function show_products(){
            $this->checkLogin();
            $this->load->view('templates/header');
            $this->load->view('templates/products');
            $this->load->view('templates/footer');
        }

        function show_order(){
            $this->checkLogin();
            $this->load->view('templates/header');
            $this->load->view('templates/shopping_list');
            $this->load->view('templates/footer');    
        }

        function create_invoice($id_table){
            $this->checkLogin();
            if(!empty($id_table)){
                $id_employee = $this->users_model->getIdEmployeeByUsername($_SESSION['user']);
                //var_dump($id_employee);
                if(!empty($id_employee)){
                    $data = array(
                        'id_table' => $id_table,
                        'id_customer' => 1,
                        'id_employee' => $id_employee,
                        'status' => 'processing'
                    );
                    $this->invoice_model->create_invoice($data);
                    $this->tables_model->updateWhenTableIsOrdered($id_table);
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
            $this->checkLogin();
            try{
                $id_invoice = $this->invoice_model->get_id_invoice_processing($_SESSION['id_table']);
                $id_products_in_invoice = $this->products_model->get_id_products_in_invoice($id_invoice);
                $numItems = 0;
                if($id_products_in_invoice){
                    $numItems = array('numItems' => count($id_products_in_invoice));
                }
                if($result = $this->invoice_model->get_invoice($_SESSION['id_table'])){
                    $data = array(
                        'products' => $result['products'],
                        'invoice' => $result['invoice']
                    );
                    $this->load->view('templates/header',$numItems);
                    $this->load->view('templates/shopping_list',$data);
                    $this->load->view('templates/footer');

                    return true;
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }

        function create_detail_invoice(){
            $this->checkLogin();
            $id_product = $_POST['id_product'];
            $this->invoice_model->create_detail_invoice($_SESSION['id_table'],$id_product);
        }

        function show_invoice(){
            $this->checkLogin();
            try{
                if($result = $this->invoice_model->get_invoice($_SESSION['id_table'])){
                    $data = array(
                        'products' => $result['products'],
                        'invoice' => $result['invoice'],
                        'id_invoice' => $this->invoice_model->get_id_invoice_processing($_SESSION['id_table'])
                    );
                    $this->load->view('templates/header');
                    $this->load->view('templates/invoice',$data);
                    $this->load->view('templates/footer');
                    
                    return true;
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }

            return false;
        }

        function charge_invoice($guestCash){
            $this->checkLogin();
            try{
                $this->invoice_model->charge_invoice($guestCash,$_SESSION['id_table']);
                unset($_SESSION['id_table']);
                $this->manage_table();
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
        }

        function book_table(){
            try{
                if($this->checkLogin()){
                    if(isset($_POST['id_table']) && isset($_POST['time_booked'])){
                        $data = array(
                            'id_table' => $_POST['id_table'],
                            'time_booked' => $_POST['time_booked']
                        );
                    }
                }else{
                    return false;
                }
                if(!empty($data)){
                    if($this->tables_model->updateWhenTableIsBooked($data)){
                        return true;
                    }
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }

        function cancel_book_table(){
            try{
                if($this->checkLogin()){
                    if(isset($_POST['id_table'])){
                       $id =  $_POST['id_table'];
                    }
                }else{
                    return false;
                }
                if(!empty($id)){
                    if($this->tables_model->updateTableIsAvailable($id)){
                        return true;
                    }
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }


        function test_book_table(){
            
            try{

                $data = array(
                    'id_table' => 1,
                    'time_booked' => '2018-11-10 00:00:00'
                );
                if(!empty($data)){
                    if($this->tables_model->updateWhenTableIsBooked($data)){
                        return true;
                    }
                }
            }catch(Exception $e){
                echo "Cause error ".$e->getMessege()."<br>";
            }
            return false;
        }


        
    }
?>