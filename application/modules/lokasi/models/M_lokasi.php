<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_lokasi extends CI_Model
{

  public function where($cookie)
  {
    $where = "WHERE a.is_deleted = 0 ";
    if (@$cookie['search']['term'] != '') {
      $where .= "AND a.lokasi_name LIKE '%" . $this->db->escape_like_str($cookie['search']['term']) . "%' ";
    }
    return $where;
  }

  public function list_data($cookie)
  {
    $where = $this->where($cookie);
    $sql = "SELECT * FROM lokasi a 
      $where
      ORDER BY "
      . $cookie['order']['field'] . " " . $cookie['order']['type'] .
      " LIMIT " . $cookie['cur_page'] . "," . $cookie['per_page'];
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function all_data()
  {
    $where = "WHERE a.is_deleted = 0 ";

    $sql = "SELECT * FROM lokasi a $where ORDER BY lokasi_name";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function all_rows($cookie)
  {
    $where = $this->where($cookie);

    $sql = "SELECT COUNT(1) as total FROM lokasi a $where";
    $query = $this->db->query($sql);
    return $query->row_array()['total'];
  }

  function by_field($field, $val)
  {
    $sql = "SELECT * FROM lokasi WHERE $field = ?";
    $query = $this->db->query($sql, array($val));
    $row = $query->row_array();
    return $row;
  }

  public function save($data, $id = null)
  {
    if ($id == null) {
      $data['created_at'] = date('Y-m-d H:i:s');
      $data['created_by'] = $this->session->userdata('user_fullname');
      $this->db->insert('lokasi', $data);
    } else {
      $data['updated_at'] = date('Y-m-d H:i:s');
      $data['updated_by'] = $this->session->userdata('user_fullname');
      $this->db->where('lokasi_id', $id)->update('lokasi', $data);
    }
  }

  public function update($id, $data)
  {
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $this->session->userdata('fullname');
    $this->db->where('lokasi_id', $id)->update('lokasi', $data);
  }

  public function delete($id, $permanent = true)
  {
    if ($permanent) {
      $this->db->where('lokasi_id', $id)->delete('lokasi');
    } else {
      $data['is_deleted'] = 1;
      $data['updated_at'] = date('Y-m-d H:i:s');
      $data['updated_by'] = $this->session->userdata('user_fullname');
      $this->db->where('lokasi_id', $id)->update('lokasi', $data);
    }
  }

  public function menu_list($id)
  {
    return $this->db->query(
      "SELECT 
      a.menu_id, a.parent_id, a.menu_name, 
      a.is_read, a.is_create, a.is_update, a.is_delete, a.is_report,
      b._read, b._create, b._update, b._delete, b._report
    FROM menu a
    LEFT JOIN lokasi_menu b ON b.menu_id = a.menu_id AND b.lokasi_id = '$id'
    ORDER BY a.menu_id"
    )->result_array();
  }

  public function authorization_save($data, $id)
  {
    $this->db->where('lokasi_id', $id)->delete('lokasi_menu');
    //read
    foreach (@$data['_read'] as $k => $v) {
      $this->db->insert('lokasi_menu', array(
        'menu_id' => $v,
        'lokasi_id' => $id,
        '_read' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //create
    foreach (@$data['_create'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'lokasi_id' => $id))->update('lokasi_menu', array(
        '_create' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //update
    foreach (@$data['_update'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'lokasi_id' => $id))->update('lokasi_menu', array(
        '_update' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //delete
    foreach (@$data['_delete'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'lokasi_id' => $id))->update('lokasi_menu', array(
        '_delete' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //report
    foreach (@$data['_report'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'lokasi_id' => $id))->update('lokasi_menu', array(
        '_report' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }
  }
}
