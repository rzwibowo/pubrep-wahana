<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Propinsi extends CI_Controller
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
		$data['propinsi'] = $this->db->get_where('tbl_propinsi', array('status_propinsi' => 'Y'))->result();
		$this->load->view('master_data/propinsi/index', $data);
	}

	function save()
	{
		$nama_propinsi = $this->input->post('nama_propinsi');
		$id_user = $this->session->userdata('id');
		$id_propinsi = $this->input->post('id_propinsi');

		$notif = '';

		if ($id_propinsi != '') {
			$this->db->where(array('id_propinsi' => $id_propinsi));
			$update = $this->db->update('tbl_propinsi', array('nama_propinsi' => $nama_propinsi));
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_propinsi', array(
				'nama_propinsi' => $nama_propinsi,
				'id_user' => $id_user
			));
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('propinsi');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_propinsi', array('id_propinsi' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_propinsi' => $id));
		$update = $this->db->update('tbl_propinsi', array('status_propinsi' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('propinsi');
	}
}
