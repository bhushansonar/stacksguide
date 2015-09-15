<?php

class webmag extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();

        $this->load->model('webmag_model');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    function index() {
        $data['webmag'] = $this->webmag_model->get_webmag_front_end();
        $data['main_content'] = 'webmag_view';
        $this->load->view('includes/template', $data);
    }

    function getFullView() {
        $webmag_id = $this->uri->segment(3);
        //echo $data['webmag_id']; die;
        $data['webmag'] = $this->webmag_model->get_webmag_front_end_by_id($webmag_id);
        $data['main_content'] = 'webmag_full_view';
        $this->load->view('includes/template', $data);
    }

}
