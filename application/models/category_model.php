<?php

class category_model extends CI_Model {

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
    public function get_category_by_id($id) {
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $id);
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
    public function get_category($search_string = null, $order = null, $order_type = 'DESC', $limit_start = null, $limit_end = null, $wherestatus = null) {

        $this->db->select('*');
        $this->db->from('category');
        if ($wherestatus != null) {
            $this->db->where('status', $wherestatus);
        }
        //$this->db->order_by('status', 'Active');

        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        $this->db->group_by('category_id');

        if ($order) {
            $this->db->order_by($order, $order_type);
        } else {
            $this->db->order_by('category_id', $order_type);
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
    function count_category($search_string = null, $order = null) {
        $this->db->select('*');
        $this->db->from('category');
        //$this->db->where('status', 'Active');
        if ($search_string) {
            $this->db->like($order, $search_string);
        }
        if ($order) {
            $this->db->order_by($order, 'Asc');
        } else {
            $this->db->order_by('category_id', 'Asc');
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

        $sql_query = "select path FROM category where category_id='$iCatId'";
        $query = $this->db->query($sql_query);
        $db_cat_rs = $query->result_array();
        return $db_cat_rs[0]['path'];
    }

    function store_category() {

# -------------------------------------
        if ($_REQUEST['parent_id'] != 0) {
            $path = addslashes($this->getCategoryPathById($_REQUEST['parent_id'])) . " > ";
        }
        $path .=$_REQUEST['category_name'];

        $insertArr = array();
        $insertArr['category_name'] = $_REQUEST['category_name'];
        $insertArr['parent_id'] = $_REQUEST['parent_id'];
        $insertArr['price'] = $_REQUEST['price'];
        $insertArr['path'] = $path;
        $insertArr['display_order'] = $_REQUEST['display_order'];
        $insert = $this->db->insert('category', $insertArr);
        return $insert;
    }

    /**
     * Update category
     * @param array $data - associative array with data to store
     * @return boolean
     */
    function update_category($id, $data) {
        $this->db->where('category_id', $id);
        $this->db->update('category', $data);
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
    function delete_category($id) {
        $this->db->where('category_id', $id);
        $this->db->delete('category');
    }

    function getCategoryDetails($whereClause = "") {
        $sql_query = "select category_name, category_id, parent_id FROM category " . $whereClause . "  order by display_order, category_name";
        $query = $this->db->query($sql_query);
        $db_cat_rs = $query->result_array();

        $cat_assoc_arr = array();
        for ($c = 0, $nc = count($db_cat_rs); $c < $nc; $c++) {
            $cat_assoc_arr[$db_cat_rs[$c]['parent_id']][] = $db_cat_rs[$c];
        }
        return $cat_assoc_arr;
    }

    function getParentCategoryList($parent_id = 0, $old_cat = "", $iCatIdNot = "0", $loop = 1, $maxloop = 5) {
        global $par_cat_array;
        $cat_assoc_arr = $this->getCategoryDetails();
        if ($loop <= $maxloop && @is_array($cat_assoc_arr[$parent_id])) {
            foreach ($cat_assoc_arr[$parent_id] as $Pid => $db_cat_rs) {
                if ($iCatIdNot != $db_cat_rs['category_id']) {
                    $par_cat_array[] = array('category_id' => $db_cat_rs['category_id'], 'path' => $old_cat . "--|" . $loop . "|&nbsp;&nbsp;" . $db_cat_rs['category_name'], 'loop' => $loop);
                    $this->getParentCategoryList($db_cat_rs['category_id'], $old_cat . "&nbsp;&nbsp;&nbsp;&nbsp;", $iCatIdNot, $loop + 1, $maxloop);
                }
            }
        }
        $old_cat = "";
        return $par_cat_array;
    }

    public function get_front_category() {

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('status', 'Active');
        $this->db->where('`parent_id`', 0);
        $this->db->group_by('category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_front_sub_category() {

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('status', 'Active');
        $this->db->where('parent_id !=', 0);
        $this->db->group_by('category_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_all_category() {
        $this->db->select('category_id');
        $this->db->from('build_advertisement');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_mapping_data() {
        $this->db->select('*');
        $this->db->from('map_data');
//        $this->db->where('status', 'Active');
//        $this->db->where('`parent_id`', 0);
        $this->db->order_by('id', 'Asc');
        //$this->db->group_by('id');
        $query = $this->db->get();
        return $query->result_array();
    }

}

?>