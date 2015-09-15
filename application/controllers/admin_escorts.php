<?php

class Admin_escorts extends CI_Controller {
    /**
     * name of the folder responsible for the views
     * which are manipulated by this controller
     * @constant string
     */

    const VIEW_FOLDER = 'admin/escorts';

    /**
     * Responsable for auto load the model
     * @return void
     */
    public function __construct() {
        parent::__construct();
        //$this->load->model('site_language_model');
        $this->load->model('escorts_model');
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

        $config['base_url'] = base_url() . 'admin/escorts';
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
            $data['count_products'] = $this->escorts_model->count_escorts($search_string, $order);
            $config['total_rows'] = $data['count_products'];

            //fetch sql data into arrays
            if ($search_string) {
                if ($order) {
                    $data['escorts'] = $this->escorts_model->get_escorts($search_string, $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['escorts'] = $this->escorts_model->get_escorts($search_string, '', $order_type, $config['per_page'], $limit_end);
                }
            } else {
                if ($order) {
                    $data['escorts'] = $this->escorts_model->get_escorts('', $order, $order_type, $config['per_page'], $limit_end);
                } else {
                    $data['escorts'] = $this->escorts_model->get_escorts('', '', $order_type, $config['per_page'], $limit_end);
                }
            }
        } else {

            //clean filter data inside section
            $filter_session_data['escorts_selected'] = null;
            $filter_session_data['search_string_selected'] = null;
            $filter_session_data['order'] = null;
            $filter_session_data['order_type'] = null;
            $this->session->set_userdata($filter_session_data);

            //pre selected options
            $data['search_string_selected'] = '';
            $data['order'] = 'id';

            //fetch sql data into arrays
            $data['count_products'] = $this->escorts_model->count_escorts();
            $data['escorts'] = $this->escorts_model->get_escorts('', '', $order_type, $config['per_page'], $limit_end);

            $config['total_rows'] = $data['count_products'];
        }//!isset($search_string) && !isset($order)
        //initializate the panination helper
        $this->pagination->initialize($config);

        //load the view
        $data['main_content'] = 'admin/escorts/list';
        $this->load->view('admin/includes/template', $data);
    }

    public function age_validation($str) {
        if ($str <= 17) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function add() {

        $data['state_opt'] = array("" => "Select");
        $data['city_opt'] = array("" => "Select");
        $data['subcategory_opt'] = array("" => "Select");
        $data['city'] = "";
        $data['state'] = "";
        $data['country'] = "";
        $data['subcategory'] = "";
        $data['category'] = "";
        $data['gender_opt'] = array("" => "Select", "female" => "Female", "transsexual" => "Transsexual", "female_to_male_transsexual" => "Female to Male Transsexual", "hermaphrodite" => "Hermaphrodite", "male" => "Male");
        $where = " AND parent_id= '0' ";
        $data['main_category_opt'] = $this->common_model->getDDArray('category', 'category_id', 'category_name', $where);

        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            //form validation
            //$this->form_validation->set_rules('images', 'Images', 'required');
            $this->form_validation->set_rules('model_name', 'Model Name', 'required');
            $this->form_validation->set_rules('tagline', 'Tag Line', 'required');
            $this->form_validation->set_rules('age', 'Age', 'required|callback_age_validation');
            $this->form_validation->set_message('age_validation', 'Your Age is not applicable for this ads');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            //$this->form_validation->set_rules('cover_image', 'Cover Image', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('website', 'Website', 'required');
            $this->form_validation->set_rules('category', 'Main Category', 'required'); //
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('category', 'Main Category', 'required');
            $this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric|max_length[10]|regex_match[/^[0-9().-]+$/]|xss_clean');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');
            //if the form has passed through the validation
            if ($this->form_validation->run()) {
                $category = $this->input->post('category');
                $subcategory = $this->input->post('subcategory');
                if (!empty($category) && !empty($subcategory)) {
                    $category_id = $category . "," . $subcategory;
                }
                $path = './uploads/advertisement';
                $this->load->library('upload');
                $this->upload->initialize(array(
                    "upload_path" => $path,
                    "allowed_types" => "*",
                    'min_width' => 500,
                    'min_height' => 500,
                ));
                if ($this->upload->do_multi_upload("images")) {
                    $file_name = $this->upload->get_multi_upload_data();
                    foreach ($file_name as $value) {
                        $images[] = $value['file_name'];
                    }
                } else {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'required');
                    redirect('admin/escorts/add');
                }
                $cover_image_data = $this->functions->do_upload('cover_image', './uploads/advertisement/cover', $allowtype = 'gif|jpg|png', $maxWidth = "0", $maxHeight = "0", $minWidth = "1200", $minHeight = "324");

                if (!empty($cover_image_data['upload_data'])) {
                    if (isset($cover_image_data['upload_data'])) {
                        $cover_image = $cover_image_data['upload_data']['file_name'];
                    } else {
                        $cover_image = "";
                    }
                } else {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'error');
                    redirect('admin/escorts/add');
                }


