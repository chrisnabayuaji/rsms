<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends MY_Controller
{

  var $menu_id, $menu, $cookie;

  function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'config/m_config',
      'user/m_user',
      'lokasi/m_lokasi',
      'm_pelayanan'
    ));

    $this->menu_id = '03';
    $this->menu = $this->m_config->get_menu($this->menu_id);
    if ($this->menu == null) redirect(site_url() . '/front/error_403');

    //cookie 
    $this->cookie = get_cookie_menu($this->menu_id);
    if ($this->cookie['search'] == null) $this->cookie['search'] = array('term' => '');
    if ($this->cookie['order'] == null) $this->cookie['order'] = array('field' => 'masuk_rs_tgl', 'type' => 'desc');
    if ($this->cookie['per_page'] == null) $this->cookie['per_page'] = 10;
    if ($this->cookie['cur_page'] == null) 0;
  }

  public function index()
  {
    authorize($this->menu, '_read');
    //cookie
    $this->cookie['cur_page'] = $this->uri->segment(3, 0);
    $this->cookie['total_rows'] = $this->m_pelayanan->all_rows($this->cookie);
    set_cookie_menu($this->menu_id, $this->cookie);
    //main data
    $data['menu'] = $this->menu;
    $data['cookie'] = $this->cookie;
    $data['main'] = $this->m_pelayanan->list_data($this->cookie);
    $data['pagination_info'] = pagination_info(count($data['main']), $this->cookie);
    //set pagination
    set_pagination($this->menu, $this->cookie);
    //additonal 
    $data['all_lokasi'] = $this->m_lokasi->all_data();
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
      $data['main'] = $this->m_pelayanan->by_field('pelayanan_id', $id);
    }
    $data['id'] = $id;
    $data['menu'] = $this->menu;
    $data['all_dpjp'] = $this->m_user->all_data_by_role_name('DPJP');
    $data['all_residen'] = $this->m_user->all_data_by_role_name('RESIDEN');
    $data['all_lokasi'] = $this->m_lokasi->all_data();
    $this->render('form', $data);
  }

  public function detail($id)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    if ($id == null) {
      create_log(2, $this->menu['menu_name']);
      $data['main'] = null;
    }
    $data['main'] = $this->m_pelayanan->by_field('pelayanan_id', $id);
    $data['id'] = $id;
    $data['menu'] = $this->menu;
    $data['all_dpjp'] = $this->m_user->all_data_by_role_name('DPJP');
    $data['all_residen'] = $this->m_user->all_data_by_role_name('RESIDEN');
    $data['all_lokasi'] = $this->m_lokasi->all_data();
    $this->render('detail', $data);
  }

  public function save($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    $data = html_escape($data = $this->input->post(null, true));
    if (!isset($data['is_active'])) {
      $data['is_active'] = 0;
    }

    $data['masuk_rs_tgl'] = reverse_date($data['masuk_rs_tgl'], '-', 'full_date');
    $data['pasien_name'] = strtoupper($data['pasien_name']);

    if ($id == null) {
      $data['pelayanan_id'] = $this->uuid->v4();
      $this->m_pelayanan->save($data, $id);
      create_log(2, $this->menu['menu_name']);
      $this->session->set_flashdata('flash_success', 'Data berhasil ditambahkan.');
    } else {
      unset($data['old']);
      $this->m_pelayanan->save($data, $id);
      create_log(3, $this->menu['menu_name']);
      $this->session->set_flashdata('flash_success', 'Data berhasil diubah.');
    }
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function delete($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    $this->m_pelayanan->delete($id, false);
    create_log(4, $this->menu['menu_name']);
    $this->session->set_flashdata('flash_success', 'Data berhasil dihapus.');
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  public function status($type = null, $id = null)
  {
    authorize($this->menu, '_update');
    if ($type == 'enable') {
      $this->m_pelayanan->update($id, array('is_active' => 1));
    } else {
      $this->m_pelayanan->update($id, array('is_active' => 0));
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
            $this->m_pelayanan->delete($key);
            $flash = 'Data berhasil dihapus.';
            $t = 4;
            break;

          case 'enable':
            authorize($this->menu, '_update');
            $this->m_pelayanan->update($key, array('is_active' => 1));
            $flash = 'Data berhasil diaktifkan.';
            $t = 3;
            break;

          case 'disable':
            authorize($this->menu, '_update');
            $this->m_pelayanan->update($key, array('is_active' => 0));
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

  public function ajax($type = null, $id = null)
  {
    if ($type == 'check_id') {
      $data = $this->input->post();
      $cek = $this->m_pelayanan->by_field('pelayanan_id', $data['pelayanan_id']);
      $old = $this->m_pelayanan->by_field('pelayanan_id', $id);
      if ($id == null) {
        echo ($cek != null) ? 'false' : 'true';
      } else {
        echo ($cek != null) ? (($cek['pelayanan_id'] == $old['pelayanan_id']) ? 'true' : 'false') : 'true';
      }
    }
  }
}
