<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');

    }

    public function getState() {
       /* header('Content-type: application/json');
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        echo json_encode($states);*/
        /*$data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;*/
        /*header('Content-type: application/json');
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        echo json_encode($states);*/
       /* $data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);*/
        //header('Content-type: application/json');
        if(!empty($_GET)){
            $id = $_GET['state'];
            $states = $this->global_model->get('states', array('country_id' => $id));
            echo json_encode($states);
        }
    }


    public function publicSearch(){
        if(!empty($_POST)){
            /*print '<pre>';
            print_r($_POST);die;*/
            $data= array();
            $data['profession']=$_POST['profession'];
            $data['country'] = $_POST['country'];
            $data['state'] = $_POST['state'];
            $data['table1'] = 'users';
            $data['table2'] = 'public_website';

            $result['searchData'] = $this->global_model->getPublicSearchData($data);


             //$resultuserid = $result["searchData"][0]->user_id;

            //$data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $resultuserid));
           // print_r($user_info);
            $this->load->view('header_guest_home');
            $this->load->view('doctor/search_view',$result);
            $this->load->view('foother_guest.php');


        }
        else {

            $data['profession']=3;
            $data['country'] = 18;


            $result['searchData'] = $this->global_model->getPublicSearchData($data);
            $this->load->view('header_guest_home');
            $this->load->view('doctor/search_view',$result);
            $this->load->view('foother_guest.php');
        }
    }

    public function details_profile(){

            /*print '<pre>';
            print_r($_POST);die;*/
            $data= array();
            $data['getid'] = $id = $this->uri->segment('4');
            $data['table1'] = 'users';
            $data['table2'] = 'public_website';

         $result['searchData'] = $this->global_model->details_data($data);
         $resultuserid = $data['getid'] = $id = $this->uri->segment('4');

        $result['video'] = $this->global_model->get('video', array('created_by' => $resultuserid, 'ref_name' => 'public_web'));
        $result['photos'] = $this->global_model->get('photos', array('ref_id' => $resultuserid, 'ref_name' => 'public_web'));
        $result['files'] = $this->global_model->get('files', array('ref_id' => $resultuserid, 'ref_name' => 'public_web'));
        $result['audio'] = $this->global_model->get('audio', array('ref_id' => $resultuserid, 'ref_name' => 'public_web'));


            $this->load->view('header_guest_home');
            $this->load->view('doctor/search_details',$result);
            $this->load->view('foother_guest.php');

    }
    #get web admin name and email for email sending
    public function get_admin_email_and_name()
    {

        $data['admin_email'] = 'nur.swapan@gmail.com';
        $data['admin_name']  = 'Alam';

        return $data;
    }

    function _send_appointment_email($data)

    {
        $val = $this->get_admin_email_and_name();

        $admin_email = $val['admin_email'];

        $admin_name  = $val['admin_name'];

        //$link = base_url('home/resetpassword').'/'.$data['recovery_key'];
        $link = $data['phone'];



        $tmpl = get_email_tmpl_by_email_name('appointment_email');

        $subject = $tmpl->subject;

        $subject = str_replace("#username",$data['first_name'],$subject);

        $subject = str_replace("#recoverylink",$link,$subject);

        $subject = str_replace("#webadmin",$admin_name,$subject);


        $body = $tmpl->body;

        $body = str_replace("#username",$data['first_name'],$body);

        $body = str_replace("#recoverylink",$link,$body);

        $body = str_replace("#webadmin",$admin_name,$body);



        $this->load->library('email');

        $this->email->from($admin_email, $subject);

        $this->email->to($data['email']);

        $this->email->subject($subject);

        $this->email->message($body);

        $this->email->send();

    }

    public function setappointment($id){
        if($id != null){
            $postdata = (!empty($_POST))?$_POST:'';

            $savedata['first_name'] = $postdata['appointment_name'];
            $savedata['email'] = $postdata['email'];
            $savedata['phone'] = $postdata['phone'];
            $savedata['doctor_id'] = $id;
            $savedata['message'] = $postdata['message'];
            $savedata['date'] = date("Y-m-d");

            if ($ref_id = $this->global_model->insert('appointment', $savedata)) {
                $this->session->set_flashdata('message', 'Your Appointment sent successfully.');
            }
            $this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'Email send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }

    public function allappointment(){
        $loginId = $this->session->userdata('login_id');
        $data['all_doctor_appointment'] = $this->global_model->get('appointment', array('doctor_id' => $loginId, 'date' => date("Y-m-d")));

        //$data['allproducts']  	 = $this->global_model->get($table);

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;
        $this->load->view('header', $data);
        $this->load->view('doctor/all_appointment_view', $data);
        $this->load->view('footer');
    }

    public function singleAppointment($id){
        $data = array();
        $data['appointmentView'] = $this->global_model->get_data('appointment', array('id' => $id));
        echo $this->load->view('doctor/appointmentDetails', $data, TRUE);

        exit;
    }


}
?>
