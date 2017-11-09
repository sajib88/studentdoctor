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

    public function varify($id='', $is_valid="", $user_id='', $email=""){
        if(!empty($id) && $is_valid == '0'){
            $update['is_valid'] = '1';
            $user_update['is_varified'] = '1';
            $this->global_model->update('doctor_varification', $update, array('id'=>$id));
            $this->global_model->update('users', $user_update, array('id'=>$user_id));
            $this->load->library('email');
            $this->email->from('info@advertbd.com', 'Admin');
            $this->email->to($email);
            $this->email->subject('Varification Email');
            $this->email->message(
                'This '.$email.' is varified. Thanks !!'
            );
            if($this->email->send()) {
                redirect(base_url('admin/DoctorVarification'));
            }

        }else{
            $update['is_valid'] = '0';
            $user_update['is_varified'] = '0';
            $this->global_model->update('doctor_varification', $update, array('id'=>$id));
            $this->global_model->update('users', $user_update, array('id'=>$user_id));
            redirect(base_url('admin/DoctorVarification'));
        }
    }

}

?>
