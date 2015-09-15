<?php

class Admin_warning_disclaimer extends CI_Controller {
    /**
     * name of the folder responsible for the views
     * which are manipulated by this controller
     * @constant string
     */

    const VIEW_FOLDER = 'admin/warning_disclaimer';

    /**
     * Responsable for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();

        //$this->load->model('site_warning_disclaimer_model');
        $this->load->model('warning_disclaimer_model');

        if (!$this->session->userdata('is_logged_in_admin')) {
            redirect('admin/login');
        }
        //echo "hiiii"; die;
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

        $config['base_url'] = base_url() . 'admin/warning_disclaimer';
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
            $data['count_products'] = $this->warning_disclaimer_model->count_warning_disclaimer($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if ($search_string) {
                if ($order) {
                    $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer($search_string, $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer($search_string, '', $order_type, $config['per_page'], $limit_end);
                }
            } else {
                if ($order) {
                    $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer('', $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer('', '', $order_type, $config['per_page'], $limit_end);
                }
            }
        } else {

            //clean filter data inside section
            $filter_session_data['warning_disclaimer_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products'] = $this->warning_disclaimer_model->count_warning_disclaimer();
            $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer('', '', $order_type, $config['per_page'], $limit_end);
            $config['total_rows'] = $data['count_products'];
        }//!isset($search_string) && !isset($order)
        //initializate the panination helper
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/warning_disclaimer/list';
        $this->load->view('admin/includes/template', $data);
    }

//index

    public function add() {
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            $this->form_validation->set_rules('description', 'Description', 'required');
            if (empty($_FILES['image']['name'])) {
                $this->form_validation->set_rules('image', 'Image', 'required');
            }
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');

            //echo $password = $this->functions->get_something(); die;
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                $data = $this->functions->do_upload('image', './uploads/warning_disclaimer/', $allowtype = 'gif|jpg|png', $maxWidth = "265", $maxHeight = "550", $minWidth = "0", $minHeight = "0");

                if (!empty($data['upload_data'])) {
                    if (isset($data['upload_data'])) {
                        $file_name = $data['upload_data']['file_name'];
                    } else {
                        $file_name = "";
                    }
                } else {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'error');
                    redirect('admin/warning_disclaimer/add');
                }


                $data_to_store = array(
                    'description' => $this->input->post('description'),
                    'image' => $file_name,
                    'status' => $this->input->post('status'),
                );

                if ($this->warning_disclaimer_model->store_warning_disclaimer($data_to_store)) {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'add');
                    redirect('admin/warning_disclaimer/');
                    //redirect('admin/warning_disclaimer'.'');
                } else {
                    $data['flash_message'] = FALSE;
                }
            }
        }
        //load the view
        //$data['site_warning_disclaimer'] = $this->site_warning_disclaimer_model->get_warning_disclaimer('', '','', '', '','Active');
        $data['main_content'] = 'admin/warning_disclaimer/add';
        $this->load->view('admin/includes/template', $data);
    }

    /**
     * Update item by his id
     * @return void
     */
    public function update() {
        $id = $this->uri->segment(4);
//if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            //form validation
            $this->form_validation->set_rules('description', 'Description', 'required');
//            if (empty($_FILES['image']['name'])) {
//                $this->form_validation->set_rules('image', 'Image', 'required');
//            }
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run()) {

                $data = $this->functions->do_upload('image', './uploads/warning_disclaimer/', $allowtype = 'gif|jpg|png', $maxWidth = "265", $maxHeight = "550", $minWidth = "0", $minHeight = "0");

                if (!empty($data['upload_data'])) {

                    if (isset($data['upload_data'])) {
                        $file_name = $data['upload_data']['file_name'];
                        @unlink("./uploads/warning_disclaimer/" . $this->input->post('old_image'));
                    } else {

                        $file_name = $this->input->post('old_image');
                    }
                } else {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'error');
                    redirect('admin/warning_disclaimer/update/' . $id);
                }
                $redirect_url = $this->input->post('redirect_url');
                $data_to_store = array(
                    'description' => $this->input->post('description'),
                    'image' => $file_name,
                    'status' => $this->input->post('status'),
                );
                if ($this->warning_disclaimer_model->update_warning_disclaimer($id, $data_to_store) == TRUE) {
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');
                //redirect('admin/warning_disclaimer/');
                redirect($redirect_url);
            }//validation run
        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //product data
        //$data['site_warning_disclaimer'] = $this->site_warning_disclaimer_model->get_warning_disclaimer('', '','', '', '','Active');
        $data['warning_disclaimer'] = $this->warning_disclaimer_model->get_warning_disclaimer_by_id($id);
        //load the view
        $data['main_content'] = 'admin/warning_disclaimer/edit';
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
        $this->warning_disclaimer_model->delete_warning_disclaimer($id);
        $this->session->set_flashdata('flash_message', 'delete');
        redirect('admin/warning_disclaimer/');
    }

//edit
}

