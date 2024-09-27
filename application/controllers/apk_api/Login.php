<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{

	function index()
	{
		header("Content-Type: application/json");

		$data_post = trim(file_get_contents('php://input'));
		$decode = json_decode($data_post, true);

		$username_karyawan = $decode['username'];
		$password_karyawan = md5($decode['password']);

		$find = $this->db->query("SELECT k.* 
			FROM tbl_karyawan k 
			WHERE k.username_karyawan='" . $this->db->escape_str($username_karyawan) . "' 
			AND k.password_karyawan='" . $this->db->escape_str($password_karyawan) . "'
			AND k.status_karyawan <> 'N'")->result();

		$result = new stdClass();
		if (sizeof($find) > 0) {
			unset($find[0]->password_karyawan);
			$result = $find[0];
		}

		echo json_encode($result);
	}
}
