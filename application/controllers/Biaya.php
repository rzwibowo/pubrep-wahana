<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Biaya extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != 'login_whn') {
            redirect(base_url('login'));
        }
    }

    private function generateNoBiaya()
    {
        $date_now = date('Y-m-d');
        $this->db->select('MAX(no_faktur) AS no_terakhir');
        $this->db->where('DATE(tanggal_transaksi_biaya) = "' . $date_now . '"');
        $find = $this->db->get_where('tbl_transaksi_biaya');
        $last_no = $find->result();
        $new_tail = 1;

        if ($last_no[0]->no_terakhir != null) {
            $last_tail = (int)explode('-', $last_no[0]->no_terakhir)[1];
            $new_tail += $last_tail;
        }

        return str_replace('-', '', $date_now) . '-' . (string)$new_tail;
    }

    function index($id = '')
    {
        $data['no_faktur'] = $this->generateNoBiaya();

        $this->db->select('id_kategori_biaya, nama_kategori_biaya');
        $this->db->order_by('nama_kategori_biaya');
        $kategori_biaya = $this->db->get_where('tbl_kategori_biaya', array('status_kategori_biaya' => 'Y'));
        $data['kategori_biaya'] = $kategori_biaya->result();

        $jenis = $this->db->query("SHOW COLUMNS FROM tbl_transaksi_biaya LIKE 'jenis_transaksi_biaya'");
        $data['jenis_transaksi_biaya'] = explode(
            "','",
            preg_replace("/(enum|set)\('(.+?)'\)/", "\\2", $jenis->result()[0]->Type)
        );

        if ($id != '') {
            $this->db->select('id_transaksi_biaya, no_faktur, tanggal_transaksi_biaya, id_kategori_biaya,
                nilai_transaksi_biaya, jenis_transaksi_biaya');
            $find = $this->db->get_where('tbl_transaksi_biaya', array('id_transaksi_biaya' => $id));

            $data['biaya'] = $find->result()[0];
            $data['no_faktur'] = $data['biaya']->no_faktur;

            $nilai_fmt = number_format((string)$data['biaya']->nilai_transaksi_biaya, 0, "", ".");
            $data['biaya']->nilai_transaksi_biaya = $nilai_fmt;
        }

        $this->load->view('transaksi/biaya/index', $data);
    }

    function save()
    {
        $no_faktur = $this->input->post('no_faktur');
        $tanggal_transaksi_biaya = $this->input->post('tanggal_transaksi_biaya');
        $id_kategori_biaya = $this->input->post('id_kategori_biaya');
        $nilai_transaksi_biaya = str_replace('.', '', $this->input->post('nilai_transaksi_biaya'));
        $jenis_transaksi_biaya = $this->input->post('jenis_transaksi_biaya');
        $id_transaksi_biaya = $this->input->post('id_transaksi_biaya');

        $data = array(
            'no_faktur' => $no_faktur,
            'tanggal_transaksi_biaya' => $tanggal_transaksi_biaya,
            'id_kategori_biaya' => $id_kategori_biaya,
            'nilai_transaksi_biaya' => $nilai_transaksi_biaya,
            'jenis_transaksi_biaya' => $jenis_transaksi_biaya
        );

        if ($id_transaksi_biaya != '') {
            unset($data['no_faktur']);

            $this->db->where(array('id_transaksi_biaya' => $id_transaksi_biaya));
            $update = $this->db->update('tbl_transaksi_biaya', $data);

            if ($update) {
                $notif = 'save-ok';
            } else {
                $notif = 'save-err';
            }
        } else {
            //#region Transaksi Biaya Baru
            $find = $this->db->get_where('tbl_transaksi_biaya', array('no_faktur', $no_faktur));
            if (sizeof($find->result()) > 0) {
                $data['no_faktur'] = $this->generateNoBiaya();
            }

            $insert = $this->db->insert('tbl_transaksi_biaya', $data);

            if ($insert) {
                $notif = 'save-ok';
            } else {
                $notif = 'save-err';
            }
            //#endregion Transaksi Biaya Baru
        }

        $this->session->set_flashdata('notifikasi', $notif);
        if ($id_transaksi_biaya != '') {
            redirect('biaya/rekap');
        } else {
            redirect('biaya');
        }
    }

    function rekap()
    {
        $this->load->view('rekap/biaya/index');
    }

    function laporan()
    {
        $this->load->view('laporan/biaya/index');
    }

    private function getDataRekap($tgl_awal, $tgl_akhir) {
        $range_tgl = 'DATE(tanggal_transaksi_biaya) BETWEEN "' . $tgl_awal . '" AND "' . $tgl_akhir . '"';

        $this->db->select('id_transaksi_biaya, no_faktur,
            DATE_FORMAT(tanggal_transaksi_biaya, "%d-%m-%Y") AS tanggal_transaksi_biaya, 
            nilai_transaksi_biaya, nama_kategori_biaya, jenis_transaksi_biaya');
        $this->db->join('tbl_kategori_biaya', 'tbl_transaksi_biaya.id_kategori_biaya = tbl_kategori_biaya.id_kategori_biaya');
        $this->db->from('tbl_transaksi_biaya');
        $this->db->where($range_tgl);
        $this->db->where('status_transaksi_biaya', 'Y');
        return $this->db->get();
    }

    public function dataRekap($tgl_awal, $tgl_akhir)
    {
        header("Content-Type: application/json");
        $data = $this->getDataRekap($tgl_awal, $tgl_akhir);

        echo json_encode($data->result());
    }

    function delete($id)
    {
        $this->db->where(array('id_transaksi_biaya' => $id));
        $update = $this->db->update('tbl_transaksi_biaya', array('status_transaksi_biaya' => 'N'));
        $notif = '';

        if ($update) {
            $notif = 'delete-ok';
        } else {
            $notif = 'delete-err';
        }

        $this->session->set_flashdata('notifikasi', $notif);
        redirect('biaya/rekap');
    }

    function cetak_lap($jenis, $tipe, $tgl_awal, $tgl_akhir) {
        $data_get = $this->getDataRekap($tgl_awal, $tgl_akhir);
        $data['rekap'] = $data_get->result();

        if ($jenis == 'rekap'){
            $this->load->view('rekap/biaya/cetak_excel', $data);
        } else {
            $this->load->view('laporan/biaya/cetak_excel', $data);
        }
    }
}