                $_POST['images'] = implode(',', $images);
                $data_to_store = array(
                    'user_id' => $this->input->post('user_id'),
                    'category_id' => $category_id,
                    'images' => $this->input->post('images'),
                    'advertisement' => $this->input->post('model_name'),
                    'tagline' => $this->input->post('tagline'),
                    'age' => $this->input->post('age'),
                    'gender' => $this->input->post('gender'),
                    'phone_number' => $this->input->post('phone_number'),
                    'email' => $this->input->post('email'),
                    'website' => $this->input->post('website'),
                    'country_id' => $this->input->post('country'),
                    'state_id' => $this->input->post('state'),
                    'city_id' => $this->input->post('city'),
                    'description' => $this->input->post('description'),
                    'disclaimer' => $this->input->post('disclaimer'),
                    'hair' => $this->input->post('hair'),
                    'eye' => $this->input->post('eyes'),
                    'height_ft' => $this->input->post('height_ft'),
                    'weight' => $this->input->post('weight'),
                    'bust' => $this->input->post('bust'),
                    'cup' => $this->input->post('cup'),
                    'waist' => $this->input->post('waist'),
//                    'affil' => $this->input->post('affil'),
                    'hips' => $this->input->post('hips'),
                    'ethnicity_to' => $this->input->post('ethnicity'),
                    'available_to' => $this->input->post('available'),
                    'status' => $this->input->post('status'),
                    'cover_image' => $cover_image,
                );
//                echo "<pre>";
//                print_r($data_to_store);
//                exit;

