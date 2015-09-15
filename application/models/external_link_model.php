<?php

class external_link_model extends CI_Model {

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
    public function get_external_link_by_id($id) {
        $this->db->select('*');
        $this->db->from('external_link');
        $this->db->where('external_link_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch external_link data from the database
     * possibility to mix search, filter and order
     * @param string $search_string 
     * @param strong $order
     * @param string $order_type 
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_external_link($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('external_link');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like('external_link', $search_string);
        }
        $this->db->group_by('external_link_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('external_link_id', $order_type);
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
    function count_external_link($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('external_link');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like('external_link', $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('external_link_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean 
     */
    function store_external_link($data) {
        $insert = $this->db->insert('external_link', $data);
        return $insert;
    }

    /**
     * Update external_link
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_external_link($id, $data) {
        //echo "<pre>";print_r($data);exit;
        $this->db->where('external_link_id', $id);
        $this->db->update('external_link', $data);
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
     * Delete advertisementr
     * @param int $id - external_link id
     * @return boolean
     */
    function delete_external_link($id) {
        $this->db->where('external_link_id', $id);
        $this->db->delete('external_link');
    }
    public function get_external_link_front_end() {
        $this->db->select('*');
        $this->db->from('external_link');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>