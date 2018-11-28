<?php
	class Ve_model extends CI_Model{
		public function __construct(){
			parent::__construct();
			$this->load->database();
		}

		public function timChuyen($data){
			try{
				$sql = "SELECT chi_tiet_hanh_trinh.*,tau.ten_tau,COUNT(ve.id) AS 'so_luong_ghe' FROM chi_tiet_hanh_trinh,tuyen,tau,ve WHERE chi_tiet_hanh_trinh.id_tuyen = tuyen.id AND chi_tiet_hanh_trinh.id_tau = tau.id AND chi_tiet_hanh_trinh.id = ve.id_chi_tiet_hanh_trinh AND tuyen.id_ga_di = (SELECT ga.id FROM ga WHERE ga.ten_ga = ?) AND tuyen.id_ga_den = (SELECT ga.id FROM ga WHERE ga.ten_ga = ?) AND chi_tiet_hanh_trinh.ngay_khoi_hanh = ? AND ve.trang_thai = 'có sẵn' GROUP BY chi_tiet_hanh_trinh.id;";
				if($query = $this->db->query($sql,$data)){
					$result = $query->result_array();
					return $result;
				}

			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
		}

		public function timGa($another=''){
			try{
				$sql = "SELECT * FROM ga WHERE ga.trang_thai = 1 AND ga.id != ?";
				if($query = $this->db->query($sql,$another)){
					$result = $query->result_array();
					return $result;
				}

			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
		}

		public function timToa($data){
			try{
				$sql = "SELECT toa.*,COUNT(ve.id) AS 'so_luong_ve' FROM chi_tiet_hanh_trinh,chi_tiet_tau_toa,toa,tau,ve WHERE chi_tiet_hanh_trinh.id_tau = tau.id AND chi_tiet_tau_toa.id_tau = tau.id AND chi_tiet_tau_toa.id_toa = toa.id AND ve.id_toa = toa.id AND chi_tiet_hanh_trinh.id = ve.id_chi_tiet_hanh_trinh AND ve.trang_thai = 'có sẵn' AND chi_tiet_hanh_trinh.id = ? GROUP BY toa.id";
				if($query = $this->db->query($sql,$data)){
					$result = $query->result_array();
					return $result;
				}

			}catch(Exception $e){
				echo "Cause error ".$e->getMessege()."<br>";
			}
			return false;
		}

		public function timVe($id_chi_tiet_hanh_trinh,$id_toa){
			try{
				$sql = "SELECT ve.id AS 'id_ve',ghe.id AS 'id_ghe' FROM ve,ghe,chi_tiet_hanh_trinh WHERE ghe.id = ve.id_ghe AND ve.id_toa = ? AND ve.id_chi_tiet_hanh_trinh = chi_tiet_hanh_trinh.id AND chi_tiet_hanh_trinh.id = ?";
				 if($query = $this->db->query($sql,array($id_toa,$id_chi_tiet_hanh_trinh))){
				 	return $query->result_array();
				 }else{
				 	die("Something went wrong when query database");
				 }
			}catch(Exception $e){
				die("Cause error ".$e->getMessage()."<br>");
			}
			return false;
		}

	}

