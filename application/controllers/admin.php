<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class Admin
 * TODO: DIY WORLDPAY STATS SYSTEM, PROCESSED PAYMENTS, HISTORY ETC
 */
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        if (!$this->ion_auth->is_admin()) {
            redirect('home');
        }

//        if (!$this->ion_auth->in_group('admin'))
//        {
//            redirect('/');
//        }

        //start to init the array
        $this->data = array();

        //load the model
        $this->load->model('Adminmodel');
        $this->load->model('Propertymodel');
        $this->load->model('Landlordmodel');
    }


    public function index()
    {
        $this->data['prop_count'] = $this->Propertymodel->get_overall_property_count();


        $this->load->view("admin/includes/admin_header_view.php");
        $this->load->view("admin/includes/admin_nav_view.php");
        $this->load->view("admin/admin_home_view.php", $this->data);
        $this->load->view("admin/includes/admin_footer_view.php");
    }

    public function frontend_settings()
    {
        $mode = $this->uri->segment(3);

        $this->data['frontend_data'] = $this->Adminmodel->get_frontend_data();


        if ($mode =='save') {
            $frontdata = array(
                'tab1_title' => $this->input->post('tab1_title'),
                'tab1_content' => $this->input->post('tab1_content'),
                'tab1_published' => $this->input->post('tab1_published'),
                'tab2_title' => $this->input->post('tab1_title'),
                'tab2_content' => $this->input->post('tab1_content'),
                'tab2_published' => $this->input->post('tab2_published'),
                'tab3_title' => $this->input->post('tab1_title'),
                'tab3_content' => $this->input->post('tab1_content'),
                'tab3_published' => $this->input->post('tab3_published'),
                'tab4_title' => $this->input->post('tab1_title'),
                'tab4_content' => $this->input->post('tab1_content'),
                'tab4_published' => $this->input->post('tab4_published')
            );

            $this->Adminmodel->save_frontend_data($frontdata);

            $this->data['save_success'] = 'You have successfully saved frontend data!';

            $this->load->view("admin/includes/admin_header_view.php");
            $this->load->view("admin/includes/admin_nav_view.php");
            $this->load->view("admin/admin_frontend_settings_view.php", $this->data);
            $this->load->view("admin/includes/admin_footer_view.php");
        }

        $this->load->view("admin/includes/admin_header_view.php");
        $this->load->view("admin/includes/admin_nav_view.php");
        $this->load->view("admin/admin_frontend_settings_view.php", $this->data);
        $this->load->view("admin/includes/admin_footer_view.php");
    }

    public function blog()
    {
        $this->load->model('Blogmodel');

        $mode = $this->uri->segment(3);

        $this->data['staff_profiles'] = $this->Adminmodel->get_staff_profiles();


        if ($mode =='new') {

            $this->load->view("admin/includes/admin_header_view.php");
            $this->load->view("admin/includes/admin_nav_view.php");
            $this->load->view("admin/admin_blog_view.php", $this->data);
            $this->load->view("admin/includes/admin_footer_view.php");

        } else if ($mode == 'post') {
            $blogdata = array(
                'title' => $this->input->post('title'),
                'post_data' => $this->input->post('post_data'),
                'author' => $this->input->post('author'),
                'front_page' => $this->input->post('front_page'),
                'published' => $this->input->post('published'),
                'date_published' => $this->input->post('date_published')
                //DATE WILL BE SET AUTO ON MODEL
                //TODO: SET UP THE DATE TO BE POSTED LIVE

            );

            $this->Blogmodel->add_blog($blogdata);

            $this->data['blog_listings'] = $this->Blogmodel->get_blogs();

            $this->data['blog_success'] = 'You have successfully added a new blog!';

            $this->load->view("admin/includes/admin_header_view.php");
            $this->load->view("admin/includes/admin_nav_view.php");
            $this->load->view("admin/admin_listblog_view.php", $this->data);
            $this->load->view("admin/includes/admin_footer_view.php");


        } else {
            $this->data['blog_listings'] = $this->Blogmodel->get_blogs();

            $this->load->view("admin/includes/admin_header_view.php");
            $this->load->view("admin/includes/admin_nav_view.php");
            $this->load->view("admin/admin_listblog_view.php", $this->data);
            $this->load->view("admin/includes/admin_footer_view.php");
        }
    }

    public function staff_profiles()
    {
        $this->data['staff_profiles'] = $this->Adminmodel->get_staff_profiles();

        $this->load->view("admin/includes/admin_header_view.php");
        $this->load->view("admin/includes/admin_nav_view.php");
        $this->load->view("admin/admin_staff_view.php", $this->data);
        $this->load->view("admin/includes/admin_footer_view.php");
    }

    public function payment_fees()
    {
        //Get price of each option
        $this->data['payment_details_basic'] = $this->Adminmodel->get_price(1);
        $this->data['payment_details_featured'] = $this->Adminmodel->get_price(2);
        $this->data['payment_details_premium'] = $this->Adminmodel->get_price(3);
        $this->data['payment_details_headliner'] = $this->Adminmodel->get_price(4);

        //Get description of each option
        $this->data['description_details_basic'] = $this->Adminmodel->get_description(1);
        $this->data['description_details_featured'] = $this->Adminmodel->get_description(2);
        $this->data['description_details_premium'] = $this->Adminmodel->get_description(3);
        $this->data['description_details_headliner'] = $this->Adminmodel->get_description(4);

        $this->load->view("admin/includes/admin_header_view.php");
        $this->load->view("admin/includes/admin_nav_view.php");
        $this->load->view("admin/admin_fees_view.php", $this->data);
        $this->load->view("admin/includes/admin_footer_view.php");
    }

    public function save_payment_details()
    {

        $this->Adminmodel->insert_price(1,$this->input->post('basic_price'));
        $this->Adminmodel->insert_price(2,$this->input->post('featured_price'));
        $this->Adminmodel->insert_price(3,$this->input->post('premium_price'));
        $this->Adminmodel->insert_price(4,$this->input->post('headliner_price'));

        $this->Adminmodel->insert_description(1,$this->input->post('basic_description'));
        $this->Adminmodel->insert_description(2,$this->input->post('featured_description'));
        $this->Adminmodel->insert_description(3,$this->input->post('premium_description'));
        $this->Adminmodel->insert_description(4, $this->input->post('headliner_description'));

        // set flashdata
        $this->session->set_flashdata('save_fees', 'PAYMENT DETAILS SAVED SUCCESSFULLY');

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function resources()
    {
        $this->load->view("admin/includes/admin_header_view.php");
        $this->load->view("admin/includes/admin_nav_view.php");
        $this->load->view("admin/admin_resources_view.php", $this->data);
        $this->load->view("admin/includes/admin_footer_view.php");
    }

    public function logout()
    {
        $this->ion_auth->logout();
        redirect('home');
    }

}