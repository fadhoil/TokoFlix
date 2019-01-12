<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_UAcc extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function getAllUser()
	{
		$query = $this->db->query(
	        "
	        SELECT U.*,R.role
	        FROM sysuser U
	        INNER JOIN sysrole  R on (U.role=R.idrole)
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

	public function getGroup()
	{
		$query = $this->db->query(
	        "
	        SELECT DISTINCT G.group 
	        FROM sysusergroup G
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
		# code...
	}
}