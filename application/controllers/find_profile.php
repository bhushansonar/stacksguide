<?php

class find_profile extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('find_profile_model');
        $this->load->model('common_model');
        $this->load->library('form_validation');
        //$this->load->library('cart');
        //$this->load->library('my_cart');
//        if (!$this->session->userdata('is_logged_in_ads') && $this->session->userdata('is_logged_in')) {
//            redirect('already_login');
//        }
    }

    function index() {
        //echo $a=$this->session->userdata('is_logged_in_ads');exit;
        $uid = $this->session->userdata['user_id'];

        $data['page_content'] = $this->stackguide_ads_model->get_advertisement_by_id($uid);
        $data['main_content'] = 'build_ads/list';
        $this->load->view('includes/template', $data);
    }

//function number_validation($str) {
//    return preg_match("your_regex", $str) ? true: false;
//}

    function see_profile() {
//        $data['state'] = '';
//        $data['state_opt'] = array("" => "Select");
//        $data['city'] = '';
//        $data['city_opt'] = array("" => "Select");
//        $data['country'] = "";
        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        $data['main_content'] = 'find_profile_view';
        $this->load->view('includes/template', $data);
    }

    function get_profiles() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');
            if ($this->form_validation->run() == TRUE) {
                $city = $_POST['city'];
                redirect("escorts/{$city}");
//                echo "<pre>";
//                print_r($_POST);
//                exit;
//                $city = $_POST['city'];
//                $status = 'Active';
//                //$data['escorts'] = $this->find_profile_model->getAllDataFromEscorts($city, $status);
//                $city_name = $this->find_profile_model->get_cityname_by_id($city, $status);
//                $data['city_name'] = $city_name[0]['city_name'];
//                $data['vip_escorts'] = $this->find_profile_model->get_vip_escort_data($city, $status);
//                $data['main_content'] = 'get_all_profile_view';
//                $this->load->view('includes/template', $data);
            } else {
                $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
                $data['main_content'] = 'find_profile_view';
                $this->load->view('includes/template', $data);
            }
        }
    }

    function mapping() {
        $data['main_content'] = 'mapping_view';
        $this->load->view('includes/template', $data);
    }

}

