<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Penunjang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('status') != 'login_whn') {
			redirect(base_url('login'));
		}
	}

	function index()
	{
		$data['penunjang'] = $this->db->get_where('tbl_penunjang', array('status_penunjang' => 'Y'))->result();
		$this->load->view('master_data/penunjang/index', $data);
	}

	function save()
	{
		$nama_penunjang = $this->input->post('nama_penunjang');
		$id_user = $this->session->userdata('id');
		$id_penunjang = $this->input->post('id_penunjang');

		$notif = '';

		if ($id_penunjang != '') {
			$this->db->where(array('id_penunjang' => $id_penunjang));
			$update = $this->db->update('tbl_penunjang', array('nama_penunjang' => $nama_penunjang));
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_penunjang', array(
				'nama_penunjang' => $nama_penunjang,
				'id_user' => $id_user
			));
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('penunjang');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_penunjang', array('id_penunjang' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_penunjang' => $id));
		$update = $this->db->update('tbl_penunjang', array('status_penunjang' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('penunjang');
	}
}
