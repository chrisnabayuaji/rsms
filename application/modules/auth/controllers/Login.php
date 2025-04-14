<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MX_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model(array(
			'm_login',
			'user/m_user',
			'profile/m_profile',
			'config/m_config',
		));
		if ($this->session->userdata('logged')) {
			if ($this->session->userdata('locked')) {
				redirect(site_url() . '/auth/locked');
			} else {
				$menu = $this->m_config->get_first_menu($this->session->userdata('role_id'));
				redirect(site_url() . '/' . $menu['controller'] . '/index');
			}
		} else {
			//check if client browser has cookie
			$user_id = get_cookie('user_id');
			if (@$user_id != null) {
				$user = $this->m_user->get_data($user_id);
				$sess = array(
					'user_id' => $user['user_id'],
					'role_id' => $user['role_id'],
					'user_fullname' => $user['user_fullname'],
					'photo' => $user['photo'],
					'logged' => true,
					'locked' => false
				);
				$this->session->set_userdata($sess);
				$menu = $this->m_config->get_first_menu($sess['role_id']);
				redirect(site_url() . '/' . $menu['controller'] . '/index');
			}
		}
	}

	public function index()
	{
		$data['profile'] = $this->m_profile->get_first();

		create_log(1, 'Login');
		$this->load->view('login', $data);
	}

	public function action()
	{
		$data = html_escape($this->input->post());
		$auth = $this->m_login->action($data);
		switch ($auth) {
			case -1:
				$this->session->set_flashdata('flash_error', "Pengguna tidak ditemukan!");
				redirect(site_url() . '/auth/login');
				break;

			case 0:
				$this->session->set_flashdata('flash_error', "Kombinasi email dan password tidak cocok!");
				redirect(site_url() . '/auth/login');
				break;

			case 1:
				$menu = $this->m_config->get_first_menu($this->session->userdata('role_id'));
				redirect(site_url() . "/" . $menu['controller'] . "/" . $menu['url']);
				break;
		}
	}
}
