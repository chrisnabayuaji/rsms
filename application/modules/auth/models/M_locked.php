
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_locked extends CI_Model
{

  public function action($data)
  {
    $user_id = $this->session->userdata('user_id');
    $user = $this->db->where('user_id', $user_id)->get('user')->row_array();
    if ($user == null) {
      return -1;
    } else {
      if (password_verify($data['password'], $user['hash'])) {
        $sess = array(
          'user_id' => $user['user_id'],
          'role_id' => $user['role_id'],
          'user_name' => $user['user_name'],
          'user_fullname' => $user['user_fullname'],
          'photo' => $user['photo'],
          'logged' => true,
          'locked' => false
        );
        $this->session->set_userdata($sess);

        if (@$data['remember']) {
          $cookie = array(
            'name' => 'user_id',
            'value' => $sess['user_id'],
            'expire' => '3600'
          );
          $this->input->set_cookie($cookie);
        }
        return 1;
      } else {
        return 0;
      }
    }
  }
}
