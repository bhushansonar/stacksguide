<?php

class Admin_build_ads extends CI_Controller {
    /**
     * name of the folder responsible for the views
     * which are manipulated by this controller
     * @constant string
     */

    const VIEW_FOLDER = 'admin/build_ads';

    /**
     * Responsable for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        //$this->load->model('site_language_model');
        $this->load->model('build_ads_model');
        $this->load->model('home_model');
        $this->load->model('common_model');
        $this->load->library('Common');
        $this->load->library('Upload');
        $this->load->library('upload');
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
        $config['base_url'] = base_url() . 'admin/build_ads';
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
            //echo "search_c->". $search_string; die;
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
            $data['count_products'] = $this->build_ads_model->count_build_ads($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if ($search_string) {
                if ($order) {
                    $data['build_ads'] = $this->build_ads_model->get_build_ads($search_string, $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['build_ads'] = $this->build_ads_model->get_build_ads($search_string, '', $order_type, $config['per_page'], $limit_end);
                }
            } else {
                if ($order) {
                    $data['build_ads'] = $this->build_ads_model->get_build_ads('', $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['build_ads'] = $this->build_ads_model->get_build_ads('', '', $order_type, $config['per_page'], $limit_end);
                }
            }
        } else {

            //clean filter data inside section
            $filter_session_data['build_ads_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products'] = $this->build_ads_model->count_build_ads();
            $data['build_ads'] = $this->build_ads_model->get_build_ads('', '', $order_type, $config['per_page'], $limit_end);

            $config['total_rows'] = $data['count_products'];
        }//!isset($search_string) && !isset($order)
        //initializate the panination helper
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/build_ads/list';
        $this->load->view('admin/includes/template', $data);
    }

    /**
     * Update item by his id
     * @return void
     */
    public function update() {
        //product id
        $data['build_advertisement_id'] = $id = $this->uri->segment(4);

        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $this->form_validation->set_rules('profile_view', 'Profile View', 'required');
            $this->form_validation->set_rules('color', 'Color', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');

            if ($this->form_validation->run()) {
                $build_id = $_POST['build_advertisement_id'];
                $profile_view = $_POST['profile_view'];
                $color = $_POST['color'];
                //if the insert has returned true then we show the flash message
                $redirect_url = $this->input->post('redirect_url');
                $ad_user_id = $this->home_model->get_userid_by_ad_id($build_id);
                $id = $ad_user_id[0]['user_id'];

                $data_to_store = array(
                    "profile_layout" => $profile_view,
                    "color" => "#" . $color
                );
                if ($this->build_ads_model->update_profile_layout($data_to_store, $id) == TRUE) {
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');

                redirect($redirect_url);
            }//validation run
        }
        $ad_user_id = $this->home_model->get_userid_by_ad_id($id);
        $user_id = $ad_user_id[0]['user_id'];
        $data['user_data'] = $this->build_ads_model->get_profile_layout_value_by_id($user_id);

        $data['main_content'] = 'admin/build_ads/edit';
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
        $this->build_ads_model->delete_build_ads($id);
        $this->session->set_flashdata('flash_message', 'delete');
        redirect('admin/build_ads/');
    }

//edit
}
