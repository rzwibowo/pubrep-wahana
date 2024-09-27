<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Kabupaten extends CI_Controller
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
		$this->db->select('id_kabupaten, nama_kabupaten, tbl_kabupaten.id_propinsi, nama_propinsi')
			->join('tbl_propinsi', 'tbl_kabupaten.id_propinsi = tbl_propinsi.id_propinsi');
		$data['kabupaten'] = $this->db->get_where('tbl_kabupaten', array('status_kabupaten' => 'Y'))->result();
		$data['propinsi'] = $this->db->get_where('tbl_propinsi', array('status_propinsi' => 'Y'))->result();
		$this->load->view('master_data/kabupaten/index', $data);
	}

	function save()
	{
		$nama_kabupaten = $this->input->post('nama_kabupaten');
		$id_propinsi = $this->input->post('id_propinsi');
		$id_kabupaten = $this->input->post('id_kabupaten');

		$data = array(
			'nama_kabupaten' => $nama_kabupaten,
			'id_propinsi' => $id_propinsi
		);

		$notif = '';

		if ($id_kabupaten != '') {
			$this->db->where(array('id_kabupaten' => $id_kabupaten));
			$update = $this->db->update('tbl_kabupaten', $data);
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_kabupaten', $data);
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
		redirect('kabupaten');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_kabupaten', array('id_kabupaten' => $id));
		echo json_encode($find->result());
	}

	function getByProp($id_propinsi)
	{
		header("Content-Type: application/json");
		$this->db->order_by('nama_kabupaten');
		$find = $this->db->get_where('tbl_kabupaten', array(
			'id_propinsi' => $id_propinsi,
			'status_kabupaten' => 'Y'
		));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_kabupaten' => $id));
		$update = $this->db->update('tbl_kabupaten', array('status_kabupaten' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
		redirect('kabupaten');
	}
}
