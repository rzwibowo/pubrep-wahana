<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CekVersi extends CI_Controller
{

	function index()
	{
		header("Content-Type: application/json");

		$find = $this->db->query("select * 
            from tbl_versi")->result();

		$result = new stdClass();
		if (sizeof($find) > 0) {
			$result = $find[0];
		}

		echo json_encode($result);
	}
}
