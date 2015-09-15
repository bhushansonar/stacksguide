<?php

class stacksguide_ads extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('stackguide_ads_model');
        $this->load->model('common_model');
        $this->load->library('form_validation');
        $this->load->library('cart');

        if (!$this->session->userdata('is_logged_in_ads') && $this->session->userdata('is_logged_in')) {
            redirect('already_login');
        } else if (!$this->session->userdata('is_logged_in_ads')) {
            redirect('stacksguide_ads_signin');
        }
    }

    function index() {
        //echo $a=$this->session->userdata('is_logged_in_ads');exit;
        $uid = $this->session->userdata['user_id'];

        if (!empty($this->session->userdata['build_advertisement_id'])) {
            $build_id = $this->session->userdata['build_advertisement_id'];
        } else {
            $build_id = '';
        }
        $get_cart_data = $this->stackguide_ads_model->get_data_to_cart_by_id($build_id, $uid);
        if (!empty($get_cart_data)) {
            $data['get_cart_data'] = $get_cart_data;
        } else {
            $data['get_cart_data'] = array();
        }

        $data['page_content'] = $this->stackguide_ads_model->get_advertisement_by_id($uid);
        $data['main_content'] = 'build_ads/list';
        $this->load->view('includes/template', $data);
    }

    function add() {

        $uid = $this->session->userdata['user_id'];
        if (!empty($this->session->userdata['build_advertisement_id'])) {
            $build_id = $this->session->userdata['build_advertisement_id'];
        } else {
            $build_id = '';
        }

        $data['get_cart_data'] = $this->stackguide_ads_model->get_data_to_cart_by_id($build_id, $uid);
        if (!empty($get_cart_data)) {
            $data['get_cart_data'] = $get_cart_data;
        } else {
            $data['get_cart_data'] = array();
        }
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //$category_ids = array_shift($_POST['category_id']);
//            echo "<pre>";
//            print_r($_POST['category_id']);
//            //print_r($category_ids);
//            exit;


            $data = array();
            $this->form_validation->set_rules('advertisement', 'Advertisement', 'required');
            $this->form_validation->set_rules('tagline', 'Tagline', 'required');
            $this->form_validation->set_rules('age', 'Age', 'required|callback_age_validation');
            $this->form_validation->set_message('age_validation', 'Your Age is not applicable for this ads');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('check_visiting', 'Category', 'required');
            $this->form_validation->set_error_delimiters('<div class="ads_error alert-error"><strong>', '</strong></div>');
            if ($this->form_validation->run() == TRUE) {
                $data = $this->functions->do_upload('cover_image', './uploads/advertisement/cover/', $allowtype = 'gif|jpg|png', $maxWidth = "0", $maxHeight = "0", $minWidth = "0", $minHeight = "0");
                if (isset($data['upload_data'])) {
                    $file_name = $data['upload_data']['file_name'];
                } else {
                    $file_name = "";
                }
                $phone_number = implode(",", $_POST['phone_number']);
                $email = implode(",", $_POST['email']);
                $website = implode(",", $_POST['website']);
                $images = implode(",", $_POST['upload_image']);
                array_shift($_POST['category_id']);
                $category = implode(",", $_POST['category_id']);

                $data_to_store = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'advertisement' => $this->input->post('advertisement'),
                    'images' => $images,
                    'tagline' => $this->input->post('tagline'),
                    'age' => $this->input->post('age'),
                    'gender' => $this->input->post('gender'),
                    'country_id' => $this->input->post('country'),
                    'state_id' => $this->input->post('state'),
                    'city_id' => $this->input->post('city'),
                    'visiting_values' => $this->input->post('total'),
                    'finish_ads_days' => $this->input->post('finish_ads_days'),
                    'visiting_ads_content' => $this->input->post('visiting_ads'),
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'website' => $website,
                    'ads_details' => 'NO',
                    'cover_image' => $file_name,
                    'category_id' => $category
                );

                $total = $this->input->post('total');
                $name = $this->input->post('advertisement');
                $ads_type = $this->input->post('check_visiting_name');
                $finish_ads_days = $this->input->post('finish_ads_days');
                $renew_option = $finish_ads_days . "days";
                $city_option = $this->common_model->getDDArray('city', 'city_id', 'city_name');
                $city_name = $city_option[$this->input->post('city')];
                $category_name = $this->input->post('category_name');
                $check_visiting = $this->input->post('check_visiting');
                $insert_id = $this->stackguide_ads_model->store_advertisement_ads($data_to_store);
                $data = array(
                    'id' => $insert_id,
                    'qty' => 1,
                    'price' => $total,
                    'name' => $name,
                    'options' => array(
                        'finish_ads_days' => $renew_option,
                        'city' => $city_name,
                        'ads_type' => $ads_type[0],
                        'image' => $_POST['upload_image'][0])
                );
                $rowid = $this->cart->insert($data);
                if (isset($insert_id)) {
                    $store_session_id = array(
                        'build_advertisement_id' => $insert_id,
                        'rowid' => $rowid,
                    );
                    $this->session->set_userdata($store_session_id);
                    $cat_name = implode(",", $category_name);
                    $cat_value = implode(",", $check_visiting);

                    $data_to_store_session_cart = array(
                        'build_advertisement_id' => $insert_id,
                        'rowid' => $rowid,
                        'user_id' => $this->session->userdata('user_id'),
                        'category_name' => $cat_name,
                        'category_value' => $cat_value,
                        'total' => $total,
                    );
                    $this->stackguide_ads_model->store_data_to_cart($data_to_store_session_cart);
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'add');
                    redirect('stacksguide_ads/basic_detail');
                } else {
                    $data['flash_message'] = FALSE;
                }
            }
        }

        $data['state'] = '';
        $data['state_opt'] = array("" => "Select");
        $data['city'] = '';
        $data['city_opt'] = array("" => "Select");
        $data['country'] = "";
        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        $data['main_content'] = 'build_ads/add';
        $this->load->view('includes/template', $data);
    }

    public function update() {
        //product id
        $id = $this->uri->segment(3);
        $data['id'] = $this->uri->segment(3);
        $uid = $this->session->userdata['user_id'];
        $store_session_id = array(
            'build_advertisement_id' => $id,
        );
        $this->session->set_userdata($store_session_id);
        $data['get_cart_data'] = $this->stackguide_ads_model->get_data_to_cart_by_id($id, $uid);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('advertisement', 'Advertisement', 'required');
            $this->form_validation->set_rules('tagline', 'Tagline', 'required');
            $this->form_validation->set_rules('age', 'Age', 'required|callback_age_validation');
            $this->form_validation->set_message('age_validation', 'Your Age is not applicable for this ads');
            $this->form_validation->set_rules('country', 'Country', 'required');
            $this->form_validation->set_rules('check_visiting', 'Category', 'required');
            $this->form_validation->set_error_delimiters('<div class="ads_error alert-error"><strong>', '</strong></div>');
            if ($this->form_validation->run()) {

                $data = $this->functions->do_upload('cover_image', './uploads/advertisement/cover/', $allowtype = 'gif|jpg|png', $maxWidth = "0", $maxHeight = "0", $minWidth = "0", $minHeight = "0");
                if (isset($data['upload_data'])) {
                    $file_name = $data['upload_data']['file_name'];
                    @unlink("./uploads/advertisement/cover/" . $this->input->post('old_webmag_image'));
                } else {
                    $file_name = $this->input->post('old_webmag_img');
                }
                $phone_number1 = implode(",", $_POST['phone_number']);
                $phone_number = rtrim($phone_number1, ',');
                $email1 = implode(",", $_POST['email']);
                $email = rtrim($email1, ',');
                $website1 = implode(",", $_POST['website']);
                $website = rtrim($website1, ',');
                $upload_image = implode(",", $_POST['upload_image']);
                $category_ids = "";
                if (!empty($_POST['category_id'])) {
                    array_shift($_POST['category_id']);
                    $category_ids = implode(",", $_POST['category_id']);
                }

                $data_to_store = array(
                    'user_id' => $this->session->userdata('user_id'),
                    'advertisement' => $this->input->post('advertisement'),
                    'images' => $upload_image,
                    'tagline' => $this->input->post('tagline'),
                    'age' => $this->input->post('age'),
                    'gender' => $this->input->post('gender'),
                    'country_id' => $this->input->post('country'),
                    'state_id' => $this->input->post('state'),
                    'city_id' => $this->input->post('city'),
                    'visiting_values' => $this->input->post('total'),
                    'finish_ads_days' => $this->input->post('finish_ads_days'),
                    'visiting_ads_content' => $this->input->post('visiting_ads'),
                    'phone_number' => $phone_number,
                    'email' => $email,
                    'website' => $website,
                    'cover_image' => $file_name,
                    'category_id' => $category_ids
                );

                $data_to_store_modified = array_filter($data_to_store);
                $total = $this->input->post('total');

                $name = $this->input->post('advertisement');
                $ads_type = $this->input->post('check_visiting_name');
                $finish_ads_days = $this->input->post('finish_ads_days');
                $renew_option = $finish_ads_days . "days";
                $city_option = $this->common_model->getDDArray('city', 'city_id', 'city_name');
                $city_name = $city_option[$this->input->post('city')];
                $build_advertisement_id = $this->input->post('build_advertisement_id');
                $category_name = $this->input->post('category_name');
                $check_visiting = $this->input->post('check_visiting');
                $where_temp = " AND build_advertisement_id='{$build_advertisement_id}'";
                $rowid = $this->common_model->getFieldData('temp_seesion_data', 'rowid', $where_temp);

                $last = $this->cart->contents();
                if (!empty($last[$rowid])) {

                    $data_update_cart = array(
                        'rowid' => $last[$rowid]['rowid'],
                        'price' => $total,
                        'qty' => '1'
                    );
                    $this->cart->update($data_update_cart);
                }
                if ($this->stackguide_ads_model->update_advertisement($build_advertisement_id, $data_to_store_modified) == TRUE) {
                    $store_session_id = array(
                        'build_advertisement_id' => $build_advertisement_id,
                        'update_button' => true,
                    );
                    $this->session->set_userdata($store_session_id);
                    $cat_name = implode(",", $category_name);
                    $cat_value = implode(",", $check_visiting);
                    $data_to_store_session_cart = array(
                        'build_advertisement_id' => $build_advertisement_id,
                        'user_id' => $this->session->userdata('user_id'),
                        'category_name' => $cat_name,
                        'category_value' => $cat_value,
                        'total' => $total,
                    );
                    $this->stackguide_ads_model->update_data_to_cart($build_advertisement_id, $data_to_store_session_cart);
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');
                redirect('stacksguide_ads/basic_detail');
            }
        }
        $data['advertisement_data'] = $this->stackguide_ads_model->get_advertisement_details_by_id($id);
        $where = " AND build_advertisement_id = {$id}";
        $data['advertisement_data_image'] = $data['main_category_opt'] = $this->common_model->getDDArray('build_advertisement', 'build_advertisement_id', 'images', $where);
        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        $data['city_opt'] = $this->common_model->getDDArray('city', 'city_id', 'city_name');
        $data['state_opt'] = $this->common_model->getDDArray('state', 'state_id', 'state_name');
        $data['main_content'] = 'build_ads/edit';
        $this->load->view('includes/template', $data);
    }

    public function age_validation($str) {
        if ($str <= 17) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function basic_detail() {
        $uid = $this->session->userdata['user_id'];
        $id = $this->session->userdata['build_advertisement_id'];
        $data['get_cart_data'] = $this->stackguide_ads_model->get_data_to_cart_by_id($id, $uid);
        $data['get_advertisement_detail'] = $this->stackguide_ads_model->get_advertisement_details_by_id($id);
        $data['main_content'] = 'build_ads/basic_view';
        $this->load->view('includes/template', $data);
    }

    public function ads_details() {
        $this->load->library('cart');
        $uid = $this->session->userdata['user_id'];
        $build_id = $this->session->userdata['build_advertisement_id'];
        $data['get_cart_data'] = $this->stackguide_ads_model->get_data_to_cart_by_id($build_id, $uid);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array();
            $category_ids = implode(",", $_POST['category_id']);
            $this->form_validation->set_rules('description', 'Bio Text', 'required');
            $this->form_validation->set_rules('available', 'Available To', 'required');
            $this->form_validation->set_rules('ethnicity', 'Ethnicity', 'required');
            $this->form_validation->set_error_delimiters('<div class="ads_error alert-error"><strong>', '</strong></div>');
            if ($this->form_validation->run()) {
                $call_type = $this->input->post('call_type');
                $ethnicity_arr = $this->input->post('ethnicity');
                $ethnicity = implode(",", $ethnicity_arr);
                $available_arr = $this->input->post('available');
                $available = implode(",", $available_arr);
                $total = $this->input->post('total');
                array_shift($_POST['category_id']);
                $whereStr = " AND build_advertisement_id={$build_id}";
                $category_ids = $this->common_model->getFieldData('build_advertisement', 'category_id', $whereStr);
                $catIds = explode(',', $category_ids);
                $finalCatId = array_merge($catIds, $_POST['category_id']);
                $finalCatIds = implode(",", $finalCatId);
                $category_name = $this->input->post('category_name');
                $check_visiting = $this->input->post('special_category');
                $cat_name = implode(",", $category_name);
                $cat_value = implode(",", $check_visiting);

                $data_to_store = array(
                    'description' => $this->input->post('description'),
                    'disclaimer' => $this->input->post('disclaimer'),
                    'hair' => $this->input->post('hair'),
                    'eye' => $this->input->post('eye'),
                    'height_ft' => $this->input->post('height_ft'),
                    'height_in' => $this->input->post('height_in'),
                    'weight' => $this->input->post('weight'),
                    'bust' => $this->input->post('bust'),
                    'cup' => $this->input->post('cup'),
                    'waist' => $this->input->post('waist'),
                    'hips' => $this->input->post('hips'),
                    'ethnicity_to' => $ethnicity,
                    'available_to' => $available,
                    'incall' => $call_type,
                    'i_country' => $this->input->post('i_country'),
                    'i_state' => $this->input->post('i_state'),
                    'i_city' => $this->input->post('i_city'),
                    'o_country' => $this->input->post('o_country'),
                    'o_state' => $this->input->post('o_state'),
                    'o_city' => $this->input->post('o_city'),
                    'location_tags' => $this->input->post('location_tags'),
                    'ads_details' => 'YES',
                    'category_id' => $finalCatIds,
                    'visiting_values' => $total
                );

                if ($this->stackguide_ads_model->update_advertisement($build_id, $data_to_store) == TRUE) {
                    $where_temp = " AND build_advertisement_id='{$build_id}'";
                    $rowid = $this->common_model->getFieldData('temp_seesion_data', 'rowid', $where_temp);
                    $last = $this->cart->contents();
                    if (!empty($last[$rowid])) {
                        $data_update_cart = array(
                            'rowid' => $last[$rowid]['rowid'],
                            'price' => $total,
                            'qty' => '1'
                        );
                        $this->cart->update($data_update_cart);
                    }
                    $data_to_store_session_cart = array(
                        'build_advertisement_id' => $build_id,
                        'user_id' => $this->session->userdata('user_id'),
                        'category_name' => $cat_name,
                        'category_value' => $cat_value,
                        'total' => $total,
                    );
//                    echo "<pre>";
//                    print_r($data_to_store_session_cart);
//                    exit;
                    $this->stackguide_ads_model->update_data_to_cart($build_id, $data_to_store_session_cart);
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');
                redirect('stacksguide_ads/cart');
            }
        }

        $data['state_opt'] = array("" => "Select");
        $data['city_opt'] = array("" => "Select");
        $data['eyes_opt'] = array('' => 'Select', 'Black' => 'Black', 'Blue' => 'Blue', 'Brown' => 'Brown', 'Gray' => 'Gray', 'Green' => 'Green', 'Hazel' => 'Hazel');
        $data['hair_opt'] = array('' => 'Select', 'Auburn' => 'Auburn', 'Bald' => 'Bald', 'Black' => 'Black', 'Blonde' => 'Blonde', 'Brown' => 'Brown', 'Brunette' => 'Brunette', 'Dark_Brown' => 'Dark Brown', 'Dirty_Blonde' => 'Dirty Blonde', 'Gray' => 'Gray', 'Red' => 'Red', 'Strawberry_Blonde' => 'Strawberry Blonde', 'Wild' => 'Wild');
        $data['cup_opt'] = array('' => 'Select', 'A' => 'A', 'AA' => 'AA', 'AAA' => 'AAA', 'B' => 'B', 'BB' => 'BB', 'BBB' => 'BBB', 'C' => 'C', 'CC' => 'CC', 'CCC' => 'CCC', 'D' => 'D', 'DD' => 'DD', 'DDD' => 'DDD', 'E' => 'E', 'EE' => 'EE', 'EEE' => 'EEE', 'F' => 'F', 'FF' => 'FF', 'FFF' => 'FFF', 'G' => 'G', 'GG' => 'GG', 'GGG' => 'GGG', 'H' => 'H', 'HH' => 'HH', 'HHH' => 'HHH', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'J' => 'J', 'JJ' => 'JJ', 'JJJ' => 'JJJ', 'K' => 'K', 'KK' => 'KK', 'KKK' => 'KKK', 'L' => 'L', 'LL' => 'LL', 'LLL' => 'LLL', 'M' => 'M', 'MM' => 'MM', 'MMM' => 'MMM', 'N' => 'N', 'NN' => 'NN', 'NNN' => 'NNN', 'O' => 'O', 'OO' => 'OO', 'OOO' => 'OOO', 'P' => 'P', 'PP' => 'PP', 'PPP' => 'PPP', 'Q' => 'Q', 'QQ' => 'QQ', 'QQQ' => 'QQQ', 'R' => 'R', 'RR' => 'RR', 'RRR' => 'RRR', 'S' => 'S', 'SS' => 'SS', 'SSS' => 'SSS', 'T' => 'T', 'TT' => 'TT', 'TTT' => 'TTT', 'U' => 'U', 'UU' => 'UU', 'UUU' => 'UUU', 'V' => 'V', 'VV' => 'VV', 'VVV' => 'VVV', 'W' => 'W', 'WW' => 'WW', 'WWW' => 'WWW', 'X' => 'X', 'XX' => 'XX', 'XXX' => 'XXX', 'Y' => 'Y', 'YY' => 'YY', 'YYY' => 'YYY', 'Z' => 'Z', 'ZZ' => 'ZZ', 'ZZZ' => 'ZZZ');
        for ($i = 0; $i < 1000; $i++) {

            $common_opt[$i] = $i;
        }
        $data['common_opt'] = $common_opt;
        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        $data['main_content'] = 'build_ads/ads_details';
        $this->load->view('includes/template', $data);
    }

    public function update_ads_details() {
        $this->load->library('cart');
        $uid = $this->session->userdata['user_id'];
        $build_id = $this->session->userdata['build_advertisement_id'];
        $data['get_cart_data'] = $this->stackguide_ads_model->get_data_to_cart_by_id($build_id, $uid);
        $data['get_advertisement_detail'] = $this->stackguide_ads_model->get_advertisement_details_by_id($build_id);
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            echo "<pre>";
            print_r($_POST);
            exit;
            $data = array();
            $this->form_validation->set_rules('description', 'Bio Text', 'required');
            $this->form_validation->set_rules('available', 'Available To', 'required');
            $this->form_validation->set_rules('ethnicity', 'Ethnicity', 'required');
            $this->form_validation->set_error_delimiters('<div class="ads_error alert-error"><strong>', '</strong></div>');
            if ($this->form_validation->run()) {
                $call_type = $this->input->post('call_type');
                $ethnicity_arr = $this->input->post('ethnicity');
                $ethnicity = implode(",", $ethnicity_arr);
                $available_arr = $this->input->post('available');
                $available = implode(",", $available_arr);
                $total = $this->input->post('total');
                array_shift($_POST['category_id']);
                $whereStr = " AND build_advertisement_id={$build_id}";
                $category_ids = $this->common_model->getFieldData('build_advertisement', 'category_id', $whereStr);
                $catIds = explode(',', $category_ids);
                $finalCatId = array_merge($catIds, $_POST['category_id']);
                $finalCatIds = implode(",", $finalCatId);
                $data_to_store = array(
                    'description' => $this->input->post('description'),
                    'disclaimer' => $this->input->post('disclaimer'),
                    'hair' => $this->input->post('hair'),
                    'eye' => $this->input->post('eye'),
                    'height_ft' => $this->input->post('height_ft'),
                    'height_in' => $this->input->post('height_in'),
                    'weight' => $this->input->post('weight'),
                    'bust' => $this->input->post('bust'),
                    'cup' => $this->input->post('cup'),
                    'waist' => $this->input->post('waist'),
                    'hips' => $this->input->post('hips'),
                    'ethnicity_to' => $ethnicity,
                    'available_to' => $available,
                    'incall' => $call_type,
                    'i_country' => $this->input->post('i_country'),
                    'i_state' => $this->input->post('i_state'),
                    'i_city' => $this->input->post('i_city'),
                    'o_country' => $this->input->post('o_country'),
                    'o_state' => $this->input->post('o_state'),
                    'o_city' => $this->input->post('o_city'),
                    'location_tags' => $this->input->post('location_tags'),
                    'visiting_values' => $total,
                    'category_id' => $finalCatIds,
                );
                $last = end($this->cart->contents());
                $data_update_cart = array(
                    'rowid' => @$last['rowid'],
                    'price' => $total,
                    'qty' => @$last['qty'],
                );
                $this->cart->update($data_update_cart);
                //$this->my_cart->update($data_update_cart);
                if ($this->stackguide_ads_model->update_advertisement($build_id, $data_to_store) == TRUE) {
                    $category_name = $this->input->post('category_name');
                    $check_visiting = $this->input->post('special_category');
                    $cat_name = implode(",", $category_name);
                    $cat_value = implode(",", $check_visiting);
                    $data_to_store_session_cart = array(
                        'build_advertisement_id' => $build_id,
                        'user_id' => $this->session->userdata('user_id'),
                        'category_name' => $cat_name,
                        'category_value' => $cat_value,
                        'total' => $total,
                    );

                    $this->stackguide_ads_model->update_data_to_cart($build_id, $data_to_store_session_cart);
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');
                redirect('stacksguide_ads/cart');
            }
        }
        $data['state_opt'] = array("" => "Select");
        $data['city_opt'] = array("" => "Select");
        $data['eyes_opt'] = array('' => 'Select', 'Black' => 'Black', 'Blue' => 'Blue', 'Brown' => 'Brown', 'Gray' => 'Gray', 'Green' => 'Green', 'Hazel' => 'Hazel');
        $data['hair_opt'] = array('' => 'Select', 'Auburn' => 'Auburn', 'Bald' => 'Bald', 'Black' => 'Black', 'Blonde' => 'Blonde', 'Brown' => 'Brown', 'Brunette' => 'Brunette', 'Dark_Brown' => 'Dark Brown', 'Dirty_Blonde' => 'Dirty Blonde', 'Gray' => 'Gray', 'Red' => 'Red', 'Strawberry_Blonde' => 'Strawberry Blonde', 'Wild' => 'Wild');
        $data['cup_opt'] = array('' => 'Select', 'A' => 'A', 'AA' => 'AA', 'AAA' => 'AAA', 'B' => 'B', 'BB' => 'BB', 'BBB' => 'BBB', 'C' => 'C', 'CC' => 'CC', 'CCC' => 'CCC', 'D' => 'D', 'DD' => 'DD', 'DDD' => 'DDD', 'E' => 'E', 'EE' => 'EE', 'EEE' => 'EEE', 'F' => 'F', 'FF' => 'FF', 'FFF' => 'FFF', 'G' => 'G', 'GG' => 'GG', 'GGG' => 'GGG', 'H' => 'H', 'HH' => 'HH', 'HHH' => 'HHH', 'I' => 'I', 'II' => 'II', 'III' => 'III', 'J' => 'J', 'JJ' => 'JJ', 'JJJ' => 'JJJ', 'K' => 'K', 'KK' => 'KK', 'KKK' => 'KKK', 'L' => 'L', 'LL' => 'LL', 'LLL' => 'LLL', 'M' => 'M', 'MM' => 'MM', 'MMM' => 'MMM', 'N' => 'N', 'NN' => 'NN', 'NNN' => 'NNN', 'O' => 'O', 'OO' => 'OO', 'OOO' => 'OOO', 'P' => 'P', 'PP' => 'PP', 'PPP' => 'PPP', 'Q' => 'Q', 'QQ' => 'QQ', 'QQQ' => 'QQQ', 'R' => 'R', 'RR' => 'RR', 'RRR' => 'RRR', 'S' => 'S', 'SS' => 'SS', 'SSS' => 'SSS', 'T' => 'T', 'TT' => 'TT', 'TTT' => 'TTT', 'U' => 'U', 'UU' => 'UU', 'UUU' => 'UUU', 'V' => 'V', 'VV' => 'VV', 'VVV' => 'VVV', 'W' => 'W', 'WW' => 'WW', 'WWW' => 'WWW', 'X' => 'X', 'XX' => 'XX', 'XXX' => 'XXX', 'Y' => 'Y', 'YY' => 'YY', 'YYY' => 'YYY', 'Z' => 'Z', 'ZZ' => 'ZZ', 'ZZZ' => 'ZZZ');
        for ($i = 0; $i < 1000; $i++) {
            $common_opt[$i] = $i;
        }
        $data['common_opt'] = $common_opt;
        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        $data['main_content'] = 'build_ads/update_ads_details';
        $this->load->view('includes/template', $data);
    }

    public function update_cart() {
        for ($i = 1; $i <= $this->cart->contents(); $i++) {
            $item = $this->input->post($i);
            $data = array(
                'rowid' => $item['rowid'],
                'qty' => $item['qty'],
                'options' => array(
                    'color_choice' => $item['color_choice'],
                    'size_choice' => $item['size_choice']
                )
            );
            $this->cart->update($data);
        }
    }

    public function cart() {
        $uid = $this->session->userdata['user_id'];
        $id = $this->session->userdata['build_advertisement_id'];
        $data['get_cart_data'] = $this->stackguide_ads_model->get_data_to_cart_by_id($id, $uid);
        $data['checkout_content'] = $this->cart->contents();
        $data['main_content'] = 'display_cart';
        $this->load->view('includes/template', $data);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $this->stackguide_ads_model->delete_advertisement($id);
        $this->stackguide_ads_model->delete_temp_advertisement($id);
        redirect('stacksguide_ads');
    }

    public function remove_item_from_cart() {
        $id = $this->uri->segment(3);
        $temp_ads_id = $this->uri->segment(4);
        $data = array(
            'rowid' => $id,
            'qty' => 0
        );
        $this->cart->update($data);
        $this->stackguide_ads_model->delete_temp_advertisement($temp_ads_id);
        redirect('stacksguide_ads/cart');
    }

//    public function upload_file() {
//        $ThumbSquareSize = 100; //Thumbnail will be 100x100
//        $BigImageMaxSize = 500; //Image Maximum height or width
//        $ThumbPrefix = "thumb_"; //Normal thumb Prefix
//        $image_url = getcwd() . '/uploads/advertisement/';
//        $thumb_image_url = getcwd() . '/uploads/advertisement/thumb/';
//        $DestinationDirectory = $image_url; //Upload Directory ends with / (slash)
//        $ThumbDestinationDirectory = $thumb_image_url;
//        $Quality = 90;
//        foreach ($_FILES as $file) {
//            $ImageName = $file['name'];
//            $ImageSize = $file['size'];
//            $TempSrc = $file['tmp_name'];
//            $ImageType = $file['type'];
//            if (is_array($ImageName)) {
//                $c = count($ImageName);
//                echo '<ul style="background-color:#f5f5f5">';
//                echo '<table width="100%" border="0" cellpadding="4" cellspacing="0" id="tbl_form">';
//                for ($i = 0; $i < $c; $i++) {
//                    $processImage = true;
//                    $RandomNumber = rand(0, 9999999999);  // We need same random name for both files.
//                    if (!isset($ImageName[$i]) || !is_uploaded_file($TempSrc[$i])) {
//                        echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>, may be file too big!</div>'; //output error
//                    } else {
//                        switch (strtolower($ImageType[$i])) {
//                            case 'image/png':
//                                $CreatedImage = imagecreatefrompng($TempSrc[$i]);
//                                break;
//                            case 'image/gif':
//                                $CreatedImage = imagecreatefromgif($TempSrc[$i]);
//                                break;
//                            case 'image/jpeg':
//                            case 'image/pjpeg':
//                                $CreatedImage = imagecreatefromjpeg($TempSrc[$i]);
//                                break;
//                            default:
//                                $processImage = false; //image format is not supported!
//                        }
//                        //get Image Size
//                        list($CurWidth, $CurHeight) = getimagesize($TempSrc[$i]);
//
//                        //Get file extension from Image name, this will be re-added after random name
//                        $ImageExt = substr($ImageName[$i], strrpos($ImageName[$i], '.'));
//                        $ImageExt = str_replace('.', '', $ImageExt);
//
//                        //Construct a new image name (with random number added) for our new image.
//                        $NewImageName = $RandomNumber . '.' . $ImageExt;
//
//                        //Set the Destination Image path with Random Name
//                        $thumb_DestRandImageName = $ThumbDestinationDirectory . $NewImageName; //Thumb name
//                        $DestRandImageName = $DestinationDirectory . $NewImageName; //Name for Big Image
//                        //Resize image to our Specified Size by calling resizeImage function.
//                        if ($processImage && $this->resizeImage($CurWidth, $CurHeight, $BigImageMaxSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
//                            //Create a square Thumbnail right after, this time we are using cropImage() function
//                            if (!$this->cropImage($CurWidth, $CurHeight, $ThumbSquareSize, $thumb_DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
//                                echo 'Error Creating thumbnail';
//                            }
//                            /*
//                              At this point we have succesfully resized and created thumbnail image
//                              We can render image to user's browser or store information in the database
//                              For demo, we are going to output results on browser.
//                             */
//
//                            //Get New Image Size
//                            list($ResizedWidth, $ResizedHeight) = getimagesize($DestRandImageName);
//
//
//                            echo '<tr style="display:inline-block;padding: 3px;">';
//                            echo '<td align="center"><img height="100" width="100" src="' . base_url() . 'uploads/advertisement/' . $NewImageName . '" alt="Resized Image" height="' . $ResizedHeight . '" width="' . $ResizedWidth . '">
//                                    <input type="hidden" name="upload_image[]" value="' . $NewImageName . '">
//                                </td>';
//                            echo '</tr>';
//
//                            /*
//                              // Insert info into database table!
//                              mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
//                              VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
//                             */
//                        } else {
//                            echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>! Please check if file is supported</div>'; //output error
//                        }
//                    }
//                }
//                echo '</ul>';
//                echo '</table>';
//            }
//        }
//    }
    public function upload_file() {
        $ThumbSquareSize = 100; //Thumbnail will be 100x100
        $MediumImageSize = 150;
        $BigImageMaxSize = 500; //Image Maximum height or width

        $ThumbPrefix = "thumb_"; //Normal thumb Prefix
        $MediumImagePrefix = "medium_";

        $thumb_image_url = getcwd() . '/uploads/advertisement/thumb/';
        $medium_image_url = getcwd() . '/uploads/advertisement/medium/';
        $image_url = getcwd() . '/uploads/advertisement/';

        $DestinationDirectory = $image_url; //Upload Directory ends with / (slash)
        $ThumbDestinationDirectory = $thumb_image_url;
        $MediumImageDestinationDirectory = $medium_image_url;

        $Quality = 90;
        foreach ($_FILES as $file) {
            $ImageName = $file['name'];
            $ImageSize = $file['size'];
            $TempSrc = $file['tmp_name'];
            $ImageType = $file['type'];
            if (is_array($ImageName)) {
                $c = count($ImageName);
                echo '<ul style="background-color:#f5f5f5">';
                echo '<table width="100%" border="0" cellpadding="4" cellspacing="0" id="tbl_form">';
                for ($i = 0; $i < $c; $i++) {
                    $processImage = true;
                    $RandomNumber = rand(0, 9999999999);  // We need same random name for both files.
                    if (!isset($ImageName[$i]) || !is_uploaded_file($TempSrc[$i])) {
                        echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>, may be file too big!</div>'; //output error
                    } else {
                        switch (strtolower($ImageType[$i])) {
                            case 'image/png':
                                $CreatedImage = imagecreatefrompng($TempSrc[$i]);
                                break;
                            case 'image/gif':
                                $CreatedImage = imagecreatefromgif($TempSrc[$i]);
                                break;
                            case 'image/jpeg':
                            case 'image/pjpeg':
                                $CreatedImage = imagecreatefromjpeg($TempSrc[$i]);
                                break;
                            default:
                                $processImage = false; //image format is not supported!
                        }
                        //get Image Size
                        list($CurWidth, $CurHeight) = getimagesize($TempSrc[$i]);

                        //Get file extension from Image name, this will be re-added after random name
                        $ImageExt = substr($ImageName[$i], strrpos($ImageName[$i], '.'));
                        $ImageExt = str_replace('.', '', $ImageExt);

                        //Construct a new image name (with random number added) for our new image.
                        $NewImageName = $RandomNumber . '.' . $ImageExt;

                        //Set the Destination Image path with Random Name
                        $thumb_DestRandImageName = $ThumbDestinationDirectory . $NewImageName; //Thumb name
                        $medium_DestRandImageName = $MediumImageDestinationDirectory . $NewImageName;
                        $DestRandImageName = $DestinationDirectory . $NewImageName; //Name for Big Image
                        //Resize image to our Specified Size by calling resizeImage function.
                        if ($processImage && $this->resizeImage($CurWidth, $CurHeight, $BigImageMaxSize, $DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                            //Create a square Thumbnail right after, this time we are using cropImage() function
                            if (!$this->cropImage($CurWidth, $CurHeight, $ThumbSquareSize, $thumb_DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                                echo 'Error Creating thumbnail';
                            }
                            if (!$this->cropImage($CurWidth, $CurHeight, $MediumImageSize, $medium_DestRandImageName, $CreatedImage, $Quality, $ImageType[$i])) {
                                echo 'Error Creating thumbnail';
                            }

                            /*
                              At this point we have succesfully resized and created thumbnail image
                              We can render image to user's browser or store information in the database
                              For demo, we are going to output results on browser.
                             */

                            //Get New Image Size
                            list($ResizedWidth, $ResizedHeight) = getimagesize($DestRandImageName);


                            echo '<tr style="display:inline-block;padding: 3px;">';
                            echo '<td align="center"><img height="100" width="100" src="' . base_url() . 'uploads/advertisement/' . $NewImageName . '" alt="Resized Image" height="' . $ResizedHeight . '" width="' . $ResizedWidth . '">
                                    <input type="hidden" name="upload_image[]" value="' . $NewImageName . '">
                                </td>';
                            echo '</tr>';

                            /*
                              // Insert info into database table!
                              mysql_query("INSERT INTO myImageTable (ImageName, ThumbName, ImgPath)
                              VALUES ($DestRandImageName, $thumb_DestRandImageName, 'uploads/')");
                             */
                        } else {
                            echo '<div class="error">Error occurred while trying to process <strong>' . $ImageName[$i] . '</strong>! Please check if file is supported</div>'; //output error
                        }
                    }
                }
                echo '</ul>';
                echo '</table>';
            }
        }
    }

    // This function will proportionally resize image
    function resizeImage($CurWidth, $CurHeight, $MaxSize, $DestFolder, $SrcImage, $Quality, $ImageType) {
        //Check Image size is not 0
        if ($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }

        //Construct a proportional size of new image
        $ImageScale = min($MaxSize / $CurWidth, $MaxSize / $CurHeight);
        $NewWidth = 500; //ceil($ImageScale * $CurWidth);
        $NewHeight = 500; //ceil($ImageScale * $CurHeight);
//        if ($CurWidth < $NewWidth && $CurHeight < $NewHeight) {
//            $NewWidth = $CurWidth;
//            $NewHeight = $CurHeight;
//        }
        $NewCanves = imagecreatetruecolor($NewWidth, $NewHeight);
        // Resize Image
        if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)) {
            switch (strtolower($ImageType)) {
                case 'image/png': imagepng($NewCanves, $DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves, $DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg' :
                    imagejpeg($NewCanves, $DestFolder, $Quality);
                    break;
                default:
                    return false;
            }
            if (is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }
    }

//This function corps image to create exact square images, no matter what its original size!
    function cropImage($CurWidth, $CurHeight, $iSize, $DestFolder, $SrcImage, $Quality, $ImageType) {

        //Check Image size is not 0
        if ($CurWidth <= 0 || $CurHeight <= 0) {
            return false;
        }

        //abeautifulsite.net has excellent article about "Cropping an Image to Make Square"
        //http://www.abeautifulsite.net/blog/2009/08/cropping-an-image-to-make-square-thumbnails-in-php/
        if ($CurWidth > $CurHeight) {
            $y_offset = 0;
            $x_offset = ($CurWidth - $CurHeight) / 2;
            $square_size = $CurWidth - ($x_offset * 2);
        } else {
            $x_offset = 0;
            $y_offset = ($CurHeight - $CurWidth) / 2;
            $square_size = $CurHeight - ($y_offset * 2);
        }

        $NewCanves = imagecreatetruecolor($iSize, $iSize);
        if (imagecopyresampled($NewCanves, $SrcImage, 0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)) {
            switch (strtolower($ImageType)) {
                case 'image/png' : imagepng($NewCanves, $DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves, $DestFolder);
                    break;
                case 'image/jpeg':
                case 'image/pjpeg' :
                    imagejpeg($NewCanves, $DestFolder, $Quality);
                    break;
                default:
                    return false;
            }
            if (is_resource($NewCanves)) {
                imagedestroy($NewCanves);
            }
            return true;
        }
    }

    public function payment_send() {
        $data['payment_amt'] = $_POST["price"];
        $data['user_id'] = $_POST["user_id"];
        $data['build_advertisement_id'] = $_POST["advertisement_id"];
        $data['main_content'] = 'build_ads/payment_send_view';
        $this->load->view('includes/template', $data);
    }

}
