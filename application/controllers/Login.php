<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
class Login extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
 
	}
	function index(){
		$this->load->view('v_login');
	}
 
	function aksi_login(){
		if ($this->session->userdata('level') == "mhs"){redirect('mahasiswa');}
    	if ($this->session->userdata('level') == "dosen"){redirect('dosen');}
    	if ($this->session->userdata('level') == "admin"){redirect('admin');}

		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(strlen($username)== 10){
			$where = array(
				'nim' => $username,
				'passwd' => md5($password)
			);
			$cek = $this->m_login->cek_login("mahasiswa",$where)->num_rows();
			if($cek > 0){
	 
				$data_session = array(
					'id' => $username,
					'level' => "mhs",
					'status' => "login"
					);
	 
				$this->session->set_userdata($data_session);
	 
				redirect("mahasiswa");
	 
			}else{
				$this->load->view('v_login');
			}
		}elseif(strlen($username)== 18){
			$where = array(
				'nip' => $username,
				'passwd' => md5($password)
			);
			$cek = $this->m_login->cek_login("dosen",$where)->num_rows();
			if($cek > 0){
	 
				$data_session = array(
					'id' => $username,
					'level' => "dosen",
					'status' => "login"
					);
	 
				$this->session->set_userdata($data_session);
	 
				redirect('dosen');
	 
			}else{
				$this->load->view('v_login');
			}
		}else{
			$where = array(
				'username' => $username,
				'passwd' => md5($password)
			);
			$cek = $this->m_login->cek_login("admin",$where)->num_rows();
			if($cek > 0){
	 
				$data_session = array(
					'id' => $username,
					'level' => "admin",
					'status' => "login"
					);
	 
				$this->session->set_userdata($data_session);
	 
				redirect(base_url("admin"));
	 
			}else{
				$this->load->view('v_login');
			}
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}