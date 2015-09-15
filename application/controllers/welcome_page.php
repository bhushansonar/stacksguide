<?php

class Welcome_page extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();

//        $this->load->model('home_model');
//        $this->load->model('user_model');
//        $this->load->model('common_model');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('signin');
        }
    }

    function index() {

        $data['main_content'] = 'welcome_page_view';
        $this->load->view('includes/template', $data);
    }


}