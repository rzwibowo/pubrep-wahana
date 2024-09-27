<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Cashflow extends CI_Controller
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
        $this->load->view('laporan/cashflow/index');
    }

    private function getDataLap($tgl_awal, $tgl_akhir) {
        function rangeTanggal($field, $tgl_awal_, $tgl_akhir_)
        {
            return 'DATE(' . $field . ') BETWEEN "' . $tgl_awal_ . '" AND "' . $tgl_akhir_ . '"';
        }

        $this->db->select('SUM(nilai_transaksi_parkir) AS total_parkir');
        $this->db->where(rangeTanggal('tgl_transaksi_parkir', $tgl_awal, $tgl_akhir));
        $this->db->where(array(
            'status_transaksi_parkir' => 'Y',
            'tgl_transaksi_parkir_keluar !=' => NULL
        ));
        $parkir = $this->db->get('tbl_transaksi_parkir');

        $this->db->select('SUM(grand_total_transaksi_tiket) AS total_tiket');
        $this->db->where(rangeTanggal('tanggal_transaksi_tiket', $tgl_awal, $tgl_akhir));
        $this->db->where('status_transaksi_tiket', 'Y');
        $tiket = $this->db->get('tbl_transaksi_tiket');

        $this->db->select('SUM(nilai_transaksi_biaya) AS total_biaya');
        $this->db->where(rangeTanggal('tanggal_transaksi_biaya', $tgl_awal, $tgl_akhir));
        $this->db->where('status_transaksi_biaya', 'Y');
        $biaya = $this->db->get('tbl_transaksi_biaya');

        $data = new stdClass();
        $data->parkir = $parkir->result()[0]->total_parkir;
        $data->tiket = $tiket->result()[0]->total_tiket;
        $data->total_masuk = $data->parkir + $data->tiket;

        $data->biaya = $biaya->result()[0]->total_biaya;
        $data->total_keluar = $data->biaya;

        $data->grand_total = $data->total_masuk - $data->total_keluar;

        return $data;
    }

    function dataLap($tgl_awal, $tgl_akhir)
    {
        header("Content-Type: application/json");
        $data = $this->getDataLap($tgl_awal, $tgl_akhir);

        echo json_encode($data);
    }

    function cetak_lap($tipe, $tgl_awal, $tgl_akhir)
    {
        $data_get = $this->getDataLap($tgl_awal, $tgl_akhir);
        
        $data['parkir'] = $data_get->parkir;
        $data['tiket'] = $data_get->tiket;
        $data['total_masuk'] = $data_get->total_masuk;

        $data['biaya'] = $data_get->biaya;
        $data['total_keluar'] = $data_get->total_keluar;

        $data['grand_total'] = $data_get->grand_total;

        $this->load->view('laporan/cashflow/cetak_excel', $data);
    }
}
