<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class KategoriKendaraan extends CI_Controller
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
		$data['kategori_kendaraan'] = $this->db->get_where('tbl_kategori_kendaraan', array('status_kategori_kendaraan' => 'Y'))->result();
		$this->load->view('master_data/kategori_kendaraan/index', $data);
	}

	function save()
	{
		$kode_kategori_kendaraan = $this->input->post('kode_kategori_kendaraan');
		$nama_kategori_kendaraan = $this->input->post('nama_kategori_kendaraan');
		$tarif_kategori_kendaraan = str_replace('.', '', $this->input->post('tarif_kategori_kendaraan'));
		$jenis_tarif_kategori_kendaraan = $this->input->post('jenis_tarif_kategori_kendaraan');
		$id_user = $this->session->userdata('id');
        $id_kategori_kendaraan = $this->input->post('id_kategori_kendaraan');
        
        $data = array(
            'kode_kategori_kendaraan' => $kode_kategori_kendaraan,
            'nama_kategori_kendaraan' => $nama_kategori_kendaraan,
            'tarif_kategori_kendaraan' => $tarif_kategori_kendaraan,
            'jenis_tarif_kategori_kendaraan' => $jenis_tarif_kategori_kendaraan,
        );

		$notif = '';

		if ($id_kategori_kendaraan != '') {
			$this->db->where(array('id_kategori_kendaraan' => $id_kategori_kendaraan));
			$update = $this->db->update('tbl_kategori_kendaraan', $data);
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
            array_merge($data, array('id_user'=>$id_user));
			$insert = $this->db->insert('tbl_kategori_kendaraan', $data);
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('kategoriKendaraan');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_kategori_kendaraan', array('id_kategori_kendaraan' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_kategori_kendaraan' => $id));
		$update = $this->db->update('tbl_kategori_kendaraan', array('status_kategori_kendaraan' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('kategoriKendaraan');
	}
}
