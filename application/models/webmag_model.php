<?php

class webmag_model extends CI_Model {

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
    public function get_webmag_by_id($id) {
        $this->db->select('*');
        $this->db->from('webmag');
        $this->db->where('webmag_id', $id);
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
    public function get_webmag($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('webmag');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like('webmag', $search_string);
        }
        $this->db->group_by('webmag_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('webmag_id', $order_type);
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
    function count_webmag($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('webmag');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like('webmag', $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('webmag_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean 
     */
    function store_webmag($data) {
        $insert = $this->db->insert('webmag', $data);
        return $insert;
    }

    /**
     * Update external_link
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_webmag($id, $data) {
        //echo "<pre>";print_r($data);exit;
        $this->db->where('webmag_id', $id);
        $this->db->update('webmag', $data);
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
    function delete_webmag($id) {
        $this->db->where('webmag_id', $id);
        $this->db->delete('webmag');
    }
	
    public function get_webmag_front_end() {
        $this->db->select('*');
        $this->db->from('webmag');
        $query = $this->db->get();
        return $query->result_array();
    }
	
	public function get_webmag_front_end_by_id($webmag_id) {
        $this->db->select('*');
        $this->db->from('webmag');
		$this->db->where('webmag_id', $webmag_id);
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>