<?php

class Home extends CI_Controller {

    /**
     * Check if the user is logged in, if he's not,
     * send him to the login page
     * @return void
     */
    public function __construct() {

        parent::__construct();
        $this->load->library('tweetphp');
//$this->load->library('tweetphp');
        $this->load->model('home_model');
        $this->load->model('user_model');
        $this->load->model('payment_model');
        $this->load->model('common_model');
        $this->load->model('stackguide_ads_model');
        $this->load->model('category_model');
        $this->load->model('warning_disclaimer_model');
        $this->load->helper('url');
        if (!$this->session->userdata('is_logged_in') && $this->session->userdata('is_logged_in_ads')) {
            redirect('already_login');
        }
    }

    function index() {
//        $feed_back = $this->tweetphp->get_tweet_list();
//        $tweet_arry = $this->tweetphp->get_tweet_array();
//        echo "<pre>";
//        print_r($feed_back);
//        echo "<br>";
//        print_r($tweet_arry);
//        exit;
//$tweets = $this->twitterfetcher->getTweets(array(
//    'consumerKey'       => '<your consumer key>',
//    'consumerSecret'    => '<your consumer secret>',
//    'accessToken'       => '<your access token>',
//    'accessTokenSecret' => '<your access token secret>',
//    'usecache'          => true,
//    'count'             => 0,
//    'numdays'           => 30
//));
//print_r($tweets);



        $data['escort_detail'] = $this->home_model->escort_detail();
        $data['main_content'] = 'home_view';
        $data['country_opt'] = $this->home_model->getAllCountry();
        $data['city_opt'] = $this->home_model->getAllcity();
        $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer_front();
        $this->load->view('includes/template', $data);
    }

