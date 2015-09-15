<?php

class build_ads_model extends CI_Model {

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
    public function get_build_ads_by_id($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('build_advertisement_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch build_advertisement data from the database
     * possibility to mix search, filter and order
     * @param string $search_string
     * @param strong $order
     * @param string $order_type
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_build_ads($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('build_advertisement');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like('advertisement', $search_string);
        }
        $this->db->group_by('build_advertisement_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('build_advertisement_id', $order_type);
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
    function count_build_ads($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like('advertisement', $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('build_advertisement_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function store_build_ads($data) {
        $insert = $this->db->insert('build_advertisement', $data);
        return $insert;
    }

    /**
     * Update build_advertisement
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_build_ads($id, $data) {
        //echo "<pre>";print_r($data);exit;
        $this->db->where('build_advertisement_id', $id);
        $this->db->update('build_advertisement', $data);
        $report = array();
        $report['error'] = $this->db->_error_number();
        $report['message'] = $this->db->_error_message();
        if ($report !== 0) {
            return true;
        } else {
            return false;
        }
    }

    function update_profile_layout($data, $id) {

        $this->db->where('user_id', $id);
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

    function get_profile_layout_value_by_id($user_id) {
        $this->db->select('*');
        $this->db->from('adv_user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Delete build_advertisementr
     * @param int $id - build_advertisement id
     * @return boolean
     */
    function delete_build_ads($id) {
        $this->db->where('build_advertisement_id', $id);
        $this->db->delete('build_advertisement');
    }

}

?>