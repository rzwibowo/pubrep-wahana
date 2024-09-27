<?php
//print_r( $this->db->last_query());
defined('BASEPATH') OR exit('No direct script access allowed');
class App extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != 'login_whn'){
			redirect(base_url('login'));
		}
	}

	function index(){
		$this->load->view('home');
	}

	function home(){
		$this->load->view('home');
	}	

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}