    function payment_process() {
        $payment_type = $_POST['x_payment_type'];
        if ($payment_type == 'advertisement') {
            $transaction_approval = $_POST['Transaction_Approved'];
            if ($transaction_approval != 'NO') {
                if (isset($_POST['x_user_id'])) {
                    $user_id = $_POST['x_user_id'];
                } else {
                    $user_id = "0";
                }
                $data_to_store = array(
                    'user_id' => $user_id,
                    'payment_type' => isset($_POST['x_payment_type']) ? $_POST['x_payment_type'] : "",
                    'trans_id' => isset($_POST['x_trans_id']) ? $_POST['x_trans_id'] : "",
                    'build_advertisement_id' => isset($_POST['x_build_advertisement_id']) ? $_POST['x_build_advertisement_id'] : "",
                    'invoice_num' => isset($_POST['x_invoice_num']) ? $_POST['x_invoice_num'] : "",
                    'description' => isset($_POST['x_description']) ? $_POST['x_description'] : "",
                    'amount' => isset($_POST['x_amount']) ? $_POST['x_amount'] : "",
                    'cust_id' => isset($_POST['x_cust_id']) ? $_POST['x_cust_id'] : "",
                    'first_name' => isset($_POST['x_first_name']) ? $_POST['x_first_name'] : "",
                    'last_name' => isset($_POST['x_last_name']) ? $_POST['x_last_name'] : "",
                    'company' => isset($_POST['x_company']) ? $_POST['x_company'] : "",
                    'address' => isset($_POST['x_address']) ? $_POST['x_address'] : "",
                    'city' => isset($_POST['x_city']) ? $_POST['x_city'] : "",
                    'state' => isset($_POST['x_state']) ? $_POST['x_state'] : "",
                    'zip' => isset($_POST['x_zip']) ? $_POST['x_zip'] : "",
                    'country' => isset($_POST['x_country']) ? $_POST['x_country'] : "",
                    'phone' => isset($_POST['x_phone']) ? $_POST['x_phone'] : "",
                    'email' => isset($_POST['x_email']) ? $_POST['x_email'] : "",
                    'ship_to_first_name' => isset($_POST['x_ship_to_first_name']) ? $_POST['x_ship_to_first_name'] : "",
                    'ship_to_last_name' => isset($_POST['x_ship_to_last_name']) ? $_POST['x_ship_to_last_name'] : "",
                    'ship_to_company' => isset($_POST['x_ship_to_company']) ? $_POST['x_ship_to_company'] : "",
                    'ship_to_address' => isset($_POST['x_ship_to_address']) ? $_POST['x_ship_to_address'] : "",
                    'ship_to_city' => isset($_POST['x_ship_to_city']) ? $_POST['x_ship_to_city'] : "",
                    'ship_to_state' => isset($_POST['x_ship_to_state']) ? $_POST['x_ship_to_state'] : "",
                    'ship_to_zip' => isset($_POST['x_ship_to_zip']) ? $_POST['x_ship_to_zip'] : "",
                    'ship_to_country' => isset($_POST['x_ship_to_country']) ? $_POST['x_ship_to_country'] : "",
                    'discount_amount' => isset($_POST['discount_amount']) ? $_POST['discount_amount'] : "",
                    'status' => 'Complete',
                );
                $payment_id = $this->payment_model->add_payment($data_to_store);
                if (isset($payment_id) && !empty($payment_id)) {
                    $build_advertisement_id = $_POST['x_build_advertisement_id'];
                    if (!empty($build_advertisement_id)) {
                        $update_data_build_advertisement = array(
                            'status' => 'Active',
                        );
                        $this->stackguide_ads_model->update_advertisement($build_advertisement_id, $update_data_build_advertisement);
                    }
                    $where_uid = " AND user_id={$user_id}";
                    $username = $this->common_model->getFieldData('adv_user', 'username', $where_uid);
                    $this->load->helper('email');
                    $this->load->library('email');
                    if (valid_email($_POST['x_email'])) {

                        $this->load->helper('email');
                        $this->load->library('email');
                        $this->email->clear(TRUE);
                        $get_admin_detail = get_admin_detail(); //common helper function for admin detail
                        $this->email->from($get_admin_detail['email'], $get_admin_detail['name']);
                        $this->email->to($_POST['x_email']);
                        $this->email->set_mailtype("html");
                        $this->email->subject('StacksGuide Payment Successfully Done!');
                        $mail_data['name'] = $username;
                        $mail_data['transaction_id'] = $_POST['x_trans_id'];
                        $mail_data['invoice_num'] = $_POST['x_invoice_num'];
                        $mail_data['payment_method'] = "Credit Card";
                        $mail_data['status'] = "Complete";
                        $mail_data['amount'] = $_POST['x_amount'];
                        $mail_data['firstname'] = $_POST['x_first_name'];
                        $mail_data['lastname'] = $_POST['x_last_name'];
                        $mail_data['company'] = $_POST['x_company'];
                        $mail_data['city'] = $_POST['x_city'];
                        $mail_data['state'] = $_POST['x_state'];
                        $mail_data['country'] = $_POST['x_country'];
                        $mail_data['zip'] = $_POST['x_zip'];
                        $message = $this->load->view('mail_templates/payment_mail', $mail_data, true);
                        $this->email->message($message);
                        $this->email->send();
                    }
                    $this->session->set_flashdata('flash_message', 'Your payment has been successfully approval');
                    $this->session->set_flashdata('flash_class', 'alert-success');
                    $this->home_model->delete_city($build_advertisement_id, $user_id);
                    redirect("stacksguide_ads");
                }
            } else {
                if (isset($_POST['x_user_id'])) {
                    $user_id = $_POST['x_user_id'];
                } else {
                    $user_id = "0";
                }
                $data_to_store = array(
                    'user_id' => $user_id,
                    'payment_type' => isset($_POST['x_payment_type']) ? $_POST['x_payment_type'] : "",
                    'trans_id' => isset($_POST['x_trans_id']) ? $_POST['x_trans_id'] : "",
                    'build_advertisement_id' => isset($_POST['x_build_advertisement_id']) ? $_POST['x_build_advertisement_id'] : "",
                    'invoice_num' => isset($_POST['x_invoice_num']) ? $_POST['x_invoice_num'] : "",
                    'description' => isset($_POST['x_description']) ? $_POST['x_description'] : "",
                    'amount' => isset($_POST['x_amount']) ? $_POST['x_amount'] : "",
                    'cust_id' => isset($_POST['x_cust_id']) ? $_POST['x_cust_id'] : "",
                    'first_name' => isset($_POST['x_first_name']) ? $_POST['x_first_name'] : "",
                    'last_name' => isset($_POST['x_last_name']) ? $_POST['x_last_name'] : "",
                    'company' => isset($_POST['x_company']) ? $_POST['x_company'] : "",
                    'address' => isset($_POST['x_address']) ? $_POST['x_address'] : "",
                    'city' => isset($_POST['x_city']) ? $_POST['x_city'] : "",
                    'state' => isset($_POST['x_state']) ? $_POST['x_state'] : "",
                    'zip' => isset($_POST['x_zip']) ? $_POST['x_zip'] : "",
                    'country' => isset($_POST['x_country']) ? $_POST['x_country'] : "",
                    'phone' => isset($_POST['x_phone']) ? $_POST['x_phone'] : "",
                    'email' => isset($_POST['x_email']) ? $_POST['x_email'] : "",
                    'ship_to_first_name' => isset($_POST['x_ship_to_first_name']) ? $_POST['x_ship_to_first_name'] : "",
                    'ship_to_last_name' => isset($_POST['x_ship_to_last_name']) ? $_POST['x_ship_to_last_name'] : "",
                    'ship_to_company' => isset($_POST['x_ship_to_company']) ? $_POST['x_ship_to_company'] : "",
                    'ship_to_address' => isset($_POST['x_ship_to_address']) ? $_POST['x_ship_to_address'] : "",
                    'ship_to_city' => isset($_POST['x_ship_to_city']) ? $_POST['x_ship_to_city'] : "",
                    'ship_to_state' => isset($_POST['x_ship_to_state']) ? $_POST['x_ship_to_state'] : "",
                    'ship_to_zip' => isset($_POST['x_ship_to_zip']) ? $_POST['x_ship_to_zip'] : "",
                    'ship_to_country' => isset($_POST['x_ship_to_country']) ? $_POST['x_ship_to_country'] : "",
                    'discount_amount' => isset($_POST['discount_amount']) ? $_POST['discount_amount'] : "",
                    'status' => 'Incomplete',
                );
                $payment_id = $this->payment_model->add_payment($data_to_store);
                $data['flash_message'] = TRUE;
                $this->session->set_flashdata('flash_class', 'alert-error');
                $this->session->set_flashdata('flash_message', 'Your payment has not been approval');
                redirect("stacksguide_ads");
            }
        } else {

            $transaction_approval = $_POST['Transaction_Approved'];
            if ($transaction_approval != 'NO') {
                if (isset($_POST['x_user_id'])) {
                    $user_id = $_POST['x_user_id'];
                } else {
                    $user_id = "0";
                }
                $data_to_store = array(
                    'user_id' => $user_id,
                    'payment_type' => isset($_POST['x_payment_type']) ? $_POST['x_payment_type'] : "",
                    'trans_id' => isset($_POST['x_trans_id']) ? $_POST['x_trans_id'] : "",
                    'invoice_num' => isset($_POST['x_invoice_num']) ? $_POST['x_invoice_num'] : "",
                    'description' => isset($_POST['x_description']) ? $_POST['x_description'] : "",
                    'amount' => isset($_POST['x_amount']) ? $_POST['x_amount'] : "",
                    'cust_id' => isset($_POST['x_cust_id']) ? $_POST['x_cust_id'] : "",
                    'first_name' => isset($_POST['x_first_name']) ? $_POST['x_first_name'] : "",
                    'last_name' => isset($_POST['x_last_name']) ? $_POST['x_last_name'] : "",
                    'company' => isset($_POST['x_company']) ? $_POST['x_company'] : "",
                    'address' => isset($_POST['x_address']) ? $_POST['x_address'] : "",
                    'city' => isset($_POST['x_city']) ? $_POST['x_city'] : "",
                    'state' => isset($_POST['x_state']) ? $_POST['x_state'] : "",
                    'zip' => isset($_POST['x_zip']) ? $_POST['x_zip'] : "",
                    'country' => isset($_POST['x_country']) ? $_POST['x_country'] : "",
                    'phone' => isset($_POST['x_phone']) ? $_POST['x_phone'] : "",
                    'email' => isset($_POST['x_email']) ? $_POST['x_email'] : "",
                    'ship_to_first_name' => isset($_POST['x_ship_to_first_name']) ? $_POST['x_ship_to_first_name'] : "",
                    'ship_to_last_name' => isset($_POST['x_ship_to_last_name']) ? $_POST['x_ship_to_last_name'] : "",
                    'ship_to_company' => isset($_POST['x_ship_to_company']) ? $_POST['x_ship_to_company'] : "",
                    'ship_to_address' => isset($_POST['x_ship_to_address']) ? $_POST['x_ship_to_address'] : "",
                    'ship_to_city' => isset($_POST['x_ship_to_city']) ? $_POST['x_ship_to_city'] : "",
                    'ship_to_state' => isset($_POST['x_ship_to_state']) ? $_POST['x_ship_to_state'] : "",
                    'ship_to_zip' => isset($_POST['x_ship_to_zip']) ? $_POST['x_ship_to_zip'] : "",
                    'ship_to_country' => isset($_POST['x_ship_to_country']) ? $_POST['x_ship_to_country'] : "",
                    'discount_amount' => isset($_POST['discount_amount']) ? $_POST['discount_amount'] : "",
                    'status' => 'Complete',
                );

                $payment_id = $this->payment_model->add_payment($data_to_store);
                if (isset($payment_id) && !empty($payment_id)) {

                    $data_to_update = array(
                        'payment_status' => 'complete',
                        'status' => 'Active',
                    );

                    if ($this->user_model->update_users($user_id, $data_to_update) == TRUE) {
                        $where_uid = " AND user_id={$user_id}";
                        $username = $this->common_model->getFieldData('user', 'username', $where_uid);
                        $this->load->helper('email');
                        $this->load->library('email');
                        if (valid_email($_POST['x_email'])) {
                            $this->load->helper('email');
                            $this->load->library('email');
                            $this->email->clear(TRUE);
                            $get_admin_detail = get_admin_detail(); //common helper function for admin detail
                            $this->email->from($get_admin_detail['email'], $get_admin_detail['name']);
                            $this->email->to($_POST['x_email']);
                            $this->email->set_mailtype("html");
                            $this->email->subject('StacksGuide Payment Successfully Done!');
                            $mail_data['name'] = $username;
                            $mail_data['transaction_id'] = $_POST['x_trans_id'];
                            $mail_data['invoice_num'] = $_POST['x_invoice_num'];
                            $mail_data['payment_method'] = "Credit Card";
                            $mail_data['status'] = "Complete";
                            $mail_data['amount'] = $_POST['x_amount'];
                            $mail_data['firstname'] = $_POST['x_first_name'];
                            $mail_data['lastname'] = $_POST['x_last_name'];
                            $mail_data['company'] = $_POST['x_company'];
                            $mail_data['city'] = $_POST['x_city'];
                            $mail_data['state'] = $_POST['x_state'];
                            $mail_data['country'] = $_POST['x_country'];
                            $mail_data['zip'] = $_POST['x_zip'];
                            $message = $this->load->view('mail_templates/payment_mail', $mail_data, true);
                            $this->email->message($message);
                            $this->email->send();
                        }
                        $data = array(
                            'username' => $username,
                            'user_id' => $user_id,
                            'is_logged_in' => true
                        );
                        $this->session->set_userdata($data);
                        $data['flash_message'] = TRUE;
                        $this->session->set_flashdata('flash_message', 'Your payment has been successfully approval');
                        $this->session->set_flashdata('flash_class', 'alert-success');
                        redirect("home");
                    }
                }
            } else {
                if (isset($_POST['x_user_id'])) {
                    $user_id = $_POST['x_user_id'];
                } else {
                    $user_id = "0";
                }
                $data_to_store = array(
                    'user_id' => $user_id,
                    'payment_type' => isset($_POST['x_payment_type']) ? $_POST['x_payment_type'] : "",
                    'trans_id' => isset($_POST['x_trans_id']) ? $_POST['x_trans_id'] : "",
                    'invoice_num' => isset($_POST['x_invoice_num']) ? $_POST['x_invoice_num'] : "",
                    'description' => isset($_POST['x_description']) ? $_POST['x_description'] : "",
                    'amount' => isset($_POST['x_amount']) ? $_POST['x_amount'] : "",
                    'cust_id' => isset($_POST['x_cust_id']) ? $_POST['x_cust_id'] : "",
                    'first_name' => isset($_POST['x_first_name']) ? $_POST['x_first_name'] : "",
                    'last_name' => isset($_POST['x_last_name']) ? $_POST['x_last_name'] : "",
                    'company' => isset($_POST['x_company']) ? $_POST['x_company'] : "",
                    'address' => isset($_POST['x_address']) ? $_POST['x_address'] : "",
                    'city' => isset($_POST['x_city']) ? $_POST['x_city'] : "",
                    'state' => isset($_POST['x_state']) ? $_POST['x_state'] : "",
                    'zip' => isset($_POST['x_zip']) ? $_POST['x_zip'] : "",
                    'country' => isset($_POST['x_country']) ? $_POST['x_country'] : "",
                    'phone' => isset($_POST['x_phone']) ? $_POST['x_phone'] : "",
                    'email' => isset($_POST['x_email']) ? $_POST['x_email'] : "",
                    'ship_to_first_name' => isset($_POST['x_ship_to_first_name']) ? $_POST['x_ship_to_first_name'] : "",
                    'ship_to_last_name' => isset($_POST['x_ship_to_last_name']) ? $_POST['x_ship_to_last_name'] : "",
                    'ship_to_company' => isset($_POST['x_ship_to_company']) ? $_POST['x_ship_to_company'] : "",
                    'ship_to_address' => isset($_POST['x_ship_to_address']) ? $_POST['x_ship_to_address'] : "",
                    'ship_to_city' => isset($_POST['x_ship_to_city']) ? $_POST['x_ship_to_city'] : "",
                    'ship_to_state' => isset($_POST['x_ship_to_state']) ? $_POST['x_ship_to_state'] : "",
                    'ship_to_zip' => isset($_POST['x_ship_to_zip']) ? $_POST['x_ship_to_zip'] : "",
                    'ship_to_country' => isset($_POST['x_ship_to_country']) ? $_POST['x_ship_to_country'] : "",
                    'discount_amount' => isset($_POST['discount_amount']) ? $_POST['discount_amount'] : "",
                    'status' => 'Incomplete',
                );
                $payment_id = $this->payment_model->add_payment($data_to_store);
                if (isset($payment_id) && !empty($payment_id)) {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-error');
                    $this->session->set_flashdata('flash_message', 'Your payment has not been approval');
                    redirect("home");
                }
            }
        }
    }

