<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends MY_Controller
{

  var $menu_id, $menu, $cookie;

  function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'config/m_config',
      'm_role'
    ));

    $this->menu_id = '99.02';
    $this->menu = $this->m_config->get_menu($this->menu_id);
    if ($this->menu == null) redirect(site_url() . '/front/error_403');

    //cookie 
    $this->cookie = get_cookie_menu($this->menu_id);
    if ($this->cookie['search'] == null) $this->cookie['search'] = array('term' => '');
    if ($this->cookie['order'] == null) $this->cookie['order'] = array('field' => 'role_name', 'type' => 'asc');
    if ($this->cookie['per_page'] == null) $this->cookie['per_page'] = 10;
    if ($this->cookie['cur_page'] == null) 0;
  }

  public function index()
  {
    authorize($this->menu, '_read');
    //cookie
    $this->cookie['cur_page'] = $this->uri->segment(3, 0);
    $this->cookie['total_rows'] = $this->m_role->all_rows($this->cookie);
    set_cookie_menu($this->menu_id, $this->cookie);
    //main data
    $data['menu'] = $this->menu;
    $data['cookie'] = $this->cookie;
    $data['main'] = $this->m_role->list_data($this->cookie);
    $data['pagination_info'] = pagination_info(count($data['main']), $this->cookie);
    //set pagination
    set_pagination($this->menu, $this->cookie);
    //render
    $this->render('index', $data);
  }

  public function form($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    if ($id == null) {
      create_log(2, $this->menu['menu_name']);
      $data['main'] = null;
    } else {
      create_log(3, $this->menu['menu_name']);
      $data['main'] = $this->m_role->by_field('role_id', $id);
    }
    $data['id'] = $id;
    $data['menu'] = $this->menu;
    $this->render('form', $data);
  }

  public function save($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    $data = html_escape($data = $this->input->post(null, true));
    if (!isset($data['is_active'])) {
      $data['is_active'] = 0;
    }
    $cek = $this->m_role->by_field('role_name', $data['role_name']);
    if ($id == null) {
      if ($cek != null) {
        $this->session->set_flashdata('flash_error', 'Nama sudah ada di sistem.');
        redirect(site_url() . '/' .  $this->menu['controller']  . '/form/');
      }
      $data['role_id'] = $this->uuid->v4();
      $this->m_role->save($data, $id);
      create_log(2, $this->menu['menu_name']);
      $this->session->set_flashdata('flash_success', 'Data berhasil ditambahkan.');
    } else {
      if ($data['old'] != $data['role_name'] && $cek != null) {
        $this->session->set_flashdata('flash_error', 'Nama sudah ada di sistem.');
        redirect(site_url() . '/' . $this->menu['controller'] . '/form/' . $id);
      }
      unset($data['old']);
      $this->m_role->save($data, $id);
      create_log(3, $this->menu['menu_name']);
      $this->session->set_flashdata('flash_success', 'Data berhasil diubah.');
    }
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function delete($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    $this->m_role->delete($id);
    create_log(4, $this->menu['menu_name']);
    $this->session->set_flashdata('flash_success', 'Data berhasil dihapus.');
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function status($type = null, $id = null)
  {
    authorize($this->menu, '_update');
    if ($type == 'enable') {
      $this->m_role->update($id, array('is_active' => 1));
    } else {
      $this->m_role->update($id, array('is_active' => 0));
    }
    create_log(3, $this->this->menu['menu_name']);
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function multiple($type = null)
  {
    $data = $this->input->post(null, true);
    if (isset($data['checkitem'])) {
      foreach ($data['checkitem'] as $key) {
        switch ($type) {
          case 'delete':
            authorize($this->menu, '_delete');
            $this->m_role->delete($key);
            $flash = 'Data berhasil dihapus.';
            $t = 4;
            break;

          case 'enable':
            authorize($this->menu, '_update');
            $this->m_role->update($key, array('is_active' => 1));
            $flash = 'Data berhasil diaktifkan.';
            $t = 3;
            break;

          case 'disable':
            authorize($this->menu, '_update');
            $this->m_role->update($key, array('is_active' => 0));
            $flash = 'Data berhasil dinonaktifkan.';
            $t = 3;
            break;
        }
      }
    }
    create_log($t, $this->menu['menu_name']);
    $this->session->set_flashdata('flash_success', $flash);
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function authorization($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    if ($id == null) {
      create_log(2, $this->menu['menu_name']);
      $data['main'] = null;
    } else {
      create_log(3, $this->menu['menu_name']);
      $data['main'] = $this->m_role->by_field('role_id', $id);
    }
    $data['id'] = $id;
    $data['menu'] = $this->menu;
    $data['menu_list'] = $this->m_role->menu_list($id);
    $this->render('authorization', $data);
  }

  public function authorization_save($id)
  {
    $data = html_escape($this->input->post());
    $this->m_role->authorization_save($data, $id);
    $this->session->set_flashdata('flash_success', "Data berhasil disimpan");
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function ajax($type = null, $id = null)
  {
    if ($type == 'check_id') {
      $data = $this->input->post();
      $cek = $this->m_role->by_field('role_name', $data['role_name']);
      $old = $this->m_role->by_field('role_id', $id);
      if ($id == null) {
        echo ($cek != null) ? 'false' : 'true';
      } else {
        echo ($cek != null) ? (($cek['role_name'] == $old['role_name']) ? 'true' : 'false') : 'true';
      }
    }
  }
}
