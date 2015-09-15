<?php

class Admin_membership_price extends CI_Controller {
    /**
     * name of the folder responsible for the views
     * which are manipulated by this controller
     * @constant string
     */

    const VIEW_FOLDER = 'admin/membership_price';

    /**
     * Responsable for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        //$this->load->model('site_language_model');
        $this->load->model('membership_price_model');

        if (!$this->session->userdata('is_logged_in_admin')) {
            redirect('admin/login');
        }
    }

    /**
     * Load the main view with all the current model model's data.
     * @return void
     */
    public function index() {

        //all the posts sent by the view
        $search_string = $this->input->post('search_string');
        $order = $this->input->post('order');
        $order_type = $this->input->post('order_type');

        //pagination settings
        $config['per_page'] = 20;

        $config['base_url'] = base_url() . 'admin/membership_price';
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        //limit end
        $page = $this->uri->segment(3);

        //math to get the initial record to be select in the database
        $limit_end = ($page * $config['per_page']) - $config['per_page'];
        if ($limit_end < 0) {
            $limit_end = 0;
        }

        //if order type was changed
        if ($order_type) {
            $filter_session_data['order_type'] = $order_type;
        } else {
            //we have something stored in the session?
            if ($this->session->userdata('order_type')) {
                $order_type = $this->session->userdata('order_type');
            } else {
                //if we have nothing inside session, so it's the default "Asc"
                $order_type = 'DESC';
            }
        }
        //make the data type var avaible to our view
        $data['order_type_selected'] = $order_type;


        //we must avoid a page reload with the previous session data
        //if any filter post was sent, then it's the first time we load the content
        //in this case we clean the session filter data
        //if any filter post was sent but we are in some page, we must load the session data
        //filtered && || paginated
        if ($search_string !== false && $order !== false || $this->uri->segment(3) == true) {

            /*
              The comments here are the same for line 79 until 99

              if post is not null, we store it in session data array
              if is null, we use the session data already stored
              we save order into the the var to load the view with the param already selected
             */
            if ($search_string) {
                $filter_session_data['search_string_selected'] = $search_string;
            } else {
                $search_string = $this->session->userdata('search_string_selected');
            }
            $data['search_string_selected'] = $search_string;

            if ($order) {
                $filter_session_data['order'] = $order;
            } else {
                $order = $this->session->userdata('order');
            }
            $data['order'] = $order;

            //save session data into the session
            if (isset($filter_session_data)) {
                $this->session->set_userdata($filter_session_data);
            }

            //fetch sql data into arrays
            $data['count_products'] = $this->membership_price_model->count_membership_price($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if ($search_string) {
                if ($order) {
                    $data['membership_price'] = $this->membership_price_model->get_membership_price($search_string, $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['membership_price'] = $this->membership_price_model->get_membership_price($search_string, '', $order_type, $config['per_page'], $limit_end);
                }
            } else {
                if ($order) {
                    $data['membership_price'] = $this->membership_price_model->get_membership_price('', $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['membership_price'] = $this->membership_price_model->get_membership_price('', '', $order_type, $config['per_page'], $limit_end);
                }
            }
        } else {

            //clean filter data inside section
            $filter_session_data['membership_price_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products'] = $this->membership_price_model->count_membership_price();
            $data['membership_price'] = $this->membership_price_model->get_membership_price('', '', $order_type, $config['per_page'], $limit_end);
            $config['total_rows'] = $data['count_products'];
        }//!isset($search_string) && !isset($order)
        //initializate the panination helper
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/membership_price/list';
        $this->load->view('admin/includes/template', $data);
    }

//index

    public function add() {

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            //$this->form_validation->set_rules('membership_price_id', 'membership_price_id', 'required');
            $this->form_validation->set_rules('membership_duration', 'Membership Duration', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');


            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                //if the insert has returned true then we show the flash message
                $data_to_store = array(
                    "membership_duration" => $this->input->post('membership_duration'),
                    "price" => $this->input->post('price')
                );
                if ($this->membership_price_model->store_membership_price($data_to_store)) {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'add');
                    redirect('admin/membership_price/');
                    //redirect('admin/membership_price'.'');
                } else {
                    $data['flash_message'] = FALSE;
                }
            }
        }
        $data['membership_duration_opt'] = array('' => 'Select', '1' => '1 Month', '2' => '2 Months', '3' => '3 Months', '4' => '4 Months', '5' => '5 Months', '6' => '6 Months', '7' => '7 Months', '8' => '8 Months', '9' => '9 Months', '10' => '10 Months', '11' => '11 Months', '12' => '12 Months');
        $data['main_content'] = 'admin/membership_price/add';
        $this->load->view('admin/includes/template', $data);
    }

    /**
     * Update item by his id
     * @return void
     */
    public function update() {
        //product id
        $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //form validation
            $this->form_validation->set_rules('membership_duration', 'Membership Duration', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');
//if the form has passed through the validation
            if ($this->form_validation->run()) {
//if the insert has returned true then we show the flash message
                $redirect_url = $this->input->post('redirect_url');
                foreach ($_POST as $k => $v) {
                    if (in_array($k, array('redirect_url'))) {
                        unset($_POST[$k]);
                    }
                }
                $data_to_store = array(
                    "membership_duration" => $this->input->post('membership_duration'),
                    "price" => $this->input->post('price')
                );
                if ($this->membership_price_model->update_membership_price($id, $data_to_store) == TRUE) {
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');
                //redirect('admin/membership_price/');
                redirect($redirect_url);
                //redirect('admin/membership_price/update/'.$id.'');
            }//validation run
        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //product data


        $data['membership_price'] = $this->membership_price_model->get_membership_price_by_id($id);
        $data['membership_duration_opt'] = array('' => 'Select', '1' => '1 Month', '2' => '2 Months', '3' => '3 Months', '4' => '4 Months', '5' => '5 Months', '6' => '6 Months', '7' => '7 Months', '8' => '8 Months', '9' => '9 Months', '10' => '10 Months', '11' => '11 Months', '12' => '12 Months');

//load the view
        $data['main_content'] = 'admin/membership_price/edit';
        $this->load->view('admin/includes/template', $data);
    }

//update

    /**
     * Delete product by his id
     * @return void
     */
    public function delete() {
        //product id
        $id = $this->uri->segment(4);
        $this->membership_price_model->delete_membership_price($id);
        $this->session->set_flashdata('flash_message', 'delete');
        redirect('admin/membership_price/');
    }

//edit
}
