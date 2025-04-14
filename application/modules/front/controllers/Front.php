<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends MX_Controller
{

	function __construct()
	{
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
