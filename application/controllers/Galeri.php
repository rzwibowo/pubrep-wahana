<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Galeri extends CI_Controller
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
		$data['galeri'] = $this->db->get_where('tbl_galeri', array('tipe_galeri' => 'BNR'))->result();
		$this->load->view('master_data_web/galeriBanner/index', $data);
	}

	function konten() 
	{
		$data['galeri'] = $this->db->get_where('tbl_galeri', array('tipe_galeri' => 'KTN'))->result();
		$this->load->view('master_data_web/galeriKonten/index', $data);
	}

	function save()
	{
		header("Content-Type: application/json");
		$filename = null;

		$conf['upload_path'] = 'assets/img/uploads/';
		$conf['allowed_types'] = 'jpg|png';
		$conf['file_name'] = 'gbr-' . uniqid();
		$conf['overwrite'] = true;
		$conf['max_size'] = 1024;

		$data_result = new stdClass();

		$this->load->library('upload', $conf);

		if ($this->upload->do_upload('file')) {
			$filename = $this->upload->data('file_name');
			$data = array('nama_galeri' => $filename, 'tipe_galeri' => 'BNR');
			$insert = $this->db->insert('tbl_galeri', $data);

			if ($insert) {
				$data_result->status = 'save-ok';
			} else {
				$data_result->status = 'save-err';
			}
		} else {
			$data_result->status = 'save-err';
			$data_result->message = $this->upload->display_errors();
		}

		echo json_encode($data_result);
	}

	function saveKonten()
	{
		header("Content-Type: application/json");
		$filename = null;

		$conf['upload_path'] = 'assets/img/uploads/';
		$conf['allowed_types'] = 'jpg|png';
		$conf['file_name'] = 'gbr-' . uniqid();
		$conf['overwrite'] = true;
		$conf['max_size'] = 1024;

		$data_result = new stdClass();

		$this->load->library('upload', $conf);

		if ($this->upload->do_upload('file')) {
			$filename = $this->upload->data('file_name');

			$data = array('nama_galeri' => $filename,'tipe_galeri' => 'KTN');
			$insert = $this->db->insert('tbl_galeri', $data);

			if ($insert) {
				$data_result->status = 'save-ok';
			} else {
				$data_result->status = 'save-err';
			}
		} else {
			$data_result->status = 'save-err';
			$data_result->message = $this->upload->display_errors();
		}

		echo json_encode($data_result);
	}

	function setStatus($id, $status)
	{
		$this->db->where(array('id_galeri' => $id));
		$update = $this->db->update('tbl_galeri', array('status_galeri' => $status));
		$notif = '';

		if ($update) {
			$notif = 'status-ok';
		} else {
			$notif = 'status-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
		redirect('galeri');
	}

	function delete($id)
	{
		$notif = '';

		$this->db->trans_start();

		$this->db->select('nama_galeri');
		$find = $this->db->get_where('tbl_galeri', array('id_galeri' => $id));
		$filename = $find->result()[0]->nama_galeri;

		if (file_exists('assets/img/uploads/' . $filename)) {
			unlink('assets/img/uploads/' . $filename);
		}

		$this->db->where(array('id_galeri' => $id));
		$this->db->delete('tbl_galeri');

		$this->db->trans_complete();

		if ($this->db->trans_status()) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
		redirect('galeri');
	}
}
