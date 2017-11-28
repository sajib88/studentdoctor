<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'Profile';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if ($this->input->post()) {

            $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'last name', 'required');
            $this->form_validation->set_rules('pls', 'pls', 'trim');
            $this->form_validation->set_rules('npi', 'npi', 'trim');
            $this->form_validation->set_rules('pln', 'pln', 'trim');
            $this->form_validation->set_rules('gender', 'gender', 'trim');
            $this->form_validation->set_rules('phone', 'phone', 'trim');

            if ($this->form_validation->run() == true) {


                if($this->input->post('password')!= 0)
                {
                    $psw = $this->input->post('password');
                    $convertet = md5($psw);
                    $save['password'] = $convertet;
                }
                else {}



                $save['first_name'] = $this->input->post('first_name');
                $save['last_name'] = $this->input->post('last_name');
                $save['plc'] = $this->input->post('plc');
                $save['pls'] = $this->input->post('pls');
                $save['npi'] = $this->input->post('npi');
                $save['pln'] = $this->input->post('pln');
                $save['gender'] = $this->input->post('gender');
                $save['country'] = $this->input->post('country');
                $save['state'] = $this->input->post('state');
                $save['city'] = $this->input->post('city');
                $save['phone'] = $this->input->post('phone');
                $save['university_clg'] = $this->input->post('university_clg');

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

                if ($this->global_model->update('users', $save, array('id' => $loginId))) {
                    $this->session->set_flashdata('message', 'Update Success');
                    redirect(base_url('profile/update'));
                }
            } else {
                validation_errors();
            }
        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $countryInfo = $this->global_model->get_data('countries', array('id' => $data['user_info']['country']));
        $data['states'] = $this->global_model->get('states', array('country_id' => $countryInfo['id']));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $this->load->view('header', $data);
        $this->load->view('profile/index', $data);
        $this->load->view('footer');
    }

    public function viewProfile() {

        $data = array();
        $data['page_title'] = 'Profile';
        $data['tabActive'] = 'profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $this->load->view('header', $data);
        $this->load->view('profile/view', $data);
        $this->load->view('footer');
    }

    public function showThisProfile($id="") {
        $data = array();
        $data['page_title'] = 'Profile Search Details';
        $data['tabActive'] = 'Profile Search Details';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['user_data'] = $this->global_model->get_data('users', array('id' => $id));
        $this->load->view('header', $data);
        $this->load->view('profile/searchProfileView', $data);
        $this->load->view('footer');
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
            $value['first_name'] = (!empty($postData['first_name']))?$postData['first_name']:'';
            $value['last_name'] = (!empty($postData['last_name']))?$postData['last_name']:'';
            $value['profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['state']))?$postData['state']:'';
            $value['city'] = (!empty($postData['city']))?$postData['city']:'';
            $data['result'] = $this->global_model->get_profile_search_data('users',$value,FALSE,FALSE);
        }
        $data['page_title'] = 'Profile search';
        $data['tabActive'] = 'Profile';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        $this->load->view('header', $data);
        $this->load->view('profile/profile_search', $data);
        $this->load->view('footer');

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

}

?>
