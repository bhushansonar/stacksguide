<?php

class Dashboard extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not,
     * send him to the login page
     * @return void
     */
    function index() {
        $this->load->model('comment_model');
        $data['untreated_comment'] = $this->comment_model->count_untreated_comment();
        //if($this->session->userdata('is_logged_in')){
        $data['main_content'] = 'admin/dashboard_view';
        $this->load->view('admin/includes/template', $data);
        //$this->load->view('home_view');
        //}else{
        //$this->load->view('admin/login');
        //}
        if (!$this->session->userdata('is_logged_in_admin')) {
            redirect('admin/login');
        }
    }

    /**
     * encript the password
     * @return mixed
     */
}

