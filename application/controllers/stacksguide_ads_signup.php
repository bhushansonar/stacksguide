<?php

class stacksguide_ads_signup extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('adv_user_model');
        $this->load->model('user_model');
        if (!$this->session->userdata('is_logged_in_ads')) {
            //redirect('admin/login');
        }
    }

    function index() {
        $data['main_content'] = 'stacksguide_ads_signup_view';
        $this->load->view('includes/template', $data);
    }

    function create_member() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'User name', 'trim|required|min_length[4]|is_unique[adv_user.username]');

        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[adv_user.primary_email]');
        $this->form_validation->set_rules('confirm_email', 'Confirm Email Address', 'trim|required|matches[email]');

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[password]');

        $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
        $this->form_validation->set_rules('term_condition', 'Term Condition Not Checked', 'required');

        $this->form_validation->set_message('is_unique', 'The %s is already taken! Please choose another.');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');
        if ($this->input->post('redirect')) {
            $redirect = $this->input->post('redirect');
        } else {
            $redirect = '';
        }
        if ($this->form_validation->run() == TRUE) {

            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $data_to_store = array(
                'date_of_registration' => date("Y-m-d H:i:s"),
                'username' => $this->input->post('username'),
                'password' => md5($pass),
                'firstname' => $this->input->post('username'),
                'primary_email' => $email,
                'term_condition' => $this->input->post('term_condition'),
                'status' => 'Inactive'
            );
            //if the insert has returned true then we show the flash message

            $this->load->helper('email');
            //load email library
            $this->load->library('email');

            //read parameters from $_POST using input class
            // check is email addrress valid or no
            if (valid_email($email)) {
                // compose email
                $this->email->clear(TRUE);
                $get_admin_detail = get_admin_detail(); //common helper function for admin detail
                $this->email->from($get_admin_detail['email'], $get_admin_detail['name']);
                $this->email->to($email);
                $this->email->set_mailtype("html");
                $this->email->subject('Register confirmation for StacksGuide Advertisement Account!');
                $mail_data['url'] = site_url() . 'stacksguide_ads_signup/confirm_adervtisement_account/' . base64url_encode($email);
                $message = $this->load->view('mail_templates/signup_mail', $mail_data, true);

                $this->email->message($message);
                // try send mail ant if not able print debug
                if (!$this->email->send()) {
                    $msgadd = "<strong>E-mail not sent </strong>"; //.$this->email->print_debugger();
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-error');
                    $this->session->set_flashdata('flash_message', $msgadd);
                    if ($redirect == 'home') {
                        redirect('welcome_page');
                    } else {
                        redirect('stacksguide_ads_signup');
                    }
                } else {
                    if ($this->adv_user_model->store_user($data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $this->session->set_flashdata('flash_class', 'alert-success');
                        $this->session->set_flashdata('flash_message', '<strong>Well done!</strong> We have sent you a link to confirm your subscription.');
                        redirect('stacksguide_ads_signup');
                    } else {
                        $data['flash_message'] = TRUE;
                        $this->session->set_flashdata('flash_class', 'alert-error');
                        $this->session->set_flashdata('flash_message', '<strong>Oh snap!</strong> change a few things up and try submitting again.');
                        redirect('stacksguide_ads_signup');
                    }
                }
            }
        } else {
            if ($redirect == 'home') {
                $this->session->set_flashdata('validation_error_messages', validation_errors());
                redirect('stacksguide_ads_signup');
            }
        }

        $data['main_content'] = 'stacksguide_ads_signup_view';
        $this->load->view('includes/template', $data);
    }

    function set_password() {

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        if ($this->form_validation->run()) {
            $email = base64url_decode($this->input->post('email'));
            $data_to_store = array(
                'password' => md5($this->input->post('password')),
                'account_confirmed' => 'YES',
                'status' => 'Active'
            );
            if ($this->adv_user_model->update_user_by_email($email, $data_to_store)) {
                $data['flash_message'] = TRUE;
                $this->session->set_flashdata('flash_class', 'alert-success');
                $this->session->set_flashdata('flash_message', '<strong>Well done!</strong> We sent you password on your E-mail.');
                redirect('home');
            } else {
                $data['flash_message'] = TRUE;
                $this->session->set_flashdata('flash_class', 'alert-error');
                $this->session->set_flashdata('flash_message', '<strong>Oh snap!</strong> change a few things up and try submitting again.');
                redirect('home');
            }
        }
    }

    function confirm_adervtisement_account() {
        $email_encode = $this->uri->segment(3);
        if (!empty($email_encode)) {
            $email = base64url_decode($email_encode);
            if (!empty($email_encode)) {
                $data_to_store = array(
                    'status' => 'Active'
                );
                if ($this->user_model->update_user_by_email($email, $data_to_store)) {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-success');
                    $this->session->set_flashdata('flash_message', '<strong>Thank you for confirming your account.</strong>');
                    redirect('stacksguide_ads_signin');
                } else {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-error');
                    $this->session->set_flashdata('flash_message', '<strong>Oh snap! change a few things up and try submitting again.</strong>');
                    redirect('stacksguide_ads_signup');
                }
            }
        }
//        $data['main_content'] = 'reset_password_view';
//        $this->load->view('includes/template', $data);
    }

}

