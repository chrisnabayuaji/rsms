<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends MX_Controller {

	function __construct(){
    parent::__construct();
		$this->load->model(array(
			'profile/m_profile',
		));
  }

	public function error_403($data = null)
	{
		$data['profile'] = $this->m_profile->get_first();
	  $this->load->view('403', $data);
	}
  
}
