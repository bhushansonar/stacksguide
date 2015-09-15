<?php

class stackguide_ads_model extends CI_Model {

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
    public function get_advertisement_by_id($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('user_id', $id);
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
    public function get_advertisement($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('build_advertisement');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like('build_advertisement', $search_string);
        }
        $this->db->group_by('advertisement_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('advertisement_id', $order_type);
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
    function count_advertisement($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like('build_advertisement', $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('advertisement_id', 'Asc');
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    /**
     * Store the new item into the database
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function store_advertisement_ads($data) {
        $this->db->insert('build_advertisement', $data);
        return $this->db->insert_id();
    }

    function store_data_to_cart($data) {
        $this->db->insert('temp_seesion_data', $data);
        return $this->db->insert_id();
    }

    function update_data_to_cart($id, $data) {
        $this->db->where('build_advertisement_id', $id);
        $this->db->update('temp_seesion_data', $data);
    }

    public function get_data_to_cart_by_id($id, $user_id) {
        $this->db->select('*');
        $this->db->from('temp_seesion_data');
        $this->db->where('user_id', $user_id);
        $this->db->where('build_advertisement_id', $id);
        $query = $this->db->get();
//        $this->db->last_query();
//        exit;
        return $query->result_array();
    }

    /**
     * Update build_advertisement
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_advertisement($id, $data) {
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

    public function get_advertisement_details_by_id($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('build_advertisement_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Delete advertisementr
     * @param int $id - build_advertisement id
     * @return boolean
     */
    function delete_advertisement($id) {
        $this->db->where('build_advertisement_id', $id);
        $this->db->delete('build_advertisement');
    }

    function delete_temp_advertisement($id) {
        $this->db->where('build_advertisement_id', $id);
        $this->db->delete('temp_seesion_data');
    }

    public function get_advertisement_by_build_advertisement_id($build_advertisement_id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('build_advertisement_id', $build_advertisement_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_advertisement_by_city($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('city_id', $id);
        $this->db->where('status', "Active");
        $query = $this->db->get();
//        echo $a = $this->db->last_query();
//        exit;
        return $query->result_array();
    }

    public function get_count_advertisement($city, $category_id) {
        $query = $this->db->query("select * from build_advertisement WHERE FIND_IN_SET(" . $category_id . ",category_id) AND city_id ='$city' AND status ='Active'");
        //$a = $this->db->last_query();
        //exit;
        return $query->num_rows();
    }

    public function get_count_advertisement_by_state($state, $category_id) {
        $query = $this->db->query("select * from build_advertisement WHERE FIND_IN_SET(" . $category_id . ",category_id) AND state_id ='$state' AND status ='Active'");
//        echo $a = $this->db->last_query();
//        exit;
        return $query->num_rows();
    }

    public function get_count_advertisement_map_by_state($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('state_id', $id);
        $this->db->where('status', "Active");
        $query = $this->db->get();
//        echo $a = $this->db->last_query();
//        exit;
        return $query->num_rows();
    }

//    public function get_count_advertisement($city, $category_id, $all_cat) {
//        $this->db->select('*');
//        $this->db->from('build_advertisement');
//        $this->db->where('status', 'Active');
//        $this->db->where('city_id', $city);
//        $this->db->where("category_id", $category_id);
//        $query = $this->db->get();
//        return $query->num_rows();
//    }
}

?>