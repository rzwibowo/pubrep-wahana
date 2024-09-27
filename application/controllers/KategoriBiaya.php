<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class KategoriBiaya extends CI_Controller
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
		$data['kategori_biaya'] = $this->db->get_where('tbl_kategori_biaya', array('status_kategori_biaya' => 'Y'))->result();
		$this->load->view('master_data/kategori_biaya/index', $data);
	}

	function save()
	{
		$nama_kategori_biaya = $this->input->post('nama_kategori_biaya');
		$id_user = $this->session->userdata('id');
		$id_kategori_biaya = $this->input->post('id_kategori_biaya');

		$notif = '';

		if ($id_kategori_biaya != '') {
			$this->db->where(array('id_kategori_biaya' => $id_kategori_biaya));
			$update = $this->db->update('tbl_kategori_biaya', array('nama_kategori_biaya' => $nama_kategori_biaya));
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_kategori_biaya', array(
				'nama_kategori_biaya' => $nama_kategori_biaya,
				'id_user' => $id_user
			));
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('kategoriBiaya');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_kategori_biaya', array('id_kategori_biaya' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_kategori_biaya' => $id));
		$update = $this->db->update('tbl_kategori_biaya', array('status_kategori_biaya' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('kategoriBiaya');
	}
}
