<?php

class events extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not, 
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();

        $this->load->model('events_model');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    function index() {
        $data['events']=$this->events_model->get_events_front();
        $data['main_content'] = 'events_view';
        $this->load->view('includes/template', $data);
    }


}