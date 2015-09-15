<?php

class profile_pageinner extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();

        $this->load->model('home_model');
        $this->load->model('stackguide_ads_model');
        $this->load->model('common_model');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    function index() {
//        $categ_id = $this->uri->segment(3);
//        echo $categ_id;exit;
//        $data['main_content'] = 'vip_detail_view';
//        $this->load->view('includes/template', $data);
    }

    function show_innerpage_details() {
        //echo "hiii"; die;
        $build_ad_id = $this->uri->segment(3);
        $data['city_opt'] = $this->common_model->getDDArray('city', 'city_id', 'city_name');
        $data['escort_detail'] = $this->home_model->escort_detail_by_id($build_ad_id);
        $data['close_div'] = "true";
        $cover_img = $this->stackguide_ads_model->get_advertisement_by_build_advertisement_id($build_ad_id);
        $data['cover1'] = $cover_img[0]['cover_image'];
        $ad_user_id = $this->home_model->get_userid_by_ad_id($build_ad_id);
        $user_id = $ad_user_id[0]['user_id'];
        $profile_color = $this->home_model->get_profile_color($user_id);
        $data['color'] = $profile_color[0]['color'];

        //echo "<pre>"; print_r($data['escort_detail']);
        $data['main_content'] = 'profile_pageinner_view';
        $this->load->view('includes/template', $data);
    }

    function show_page_detail() {
        //echo "hiii"; die;
        $build_ad_id = $this->uri->segment(3);
        $data['city_opt'] = $this->common_model->getDDArray('city', 'city_id', 'city_name');
        $data['escort_detail'] = $this->home_model->escort_detail_by_id($build_ad_id);
        
        $ad_user_id = $this->home_model->get_userid_by_ad_id($build_ad_id);
        $user_id = $ad_user_id[0]['user_id'];
        $profile_color = $this->home_model->get_profile_color($user_id);
        $data['color'] = $profile_color[0]['color'];
        $data['main_content'] = 'profile_page_view';
        $this->load->view('includes/template', $data);
    }

}
