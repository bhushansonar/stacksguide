<?php

class Signin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    /**
     * * Check if the user is logged in, if he's not, 
     * * send him to the login page
     * * @return void
     * */
    function index() {
        $data['main_content'] = 'signin_view';
        $this->load->view('includes/template', $data);
    }

    
    function __encrip_password($password) {
        return md5($password);
    }

    function validate_credentials_front() {
        if (empty($this->session->userdata['username'])) {

            $this->load->model('Admin_model');

            $username = $this->input->post('username');
            $password = $this->__encrip_password($this->input->post('password'));
            $is_valid = $this->Admin_model->validate_front($username, $password);
            if (isset($is_valid)) {
                $stored_user_data = $this->Admin_model->get_user_id($username);
                $get_user = $this->user_model->get_user_by_id($stored_user_data[0]->user_id);
                $last_login = $get_user[0]['last_login'];
                $user_data = array(
                    'last_login' => date("Y-m-d H:i:s"),
                );
                $this->user_model->update_user($stored_user_data[0]->user_id, $user_data);
                $data = array(
                    'username' => $username,
                    'user_id' => $stored_user_data[0]->user_id,
                    'last_login' => $last_login,
                    'is_logged_in' => true
                );
                $session_data = $this->session->set_userdata($data);
                $redirect_url = $this->session->flashdata('redirect_url');

                if (strpos($redirect_url, 'validate_credentials_front') !== false) {

                    redirect('home');
                } else {
                    redirect('home');
                }
            } else {
                $data['login_error'] = '<strong>ohh snap!</strong> Wrong Username or password!';
                $data['main_content'] = 'signin_view';
                $this->load->view('includes/template', $data);
            }
        } else {
            $data['login_error'] = '<strong>ohh snap!</strong> Already Login please logout!';
            $data['main_content'] = 'signin_view';
            $this->load->view('includes/template', $data);
        }
    }

}