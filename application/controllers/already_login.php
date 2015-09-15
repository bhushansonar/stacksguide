<?php

class already_login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * * Check if the user is logged in, if he's not, 
     * * send him to the login page
     * * @return void
     * */
    function index() {
        $data['main_content'] = 'already_login_view';
        $this->load->view('includes/template', $data);
    }
}