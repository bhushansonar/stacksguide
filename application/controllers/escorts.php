<?php

class Escorts extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not,
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();

        $this->load->model('home_model');
        $this->load->model('escorts_model');
        $this->load->model('category_model');
        $this->load->helper('url');
        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    function index() {
        $data['city'] = $this->uri->segment(2);
        $data['parent_category'] = $this->category_model->get_front_category();
        $data['main_content'] = 'escort_category_view';
        $this->load->view('includes/template', $data);
    }

}

