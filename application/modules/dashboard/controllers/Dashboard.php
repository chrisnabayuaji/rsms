<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

  var $menu_id, $menu;

  function __construct(){
    parent::__construct();
    
    $this->load->model(array(
      'config/m_config'
    ));

    $this->menu_id = '01';
		$this->menu = $this->m_config->get_menu($this->menu_id);
		if ($this->menu == null) redirect(site_url().'/error/error_403');
	}

  public function index()
  {
    $data['menu'] = $this->menu;
    $this->render('index',$data);
  }
	
}