<?php

class vip_details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('common_model');
        $this->load->model('stackguide_ads_model');
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

    function show_vip_details() {
        $id = $this->uri->segment(3);
        $data['city_opt'] = $this->common_model->getDDArray('city', 'city_id', 'city_name');
        $data['escort_detail'] = $this->home_model->escort_detail_by_id($id);
        $cover_img = $this->stackguide_ads_model->get_advertisement_by_build_advertisement_id($id);
        $cover_img1 = $cover_img[0]['cover_image'];
        $ad_user_id = $this->home_model->get_userid_by_ad_id($id);
        $user_id = $ad_user_id[0]['user_id'];
        $profile_color = $this->home_model->get_profile_color($user_id);
        $data['color'] = @$profile_color[0]['color'];
        $data['close_div'] = "true";
        $profile_layout_value = $this->home_model->get_profile_layout_value($user_id);
        $profile_layout = isset($profile_layout_value[0]['profile_layout']) ? $profile_layout_value[0]['profile_layout'] : "";

        if ($profile_layout == 1) {
            $data['cover1'] = $cover_img1;
            $data['main_content'] = 'profile_pageinner_view';
        }
        if ($profile_layout == 2) {
            $data['main_content'] = 'profile_page_view';
        }
        if ($profile_layout == 0) {
            $data['main_content'] = 'vip_detail_view';
        }
        $this->load->view('includes/template', $data);
    }

    public function add_profile_layout_to_user() {
        $ad_id = $this->uri->segment(3);
        $profile_value = $this->uri->segment(4);
        $ad_user_id = $this->home_model->get_userid_by_ad_id($ad_id);
        $id = $ad_user_id[0]['user_id'];
        $this->home_model->update_profile_layout($profile_value, $id);
    }

}
