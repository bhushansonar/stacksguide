<?php

class adv_user_model extends CI_Model {

    /**
     * Responsable for auto load the database
     * @return void
     */
    public function __construct() {
        $this->load->database();
    }

    /**
     * Get product by his is
     * @param int $product_id 
     * @return array
     */
    public function get_user_by_id($id) {
        $this->db->select('*');
        $this->db->from('adv_user');
        /* $this->db->select('adv_user.*,site_language.language_longform');
          $this->db->from('adv_user');
          $this->db->join('site_language', 'adv_user.language_interface = site_language.site_language_id','left'); */
        $this->db->where('user_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_user_by_filed($field, $value) {
        $this->db->select('*');
        $this->db->from('adv_user');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_countries($order = null, $order_by = null) {
        $this->db->select('*');
        $this->db->from('countries');
        if ($order) {
            $this->db->order_by($order, $order_by);
        } else {
            $this->db->order_by('id', 'ASC');
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_countries_by_id($id) {
        $this->db->select('*');
        $this->db->from('countries');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch adv_user data from the database
     * possibility to mix search, filter and order
     * @param string $search_string 
     * @param strong $order
     * @param string $order_type 
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_user($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('adv_user');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            if ($order == 'language_interface') {
                $this->load->model('site_language_model');
                $this->db->join('site_language', 'adv_user.language_interface = site_language.site_language_id');
                $order = 'site_language.language_longform';
            }
            $this->db->like($order, $search_string);
        }
        $this->db->group_by('user_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('user_id', $order_type);
        }

        if ($limit_start && $limit_end) {
            $this->db->limit($limit_start, $limit_end);
        }

        if ($limit_start != null) {
            $this->db->limit($limit_start, $limit_end);
        }

        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Count the number of rows
     * @param int $search_string
     * @param int $order
     * @return int
     */
    function count_user($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('adv_user');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('user_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean 
     */
    function store_user($data) {
        $insert = $this->db->insert('adv_user', $data);
        return $insert;
    }

    /**
     * Update adv_user
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_user($id, $data) {
        $this->db->where('user_id', $id);
        $this->db->update('adv_user', $data);
        //echo $this->db->last_query();
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if ($report !== 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_user_by_email($email, $data) {
        $this->db->where('primary_email', $email);
        $this->db->update('adv_user', $data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if ($report !== 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_user_by_field($field, $value, $data) {
        $this->db->where($field, $value);
        $this->db->update('adv_user', $data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if ($report !== 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Delete adv_user
     * @param int $id - adv_user id
     * @return boolean
     */
    function delete_user($id) {
        $this->db->where('user_id', $id);
        $this->db->where('user_id !=', 1);
        $this->db->delete('adv_user');
    }

    //User ROLE queries Start
    public function get_user_role_by_userid($user_id) {
        $this->db->select('*');
        $this->db->from('user_role');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    //User ROLE queries End
}

?>