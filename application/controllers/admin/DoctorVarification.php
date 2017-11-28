<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DoctorVarification extends CI_Controller {

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
        $data['eventactive'] = $this->global_model->get('doctor_varification', array('is_valid' => '1'));
        $data['eventpending'] = $this->global_model->get('doctor_varification', array('is_valid' => '0'));
        $this->load->view('admin/header', $data);
        $this->load->view('admin/doctorVarification', $data);
        $this->load->view('admin/footer');
    }
    public function view($id){
        $data = array();
        $data['page_title'] = 'View Doctor Profile';
        $data['tabActive'] = 'Doctor Profile Details';
        $data['error'] = '';
        $data['doctorProfile'] = $this->global_model->get_data('doctor_varification', array('id' => $id));

        $this->load->view('admin/header', $data);
        $this->load->view('admin/doctorProfileView', $data);
        $this->load->view('admin/footer');
    }

    public function varify($id='', $is_valid="", $user_id='', $email="", $full_name="", $npi=""){
        if(!empty($id) && $is_valid == '0'){
            $update['is_valid'] = '1';
            $user_update['is_varified'] = '1';
            $this->global_model->update('doctor_varification', $update, array('id'=>$id));
            $this->global_model->update('users', $user_update, array('id'=>$user_id));
            $config['charset'] = 'utf-8';
            $config['mailtype'] = 'text';
            $config['newline'] = '\r\n';
            $this->load->library('email');
            $this->email->initialize($config);
            $this->email->from('join@allstudentdoctors.com', 'AllStudeneDoctors.com');
            $this->email->to($email);
            $this->email->subject('Varification Email');
            $this->email->message(
                "Hello ".urldecode($full_name)."\r\n\n"."Your email address is ". $email."\r\n\nThe NPI number you provided is " . $npi ."\r\n\n" .
                "We examined your information to varify your profile. And your profile varified successfully. Now you can publish your site." . "\n\n Thank you \n AllStudeneDoctors.com"

            );
            if($this->email->send()) {
                $this->session->set_flashdata('message', 'Profile Varification successfully done');
                redirect(base_url('admin/DoctorVarification'));
            }

        }else{
            $update['is_valid'] = '0';
            $user_update['is_varified'] = '0';
            $this->global_model->update('doctor_varification', $update, array('id'=>$id));
            $this->global_model->update('users', $user_update, array('id'=>$user_id));
            $this->session->set_flashdata('message', 'Profile Unvarified successfully');
            redirect(base_url('admin/DoctorVarification'));
        }
    }

}

?>
