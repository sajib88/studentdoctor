<?php
defined('BASEPATH') OR exit('No direct script access allowed.');

class CountNotification
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance(); //read manual: create libraries

        $dataX = array(); // set here all your vars to views
        $loginId = $this->CI->session->userdata('login_id');

        $this->CI->load->model('Global_model');
        // $dataX['count'] = $CI->global_model->count_row_where('project', array('statusID' => NULL));

        $dataX['notification'] = $this->CI->Global_model->get_message($loginId);

        $dataX['appointment_notify'] = $this->CI->Global_model->get('appointment', array('doctor_id' => $loginId, 'status' => '0'));
        $dataX['doctor_appointment'] = $this->CI->Global_model->get('appointment', array('doctor_id' => $loginId, 'date' => date("Y-m-d")));


        $this->CI->load->vars($dataX);
    }
}


?>