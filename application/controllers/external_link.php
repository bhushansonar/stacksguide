<?php

class external_link extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();

        $this->load->model('external_link_model');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    function index() {
        $data['external_link']=$this->external_link_model->get_external_link_front_end();
        //echo "<pre>";print_r($data['external_link']);exit;
        $data['main_content'] = 'external_link_view';
        $this->load->view('includes/template', $data);
    }


}