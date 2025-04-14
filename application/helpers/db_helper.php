<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class DB
{

    // QUERY
    public static function all($table, $params = null, $order = null)
    {
        $CI = &get_instance();
        if ($order != null) $CI->db->order_by($order[0], $order[1]);
        if (is_array($params)) $CI->db->where($params);
        $CI->db->where(['active_st' => '1']);
        return $CI->db->get($table)->result_array();
    }

    public static function all_like($table, $params = null, $params_where = null, $order = null, $side = 'both')
    {
        $CI = &get_instance();
        if ($order != null) $CI->db->order_by($order[0], $order[1]);

        $par = [];
        if (is_array($params)) {
            foreach ($params as $k => $v) {
                $par['LOWER(' . $k . ')'] = strtolower($v);
            }
        }
        $CI->db->or_like($par, '', $side);
        if (is_array($params_where)) $CI->db->where($params_where);
        $CI->db->where(['active_st' => '1']);
        return $CI->db->get($table)->result_array();
    }

    public static function all_in($table, $params = null, $params_where = null, $order = null)
    {
        $CI = &get_instance();
        if ($order != null) $CI->db->order_by($order[0], $order[1]);

        if (is_array($params)) {
            foreach ($params as $k => $v) {
                $CI->db->where_in('LOWER(' . $k . ')', array_map('strtolower', $v));
            }
        }

        if (is_array($params_where)) $CI->db->where($params_where);
        $CI->db->where(['active_st' => '1']);
        return $CI->db->get($table)->result_array();
    }

    // QUERY
    public static function get($table, $params = array())
    {
        $CI = &get_instance();
        $CI->db->where($params);
        return $CI->db->get($table)->row_array();
    }

    // QUERY
    public static function query($query, $where = null, $order = null, $return = 'result')
    {
        $CI = &get_instance();
        $fwhere = '';
        if ($where != null) {
            $fwhere = 'WHERE ';
            $setWhere = array();
            foreach ($where as $key => $value) {
                $setWhere[] = $key . "='" . $value . "'";
            }
            $fwhere .= implode(' AND ', $setWhere);
        }
        $forder = '';
        if ($order != null) {
            $forder = 'ORDER BY ';
            $setOrder = array();
            foreach ($order as $key => $value) {
                $setOrder[] = $key . " " . $value . "";
            }
            $forder .= implode(', ', $setOrder);
        }
        if ($return == 'result') {
            return $CI->db->query($query . " " . $fwhere . " " . $forder)->result_array();
        } elseif ($return == 'row') {
            return $CI->db->query($query . " " . $fwhere . " " . $forder)->row_array();
        }
    }

    // QUERY
    public static function get_return($table, $params = array(), $return = false)
    {
        $CI = &get_instance();
        $CI->db->where($params);
        $query = $CI->db->get($table);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return $return;
        }
    }

    // QUERY
    public static function last_id()
    {
        $CI = &get_instance();
        return $CI->db->insert_id();
    }

    // QUERY
    public static function valid_id($table, $field, $value)
    {
        $return = DB::get_return($table, [$field => $value]);
        if ($return != false) {
            return true;
        } else {
            return false;
        }
    }

    // QUERY
    public static function raw($init, $sql, $params = false)
    {
        $CI = &get_instance();
        switch ($init) {
            case 'result_array':
                return $CI->db->query($sql, $params)->result_array();
                break;
            case 'row_array':
                return $CI->db->query($sql, $params)->row_array();
                break;
            case 'num_rows':
                return $CI->db->query($sql, $params)->num_rows();
                break;
            default:
                return $CI->db->query($sql, $params);
                break;
        }
    }

    public static function raw_json($init, $sql, $params = false)
    {
        $CI = &get_instance();
        switch ($init) {
            case 'result_array':
                _json($CI->db->query($sql, $params)->result_array());
                break;
            case 'row_array':
                _json($CI->db->query($sql, $params)->row_array());
                break;
            case 'num_rows':
                _json($CI->db->query($sql, $params)->num_rows());
                break;
            default:
                return $CI->db->query($sql, $params);
                break;
        }
    }

    // INSERT
    public static function insert($table, $data)
    {
        $CI = &get_instance();
        // @validate token
        _validate_token();
        // @main process
        if (@$data['created_at'] == '') {
            $data['created_at'] = _now();
        }
        // $data['created_by'] = _ses_get('pegawai_nm');
        $data['created_by'] = $CI->session->userdata('pegawai_nm');
        return array(
            'data' => $CI->db->insert($table, $data),
        );
    }

    // UPDATE
    public static function update($table, $data, $where)
    {
        $CI = &get_instance();
        // @validate token
        _validate_token();
        // @trash
        DB::trash('update', $table, $data, $where);
        // @main process
        $data['updated_at'] = _now();
        // $data['updated_by'] = _ses_get('pegawai_nm');
        $data['updated_by'] = $CI->session->userdata('pegawai_nm');
        $CI->db->where($where);
        return $CI->db->update($table, $data);
    }

    // SAVE
    public static function save($table, $data, $where = null)
    {
        $CI = &get_instance();
        // @validate token
        _validate_token();
        // @ternary process
        if (is_array($where)) {
            // @trash
            DB::trash('update', $table, $data, $where);
            // @main process
            $data['updated_at'] = _now();
            $data['updated_by'] = _ses_get('user_realname');
            $result = DB::update($table, $data, $where);
        } else {
            $data['created_at'] = _now();
            $data['created_by'] = _ses_get('user_realname');
            $result = DB::insert($table, $data);
        }
        return $result;
    }

    // DELETE
    public static function delete($table, $where = null)
    {
        // @trash
        DB::trash('delete', $table, null, $where);
        // @main process
        $CI = &get_instance();
        if (is_array($where)) {
            foreach ($where as $k => $v) {
                $CI->db->where($k, strval($v));
            }
        }
        return $CI->db->delete($table);
    }

    // TRASH
    public static function trash($action = 'delete', $table, $data, $where = null)
    {
        $CI = &get_instance();
    }

    // GET ID
    public static function get_id($modul = null, $type = 1, $length = 12)
    {
        $table = 'tmp_id';
        $CI = &get_instance();
        $pk = $CI->db->query("SHOW KEYS FROM $modul WHERE Key_name = 'PRIMARY'")->row_array();
        $pk_id = @$pk['Column_name'];
        if ($type == 1) {
            $id = DB::get($table, ['modul' => $modul, 'tgl_id' => date('Y-m-d')]);
            if (@$id['modul'] == '') {
                $result = date('ymd') . '000001';
            } else {
                $result = $id['no_id'] + 1;
            }

            $last = DB::get($modul, [$pk_id => strval($result)]);
            while ($last != null) {
                $result = $last[$pk_id] + 1;
                $last = DB::get($modul, [$pk_id => strval($result)]);
            }
        } else if ($type == 2) {
            $id = DB::get($table, ['modul' => $modul]);
            if (@$id['modul'] == '') {
                $result = str_pad('1', $length, '0', STR_PAD_LEFT);
            } else {
                $result = str_pad(intval($id['no_id']) + 1, $length, '0', STR_PAD_LEFT);
            }

            $last = DB::get($modul, [$pk_id => strval($result)]);
            while ($last != null) {
                $result = str_pad(intval($last[$pk_id]) + 1, $length, '0', STR_PAD_LEFT);
                $last = DB::get($modul, [$pk_id => strval($result)]);
            }
        } else {
            $id = DB::get($table, ['modul' => $modul]);
            if (@$id['modul'] == '') {
                $result = date('ymd') . '000001';
            } else {
                $last = substr($id['no_id'], 8, 99);
                $result = date('ymd') . str_pad(intval($last) + 1, 4, '0', STR_PAD_LEFT);
            }
        }
        // return strval($result); // @disabled
        // 
        // @auto update id
        $result_id = strval($result);
        DB::update_id($modul, $result_id);
        // 
        return $result_id;
    }

    // UPDATE ID
    public static function update_id($modul = null, $no_id = null)
    {
        $table = 'tmp_id';
        $check = DB::get($table, ['modul' => $modul, 'tgl_id' => date('Y-m-d')]);
        if (@$check['no_id'] == '') {
            $result = DB::insert($table, ['modul' => $modul, 'tgl_id' => date('Y-m-d'), 'no_id' => $no_id]);
        } else {
            $result = DB::update($table, ['tgl_id' => date('Y-m-d'), 'no_id' => $no_id], ['modul' => $modul, 'tgl_id' => date('Y-m-d')]);
        }
        return $result;
    }

    // DATATABLES
    public static function datatables_query($query, $keyword, $where, $iswhere = null)
    {
        $CI = &get_instance();
        // Params
        $_search_value = @$_POST['search']['value'];
        $_length = @$_POST['length'];
        $_start = @$_POST['start'];
        $_order_field = @$_POST['order'][0]['column'];
        $_order_ascdesc = @$_POST['order'][0]['dir'];
        // 
        // Ambil data yang di ketik user pada textbox pencarian
        $search = htmlspecialchars($_search_value);
        $search = strtolower($search);
        // 
        // Ambil data limit per page
        $limit = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_length}");
        // 
        // Ambil data start
        $start = preg_replace("/[^a-zA-Z0-9.]/", '', "{$_start}");
        //
        // Lower Keywoard
        if (is_array($keyword)) {
            foreach ($keyword as $k => $v) {
                $keyword[$k] = "LOWER(" . $v . ")";
            }
        }

        $strWhere = " WHERE ";

        if ($iswhere != null) {
            if (strtolower(substr(@$iswhere, 0, 3)) == "and" || @$iswhere == "") {
                $strWhere .= '1 = 1 ';
            } else {
                $strWhere .= ' ';
            }

            $strWhere .= $iswhere;
        } else {
            $strWhere .= '1 = 1 ';
        }

        if ($where != null) {
            $setWhere = array();
            foreach ($where as $key => $value) {
                $setWhere[] = $key . "='" . $value . "'";
            }
            $fwhere = implode(' AND ', $setWhere);
            $strWhere .= " AND " . $fwhere;
        }

        // Untuk mengambil nama field yg menjadi acuan untuk sorting
        $strOrder = " ORDER BY " . @$_POST['columns'][$_order_field]['data'] . " " . $_order_ascdesc;

        $queryData = $query . $strWhere;
        $queryAllRecords = str_replace_between($queryData, 'SELECT', 'FROM', ' COUNT(1) AS count ');

        // Searching by keyword
        if ($keyword != null && @count($keyword) > 0) {
            $strWhereKeyword = $strWhere;
            $keyword = implode(" LIKE '%" . $search . "%' OR ", $keyword) . " LIKE '%" . $search . "%'";
            $strWhereKeyword .= " AND (" . $keyword . ") ";

            $queryData = $query . $strWhereKeyword . $strOrder;
            $queryFiltered = $query . $strWhereKeyword;
        } else {
            $queryData = $query . $strWhere . $strOrder;
            $queryFiltered = $query . $strWhere;
        }

        if ($CI->db->dbdriver == 'sqlsrv') {
            $queryData .= " OFFSET " . $start . " ROW FETCH NEXT " . $limit . " ROWS ONLY";
        } else {
            $queryData .= " LIMIT " . $limit . " OFFSET " . $start;
        }

        $data = DB::raw('result_array', $queryData);
        $recordsTotal = DB::raw('row_array', $queryAllRecords)['count'];

        if ($keyword != null && @count($keyword) > 0) {
            $queryRecordsFiltered = str_replace_between($queryFiltered, 'SELECT', 'FROM', ' COUNT(1) AS count ');
            $recordsFiltered = DB::raw('row_array', $queryRecordsFiltered)['count'];
        } else {
            $recordsFiltered = $recordsTotal;
        }

        $callback = array(
            'draw' => $_POST['draw'], // Ini dari datatablenya    
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        );

        _json($callback);
    }

    public static function where_in_str($field, $string, $separator = '#')
    {
        $res = $field . " IN (";
        $arr = explode($separator, $string);
        foreach ($arr as $k => $v) {
            if ($k + 1 == count($arr)) {
                $res .= "'" . $v . "' ";
            } else {
                $res .= "'" . $v . "', ";
            }
        }
        $res .= ") ";
        return $res;
    }

    public static function like_in_str($field, $string, $separator = '#')
    {
        $res = "( ";
        $arr = explode($separator, $string);
        foreach ($arr as $k => $v) {
            if ($k + 1 == count($arr)) {
                $res .= $field . " LIKE '" . $v . "%' ";
            } else {
                $res .= $field . " LIKE '" . $v . "%' OR ";
            }
        }
        $res .= ") ";
        return $res;
    }
}
