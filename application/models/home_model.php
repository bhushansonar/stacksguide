<?php

class home_model extends CI_Model {

    /**
     * Responsable for auto load the database
     * @return void
     */
    public function __construct() {
        $this->load->database();
    }

    function getAllposts() {
        $this->db->select('*');
        $this->db->from('posts');
        $query = $this->db->get();

        return $query->result_array();
    }

    function getPosts_by_field_value($field = array(), $value = array()) {
        $this->db->select('*');
        $this->db->from('posts');
        if (count($field) > 0) {

            for ($i = 0; $i < count($field); $i++) {
                $this->db->where($field[$i], $value[$i]);
            }
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    function getAllEscortByField($field, $value) {
        $this->db->select('category');
        $this->db->from('escorts');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result_array();
    }

    function CountEscort($value, $cat) {
        $sql = "SELECT * FROM  escorts WHERE city = (SELECT city_id FROM city WHERE city_name='{$value}') AND category = {$cat}";
        $query = $this->db->query($sql);
        //echo $a= $this->db->last_query();exit;
        return $query->num_rows();
    }

    function getAllCountry() {
        $this->db->select('*');
        $this->db->from('country');
        $query = $this->db->get();
        return $query->result_array();
    }

    function getState_by_field_value($field, $value) {
        $this->db->select('*');
        $this->db->from('state');
        //$this->db->join('posts', 'posts.state = state.state_id');
        $this->db->group_by('state_name');
        $this->db->where($field, $value);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getCity_by_field_value($field, $value) {
        $this->db->select('*');
        $this->db->from('city');
        //$this->db->join('posts', 'posts.city = city.city_id');
        $this->db->group_by('city_name ');
        $this->db->where($field, $value);
        $query = $this->db->get();
//        echo $a = $this->db->last_query();
        return $query->result_array();
    }

    function getAllcity() {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->group_by('city_name ');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_category_by_field_value($value) {

        $sql = "SELECT DISTINCT category FROM  escorts WHERE city = (SELECT city_id FROM city WHERE city_name='{$value}')";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function escort_detail() {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('status', 'Active');
        $this->db->limit('10');
        $query = $this->db->get();
        return $query->result_array();
    }

    function escort_detail_by_id($id) {
        $this->db->select('*');
        $this->db->from('build_advertisement');
        $this->db->where('build_advertisement_id', $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_userid_by_ad_id($ad_id) {
        $this->db->select('user_id');
        $this->db->from('build_advertisement');
        $this->db->where('build_advertisement_id ', $ad_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function update_profile_layout($profile_value, $id) {
        $this->db->set('profile_layout', $profile_value);
        $this->db->where('user_id', $id);
        $this->db->update('adv_user');
    }

    function get_profile_layout_value($user_id) {
        $this->db->select('profile_layout');
        $this->db->from('adv_user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_profile_color($user_id) {
        $this->db->select('color');
        $this->db->from('adv_user');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_city($build_id, $user_id) {
        $this->db->where('build_advertisement_id', $build_id);
        $this->db->where('user_id', $user_id);
        $this->db->delete('temp_seesion_data');
    }

    function escort_detail_by_city_cat_id($city, $category_id) {
        $query = $this->db->query("select * from build_advertisement WHERE FIND_IN_SET(" . $category_id . ",category_id) AND city_id ='$city' AND status ='Active'");
        return $query->result_array();
    }

}
