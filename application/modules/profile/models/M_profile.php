<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{

  public function get_first()
  {
    return $this->db->get('profile')->row_array();
  }

  public function update($data)
  {
    $this->db->update('profile', $data);
  }

  public function save($data)
  {
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $this->session->userdata('user_fullname');
    $this->db->update('profile', $data);
  }
}
