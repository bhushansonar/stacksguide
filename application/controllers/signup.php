<?php

class Signup extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('user_model');
        $this->load->library('form_validation');
        //$this->load->model('email_template_model');


        if (!$this->session->userdata('is_logged_in')) {
            //redirect('admin/login');
        }
    }

    /**
     * * Check if the user is logged in, if he's not,
     * * send him to the login page
     * * @return void
     * */
    function index() {
        $data['main_content'] = 'signup_view';
        $this->load->view('includes/template', $data);
    }

    /**
     * *
     * * @return mixed
     * */
    function create_member() {

        $this->form_validation->set_rules('username', 'User name', 'trim|required|min_length[4]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email Address', 'trim|required|valid_email|is_unique[user.primary_email]');
        $this->form_validation->set_message('is_unique', 'The %s is already taken! Please choose another.');
        $this->form_validation->set_error_delimiters('<div style="margin:1%" class="alert alert-error"><strong>', '</strong></div>');
        $this->form_validation->set_rules('membership', 'Membership', 'required');
        $this->form_validation->set_rules('term_condition', 'Terms & Condition', 'required');
        if ($this->form_validation->run() == TRUE) {
            $username = $this->input->post('username');
            $pass = generate_password();
            $email = $this->input->post('email');
            $color2 = $this->input->post('color2');
            $membership_amt = $this->input->post('membership');
            $data_to_store = array(
                'date_of_registration' => date("Y-m-d H:i:s"),
                'username' => $username,
                'password' => md5($pass),
                'firstname' => $this->input->post('username'),
                'primary_email' => $email,
                'color' => $this->input->post('color'),
                'color2' => isset($color2) ? $color2 : "",
                'term_condition' => $this->input->post('term_condition'),
                'membership' => $membership_amt,
                'status' => 'Inactive'
            );

            $uid = $this->user_model->store_user($data_to_store);
            $this->load->helper('email');
            $this->load->library('email');
            if (valid_email($email)) {
                // compose email
                $this->email->clear(TRUE);
                $get_admin_detail = get_admin_detail(); //common helper function for admin detail
                $this->email->from($get_admin_detail['email'], $get_admin_detail['name']);
                $this->email->to($email);
                $this->email->set_mailtype("html");
                $this->email->subject('Register Confirmation for StacksGuide Account!');
                $mail_data['url'] = site_url() . 'payment/payment_send/' . $uid . '/' . encrypt($membership_amt);
                $message = $this->load->view('mail_templates/stacks_signup_mail', $mail_data, true);

                $this->email->message($message);
                // try send mail ant if not able print debug
                if (!$this->email->send()) {
                    $msgadd = "<strong>E-mail not sent </strong>"; //.$this->email->print_debugger();
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-error');
                    $this->session->set_flashdata('flash_message', $msgadd);
                    redirect('home');
                } else {

                    $msgadd = "<strong>Please check your Email</strong>"; //.$this->email->print_debugger();
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-error');
                    $this->session->set_flashdata('flash_message', $msgadd);
                    redirect('home');
                }
            }

            //redirect("payment/payment_send/$uid/$membership_amt");
        }
//        else {
//
//            $this->session->set_flashdata('validation_error_messages', validation_errors());
//            redirect('signup');
//        }

        $data['main_content'] = 'signup_view';
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
            if ($this->user_model->update_user_by_email($email, $data_to_store)) {
                $data['flash_message'] = TRUE;
                $this->session->set_flashdata('flash_class', 'alert-success');
                $this->session->set_flashdata('flash_message', '<strong>Well done!</strong> We sent you password on your E-mail.');
                redirect('home');
                //redirect('admin/user'.'');
            } else {
                $data['flash_message'] = TRUE;
                $this->session->set_flashdata('flash_class', 'alert-error');
                $this->session->set_flashdata('flash_message', '<strong>Oh snap!</strong> change a few things up and try submitting again.');
                redirect('home');
            }
        }
    }

}
