<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends MY_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model(array(
      'confit/m_config'
    ));
  }

  public function auth($menu_id)
  {
    $menu_id = $menu_id;
    $this->menu = $this->m_config->get_menu($menu_id);
    if ($this->menu == null) redirect(site_url() . '/error/error_403');
  }

  public function search($menu_id)
  {
    $this->auth($menu_id);
    $menu = $this->m_config->get_menu($menu_id);
    $data = $this->input->post(null, true);
    if ($data == null) redirect(site_url() . '/error/error_403');
    $cookie = get_cookie_menu($menu_id);
    $cookie['search'] = $data;
    set_cookie_menu($menu_id, $cookie);
    redirect(site_url() . '/' . $menu['controller'] . '/' . $menu['url']);
  }

  public function order($menu_id, $field = null, $type = null)
  {
    $this->auth($menu_id);
    $menu = $this->m_config->get_menu($menu_id);
    if ($field == null || $type == null) redirect(site_url() . '/error/error_403');
    $cookie = get_cookie_menu($menu_id);
    $cookie['order'] = array(
      'field' => $field,
      'type' => $type
    );
    set_cookie_menu($menu_id, $cookie);
    redirect(site_url() . '/' . $menu['controller'] . '/' . $menu['url']);
  }
  public function per_page($menu_id, $val = 10)
  {
    $this->auth($menu_id);
    $menu = $this->m_config->get_menu($menu_id);
    $cookie = get_cookie_menu($menu_id);
    $cookie['per_page'] = $val;
    set_cookie_menu($menu_id, $cookie);
    redirect(site_url() . '/' . $menu['controller'] . '/' . $menu['url']);
  }

  public function reset($menu_id)
  {
    $this->auth($menu_id);
    $menu = $this->m_config->get_menu($menu_id);
    $menu_id = str_replace('.', '_', $menu_id);
    delete_cookie($menu_id);
    redirect(site_url() . '/' . $menu['controller'] . '/' . $menu['url']);
  }
}