    function city() {
        $data['main_content'] = 'escort_category_view';
        $data['city'] = $this->uri->segment(3);
        $data['count_escort'] = $this->home_model->CountEscort('city', $this->uri->segment(3));
        $this->load->view('includes/template', $data);
    }

    function confirm() {
        $email_encode = $this->uri->segment(3);
        if (!empty($email_encode)) {
            $email = base64url_decode($email_encode);
            $pass = generate_password();

            $data_to_store = array(
                'password' => md5($pass),
                'account_confirmed' => 'YES',
                'status' => 'Active'
            );

            $this->load->helper('email');
            $this->load->library('email');

//read parameters from $_POST using input class
// check is email addrress valid or no
            if (valid_email($email)) {
// compose email
                $get_admin_detail = get_admin_detail(); //common helper function for admin detail
                $this->email->from($get_admin_detail['email'], $get_admin_detail['name']);
                $this->email->to($email);
                $this->email->set_mailtype("html");
                $this->email->subject('Register confirmation and password for StacksGuide!');

                $users = $this->user_model->get_user_by_filed('primary_email', $email);
                $mail_data['password'] = $pass;
                $mail_data['username'] = $users[0]['username'];
                $message = $this->load->view('mail_templates/password_mail', $mail_data, true);
                $this->email->message($message);

                if (!$this->email->send()) {
                    $msgadd = "<strong>E-mail not sent </strong>"; //.$this->email->print_debugger();
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_class', 'alert-error');
                    $this->session->set_flashdata('flash_message', $msgadd);
                    redirect('signup');
                } else {

                    if ($this->user_model->update_user_by_email($email, $data_to_store)) {
                        $data['flash_message'] = TRUE;
                        $this->session->set_flashdata('flash_class', 'alert-success');
                        $this->session->set_flashdata('flash_message', '<strong>Thank you for confirming your account. Please check your email for username and password.</strong>');
                        redirect('home');
                    } else {
                        $data['flash_message'] = TRUE;
                        $this->session->set_flashdata('flash_class', 'alert-error');
                        $this->session->set_flashdata('flash_message', '<strong>Oh snap! change a few things up and try submitting again.</strong>');
                        redirect('signup');
                    }
                }
            }
        }
        $data['main_content'] = 'reset_password_view';
        $this->load->view('includes/template', $data);
    }

