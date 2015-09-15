<?php

class find_profile_model extends CI_Model {

    /**
     * Responsable for auto load the database
     * @return void
     */
    public function __construct() {
        $this->load->database();
    }

   public function getAllDataFromEscorts($city,$status){
       $this->db->select('*');
       $this->db->from('escorts');
       $this->db->where('city', $city);
       $this->db->where('status', $status);
       $query = $this->db->get();
       return $query->result_array();
   }
   
   public function get_cityname_by_id($city,$status){
       $this->db->select('city_name');
       $this->db->from('city');
       $this->db->where('city_id', $city);
       $this->db->where('status', $status);
       $query = $this->db->get();
       return $query->result_array();
   }
   
   public function  get_vip_escort_data($city,$status){
       $this->db->select('*');
       $this->db->from('build_advertisement');
       $this->db->where('city_id', $city);
       $this->db->where('status', $status);
       $query = $this->db->get();
       return $query->result_array();
   }
}

?>