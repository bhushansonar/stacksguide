<?php

class membership_price_model extends CI_Model {

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
    public function get_membership_price_by_id($id) {
        $this->db->select('*');
        $this->db->from('membership_price');
        $this->db->where('membership_price_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch membership_price data from the database
     * possibility to mix search, filter and order
     * @param string $search_string
     * @param strong $order
     * @param string $order_type
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_membership_price($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('membership_price');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        $this->db->group_by('membership_price_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('membership_price_id', $order_type);
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
    function count_membership_price($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('membership_price');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('membership_price_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function store_membership_price($data) {

        $insert = $this->db->insert('membership_price', $data);
        return $insert;
    }

    /**
     * Update membership_price
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_membership_price($id, $data) {
        $this->db->where('membership_price_id', $id);
        $this->db->update('membership_price', $data);
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
     * Delete membership_pricer
     * @param int $id - membership_price id
     * @return boolean
     */
    function delete_membership_price($id) {
        $this->db->where('membership_price_id', $id);
        $this->db->delete('membership_price');
    }

    public function get_membership_price_front() {
        $this->db->select('*');
        $this->db->from('membership_price');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>