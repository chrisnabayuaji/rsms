<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_config extends CI_Model
{

  public function get_profile()
  {
    return $this->db->query("SELECT * FROM _profile")->row();
  }

  public function get_first_menu($role_id)
  {
    $query = $this->db->query(
      "SELECT * FROM role_menu a
      JOIN menu b ON a.menu_id = b.menu_id
      WHERE a.role_id = '$role_id' 
        AND b.type = 3 AND b.is_active = 1
      ORDER BY a.menu_id ASC"
    );

    return $query->row_array();
  }

  public function get_role_menu($parent_id = null)
  {
    $role_id = $this->session->userdata('role_id');

    $sql_where = '';
    $sql_where .= ($parent_id != '') ? "b.parent_id = '$parent_id'" : 'b.parent_id = ""';

    $query = $this->db->query(
      "SELECT * 
      FROM
        role_menu a
      JOIN menu b ON a.menu_id = b.menu_id
      WHERE
        a.role_id = '$role_id' AND 
        $sql_where AND b.is_active = 1
      ORDER BY a.menu_id"
    );
    if ($query->num_rows() > 0) {
      $result = $query->result_array();
      foreach ($result as $key => $val) {
        $result[$key]['child'] = $this->get_role_menu($result[$key]['menu_id']);
      }
      return $result;
    } else {
      return array();
    }
  }

  public function get_menu($menu_id)
  {
    $role_id = $this->session->userdata('role_id');
    $query = $this->db->query(
      "SELECT 
        b.menu_id,b.parent_id,b.menu_name,b.type,b.controller,b.icon,b.url,
        a._read,a._create,a._update,a._delete,a._report
      FROM role_menu a 
      JOIN menu b ON a.menu_id = b.menu_id
      WHERE
        a.role_id = '$role_id' AND 
        b.menu_id = '$menu_id' "
    );

    return $query->row_array();
  }
}
