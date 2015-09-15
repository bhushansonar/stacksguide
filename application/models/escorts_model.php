<?php

class escorts_model extends CI_Model {

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
    public function get_escorts_by_id($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('build_advertisement_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Fetch category data from the database
     * possibility to mix search, filter and order
     * @param string $search_string
     * @param strong $order
     * @param string $order_type
     * @param int $limit_start
     * @param int $limit_end
     * @return array
     */
    public function get_escorts($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->join('country', 'country.country_id = build_advertisement.country_id', 'left');
        $this->db->join('state', 'state.state_id = build_advertisement.state_id', 'left');
        $this->db->join('city', 'city.city_id = build_advertisement.city_id', 'left');
        //echo "where->".$wherestatus;
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }

        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        $this->db->group_by('build_advertisement.build_advertisement_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('build_advertisement.build_advertisement_id', $order_type);
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
    function count_escorts($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->join('country', 'country.country_id = build_advertisement.country_id', 'left');
        $this->db->join('state', 'state.state_id = build_advertisement.state_id', 'left');
        $this->db->join('city', 'city.city_id = build_advertisement.city_id', 'left');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like($order, $search_string);
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
    function getCategoryPathById($iCatId) {

        $sql_query = "select path FROM escorts where escort_id='$iCatId'";
        $query = $this->db->query($sql_query);
        $db_cat_rs = $query->result_array();
        return $db_cat_rs[0]['path'];
    }

    function addEscorts($data) {
        $insert = $this->db->insert('build_advertisement', $data);
        return $insert;
    }

    /**
     * Update category
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_escorts($data, $id) {
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

    /**
     * Delete categoryr
     * @param int $id - category id
     * @return boolean
     */
    function delete_escorts($id) {
        $this->db->where('build_advertisement_id', $id);
        $this->db->delete('build_advertisement');
    }

    public function get_escorts_by_city($city_name, $category) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $where = "city=(SELECT city_id FROM city WHERE city_name='{$city_name}') AND category={$category}";
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>