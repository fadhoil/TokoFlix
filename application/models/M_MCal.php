<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_MCal extends CI_Model {
	public function __construct(){
		parent::__construct();
	}

	public function getDataEvent($group='')
	{

		$query = $this->db->query(
	        "
	       	SELECT E.*,G.group,G.color as Gcolor,C.color as Ccolor
	        FROM cevent E
	        INNER JOIN sysusergroup G on (G.username=E.username)
            INNER JOIN ccategory C on (E.category=C.cname)
	        WHERE G.group like '$group%'
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