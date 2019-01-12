<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	public function find_user($username)
	{
		$query = $this->db->query(
	        "SELECT *
	        FROM sysuser 
	        WHERE email='$username' OR username = '$username'
	        ");
		if ($query->num_rows()>0) {
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}
}