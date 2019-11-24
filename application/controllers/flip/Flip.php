<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Flip extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }

        $level = check_level_1();
        if($level ['user_level'] == '1')
        {
            redirect('step1');
        }
        else{

        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'FLip Profile';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {


            $save['uid'] = $this->input->post('uid');
            $save['profession'] = $this->input->post('profession');
            $save['parent_profession'] = $this->input->post('parent_profession');
            $save['full_name'] = $this->input->post('full_name');
            $save['user_name'] = $this->input->post('user_name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['country'] = $this->input->post('country');
            $save['state'] = $this->input->post('state');
            $save['city'] = $this->input->post('city');
            $save['gender'] = $this->input->post('gender');
            $save['postal_code'] = $this->input->post('postal_code');
            $save['profilepicture'] = $this->input->post('profilepicture');
            $save['status'] = 1;

            if ($ref_id = $this->global_model->insert('flip_users', $save)) {

                $this->session->set_flashdata('message2', 'New Category Create successfully.');
                redirect(base_url('flip'));
            }

        }







        $data['countries'] = $this->global_model->get('countries');


        $data['profession'] = $this->global_model->profession_get();
        $data['sub_profession'] = $this->global_model->get('profession_sub');

        $flipchecking = $this->global_model->get_data('flip_users', array('uid' => $loginId, 'status' => '1'));
        if(!empty($flipchecking['uid'] != $loginId))
        {


            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $countryInfo = $this->global_model->get_data('countries', array('id' => $data['user_info']['country']));
            $data['states'] = $this->global_model->get('states', array('country_id' => $countryInfo['id']));

            $this->load->view('header', $data);
            $this->load->view('flip/profile/user_add', $data);
            $this->load->view('footer');
        }
        else{


            $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
            $countryInfo = $this->global_model->get_data('countries', array('id' => $data['user_info']['country']));
            $data['states'] = $this->global_model->get('states', array('country_id' => $countryInfo['id']));

            $this->load->view('flip/flip_header', $data);
            $this->load->view('flip/profile/view', $data);
            $this->load->view('flip/flip_footer');
        }


    }


    public function update() {

        $data = array();
        $data['page_title'] = 'Flip Profile Update';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {
            $postData = $this->input->post();

            $save['uid'] = $this->input->post('uid');
            //$save['profession'] = (!empty($postData['sub_pro']))?$postData['sub_pro']:$this->input->post('profession');
            //$save['parent_profession'] = $this->input->post('profession');
            $save['full_name'] = $this->input->post('full_name');
            $save['user_name'] = $this->input->post('user_name');
            $save['email'] = $this->input->post('email');
            $save['phone'] = $this->input->post('phone');
            $save['country'] = $this->input->post('country');
            $save['state'] = $this->input->post('state');
            $save['city'] = $this->input->post('city');
            $save['gender'] = $this->input->post('gender');
            $save['postal_code'] = $this->input->post('postal_code');
            //$save['profilepicture'] = $this->input->post('profilepicture');
            $save['status'] = 1;

            $getid = $this->input->post('id');
            if (isset($_FILES["profilepicture"]["name"]) && $_FILES["profilepicture"]["name"] != '') {
                $this->PATH = './assets/file/';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['profilepicture'] = $this->resizeimg->image_upload('profilepicture', $this->PATH, 'size[318,210]', '', $photo_name);
            }
            else {

            }
             if ($this->global_model->update('flip_users', $save, array('id' => $getid))){
                $this->session->set_flashdata('message', 'Save Success');
                redirect(base_url('flip/Flip/update'));
            }

        }



        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $countryInfo = $this->global_model->get_data('countries', array('id' => $data['user_info']['country']));
        $data['states'] = $this->global_model->get('states', array('country_id' => $countryInfo['id']));


        $data['countries'] = $this->global_model->get('countries');


        $data['profession'] = $this->global_model->profession_get();
        $data['sub_profession'] = $this->global_model->get('profession_sub');



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/profile/update', $data);
        $this->load->view('flip/flip_footer');



    }

    public function viewProfile() {

        $data = array();
        $data['page_title'] = 'Flip Profile ';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));


        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/profile/view', $data);
        $this->load->view('flip/flip_footer');
    }

    public function showThisProfile($id="") {
        $data = array();
        $data['page_title'] = 'Profile Search Details';
        $data['tabActive'] = 'Profile Search Details';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['user_data'] = $this->global_model->get_data('flip_users', array('uid' => $id));


        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/profile/searchProfileView', $data);
        $this->load->view('flip/flip_footer');

    }

    public function getStateByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;
    }

    public function search(){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('first_name');
        $this->form_validation->set_rules('last_name');
        $this->form_validation->set_rules('profession');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('state');
        $this->form_validation->set_rules('city');
        if($this->input->post()){
            $postData = $this->input->post();
            $value = array();
            $value['full_name'] = (!empty($postData['full_name']))?$postData['full_name']:'';
            $value['parent_profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $value['profession'] = (!empty($postData['sub_pro']))?$postData['sub_pro']:'';
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['state']))?$postData['state']:'';
            $value['city'] = (!empty($postData['city']))?$postData['city']:'';
            $value['postal_code'] = (!empty($postData['postal_code']))?$postData['postal_code']:'';
            $data['result'] = $this->global_model->flip_profile_search_data('flip_users',$value,FALSE,FALSE);
        }
        $data['page_title'] = 'Profile search';
        $data['tabActive'] = 'Profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('flip_users', array('uid' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->back_serch_profession();



        $this->load->view('flip/flip_header', $data);
        $this->load->view('flip/profile/profile_search', $data);
        $this->load->view('flip/flip_footer');


    }

    public function varify() {
        $data = array();
        $data['page_title'] = 'Profile Varification';
        $data['tabActive'] = 'profile Varification';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');

        if ($this->input->post()) {
            $this->form_validation->set_rules('full_name', 'full_name', 'trim|required');
            $this->form_validation->set_rules('npi', 'npi', 'trim');
            $this->form_validation->set_rules('university', 'university', 'trim');

            if ($this->form_validation->run() == true) {
                $save['user_id'] = $loginId;
                $save['profession'] = $this->input->post('profession');
                $save['email'] = $this->input->post('email');
                $save['full_name'] = $this->input->post('full_name');
                $save['npi'] = $this->input->post('npi');
                $save['country'] = $this->input->post('country');
                $save['state'] = $this->input->post('state');
                $save['city'] = $this->input->post('city');
                $save['university'] = $this->input->post('university');

                uploadVarification();
                //// File UPLOAD
                if ($this->upload->do_upload('doc_1')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['doc_1'] = $file1['name'];
                }
                if ($this->upload->do_upload('doc_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['doc_2'] = $file1['name'];
                }
                if ($this->upload->do_upload('doc_3')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['doc_3'] = $file1['name'];
                }

                if ($ref_id = $this->global_model->insert('doctor_varification', $save)) {

                    $config['charset'] = 'utf-8';
                    $config['mailtype'] = 'text';
                    $config['newline'] = '\r\n';
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->from($save['email'], $save['full_name']);
                    $this->email->to('info@advertbd.com');
                    $this->email->subject('Varification Email');
                    $this->email->message(
                        "Hello Admin \r\n My name is " . $save['full_name']."\r\n My email address is ".$save['email']. ".\r\n My NPI number is ".$save['npi'].
                        "\r\n This is my University ".$save['university']. "\r\n Please visit the admin panel to varify this profile."
                    );
                    if($this->email->send()) {
                        $this->session->set_flashdata('message', 'Your request has been submitted. Within a sort time we will notify you.');
                    }else{
                        $this->session->set_flashdata('message', 'Something went wrong! Please try again later.');
                    }

                }

            }
        }

        $this->load->view('header', $data);
        $this->load->view('profile/varification', $data);
        $this->load->view('footer');
    }



    public function user_varify_1() {
        $data = array();
        $data['page_title'] = 'Profile Varification';
        $data['tabActive'] = 'profile Varification';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');

        if ($this->input->post()) {
            $this->form_validation->set_rules('full_name', 'full_name', 'trim|required');
            $this->form_validation->set_rules('npi', 'npi', 'trim');
            $this->form_validation->set_rules('university', 'university', 'trim');

            if ($this->form_validation->run() == true) {
                $save['user_id'] = $loginId;
                $save['profession'] = $this->input->post('profession');
                $save['email'] = $this->input->post('email');
                $save['full_name'] = $this->input->post('full_name');
                $save['npi'] = $this->input->post('npi');
                $save['country'] = $this->input->post('country');
                $save['state'] = $this->input->post('state');
                $save['city'] = $this->input->post('city');
                $save['university'] = $this->input->post('university');
                $save['user_level'] = $this->input->post('user_level');

                uploadVarification();
                //// File UPLOAD
                if ($this->upload->do_upload('doc_1')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['doc_1'] = $file1['name'];
                }
                if ($this->upload->do_upload('doc_2')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['doc_2'] = $file1['name'];
                }
                if ($this->upload->do_upload('doc_3')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['doc_3'] = $file1['name'];
                }

                if ($ref_id = $this->global_model->insert('users_varification', $save)) {

                    $config['charset'] = 'utf-8';
                    $config['mailtype'] = 'text';
                    $config['newline'] = '\r\n';
                    $this->load->library('email');
                    $this->email->initialize($config);
                    $this->email->from($save['email'], $save['full_name']);
                    $this->email->to('info@foralldoctors.com');
                    $this->email->subject('Varification Email');
                    $this->email->message(
                        "Hello Admin \r\n My name is " . $save['full_name']."\r\n My email address is ".$save['email']. ".\r\n My NPI number is ".$save['npi'].
                        "\r\n This is my University ".$save['university']. "\r\n Please visit the admin panel to varify this profile."
                    );
                    if($this->email->send()) {
                        $this->session->set_flashdata('message', 'Your request has been submitted. Within a sort time we will notify you.');
                    }else{
                        $this->session->set_flashdata('message', 'Something went wrong! Please try again later.');
                    }

                }

            }
        }


         $varification = $this->global_model->get_data('users_varification', array('user_id' => $loginId, 'is_valid' => '0'));

        /// print_r($varification);
        //echo $varification['user_id'];
        /// exit;

        if ($this->global_model->get_data('users', array('id' => $loginId, 'user_level' => '2')))
        {

            $data['message'] = "Level 2 : You Are Now Leve 2  Verify user ";
            $data['message_2'] = "You May Use  All Access except Messaging , Patient dealing & Personals ! Thanks.";
            $this->load->view('header', $data);
            $this->load->view('profile/profile_message', $data);
            $this->load->view('footer');
        }
        elseif($data['user_info']['user_level'] == '1' && $varification != '')
        {
            if(!empty($varification['user_id'] != $loginId)) {
                $data['message'] =   "Your profile is not varified.";
                $data['message_2'] = "To varify your profile please click the button bellow.";
                $data['message_3'] = "Varify your profile.";
                $this->load->view('header', $data);
                $this->load->view('profile/profile_message', $data);
                $this->load->view('footer');
            }else{
                $data['message'] = "Your varification process still on going.";
                $data['message_2'] = "Please wait, until we varified your profile.";
                $this->load->view('header', $data);
                $this->load->view('profile/profile_message', $data);
                $this->load->view('footer');
            }
        }
        else
        {
            $this->load->view('header', $data);
            $this->load->view('profile/users_varification_step_1', $data);
            $this->load->view('footer');
        }



    }






}

?>