                if ($this->escorts_model->addEscorts($data_to_store)) {
                    $data['flash_message'] = TRUE;
                    $this->session->set_flashdata('flash_message', 'add');
                    redirect('admin/escorts/');
                    //redirect('admin/escorts'.'');
                } else {
                    $data['flash_message'] = FALSE;
                }
            }
        }
        $data['user_id'] = $this->session->userdata('user_id');
        $data['main_content'] = 'admin/escorts/add';
        $this->load->view('admin/includes/template', $data);
    }

    /**
     * Update item by his id
     * @return void
     */
    public function update() {
        //product id
        $id = $this->uri->segment(4);
        $data['user_id'] = $this->session->userdata('user_id');
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $this->form_validation->set_rules('model_name', 'Model Name', 'required');
            $this->form_validation->set_rules('tagline', 'Tag Line', 'required');
            $this->form_validation->set_rules('age', 'Age', 'required|callback_age_validation');
            $this->form_validation->set_message('age_validation', 'Your Age is not applicable for this ads');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
            //$this->form_validation->set_rules('cover_image', 'Cover Image', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('website', 'Website', 'required');
            $this->form_validation->set_rules('category', 'Main Category', 'required'); //
            $this->form_validation->set_rules('country', 'country', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('city', 'City', 'required');
            $this->form_validation->set_rules('category', 'Main Category', 'required');
            $this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
            $this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|numeric|max_length[10]|regex_match[/^[0-9().-]+$/]|xss_clean');

            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">&#215;</a><strong>', '</strong></div>');

            if ($this->form_validation->run()) {
                $category = $this->input->post('category');
                $subcategory = $this->input->post('subcategory');
                if (!empty($category) && !empty($subcategory)) {
                    $category_id = $category . "," . $subcategory;
                }

                $this->load->library('upload');
                $path = './uploads/advertisement';

                $this->upload->initialize(array(
                    "upload_path" => $path,
                    "allowed_types" => "*"
                ));

                if ($this->upload->do_multi_upload("images")) {

                    $file_name = $this->upload->get_multi_upload_data();
                    foreach ($file_name as $value) {
                        $images[] = $value['file_name'];
                    }

                    $_POST['images'] = implode(',', $images);
                } else {
                    $_POST['images'] = $this->input->post('old_images');
                }
                $cover_image_data = $this->functions->do_upload('cover_image', './uploads/advertisement/cover', $allowtype = 'gif|jpg|png', $maxWidth = "0", $maxHeight = "0", $minWidth = "1200", $minHeight = "324");
//                if (!empty($cover_image_data['upload_data'])) {

                if (isset($cover_image_data['upload_data'])) {
                    $cover_image = $cover_image_data['upload_data']['file_name'];
                    @unlink("./uploads/advertisement/cover/" . $this->input->post('old_cover_image'));
                } else {
                    $cover_image = $this->input->post('old_cover_image');
                }
//                } else {
//                    $data['flash_message'] = TRUE;
//                    $this->session->set_flashdata('flash_message', 'error');
//                    redirect('admin/escorts/edit/' . $id);
//                }
                //if the insert has returned true then we show the flash message
                $redirect_url = $this->input->post('redirect_url');
                foreach ($_POST as $k => $v) {
                    if (in_array($k, array('redirect_url'))) {
                        unset($_POST[$k]);
                    }
                }
                $data_to_store = array(
                    'user_id' => $this->input->post('user_id'),
                    'category_id' => $category_id,
                    'images' => $this->input->post('images'),
                    'advertisement' => $this->input->post('model_name'),
                    'tagline' => $this->input->post('tagline'),
                    'age' => $this->input->post('age'),
                    'gender' => $this->input->post('gender'),
                    'phone_number' => $this->input->post('phone_number'),
                    'email' => $this->input->post('email'),
                    'website' => $this->input->post('website'),
                    'country_id' => $this->input->post('country'),
                    'state_id' => $this->input->post('state'),
                    'city_id' => $this->input->post('city'),
                    'description' => $this->input->post('description'),
                    'disclaimer' => $this->input->post('disclaimer'),
                    'hair' => $this->input->post('hair'),
                    'eye' => $this->input->post('eyes'),
                    'height_ft' => $this->input->post('height_ft'),
                    'weight' => $this->input->post('weight'),
                    'bust' => $this->input->post('bust'),
                    'cup' => $this->input->post('cup'),
                    'waist' => $this->input->post('waist'),
//                    'affil' => $this->input->post('affil'),
                    'hips' => $this->input->post('hips'),
                    'ethnicity_to' => $this->input->post('ethnicity'),
                    'available_to' => $this->input->post('available'),
                    'status' => $this->input->post('status'),
                    'cover_image' => $cover_image,
                );

                if ($this->escorts_model->update_escorts($data_to_store, $id) == TRUE) {
                    $this->session->set_flashdata('flash_message', 'updated');
                } else {
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                $this->session->set_flashdata('flash_message', 'update');

                redirect($redirect_url);
            }//validation run
        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data
        //product data
        $data['gender_opt'] = array("" => "Select", "female" => "Female", "transsexual" => "Transsexual", "female_to_male_transsexual" => "Female to Male Transsexual", "hermaphrodite" => "Hermaphrodite", "male" => "Male");
        $where = " AND parent_id= '0' ";
        $data['main_category_opt'] = $this->common_model->getDDArray('category', 'category_id', 'category_name', $where);
        $data['country_opt'] = $this->common_model->getDDArray('country', 'country_id', 'country_name');
        $data['escorts'] = $this->escorts_model->get_escorts_by_id($id);

        if ($data['escorts'][0]['country_id'] != "") {
            $data['state_opt'] = $this->common_model->getDDArray('state', 'state_id', 'state_name', " AND country_id='{$data['escorts'][0]['country_id']}'");
        }
        if ($data['escorts'][0]['state_id'] != "") {
            $data['city_opt'] = $this->common_model->getDDArray('city', 'city_id', 'city_name', " AND state_id='{$data['escorts'][0]['state_id']}'");
        }
//        echo "<pre>";
//        print_r($data['escorts'][0]['category_id']);
//        exit;
        $str = explode(',', $data['escorts'][0]['category_id']);
        $data['category'] = $cat = $str[0];
        $data['subcategory'] = $str[1];

        if ($data['escorts'][0]['category_id'] != "") {
            $where_subcategory = " AND parent_id!= '0' AND parent_id='{$cat}'";
            $data['subcategory_opt'] = $this->common_model->getDDArray('category', 'category_id', 'category_name', $where_subcategory);
        }
        $data['main_content'] = 'admin/escorts/edit';
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
        $this->escorts_model->delete_escorts($id);
        $this->session->set_flashdata('flash_message', 'delete');
        redirect('admin/escorts/');
    }

//edit
}
