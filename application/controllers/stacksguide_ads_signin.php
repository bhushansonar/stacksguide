<?php

class stacksguide_ads_signin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('adv_user_model');
        if (!$this->session->userdata('is_logged_in_ads') && $this->session->userdata('is_logged_in')) {
            redirect('already_login');
        }
    }

    function index() {
        if ($this->session->userdata('is_logged_in_ads')) {
            redirect("stacksguide_ads");
        } else {
            $data['main_content'] = 'stacksguide_ads_signin_view';
            $this->load->view('includes/template', $data);
        }
    }

    function __encrip_password($password) {
        return md5($password);
    }

    function validate_credentials_front() {
        if (empty($this->session->userdata['username'])) {
            $this->load->model('Admin_model');
            $username = $this->input->post('username');
            $password = $this->__encrip_password($this->input->post('password'));
            $is_valid = $this->Admin_model->validate_front_ads($username, $password);
            if (isset($is_valid)) {
                $stored_user_data = $this->Admin_model->get_adv_user_id($username);
                $get_user = $this->adv_user_model->get_user_by_id($stored_user_data[0]->user_id);
                $last_login = $get_user[0]['last_login'];
                $user_data = array(
                    'last_login' => date("Y-m-d h:i:s A"),
                );
                $this->adv_user_model->update_user($stored_user_data[0]->user_id, $user_data);
                $data_ads = array(
                    'username' => $username,
                    'user_id' => $stored_user_data[0]->user_id,
                    'last_login' => $last_login,
                    'is_logged_in_ads' => true
                );
                $session_data = $this->session->set_userdata($data_ads);
                $redirect_url = $this->session->flashdata('redirect_url');
                if (strpos($redirect_url, 'validate_credentials_front') !== false) {
                    redirect('stacksguide_ads');
                } else {
                    redirect('stacksguide_ads');
                }
            } else {
                $data['login_error'] = '<strong>ohh snap!</strong> Wrong Username or password!';
                $data['main_content'] = 'stacksguide_ads_signin_view';
                $this->load->view('includes/template', $data);
            }
        } else {
            $data['login_error'] = '<strong>ohh snap!</strong> Already Login please logout!';
            $data['main_content'] = 'stacksguide_ads_signin_view';
            $this->load->view('includes/template', $data);
        }
    }

    public function ads_logout() {
        $reuired_sessiondata = array(
            'session_id' => $this->session->userdata('session_id'),
            'ip_address' => $this->session->userdata('ip_address'),
            'user_agent' => $this->session->userdata('user_agent'),
            'last_activity' => $this->session->userdata('last_activity'),
        );
        $array_items = array('username' => '', 'user_id' => '', 'is_logged_in_ads' => false);
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        $this->session->set_userdata($reuired_sessiondata);
        redirect('stacksguide_ads_signin');
    }

}

