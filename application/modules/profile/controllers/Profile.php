<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends MY_Controller
{

  var $menu_id, $menu, $cookie;

  function __construct()
  {
    parent::__construct();

    $this->load->model(array(
      'config/m_config',
      'm_profile'
    ));

    $this->menu_id = '99.04';
    $this->menu = $this->m_config->get_menu($this->menu_id);
    if ($this->menu == null) redirect(site_url() . '/front/error_403');

    //cookie 
    $this->cookie = get_cookie_menu($this->menu_id);
    if ($this->cookie['search'] == null) $this->cookie['search'] = array('term' => '');
    if ($this->cookie['order'] == null) $this->cookie['order'] = array('field' => 'app_name', 'type' => 'asc');
    if ($this->cookie['per_page'] == null) $this->cookie['per_page'] = 10;
    if ($this->cookie['cur_page'] == null) 0;
  }

  public function form($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    $data['main'] = $this->m_profile->get_first();
    $data['id'] = $id;
    $data['menu'] = $this->menu;
    $this->render('form', $data);
  }

  public function save($id = null)
  {
    ($id == null) ? authorize($this->menu, '_create') : authorize($this->menu, '_update');
    $data = html_escape($data = $this->input->post(null, true));
    if (!empty($_FILES["logo"]["name"])) {
      $data['logo'] = $this->_uploadImage();
    } else {
      $data['logo'] = $data['old_logo'];
    }
    unset($data['old_logo']);
    $this->m_profile->save($data, $id);
    create_log(3, $this->menu['menu_name']);
    $this->session->set_flashdata('flash_success', 'Data berhasil diubah.');
    redirect(site_url() . '/' . $this->menu['controller'] . '/' . $this->menu['url'] . '/' . $this->cookie['cur_page']);
  }

  private function _uploadImage()
  {
    $config['upload_path']          = FCPATH . '/images/logos/';
    $config['allowed_types']        = 'gif|jpg|png|jpeg|bmp|svg';
    $config['encrypt_name']         = true;
    $config['overwrite']            = true;
    $config['max_size']             = 2048;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('logo')) {
      return $this->upload->data("file_name");
    } else {
      var_dump($this->upload->display_errors());
      die();
    }

    return "logo.png";
  }
}
