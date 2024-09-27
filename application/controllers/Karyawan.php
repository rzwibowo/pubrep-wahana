<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Karyawan extends CI_Controller
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
        $this->db->select('id_karyawan, nik_karyawan, nama_karyawan, alamat_karyawan,
            telepon_karyawan, username_karyawan, tbl_karyawan.id_jabatan, nama_jabatan')
            ->join('tbl_jabatan', 'tbl_karyawan.id_jabatan = tbl_jabatan.id_jabatan');
		$data['karyawan'] = $this->db->get_where('tbl_karyawan', array('status_karyawan' => 'Y'))->result();
		$data['jabatan'] = $this->db->get_where('tbl_jabatan', array('status_jabatan' => 'Y'))->result();
		$this->load->view('master_data/karyawan/index', $data);
	}

	function save()
	{
		$nik_karyawan = $this->input->post('nik_karyawan');
		$nama_karyawan = $this->input->post('nama_karyawan');
		$alamat_karyawan = $this->input->post('alamat_karyawan');
		$telepon_karyawan = $this->input->post('telepon_karyawan');
		$username_karyawan = $this->input->post('username_karyawan');
		$password_karyawan = md5($this->input->post('password_karyawan'));
		$id_jabatan = $this->input->post('id_jabatan');
        $id_karyawan = $this->input->post('id_karyawan');
        
        $data = array(
            'nik_karyawan' => $nik_karyawan,
            'nama_karyawan' => $nama_karyawan,
            'alamat_karyawan' => $alamat_karyawan,
            'telepon_karyawan' => $telepon_karyawan,
            'username_karyawan' => $username_karyawan,
            'id_jabatan' => $id_jabatan
        );

        if ($this->input->post('password_karyawan') != '') {
            array_merge($data, array('password_karyawan' => $password_karyawan));
        }

		$notif = '';

		if ($id_karyawan != '') {
			$this->db->where(array('id_karyawan' => $id_karyawan));
			$update = $this->db->update('tbl_karyawan', $data);
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_karyawan', $data);
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('karyawan');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_karyawan', array('id_karyawan' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_karyawan' => $id));
		$update = $this->db->update('tbl_karyawan', array('status_karyawan' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('karyawan');
	}
}
