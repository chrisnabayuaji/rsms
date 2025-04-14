<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends MX_Controller
{

  function __construct()
  {
    parent::__construct();
    if (@$this->session->userdata('logged') == false) redirect(site_url() . "/auth/login");
    if (@$this->session->userdata('locked') == true) redirect(site_url() . "/auth/locked");
    $this->load->model(array(
      'profile/m_profile',
      'config/m_config',
    ));
  }

  function render($content, $data = NULL)
  {
    // Pagination config
    $config_pagination['full_tag_open'] = '<ul class="pagination pagination-sm m-0 float-right">';
    $config_pagination['full_tag_close'] = '</ul>';
    $config_pagination['attributes'] = ['class' => 'page-link'];
    $config_pagination["first_link"] = "&Lang;";
    $config_pagination["last_link"] = "&Rang;";
    $config_pagination['first_tag_open'] = '<li class="page-item">';
    $config_pagination['first_tag_close'] = '</li>';
    $config_pagination['prev_link'] = '&lang;';
    $config_pagination['prev_tag_open'] = '<li class="page-item">';
    $config_pagination['prev_tag_close'] = '</li>';
    $config_pagination['next_link'] = '&rang;';
    $config_pagination['next_tag_open'] = '<li class="page-item">';
    $config_pagination['next_tag_close'] = '</li>';
    $config_pagination['last_tag_open'] = '<li class="page-item">';
    $config_pagination['last_tag_close'] = '</li>';
    $config_pagination['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
    $config_pagination['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
    $config_pagination['num_tag_open'] = '<li class="page-item">';
    $config_pagination['num_tag_close'] = '</li>';
    $config_pagination['num_links'] = 3;
    $this->pagination->initialize($config_pagination);

    $data['sidenav'] = $this->m_config->get_role_menu();
    $data['profile'] = $this->m_profile->get_first();

    // Templating
    $data['header'] = $this->load->view('template/header', $data, TRUE);
    $data['navbar'] = $this->load->view('template/navbar', $data, TRUE);
    $data['sidebar'] = $this->load->view('template/sidebar', $data, TRUE);
    $data['content'] = $this->load->view($content, $data, TRUE);
    $data['footer'] = $this->load->view('template/footer', $data, TRUE);

    $this->load->view('template/index', $data);
  }
}

class MY_Error extends MX_Controller
{

  function render($content, $data = NULL)
  {
    $data['header'] = $this->load->view('_template/error/header', $data, TRUE);
    $data['footer'] = $this->load->view('_template/error/footer', $data, TRUE);
    $data['content'] = $this->load->view($content, $data, TRUE);

    $this->load->view('_template/error/index', $data);
  }
}