    public function logout() {
        $url = $this->session->flashdata('redirect_url');
        $this->load->helper('url');
        $reuired_sessiondata = array(
            'session_id' => $this->session->userdata('session_id'),
            'ip_address' => $this->session->userdata('ip_address'),
            'user_agent' => $this->session->userdata('user_agent'),
            'last_activity' => $this->session->userdata('last_activity'),
        );

        $array_items = array('username' => '', 'user_id' => '', 'type_of_membership' => '', 'is_logged_in' => false);
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
//set session required
        $this->session->set_userdata($reuired_sessiondata);
        redirect($url);
    }

    function escort_detail() {
        $build_ad_id = $this->uri->segment(3);
        $data['escort_detail'] = $this->home_model->escort_detail_by_id($build_ad_id);
        $data['main_content'] = 'escorts_view';
        $this->load->view('includes/template', $data);
    }

    function get_escort_details() {
        $city = $this->uri->segment(3);
        $category = $this->uri->segment(4);
        $where = " AND city_id={$city}";
        $data['name'] = $this->common_model->getFieldData('city', 'city_name', $where);
        $data['escort_detail'] = $this->home_model->escort_detail_by_city_cat_id($city, $category);
        $data['main_content'] = 'category_wise_escort_view';
        $data['country_opt'] = $this->home_model->getAllCountry();
        $data['city_opt'] = $this->home_model->getAllcity();
        $this->load->view('includes/template', $data);
    }

    function map_searching() {
        $data['state'] = $this->uri->segment(3);
        $data['parent_category'] = $this->category_model->get_front_category();
        $data['main_content'] = 'escort_map_searching_view';
        $this->load->view('includes/template', $data);
    }

    function popUpSession() {
        $data = array(
            'pop_pup_session' => $_POST['pop_pup_session'],
        );
        $this->session->set_userdata($data);
    }

}

