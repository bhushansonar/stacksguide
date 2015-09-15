<?php

class webcam_model extends CI_Model {

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
    public function get_webcam_by_id($id) {
        $this->db->select('*');
        $this->db->from('webcam');
        $this->db->where('webcam_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch webcam data from the database
     * possibility to mix search, filter and order
     * @param string $search_string
     * @param strong $order
     * @param string $order_type
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_webcam($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('webcam');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like('webcam', $search_string);
        }
        $this->db->group_by('webcam_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('webcam_id', $order_type);
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
    function count_webcam($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('webcam');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like('webcam', $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('webcam_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function store_webcam($data) {
        $insert = $this->db->insert('webcam', $data);
        return $insert;
    }

    /**
     * Update webcam
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_webcam($id, $data) {
        //echo "<pre>";print_r($data);exit;
        $this->db->where('webcam_id', $id);
        $this->db->update('webcam', $data);
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
     * Delete webcamr
     * @param int $id - webcam id
     * @return boolean
     */
    function delete_webcam($id) {
        $this->db->where('webcam_id', $id);
        $this->db->delete('webcam');
    }

    public function get_front_webcam() {
        $this->db->select('*');
        $this->db->from('webcam');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>