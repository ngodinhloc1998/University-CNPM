<?php
	/**
	 * 
	 */
	class Payment extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
		}

		function passenger_details(){
			$this->load->view('templates/header');
			$this->load->view('templates/main/passenger_details');
			$this->load->view('templates/footer');
		}
	}