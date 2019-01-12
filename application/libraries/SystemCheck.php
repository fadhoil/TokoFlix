<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SystemCheck{
	public function Logged(){
		$_this =& get_instance();
		$_this->load->helper('url');
		if($_this->session->userdata('login_status') != TRUE){
			redirect(base_url('Auth'));
		}else{
			return TRUE;
		}
		
	}

	public function CheckMenu($role=null,$menu=null)
	{
		$_this =& get_instance();
		if ($role!=null&&$menu!=null) {
			if(!empty($_this->M_general->getMenu($role,$menu))){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
		
	}
}