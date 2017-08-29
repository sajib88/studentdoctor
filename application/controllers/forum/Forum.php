<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 1:18 AM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');
    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Forum Index';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['social'] = $this->global_model->get('forum_category', array('sec_id' => '1'));
        $data['allprof'] = $this->global_model->get('forum_category', array('sec_id' => '2'));
        $user_type = $this->session->userdata('user_type');
        $data['dynamicprofession'] = $this->global_model->get('forum_category', array('sec_id' => '3', 'group_id' => $user_type));


        $this->load->view('header', $data);
        $this->load->view('forum/board', $data);
        $this->load->view('footer');
        
        
    }

    public function listcat(){
        $data = array();
        $data['page_title'] = 'Forum Post';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));


        $user_type = $this->session->userdata('user_type');
        $data['getid']  = $this->uri->segment('4');

        $data['postdeatils'] = $this->global_model->get('forum_post', array('cat_id' => $data['getid']));

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('deatils', 'deatils', 'trim');



            if ($this->form_validation->run() == true) {

                $save['cat_id'] = $postData['hiddencat'];
                $save['author_id'] = $loginId;
                $save['title'] = $postData['title'];
                $save['deatils'] = $postData['title'];
                $save['status'] = '1';

                //// (image upload funtion)
                uploadforum();

                if ($this->upload->do_upload('attachment')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['attachment'] = $pic1['name'];

                }

                if ($ref_id = $this->global_model->insert('forum_post', $save))
                {

                    $this->session->set_flashdata('message', 'New Forum Post Create Successfully');
                    $redirect_link = base_url() . 'Forum/forum/listcat/'. $postData['hiddencat'];
                    redirect($redirect_link);

                }
            }
        }

        $this->load->view('header', $data);
        $this->load->view('forum/listcatname', $data);
        $this->load->view('footer');


    }

    public function discuss(){
        $data = array();
        $data['page_title'] = 'Add Product';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['getid']  = $this->uri->segment('4');
        $data['postdeatils'] = $this->global_model->get_data('forum_post', array('post_id' => $data['getid']));
        /// Author
        $data['user_post_info'] = $this->global_model->get_data('users', array('id' => $data['postdeatils']['author_id']));
        /// Comments retrive
        $data['comments'] = $this->global_model->get('forum_comments', array('post_id' => $data['getid']));

        /// comments author
        $data['getcommentsid'] = $this->global_model->get_data('forum_comments', array('post_id' => $data['getid']));
        $data['user_comments_info'] = $this->global_model->get_data('users', array('id' => $data['getcommentsid']['user_id']));



        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('comments_title', 'comments_title', 'trim');
            $this->form_validation->set_rules('comments_details', 'comments_details', 'trim');



            if ($this->form_validation->run() == true) {

                $save['post_id'] = $postData['postid'];
                $save['user_id'] = $loginId;
                $save['comments_title'] = $postData['comments_title'];
                $save['comments_details'] = $postData['comments_details'];
                $save['status'] = '1';

                //// (image upload funtion)
                uploadforum();

                if ($this->upload->do_upload('attachment')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['attachment'] = $pic1['name'];

                }


                if ($ref_id = $this->global_model->insert('forum_comments', $save)) {

                    $this->session->set_flashdata('message', 'New Forum Post Create Successfully');
                    $redirect_link = base_url() . 'Forum/forum/discuss/'. $postData['postid'];
                    redirect($redirect_link);

                }
            }
        }


        $this->load->view('header', $data);
        $this->load->view('forum/discusstopic', $data);
        $this->load->view('footer');


    }


    public function addcat()
    {
        $data = array();
        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Forum Category';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $user_type = $this->session->userdata('user_type');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('cat_title', 'cat_title', 'trim');


            if ($this->form_validation->run() == true) {

                $save['sec_id'] = '3';
                $save['cat_title'] = $postData['cat_title'];
                $save['added_by'] = $loginId;
                $save['group_id'] = $user_type;
                $save['total_post'] = '0';
                $save['status'] = '0';

               if ($ref_id = $this->global_model->insert('forum_category', $save)) {

                    $this->session->set_flashdata('message', 'New Forum category Create Successfully, Admin Will Approve');

                }
            }
        }
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('forum/catadd', $data);
        $this->load->view('footer');
    }


    public function edit()
    {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('name', 'name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('type', 'type', 'trim');
            $this->form_validation->set_rules('price', 'price', 'trim');
            $this->form_validation->set_rules('special_price', 'special_price', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('zip', 'zip', 'trim');
            $this->form_validation->set_rules('seller_address1', 'seller_address1', 'trim');
            $this->form_validation->set_rules('seller_address2', 'seller_address2', 'trim');
            $this->form_validation->set_rules('seller_name', 'seller_name', 'trim');
            $this->form_validation->set_rules('seller_email', 'seller_email', 'trim');
            $this->form_validation->set_rules('seller_website', 'seller_website', 'trim');
            $this->form_validation->set_rules('seller_phone', 'seller_phone', 'trim');
            $this->form_validation->set_rules('seller_fax', 'seller_fax', 'trim');


            if ($this->form_validation->run() == true) {

                $save['uid'] = $loginId;
                $save['name'] = $postData['name'];
                $save['description'] = $postData['description'];
                $save['type'] = $postData['type'];
                $save['price'] = $postData['price'];
                $save['special_price'] = $postData['special_price'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['zip'] = $postData['zip'];
                $save['seller_address1'] = $postData['seller_address1'];
                $save['seller_address2'] = $postData['seller_address2'];
                $save['seller_name'] = $postData['seller_name'];
                $save['seller_email'] = $postData['seller_email'];
                $save['seller_website'] = $postData['seller_website'];
                $save['seller_phone'] = $postData['seller_phone'];
                $save['seller_fax'] = $postData['seller_fax'];


                //// (image upload funtion)
                uploadProduct();
                ///

                //// PHOTO UPLOAD
                if ($this->upload->do_upload('photo_primary')) {
                    $fileInfo = $this->upload->data();
                    $pic1['name'] = $fileInfo['file_name'];
                    $save['photo_primary'] = $pic1['name'];
                }

                if ($this->upload->do_upload('photo_2')) {
                    $fileInfo = $this->upload->data();
                    $pic2['name'] = $fileInfo['file_name'];
                    $save['photo_2'] = $pic2['name'];
                }

                if ($this->upload->do_upload('photo_3')) {
                    $fileInfo = $this->upload->data();
                    $pic3['name'] = $fileInfo['file_name'];
                    $save['photo_3'] = $pic3['name'];
                }


                //// File UPLOAD
                if ($this->upload->do_upload('primary_file')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['primary_file'] = $file1['name'];
                }
                if ($this->upload->do_upload('file_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['file_2'] = $file1['name'];
                }

                //sound upload
                if ($this->upload->do_upload('primary_sound')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['primary_sound'] = $sound['name'];
                }
                //sound upload
                if ($this->upload->do_upload('sound1')) {
                    $fileInfo = $this->upload->data();
                    $sound['name'] = $fileInfo['file_name'];
                    $save['sound1'] = $sound['name'];
                }
                //video upload
                if ($this->upload->do_upload('primary_video')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['primary_video'] = $video['name'];
                }

                //video upload
                if ($this->upload->do_upload('video1')) {
                    $fileInfo = $this->upload->data();
                    $video['name'] = $fileInfo['file_name'];
                    $save['video1'] = $video['name'];
                }

                $save['profession_view'] = implode(',', $postData['profession_view']);
                $save['status'] = 1;
                $id = $this->uri->segment('4');

                /* echo $id;
                 print '<pre>';
                 print_r($save);die;*/
                if ($this->global_model->update('product', $save, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Edit Success');
                    //redirect('profile/profile');
                }
            }
        }
        $id = $this->uri->segment('4');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $data['states'] = $this->global_model->get('states');
        $data['login_id'] = $loginId;


        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $data['editProduct'] = $this->global_model->get_data('product', array('id' => $id));

        $this->load->view('header', $data);
        $this->load->view('products/edit', $data);
        $this->load->view('footer');


    }

//// for remove
    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('product', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('product/products/myproduct');
        }

    }





//// SHW ALL PRODUCT
    public function allmypostlist()
    {

        $data = array();
        $data['page_title'] = 'Forum Index';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['allmypostlist'] = $this->global_model->get('forum_post', array('author_id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('forum/postlist', $data);
        $this->load->view('footer');

    }

    //// SHW ALL PRODUCT
    public function allmycomments()
    {

        $data = array();
        $data['page_title'] = 'Forum Index';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['allmycomments'] = $this->global_model->get('forum_comments', array('user_id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('forum/allmycomments', $data);
        $this->load->view('footer');

    }


    //// Detisls View
    public function layoutfull()
    {

        $data = array();

        $data['page_title'] = 'Private Web';
        $data['tabActive'] = 'private';
        $data['error'] = '';
        $id = $this->uri->segment('4');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));



        $data['layoutfull'] = $this->global_model->get_data('product', array('id' => $id));
        $data['countries'] = $this->global_model->get('countries');
        $data['main_cat'] = $this->global_model->get('classified_main_cat');

        $this->load->view('header', $data);
        $this->load->view('products/layoutfull', $data);
        $this->load->view('footer');


    }






}

?>