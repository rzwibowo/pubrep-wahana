<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Customer extends CI_Controller
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
		$this->db->select('id_customer, nik_customer, nama_customer, alamat_customer,
            telepon_customer, jenis_kelamin_customer, nama_kabupaten, nama_propinsi')
			->join('tbl_kabupaten', 'tbl_customer.id_kabupaten = tbl_kabupaten.id_kabupaten')
			->join('tbl_propinsi', 'tbl_customer.id_propinsi = tbl_propinsi.id_propinsi');
		$data['customer'] = $this->db->get_where('tbl_customer', array('status_customer' => 'Y'))->result();

		$this->db->order_by('nama_propinsi');
		$data['propinsi'] = $this->db->get_where('tbl_propinsi', array('status_propinsi' => 'Y'))->result();
		$this->load->view('master_data/customer/index', $data);
	}

	function save()
	{
		$nik_customer = $this->input->post('nik_customer');
		$nama_customer = $this->input->post('nama_customer');
		$alamat_customer = $this->input->post('alamat_customer');
		$telepon_customer = $this->input->post('telepon_customer');
		$jenis_kelamin_customer = $this->input->post('jenis_kelamin_customer');
		$id_propinsi = $this->input->post('id_propinsi');
		$id_kabupaten = $this->input->post('id_kabupaten');
		$id_customer = $this->input->post('id_customer');

		$data = array(
			'nik_customer' => $nik_customer,
			'nama_customer' => $nama_customer,
			'alamat_customer' => $alamat_customer,
			'telepon_customer' => $telepon_customer,
			'jenis_kelamin_customer' => $jenis_kelamin_customer,
			'id_propinsi' => $id_propinsi,
			'id_kabupaten' => $id_kabupaten
		);

		$notif = '';

		if ($id_customer != '') {
			$this->db->select('id_customer');
			$find = $this->db->get_where('tbl_customer', array(
				'id_customer !=' => $id_customer,
				'nik_customer' => $nik_customer,
				'status_customer' => 'Y'
			))->result();

			if (sizeof($find) > 0) {
				$notif = 'save-dup';
			} else {
				$this->db->where(array('id_customer' => $id_customer));
				$update = $this->db->update('tbl_customer', $data);
				if ($update) {
					$notif = 'save-ok';
				} else {
					$notif = 'save-err';
				}
			}
		} else {
			$this->db->select('id_customer');
			$find = $this->db->get_where('tbl_customer', array(
				'nik_customer' => $nik_customer,
				'status_customer' => 'Y'
			))->result();

			if (sizeof($find) > 0) {
				$notif = 'save-dup';
			} else {
				$insert = $this->db->insert('tbl_customer', $data);
				if ($insert) {
					$notif = 'save-ok';
				} else {
					$notif = 'save-err';
				}
			}
		}
		$this->session->set_flashdata('notifikasi', $notif);
		redirect('customer');
	}

	function get($id)
	{
		header("Content-Type: application/json");
		$find = $this->db->get_where('tbl_customer', array('id_customer' => $id));
		echo json_encode($find->result());
	}

	function delete($id)
	{
		$this->db->where(array('id_customer' => $id));
		$update = $this->db->update('tbl_customer', array('status_customer' => 'N'));
		$notif = '';

		if ($update) {
			$notif = 'delete-ok';
		} else {
			$notif = 'delete-err';
		}

		$this->session->set_flashdata('notifikasi', $notif);
		redirect('customer');
	}

	function search($data)
	{
		header("Content-Type: application/json");
		$this->db->select('id_customer, nik_customer, nama_customer, alamat_customer,
			jenis_kelamin_customer, tbl_kabupaten.id_kabupaten, tbl_propinsi.id_propinsi,
			nama_kabupaten, nama_propinsi')
			->join('tbl_kabupaten', 'tbl_customer.id_kabupaten = tbl_kabupaten.id_kabupaten')
			->join('tbl_propinsi', 'tbl_customer.id_propinsi = tbl_propinsi.id_propinsi');
		$this->db->from('tbl_customer');
		$this->db->where('nik_customer', $data);
		$this->db->or_where('nama_customer LIKE "%' . $data . '%"');
		$this->db->or_where('alamat_customer LIKE "%' . $data . '%"');
		$this->db->or_where('nama_propinsi LIKE "%' . $data . '%"');
		$this->db->or_where('nama_kabupaten LIKE "%' . $data . '%"');
		$find = $this->db->get();
		echo json_encode($find->result());
	}

	function list100()
	{
		header("Content-Type: application/json");
		$this->db->select('id_customer, nik_customer, nama_customer, alamat_customer,
			jenis_kelamin_customer, tbl_kabupaten.id_kabupaten, tbl_propinsi.id_propinsi,
			nama_kabupaten, nama_propinsi')
			->join('tbl_kabupaten', 'tbl_customer.id_kabupaten = tbl_kabupaten.id_kabupaten')
			->join('tbl_propinsi', 'tbl_customer.id_propinsi = tbl_propinsi.id_propinsi');
		$this->db->from('tbl_customer');
		$this->db->limit(100);
		$find = $this->db->get();
		echo json_encode($find->result());
	}

	function saveAjax()
	{
		header("Content-Type: application/json");

		$data_post = trim(file_get_contents('php://input'));
		$decode = json_decode($data_post, true);

		$nik_customer = $decode['nik_customer'];
		$nama_customer = $decode['nama_customer'];
		$alamat_customer = $decode['alamat_customer'];
		$telepon_customer = $decode['telepon_customer'];
		$jenis_kelamin_customer = $decode['jenis_kelamin_customer'];
		$id_propinsi = $decode['id_propinsi'];
		$id_kabupaten = $decode['id_kabupaten'];

		$data = array(
			'nik_customer' => $nik_customer,
			'nama_customer' => $nama_customer,
			'alamat_customer' => $alamat_customer,
			'telepon_customer' => $telepon_customer,
			'jenis_kelamin_customer' => $jenis_kelamin_customer,
			'id_propinsi' => $id_propinsi,
			'id_kabupaten' => $id_kabupaten
		);

		$data_result = new stdClass();

		$this->db->select('id_customer');
		$find = $this->db->get_where('tbl_customer', array(
			'nik_customer' => $nik_customer,
			'status_customer' => 'Y'
		))->result();

		if (sizeof($find) > 0) {
			$data_result->status = 'save-dup';
		} else {
			$insert = $this->db->insert('tbl_customer', $data);
			if ($insert) {
				$id = $this->db->insert_id();

				$data_result->id = $id;
				$data_result->status = 'save-ok';
			} else {
				$data_result->status = 'save-err';
			}
		}
		echo json_encode($data_result);
	}
}
