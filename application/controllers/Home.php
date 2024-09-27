<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->helper('form');
		
		$this->db->select('nama_galeri');
		$find = $this->db->get_where('tbl_galeri', array('tipe_galeri' => 'BNR','status_galeri' => 'Y'));
		$data['galeri'] = $find->result();

		$this->db->select('nama_galeri');
		$find = $this->db->get_where('tbl_galeri', array('tipe_galeri' => 'KTN','status_galeri' => 'Y'));
		$data['galeri_konten'] = $find->result();


		$data['propinsi'] = $this->db->get_where('tbl_propinsi', array('status_propinsi' => 'Y'))->result();

		$this->load->view('home/index', $data);
	}

	function booking()
	{
		$notif = '';
		$id_transaksi_tiket = '';

		$nik_customer = $this->input->post('nik_customer');
		$nama_customer = $this->input->post('nama_customer');
		$alamat_customer = $this->input->post('alamat_customer');
		$telepon_customer = $this->input->post('telepon_customer');
		$jenis_kelamin_customer = $this->input->post('jenis_kelamin_customer');
		$id_propinsi = $this->input->post('id_propinsi');
		$id_kabupaten = $this->input->post('id_kabupaten');

		$data = array(
			'nik_customer' => $nik_customer,
			'nama_customer' => $nama_customer,
			'alamat_customer' => $alamat_customer,
			'telepon_customer' => $telepon_customer,
			'jenis_kelamin_customer' => $jenis_kelamin_customer,
			'id_propinsi' => $id_propinsi,
			'id_kabupaten' => $id_kabupaten
		);

		$this->db->trans_start();

		$id_customer = '';
		$this->db->select('id_customer');
		$find = $this->db->get_where('tbl_customer', array(
			'nik_customer' => $nik_customer,
			'status_customer' => 'Y'
		))->result();

		if (sizeof($find) > 0) {
			$id_customer = $find[0]->id_customer;
		} else {
			$this->db->insert('tbl_customer', $data);
			$id_customer = $this->db->insert_id();
		}

		$tanggal_transaksi_tiket = date("Y-m-d", strtotime($this->input->post('tanggal_transaksi_tiket')));
		$no_transaksi_tiket = $this->generateNoTiket($tanggal_transaksi_tiket);
		$keterangan_transaksi_tiket = $this->input->post('keterangan_transaksi_tiket');

		$data_booking = array(
			'no_transaksi_tiket' => $no_transaksi_tiket,
			'id_customer' => $id_customer,
			'tanggal_transaksi_tiket' => $tanggal_transaksi_tiket,
			'status_transaksi_tiket' => 'P',
			'keterangan_transaksi_tiket' => $keterangan_transaksi_tiket
		);
		$this->db->insert('tbl_transaksi_tiket', $data_booking);
		$id_transaksi_tiket = $this->db->insert_id();

		$this->db->trans_complete();

		if ($this->db->trans_status()) {
			$notif = 'save-ok';
		} else {
			$notif = 'save-err';
		}

		$this->session->set_flashdata(array(
			'notifikasi' => $notif,
			'id_transaksi_tiket' => $id_transaksi_tiket . uniqid('_')
		));
		redirect('home');
	}

	function getKabByProp($id_propinsi)
	{
		header("Content-Type: application/json");
		$this->db->order_by('nama_kabupaten');
		$find = $this->db->get_where('tbl_kabupaten', array(
			'id_propinsi' => $id_propinsi,
			'status_kabupaten' => 'Y'
		));
		echo json_encode($find->result());
	}

	function cetakTiketBooking($id)
	{
		$this->load->library('Pdf');

		// $data_post = trim(file_get_contents('php://input'));
		// $decode = json_decode($data_post, true);
		// $id_transaksi_tiket = $decode['id_transaksi_tiket'];
		$id_ = explode('_', $id);
		$id_transaksi_tiket = '';

		$pdf = new FPDF('P', 'mm', 'A4');
		// membuat halaman baru
		$pdf->AddPage();
		
		if (sizeof($id_) > 1) {
			$id_transaksi_tiket = $id_[0];
			
			$this->db->select('no_transaksi_tiket, nama_customer, keterangan_transaksi_tiket,
					DATE_FORMAT(tanggal_transaksi_tiket, "%d-%m-%Y") AS tanggal_transaksi_tiket');
			$this->db->join('tbl_customer', 'tbl_transaksi_tiket.id_customer = tbl_customer.id_customer');
			$this->db->from('tbl_transaksi_tiket');
			$this->db->where(array('id_transaksi_tiket' => $id_transaksi_tiket));
			$tiket = $this->db->get()->result()[0];

			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial', 'B', 16);
			// mencetak string 
			$pdf->Cell(190, 7, 'Wahana', 0, 1, 'C');
			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(190, 7, 'Tiket Booking', 0, 1, 'C');
			// Memberikan space kebawah agar tidak terlalu rapat
			$pdf->Ln(7);
	
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(95, 6, 'No. Tiket');
			$pdf->Cell(95, 6, 'Tanggal Pendakian', 0, 1);
			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(95, 6, $tiket->no_transaksi_tiket);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(95, 6, $tiket->tanggal_transaksi_tiket, 0, 1);
			$pdf->Ln(5);
	
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(190, 6, 'Nama', 0, 1);
			$pdf->SetFont('Arial', 'B', 12);
			$pdf->Cell(190, 7, $tiket->nama_customer, 0, 1);
			$pdf->Ln(5);
	
			$pdf->SetFont('Arial', '', 10);
			$pdf->Cell(190, 6, 'Keterangan', 0, 1);
			$pdf->SetFont('Arial', 'B', 10);
			$pdf->Cell(190, 7, $tiket->keterangan_transaksi_tiket, 0, 1);
			$pdf->Ln(5);
	
			$pdf->SetFont('Arial', 'I', 9);
			$pdf->Cell(190, 5, 'Simpan tiket ini sebagai bukti booking', 0, 0, 'C');
		} else {
			// setting jenis font yang akan digunakan
			$pdf->SetFont('Arial', 'B', 16);
			// mencetak string 
			$pdf->Cell(190, 7, 'Tidak ada data', 0, 1, 'C');
		}

		$pdf->Output();
	}

	private function generateNoTiket($tanggal)
	{
		$date_now = $tanggal;
		$this->db->select('MAX(no_transaksi_tiket) AS no_terakhir');
		$this->db->where('DATE(tanggal_transaksi_tiket) = "' . $date_now . '"');
		$find = $this->db->get_where('tbl_transaksi_tiket');
		$last_no = $find->result();
		$new_tail = 1;

		if ($last_no[0]->no_terakhir != null) {
			$last_tail = (int)explode('-', $last_no[0]->no_terakhir)[1];
			$new_tail += $last_tail;
		}

		return str_replace('-', '', $date_now) . '-' . (string)$new_tail;
	}
}
