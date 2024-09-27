<?php
//print_r( $this->db->last_query());
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') == 'login_whn') {
            redirect(base_url());
        }
    }

    function index()
    {
        $this->load->view('login');
    }

    function prosesLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username_karyawan' => $username,
            'password_karyawan' => md5($password),
            'status_karyawan' => 'Y'
        );
        $cek = $this->db->get_where('tbl_karyawan', $where)->result();
        if (sizeof($cek) > 0) {
            $id = $cek[0]->id_karyawan;

            $data_session = array(
                'id' => $id,
                'nama' => $username,
                'status' => "login_whn"
            );

            $this->session->set_userdata($data_session);

            redirect(base_url('/'));
        } else {
            $this->session->set_flashdata('notifikasi', 'gagal');
            redirect('login');
        }
    }
}
