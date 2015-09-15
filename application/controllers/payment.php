<?php

class Payment extends CI_Controller {

    public function __construct() {

        parent::__construct();

//        $this->load->model('payment_model');
//        $this->load->model('write_add_model');
        $this->load->library('recaptcha');
        $this->load->helper('url');

        if (!$this->session->userdata('is_logged_in')) {
//redirect('admin/login');
        }
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    public function index() {
        $this->load->helper('url');
    }

    public function payment_send() {
        $uid = $this->uri->segment(3);
        $amt = $this->uri->segment(4);
        $amount = decrypt($amt);
        $data['payment_amt'] = $amount;
        $data['user_id'] = $uid;
        $data['main_content'] = 'payment_send_view';
        $this->load->view('includes/template', $data);
    }

}

