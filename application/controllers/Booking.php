<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Booking extends CI_Controller
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
        $this->db->select('id_transaksi_tiket, no_transaksi_tiket, nama_customer, alamat_customer,
            DATE_FORMAT(tanggal_transaksi_tiket, "%d-%m-%Y") AS tanggal_transaksi_tiket, 
            keterangan_transaksi_tiket, nama_kabupaten, nama_propinsi');
        $this->db->join('tbl_customer', 'tbl_transaksi_tiket.id_customer = tbl_customer.id_customer');
        $this->db->join('tbl_propinsi', 'tbl_customer.id_propinsi = tbl_propinsi.id_propinsi');
        $this->db->join('tbl_kabupaten', 'tbl_customer.id_kabupaten = tbl_kabupaten.id_kabupaten');
        $this->db->from('tbl_transaksi_tiket');
        $this->db->where('status_transaksi_tiket', 'P');
        $this->db->order_by('tanggal_transaksi_tiket', 'desc');
        $get = $this->db->get();

        $data['booking'] = $get->result();
        $this->load->view('transaksi/booking/index', $data);
    }
}
