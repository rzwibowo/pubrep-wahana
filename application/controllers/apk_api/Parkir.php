<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Parkir extends CI_Controller
{

    function masuk()
    {
        header("Content-Type: application/json");

        $data_post = trim(file_get_contents('php://input'));
        $decode = json_decode($data_post, true);

        $kode_kategori_kendaraan = $decode['kode_kategori_kendaraan'];
        $no_kendaraan = $decode['no_kendaraan'];
        $id_user = $decode['id_user'];
        $tgl_transaksi_parkir = date('Y-m-d H:i:s');

        $find = $this->db->query("SELECT id_kategori_kendaraan,
                tarif_kategori_kendaraan
            FROM tbl_kategori_kendaraan 
            WHERE kode_kategori_kendaraan = '" . $kode_kategori_kendaraan . "'
                AND status_kategori_kendaraan = 'Y'")->result();

        $result = new stdClass();

        if (sizeof($find) > 0) {
            $data = array(
                'tgl_transaksi_parkir' => $tgl_transaksi_parkir,
                'id_kategori_kendaraan' => $find[0]->id_kategori_kendaraan,
                'no_kendaraan' => $no_kendaraan,
                'nilai_transaksi_parkir' => $find[0]->tarif_kategori_kendaraan,
                'id_user' => $id_user,
                'in_transaksi_parkir' => 1
            );

            $proses = $this->db->insert('tbl_transaksi_parkir', $data);

            if ($proses) {
                $result->status = 200;
                $result->message = 'Berhasil parkir masuk';

                $id_parkir = $this->db->insert_id();
                $result->detail = new stdClass();
                $result->detail->id_transaksi_parkir = $id_parkir;
                $result->detail->no_kendaraan = $no_kendaraan;
                $result->detail->tgl_transaksi_parkir = $tgl_transaksi_parkir;
            } else {
                $result->status = 500;
                $result->message = 'Terjadi kesalahan';
            }
        } else {
            $result->status = 404;
            $result->message = 'Data Kategori Kendaraan tidak ada';
        }


        echo json_encode($result);
    }

    function keluar()
    {
        header("Content-Type: application/json");

        $data_post = trim(file_get_contents('php://input'));
        $decode = json_decode($data_post, true);

        $id_transaksi_parkir = $decode['id_transaksi_parkir'];
        $no_kendaraan = $decode['no_kendaraan'];
        $tgl_transaksi_parkir_keluar = date('Y-m-d H:i:s');

        $result = new stdClass();

        if ($id_transaksi_parkir == '') {
            $find_id_trx = $this->db->query("SELECT id_transaksi_parkir
                FROM tbl_transaksi_parkir 
                WHERE no_kendaraan = '" . $no_kendaraan . "'
                    AND out_transaksi_parkir IS NULL
                    AND status_transaksi_parkir = 'Y'
                    ORDER BY tgl_transaksi_parkir DESC
                    LIMIT 1")->result();

            if (sizeof($find_id_trx) > 0) {
                $id_transaksi_parkir = $find_id_trx[0]->id_transaksi_parkir;
            } else {
                $result->status = 404;
                $result->message = 'Data Parkir tidak ada atau tidak valid';
            }
        } elseif (!is_numeric($id_transaksi_parkir)) {
            $result->status = 404;
            $result->message = 'Data Parkir tidak ada atau tidak valid';
        }

        if ($id_transaksi_parkir != '' && is_numeric($id_transaksi_parkir)) {
            $find_trx = $this->db->query("SELECT no_kendaraan
                FROM tbl_transaksi_parkir 
                WHERE id_transaksi_parkir = " . $id_transaksi_parkir . "
                    AND out_transaksi_parkir IS NULL
                    AND status_transaksi_parkir = 'Y'")->result();

            if (sizeof($find_trx) > 0) {
                $data = array(
                    'tgl_transaksi_parkir_keluar' => $tgl_transaksi_parkir_keluar,
                    'out_transaksi_parkir' => 1
                );
                $where = array(
                    'id_transaksi_parkir' => $id_transaksi_parkir,
                    'status_transaksi_parkir' => 'Y'
                );
                $proses = $this->db->update('tbl_transaksi_parkir', $data, $where);

                if ($proses) {
                    $find = $this->db->query("SELECT aa.*, nama_kategori_kendaraan
                                FROM tbl_transaksi_parkir aa 
                                    LEFT JOIN tbl_kategori_kendaraan bb
                                        ON aa.id_kategori_kendaraan = bb.id_kategori_kendaraan
                                WHERE id_transaksi_parkir = " . $id_transaksi_parkir .
                        " AND status_transaksi_parkir = 'Y'")->result();

                    $result->status = 200;
                    $result->message = 'berhasil keluar';
                    $result->detail = $find[0];
                } else {
                    $result->status = 500;
                    $result->message = 'Terjadi kesalahan';
                }
            } else {
                $result->status = 404;
                $result->message = 'Data Parkir tidak ada atau tidak valid';
            }
        } else {
            $result->status = 404;
            $result->message = 'Data Parkir tidak ada atau tidak valid';
        }

        echo json_encode($result);
    }
}
