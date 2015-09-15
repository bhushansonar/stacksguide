<?php

class warning_disclaimer_model extends CI_Model {

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
    public function get_warning_disclaimer_by_id($id) {
        $this->db->select('*');
        $this->db->from('warning_disclaimer');
        $this->db->where('warning_disclaimer_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_warning_disclaimer_by_block_name($block_name) {
        $this->db->select('*');
        $this->db->from('warning_disclaimer');
        $this->db->where('block_name', $block_name);
        $query = $this->db->get();
        //echo $abc=$this->db->last_query();exit;
        return $query->result_array();
    }

    public function get_warning_disclaimer_by_field($field, $value) {
        $this->db->select('*');
        $this->db->from('warning_disclaimer');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch keyword data from the database
     * possibility to mix search, filter and order
     * @param string $search_string
     * @param strong $order
     * @param string $order_type
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_warning_disclaimer($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('warning_disclaimer');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        /* if($wherelangshotcode != null){
          $this->db->where('language_shortcode', $wherelangshotcode);
          } */
        //change for search
        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        $this->db->group_by('warning_disclaimer_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('warning_disclaimer_id', $order_type);
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
    function count_warning_disclaimer($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('warning_disclaimer');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('warning_disclaimer_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function store_warning_disclaimer($data) {
        $insert = $this->db->insert('warning_disclaimer', $data);
        return $insert;
    }

    /**
     * Update keyword
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_warning_disclaimer($id, $data) {
        $this->db->where('warning_disclaimer_id', $id);
        $this->db->update('warning_disclaimer', $data);
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
     * Delete keywordr
     * @param int $id - keyword id
     * @return boolean
     */
    function delete_warning_disclaimer($id) {
        $this->db->where('warning_disclaimer_id', $id);
        $this->db->delete('warning_disclaimer');
    }

    public function get_warning_disclaimer_front() {
        $this->db->select('*');
        $this->db->from('warning_disclaimer');
        $this->db->where('status', "Active");
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>