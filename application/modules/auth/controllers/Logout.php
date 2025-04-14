<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends MX_Controller
{

	public function action()
	{
		create_log(8, 'Logout');
		$this->session->sess_destroy();
		delete_cookie('user_id');
		redirect(site_url() . '/auth/login');
	}
}
