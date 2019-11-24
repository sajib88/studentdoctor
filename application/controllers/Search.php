<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index() {




        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search Professionals';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('profession');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('state');
        $this->form_validation->set_rules('city');
        if($this->input->post()){
            $postData = $this->input->post();
            $value = array();

            $data['profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $data['sub_pro'] = (!empty($postData['sub_pro']))?$postData['sub_pro']:'';
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['state']))?$postData['state']:'';
            $value['postal'] = (!empty($postData['postal']))?$postData['postal']:'';
            $data['specialty'] = (!empty($postData['specialty']))?$postData['specialty']:'';
            $data['result'] = $this->global_model->getPublicSearchData($data);
        }
        $data['page_title'] = 'Search Professionals';
        $data['tabActive'] = 'search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get_search_profession();

        $search_history = $this->global_model->get_data('patient_search', array('uid' => $loginId));

        $data['pro']= $search_history['profession'];
        $data['sub_pro']= $search_history['profession_sub'];


        $data['gid'] = 0;


        ////////////////// ADVERTISE /////////////////////////
        $pageid= 6;
        $pageviewset = getViewByadvertise($pageid);
        if(!empty($pageviewset)){
            $profession = $this->session->userdata('user_type');
            $data['advertise'] = $this->global_model->getViewByProfession('advertise', $profession);
        }
        else{
            $data['advertise'] = array();
        }
        ////////////////// ADVERTISE /////////////////////////

        $this->load->view('header', $data);
        $this->load->view('search/profile_search', $data);
        $this->load->view('footer');
    }


    public function Search_Appointment() {

        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search Appointment';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $this->form_validation->set_rules('profession');
        $this->form_validation->set_rules('country');
        $this->form_validation->set_rules('state');
        $this->form_validation->set_rules('city');
        if($this->input->post()){
            $postData = $this->input->post();
            $value = array();

            $data['profession'] = (!empty($postData['profession']))?$postData['profession']:'';
            $data['sub_pro'] = (!empty($postData['sub_pro']))?$postData['sub_pro']:'';
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['state']))?$postData['state']:'';
            $value['postal'] = (!empty($postData['postal']))?$postData['postal']:'';
            $data['result'] = $this->global_model->getPublicSearchData($data);
        }

        $data['tabActive'] = 'search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get_search_profession();

        $search_history = $this->global_model->get_data('patient_search', array('uid' => $loginId));

        $data['pro']= $search_history['profession'];
        $data['sub_pro']= $search_history['profession_sub'];


        $data['gid'] = 0;
        $this->load->view('header', $data);
        $this->load->view('search/appointment_search', $data);
        $this->load->view('footer');
    }

    public function details_appointment(){


        $data= array();
        $result['page_title'] = 'Doctor Profile';

        $data['getid'] = $id = $this->uri->segment('3');
        $data['table1'] = 'users';
        $data['table2'] = 'public_website';

        $result['searchData'] = $this->global_model->details_data($data);
        $resultuserid = $data['getid'] = $id = $this->uri->segment('3');

        $result['video'] = $this->global_model->get('video', array('created_by' => $resultuserid, 'ref_name' => 'public_web'));
        $result['photos'] = $this->global_model->get('photos', array('ref_id' => $resultuserid, 'ref_name' => 'public_web'));
        $result['files'] = $this->global_model->get('files', array('ref_id' => $resultuserid, 'ref_name' => 'public_web'));
        $result['audio'] = $this->global_model->get('audio', array('ref_id' => $resultuserid, 'ref_name' => 'public_web'));


        $loginId = $this->session->userdata('login_id');
        $result['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $this->load->view('header', $result);
        $this->load->view('doctor/search_details',$result);
        $this->load->view('footer.php');

    }


    public function addrequest()
    {
        $data = array();


        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Classified Category';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $user_type = $this->session->userdata('user_type');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim');


            if ($this->form_validation->run() == true) {

                $save['name'] = $postData['cat_name'];
                $save['created_by'] = $loginId;
                $save['status'] = '1';

                if ($ref_id = $this->global_model->insert('classified_main_cat', $save)) {

                    $this->session->set_flashdata('message2', 'New Category Create successfully.');
                    redirect(base_url('classifieds/add'));
                }
            }
        }
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

    }
    //// Get data
    public function get_user_modal($id){

        $data = array();
        $data['user_get'] = $this->global_model->get_data('users', array('id' => $id));
        $data['public_get'] = $this->global_model->get_data('public_website', array('user_id' => $id));
        echo $this->load->view('doctor/ajax/doctor_msg', $data, TRUE);
        exit;

    }

    //// Get data
    public function get_doctors_modal($id){

        $data = array();
        $data['user_get'] = $this->global_model->get_data('users', array('id' => $id));
        echo $this->load->view('doctor/ajax/direct_doctor_msg', $data, TRUE);
        exit;

    }





    public function setrequest(){

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $user_type = $this->session->userdata('user_type');
        $gid = $this->input->post('get_loginid');
        if($gid != null){
            $postdata = (!empty($_POST))?$_POST:'';




            $msg['sender_id'] = $loginId;
            $msg['receiver_id'] = $gid;
            $msg['subject'] = "Request Messagae From - ".$postdata['email'];
            $msg['message'] = $this->encrypt->encode($postdata['message']);
            $msg['profession'] = $user_type;
            $msg['timestamp'] = date('Y-m-d H:i:s', time());
            $msg['status'] = 1;



            if ($ref_id =  $this->global_model->insert('messages', $msg)) {
                $this->session->set_flashdata('message', 'Your Request sent successfully.');

                if($ref_id){
                    /// send jason data by bowler /bat/ TO Select composser

                    $datahome = array(
                        'message' => $postdata['message']
                    );
                    echo json_encode(array('status' => 'success', 'datahome'=>$datahome));

                    exit;
                }
                else{
                    echo json_encode(array('status' => 'success', 'datahome'=>'1'));

                    exit;
                }

            }
            //$this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'Email send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }

    public function new_appoinment(){

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $user_type = $this->session->userdata('user_type');
        $gid = $this->input->post('get_loginid');
        date_default_timezone_set("Asia/Dhaka");
        $hour =  date('Y-m-d H:i:s', strtotime('2 minute'));

        if($gid != null){
            $postdata = (!empty($_POST))?$_POST:'';


            $savedata['first_name'] = $postdata['appointment_name'];
            $savedata['email'] = $postdata['appointment_name'];
            $savedata['phone'] = $postdata['phone'];
            $savedata['doctor_id'] = $postdata['doctor_id'];
            $savedata['pat_id'] = $loginId;
            $savedata['message'] = $postdata['message'];
            $savedata['schedule_date'] = $hour;
            $savedata['doctor_profession'] = $postdata['doctor_profession'];
            $savedata['doctor_country'] = $postdata['doctor_country'];
            $savedata['doctor_postal_code'] = $postdata['doctor_postal_code'];


            if ($ref_id = $this->global_model->insert('appointment', $savedata)) {
                $this->session->set_flashdata('message', 'Your Appointment Request sent successfully.');

                if($ref_id){
                    /// send jason data by bowler /bat/ TO Select composser

                    $datahome = array(
                        'message' => $postdata['message']
                    );
                    echo json_encode(array('status' => 'success', 'datahome'=>$datahome));

                    exit;
                }
                else{
                    echo json_encode(array('status' => 'success', 'datahome'=>'1'));

                    exit;
                }

            }
            //$this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'Email send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }



    public function getProByAjax() {
        $data = array();
        $id = $this->input->post('pro');
        if(!empty($id)){
            $prof = $this->global_model->get_sub_all($id);
            $data['sub_pro'] = $prof;
            echo $this->load->view('profession_sub', $data, TRUE);
        }
        exit;
    }



    public function getphdAjax() {
        $data = array();
        $id = $this->input->post('pro');
        if(!empty($id)){
            $prof = $this->global_model->get_sub_phd($id);
            $data['sub_phd'] = $prof;
            echo $this->load->view('phd_sub', $data, TRUE);
        }
        exit;
    }

    public function details_profile($getid){



        $data = array();
        $data['page_title'] = 'Profile information';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));




        $data['photos'] = $this->global_model->get('photos', array('ref_id' => $getid, 'ref_name' => 'public_web'));
        $data['files'] = $this->global_model->get('files', array('ref_id' => $getid, 'ref_name' => 'public_web'));
        $data['audio'] = $this->global_model->get_data('audio', array('ref_id' => $getid, 'ref_name' => 'public_web'));
        $data['video'] = $this->global_model->get_data('video', array('created_by' => $getid, 'ref_name' => 'public_web'));

        $data['website_info'] = $this->global_model->get_data('public_website', array('user_id' => $getid));
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $getid));
        $data['profession_type'] = $this->global_model->get_data('profession', array('id' => $user_info['profession']));
        $data['countries'] = $this->global_model->get('countries');

        if ($this->global_model->get_data('public_website', array('user_id' => $getid, 'profile_status' => 'public')))
        {

            $loginId = $this->session->userdata('login_id');
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

            $this->load->view('header', $data);
            $this->load->view('public_web/view', $data);
            $this->load->view('footer');
        }





    }


    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $result = $this->global_model->search_special($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = $row->specialty;
                echo json_encode($arr_result);
            }
        }
    }



    //// Get data
    public function msg_modal_classified($id){

        $data = array();
        $data['user_cls'] = $this->global_model->get_data('classified', array('id' => $id));
        echo $this->load->view('doctor/ajax/classified_msg', $data, TRUE);
        exit;

    }

    public function classified_msg(){

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $user_type = $this->session->userdata('user_type');

        $gid = $this->input->post('get_creatorid');
        $title = $this->input->post('title');
        if($gid != null){
                $postData = $this->input->post();
                $msg['sender_id'] = $loginId;
                $msg['receiver_id'] = $gid;
                $msg['subject'] = "Classified  Messagae" .$title;
                $msg['message'] = $this->encrypt->encode($postData['message']);
                $msg['profession'] = $user_type;
                $msg['timestamp'] = date('Y-m-d H:i:s', time());
                $msg['status'] = 1;
                $ref_id = $this->global_model->insert('messages', $msg);

                if($ref_id){
                    /// send jason data by bowler /bat/ TO Select composser

                    $datahome = array(
                        'message' => $postData['message']
                    );
                    echo json_encode(array('status' => 'success', 'datahome'=>$datahome));

                    exit;
                }
                else{
                    echo json_encode(array('status' => 'success', 'datahome'=>'1'));

                    exit;
                }


            //$this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'message send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }

    //// Get data
    public function msg_modal_personal($id){

        $data = array();
        $data['user_prsnl'] = $this->global_model->get_data('personals', array('id' => $id));
        echo $this->load->view('doctor/ajax/personal_msg', $data, TRUE);
        exit;

    }

    public function persoanl_msg(){

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $user_type = $this->session->userdata('user_type');

        $gid = $this->input->post('get_creatorid');
        $title = $this->input->post('title');
        if($gid != null){
            $postData = $this->input->post();
            $msg['sender_id'] = $loginId;
            $msg['receiver_id'] = $gid;
            $msg['subject'] = "Personals  Messagae  " .$title;
            $msg['message'] = $this->encrypt->encode($postData['message']);
            $msg['profession'] = $user_type;
            $msg['timestamp'] = date('Y-m-d H:i:s', time());
            $msg['status'] = 1;
            $ref_id = $this->global_model->insert('messages', $msg);

            if($ref_id){
                /// send jason data by bowler /bat/ TO Select composser

                $datahome = array(
                    'message' => $postData['message']
                );
                echo json_encode(array('status' => 'success', 'datahome'=>$datahome));

                exit;
            }
            else{
                echo json_encode(array('status' => 'success', 'datahome'=>'1'));

                exit;
            }


            //$this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'message send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }

    public function msg_modal_event($id){

        $data = array();
        $data['user_prsnl'] = $this->global_model->get_data('event', array('id' => $id));
        echo $this->load->view('doctor/ajax/event_msg', $data, TRUE);
        exit;

    }

    public function event_msg(){

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $user_type = $this->session->userdata('user_type');

        $gid = $this->input->post('get_creatorid');
        $title = $this->input->post('title');
        if($gid != null){
            $postData = $this->input->post();
            $msg['sender_id'] = $loginId;
            $msg['receiver_id'] = $gid;
            $msg['subject'] = "Event  Messagae  " .$title;
            $msg['message'] = $this->encrypt->encode($postData['message']);
            $msg['profession'] = $user_type;
            $msg['timestamp'] = date('Y-m-d H:i:s', time());
            $msg['status'] = 1;
            $ref_id = $this->global_model->insert('messages', $msg);

            if($ref_id){
                /// send jason data by bowler /bat/ TO Select composser

                $datahome = array(
                    'message' => $postData['message']
                );
                echo json_encode(array('status' => 'success', 'datahome'=>$datahome));

                exit;
            }
            else{
                echo json_encode(array('status' => 'success', 'datahome'=>'1'));

                exit;
            }


            //$this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'message send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }

}

?>
