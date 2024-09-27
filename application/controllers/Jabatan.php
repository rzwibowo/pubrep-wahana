<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Jabatan extends CI_Controller
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
		$data['jabatan'] = $this->db->get_where('tbl_jabatan', array('status_jabatan' => 'Y'))->result();
		$this->load->view('master_data/jabatan/index', $data);
	}

	function save()
	{
		$nama_jabatan = $this->input->post('nama_jabatan');
		$id_user = $this->session->userdata('id');
		$id_jabatan = $this->input->post('id_jabatan');

		$notif = '';

		if ($id_jabatan != '') {
			$this->db->where(array('id_jabatan' => $id_jabatan));
			$update = $this->db->update('tbl_jabatan', array('nama_jabatan' => $nama_jabatan));
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_jabatan', array(
				'nama_jabatan' => $nama_jabatan,
				'id_user' => $id_user
			));
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('jabatan');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_jabatan', array('id_jabatan' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_jabatan' => $id));
		$update = $this->db->update('tbl_jabatan', array('status_jabatan' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('jabatan');
	}
}
