<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pelayanan extends CI_Model
{

  public function where($cookie)
  {
    $where = "WHERE a.is_deleted = 0 ";
    if (@$cookie['search']['term'] != '') {
      $where .= "AND a.pasien_name LIKE '%" . $this->db->escape_like_str($cookie['search']['term']) . "%' ";
    }
    if (@$cookie['search']['bangsal_id'] != '') {
      $where .= "AND a.bangsal_id = '" . $this->db->escape_like_str($cookie['search']['bangsal_id']) . "' ";
    }
    return $where;
  }

  public function list_data($cookie)
  {
    $where = $this->where($cookie);
    $sql =
      "SELECT 
        a.*,
        b.lokasi_name AS bangsal_name,
        c.user_fullname AS dpjp_name,
        d.user_fullname AS residen_name
      FROM pelayanan a 
      JOIN lokasi b ON a.bangsal_id = b.lokasi_id
      JOIN user c ON a.dpjp_id = c.user_id
      JOIN user d ON a.residen_id = d.user_id
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

    $sql = "SELECT * FROM pelayanan a $where ORDER BY created_at";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function all_rows($cookie)
  {
    $where = $this->where($cookie);

    $sql = "SELECT COUNT(1) as total FROM pelayanan a $where";
    $query = $this->db->query($sql);
    return $query->row_array()['total'];
  }

  function by_field($field, $val)
  {
    $sql = "SELECT * FROM pelayanan WHERE $field = ?";
    $query = $this->db->query($sql, array($val));
    $row = $query->row_array();
    return $row;
  }

  public function save($data, $id = null)
  {
    if ($id == null) {
      $data['created_at'] = date('Y-m-d H:i:s');
      $data['created_by'] = $this->session->userdata('user_fullname');
      $this->db->insert('pelayanan', $data);
    } else {
      $data['updated_at'] = date('Y-m-d H:i:s');
      $data['updated_by'] = $this->session->userdata('user_fullname');
      $this->db->where('pelayanan_id', $id)->update('pelayanan', $data);
    }
  }

  public function update($id, $data)
  {
    $data['updated_at'] = date('Y-m-d H:i:s');
    $data['updated_by'] = $this->session->userdata('fullname');
    $this->db->where('pelayanan_id', $id)->update('pelayanan', $data);
  }

  public function delete($id, $permanent = true)
  {
    if ($permanent) {
      $this->db->where('pelayanan_id', $id)->delete('pelayanan');
    } else {
      $data['is_deleted'] = 1;
      $data['updated_at'] = date('Y-m-d H:i:s');
      $data['updated_by'] = $this->session->userdata('user_fullname');
      $this->db->where('pelayanan_id', $id)->update('pelayanan', $data);
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
    LEFT JOIN pelayanan_menu b ON b.menu_id = a.menu_id AND b.pelayanan_id = '$id'
    ORDER BY a.menu_id"
    )->result_array();
  }

  public function authorization_save($data, $id)
  {
    $this->db->where('pelayanan_id', $id)->delete('pelayanan_menu');
    //read
    foreach (@$data['_read'] as $k => $v) {
      $this->db->insert('pelayanan_menu', array(
        'menu_id' => $v,
        'pelayanan_id' => $id,
        '_read' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //create
    foreach (@$data['_create'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'pelayanan_id' => $id))->update('pelayanan_menu', array(
        '_create' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //update
    foreach (@$data['_update'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'pelayanan_id' => $id))->update('pelayanan_menu', array(
        '_update' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //delete
    foreach (@$data['_delete'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'pelayanan_id' => $id))->update('pelayanan_menu', array(
        '_delete' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }

    //report
    foreach (@$data['_report'] as $k => $v) {
      $this->db->where(array('menu_id' => $v, 'pelayanan_id' => $id))->update('pelayanan_menu', array(
        '_report' => 1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => $this->session->userdata('user_fullname'),
      ));
    }
  }
}
