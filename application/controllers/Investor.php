<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Investor extends CI_Controller
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
		$data['investor'] = $this->db->get_where('tbl_investor', array('status_investor' => 'Y'))->result();
		$this->load->view('master_data/investor/index', $data);
	}

	function save()
	{
		$nama_investor = $this->input->post('nama_investor');
		$persen_bagi_hasil = $this->input->post('persen_bagi_hasil');
		$id_user = $this->session->userdata('id');
		$id_investor = $this->input->post('id_investor');

		$notif = '';

		if ($id_investor != '') {
			$this->db->where(array('id_investor' => $id_investor));
			$update = $this->db->update('tbl_investor', array(
                'nama_investor' => $nama_investor,
                'persen_bagi_hasil' => $persen_bagi_hasil
            ));
			if ($update) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		} else {
			$insert = $this->db->insert('tbl_investor', array(
				'nama_investor' => $nama_investor,
                'persen_bagi_hasil' => $persen_bagi_hasil,
				'id_user' => $id_user
			));
			if ($insert) {
				$notif = 'save-ok';
			} else {
				$notif = 'save-err';
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
        redirect('investor');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_investor', array('id_investor' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_investor' => $id));
		$update = $this->db->update('tbl_investor', array('status_investor' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
        redirect('investor');
	}
}
