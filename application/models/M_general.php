<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_general extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function create($data,$table){
	 	return	$this->db->insert($table,$data);
	}

	public function create_batch($data,$table)
	{
		return $this->db->insert_batch($table,$data);
	}

	public function read($table){
		$this->db->from($table);
		$query=$this->db->get();
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

	public function read_where($where,$id,$table){
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			foreach ($query -> result_array() as $row) {
				$data[]= $row;
			}
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function read_detail($where,$id,$table){
		$this->db->where($where, $id);
		$query = $this->db->get($table);

		if($query->num_rows() >0){
			$data = $query->row_array();
			$query->free_result();
		}else{
			$data=NULL;
		}
		return $data;
	}

	public function update_data($data,$where,$id,$table){
		$this->db->where($where,$id);
		return $this->db->update($table,$data);
	}

	public function delete($where,$id,$table){
		//Query DELETE ... WHERE id=...
		return $this->db->where($where, $id)
				 	->delete($table);
	}

	public function getMenu($role,$menu)
	{
		$query = $this->db->query(
	        "
	        SELECT *
	        FROM sysrolemenu
	        WHERE (role='$role' AND menu LIKE '$menu%') OR $role=0 
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

	public function getSumALeave($username)
	{
		$query = $this->db->query(
	        "
	       	SELECT SUM(A.ALeave) as ALeave
			FROM (
			SELECT DATEDIFF(E.Edate, E.Sdate)+1 as ALeave
			FROM cevent E
			INNER JOIN sysusergroup G on (G.username=E.username)
			INNER JOIN ccategory C on (E.category=C.cname)
			WHERE E.username='$username' 
			AND C.aleavef='1'
			AND G.aleave!='0'
			AND YEAR(E.Edate)=YEAR(NOW())
			AND YEAR(E.Sdate)=YEAR(NOW())

			UNION ALL

			SELECT DATEDIFF(LAST_DAY(DATE_ADD(NOW(), INTERVAL 12-MONTH(NOW()) MONTH)), E.Sdate)+1 as ALeave
			FROM cevent E
			INNER JOIN sysusergroup G on (G.username=E.username)
			INNER JOIN ccategory C on (E.category=C.cname)
			WHERE E.username='$username' 
			AND C.aleavef='1'
			AND G.aleave!='0'
			AND YEAR(E.Edate)-1=YEAR(NOW())
			AND YEAR(E.Sdate)=YEAR(NOW())

			UNION ALL

			SELECT DATEDIFF(CAST(DATE_FORMAT(NOW() ,'%Y-01-01') as DATE), E.Sdate)+2 as ALeave
			FROM cevent E
			INNER JOIN sysusergroup G on (G.username=E.username)
			INNER JOIN ccategory C on (E.category=C.cname)
			WHERE E.username='$username' 
			AND C.aleavef='1'
			AND G.aleave!='0'
			AND YEAR(E.Edate)=YEAR(NOW())
			AND YEAR(E.Sdate)+1=YEAR(NOW())

			) A
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
