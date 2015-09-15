<?php

class Page extends CI_Controller {
    /**
     * name of the folder responsible for the views 
     * which are manipulated by this controller
     * @constant string
     */

    const VIEW_FOLDER = 'page';

    /**
     * Responsable for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();


        $this->load->helper('url');
        if (!$this->session->userdata('is_logged_in')) {
            //redirect('kd2a2a0u1g4/login');
        }
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    function index() {
        $block_name = $this->uri->segment(1);
        if ($block_name == 'term') {
            $data['block_name_title'] = "Terms & Condition";
        } else if ($block_name == 'privacy') {
            $data['block_name_title'] = "Privacy";
        } else if ($block_name == 'about') {
            $data['block_name_title'] = "About Stacks";
        } else if ($block_name == 'learn') {
            $data['block_name_title'] = "Learn More";
        }
        $data['cms_block'] = $block_name;
        $data['main_content'] = 'page_view';
        $this->load->view('includes/template', $data);
    }

}