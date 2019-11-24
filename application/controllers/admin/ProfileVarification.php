<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileVarification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_admin()) {
            redirect('admin/login');
        }
    }

    public function index() {
        $data = array();
        $data['page_title'] = 'Doctor Profile Mange';
        $data['tabActive'] = 'Doctor Profile Mange';
        $data['error'] = '';
        $data['eventactive'] = $this->global_model->get('users_varification', array('is_valid' => '1'));
        $data['eventpending'] = $this->global_model->get('users_varification', array('is_valid' => '0'));

        $data['doctoractive'] = $this->global_model->get('doctor_varification', array('is_valid' => '1'));
        $data['doctorpending'] = $this->global_model->get('doctor_varification', array('is_valid' => '0'));



        $this->load->view('admin/header', $data);
        $this->load->view('admin/ProfileVarification', $data);
        $this->load->view('admin/footer');
    }
    public function view($id){
        $data = array();
        $data['page_title'] = 'View Doctor Profile';
        $data['tabActive'] = 'Doctor Profile Details';
        $data['error'] = '';
        $data['doctorProfile'] = $this->global_model->get_data('users_varification', array('id' => $id));



        $this->load->view('admin/header', $data);
        $this->load->view('admin/userProfileView', $data);
        $this->load->view('admin/footer');
    }

    public function varify($id='', $is_valid="", $user_id='', $email="", $full_name="", $npi=""){
        if(!empty($id) && $is_valid == '0'){
            $update['is_valid'] = '1';
            $update['user_level'] = '2';
            $user_update['user_level'] = '2';
            $this->global_model->update('users_varification', $update, array('id'=>$id));
            $this->global_model->update('users', $user_update, array('id'=>$user_id));
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'text';
            $config['newline'] = '\r\n';
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->from('info@foralldoctors.com', 'Foralldcotrs.com');
            $this->email->to($email);
            $this->email->subject('Level 2 Verification Email');
            $this->email->message(
                "Hello ".urldecode($full_name)."\r\n\n"."Your email address is ". $email."\r\n\nThe NPI number you provided is " . $npi ."\r\n\n" .
                "We examined your information to varify your profile. And your profile verified successfully. More Information we need from you, Provie Us more infromation and going to next level 3." . "\n\n Thank you \n AllStudeneDoctors.com"

            );
            if($this->email->send()) {
                $this->session->set_flashdata('message', 'Profile Varification successfully done');
                redirect(base_url('admin/ProfileVarification'));
            }

        }else{
            $update['is_valid'] = '0';
            $user_update['user_level'] = '1';
            $this->global_model->update('users_varification', $update, array('id'=>$id));
            $this->global_model->update('users', $user_update, array('id'=>$user_id));
            $this->session->set_flashdata('message', 'Profile Unvarified successfully');
            redirect(base_url('admin/ProfileVarification'));
        }
    }


    public function varify_level3($id='', $is_valid="", $user_id='', $email="", $full_name="", $npi=""){
        if(!empty($id) && $is_valid == '0'){

            /// Users Table
            $user_update['is_varified'] = '1';
            $user_update['user_level'] = '3';
            $this->global_model->update('users', $user_update, array('id'=>$user_id));

            /// Level 3 doctor insert

            $getrequest = $this->global_model->get_data('users_varification', array('user_id' => $user_id));

            if (!empty($getrequest))
            {
                $save['user_id'] = $user_id;
                $save['profession'] = $getrequest['profession'];
                $save['email'] = $getrequest['email'];
                $save['full_name'] =  $getrequest['full_name'];
                $save['npi'] = $getrequest['npi'];
                $save['country'] =  $getrequest['country'];
                $save['state'] = $getrequest['state'];
                $save['city'] = $getrequest['city'];
                $save['doc_1'] = $getrequest['doc_1'];
                $save['doc_2'] = $getrequest['doc_2'];
                $save['doc_3'] = $getrequest['doc_3'];
                $save['university'] = $getrequest['university'];
                $save['is_valid'] = '1';

                $save['update_doc_1'] = $getrequest['update_doc_1'];
                $save['update_doc_2'] = $getrequest['update_doc_2'];
                $save['update_doc_3'] = $getrequest['update_doc_3'];
                $save['update_doc_4'] = $getrequest['update_doc_4'];

                $this->global_model->insert('doctor_varification', $save);
                $this->global_model->delete('users_varification', array('id' => $getrequest['id']));



            }
            else{

            }

            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'text';
            $config['newline'] = '\r\n';
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->from('info@cricpop.com', 'ForAllDoctors.com');
            $this->email->to($email);
            $this->email->subject('Level 3 Verification Email');
            $this->email->message(
                "Hello ".urldecode($full_name)."\r\n\n"."Your email address is ". $email."\r\n\nThe NPI number you provided is " . $npi ."\r\n\n" .
                "We examined your information to varify your profile. And your profile verified successfully. Now you have full Access our Website." . "\n\n Thank you \n ForAllDoctors.com"

            );
            if($this->email->send()) {
                $this->session->set_flashdata('message', 'Profile Verification successfully done');
                redirect(base_url('admin/ProfileVarification'));
            }

        }else{

            /// Users Table
            $user_update['is_varified'] = '0';
            $user_update['user_level'] = '2';
            $this->global_model->update('users', $user_update, array('id'=>$user_id));

            /// Verifcation Table Table
            $update['is_valid'] = '0';
            $this->global_model->update('doctor_varification', $update, array('id'=>$id));

            $this->session->set_flashdata('message', 'Profile Unvarified successfully');
            redirect(base_url('admin/ProfileVarification'));
        }
    }



    public function roll_back_level_2($id='', $is_valid="", $user_id='', $email="", $full_name="", $npi=""){
        if(!empty($id) && $is_valid == '0'){

            /// Users Table
            $user_update['is_varified'] = '0';
            $user_update['user_level'] = '2';
            $this->global_model->update('users', $user_update, array('id'=>$user_id));



            /// Level 3 doctor insert

            $getrequest = $this->global_model->get_data('doctor_varification', array('user_id' => $user_id));

            if (!empty($getrequest))
            {
                $save['user_id'] = $user_id;
                $save['profession'] = $getrequest['profession'];
                $save['email'] = $getrequest['email'];
                $save['full_name'] =  $getrequest['full_name'];
                $save['npi'] = $getrequest['npi'];
                $save['country'] =  $getrequest['country'];
                $save['state'] = $getrequest['state'];
                $save['city'] = $getrequest['city'];
                $save['doc_1'] = $getrequest['doc_1'];
                $save['doc_2'] = $getrequest['doc_2'];
                $save['doc_3'] = $getrequest['doc_3'];
                $save['is_valid'] = 1;
                $save['user_level'] = 1;
                $save['university'] = $getrequest['university'];
                $save['update_doc_1'] = $getrequest['update_doc_1'];
                $save['update_doc_2'] = $getrequest['update_doc_2'];
                $save['update_doc_3'] = $getrequest['update_doc_3'];
                $save['update_doc_4'] = $getrequest['update_doc_4'];

                $this->global_model->insert('users_varification', $save);
                $this->global_model->delete('doctor_varification', array('id' => $getrequest['id']));

                /// Verifcation Table Table
                $update['is_valid'] = '1';
                $update['user_level'] = '2';
                $this->global_model->update('users_varification', $update, array('user_id'=>$user_id));

            }
            else{

            }

            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'text';
            $config['newline'] = '\r\n';
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->from('info@cricpop.com', 'ForAllDoctors.com');
            $this->email->to($email);
            $this->email->subject('Roll Back Level 2  Email');
            $this->email->message(
                "Hello ".urldecode($full_name)."\r\n\n"."Your email address is ". $email."\r\n\nThe NPI number you provided is " . $npi ."\r\n\n" .
                "We examined your information to verify your profile. And your profile verified level-3 un-successfully. Now you are at Level 2 user." . "\n\n Thank you \n ForAllDoctors.com"

            );
            if($this->email->send()) {
                $this->session->set_flashdata('message', 'Profile Verification successfully done');
                redirect(base_url('admin/ProfileVarification'));
            }

        }
    }

    public function view_doctors($id){
        $data = array();
        $data['page_title'] = 'View Doctor Profile';
        $data['tabActive'] = 'Doctor Profile Details';
        $data['error'] = '';
        $data['doctorProfile'] = $this->global_model->get_data('doctor_varification', array('id' => $id));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/doctorProfileView', $data);
        $this->load->view('admin/footer');
    }

}

?>
