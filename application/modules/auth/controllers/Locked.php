
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Locked extends MX_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'profile/m_profile',
      'auth/m_locked',
      'config/m_config'
    ));
    if (@$this->session->userdata('logged') == false) redirect(site_url() . "/auth/login");
  }

  public function index()
  {
    $data = array();
    $data['profile'] = $this->m_profile->get_first();
    $this->load->view('locked', $data);
  }

  public function lock()
  {
    $this->session->set_userdata(array('locked' => 1));
    redirect(site_url() . '/auth/locked');
  }

  public function action()
  {
    $data = html_escape($this->input->post());
    $auth = $this->m_locked->action($data);
    switch ($auth) {
      case -1:
        $this->session->set_flashdata('flash_error', "Pengguna tidak ditemukan!");
        redirect(site_url() . '/auth/locked');
        break;

      case 0:
        $this->session->set_flashdata('flash_error', "Password salah!");
        redirect(site_url() . '/auth/locked');
        break;

      case 1:
        $menu = $this->m_config->get_first_menu($this->session->userdata('role_id'));
        redirect(site_url() . "/" . $menu['controller'] . "/" . $menu['url']);
        break;
    }
  }
}
