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
        $this->load->model('global_model');
        $this->load->helper('global');

       
        $level = check_level_1();
        if($level ['user_level'] == '1')
        {
            redirect('step1');
        }
        elseif($level ['user_level'] == '2'){
            redirect('pub/add');
        }
        else{

        }

    }


    function check_email_avalibility()
    {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
            echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Invalid Email</span></label>';
        }
        else
        {

            if(isset($_POST["email"]) && $this->global_model->is_email_available($_POST["email"]))
            {
                echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>';
            }
            else
            {
                echo '';
            }

        }
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


    public function publicSearch2(){
        $result= array();
        $result['countries'] = $this->global_model->get('countries');
        $result['profession'] = $this->global_model->get('profession');

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
            $data['getid'] = $id = $this->uri->segment('3');
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

            $savedata['first_name'] = $postdata['email'];
            $savedata['email'] = $postdata['email'];
            $savedata['phone'] = 0;
            $savedata['doctor_id'] = $id;
            $savedata['message'] = $postdata['message'];
            $savedata['date'] = date("Y-m-d");

            if ($ref_id = $this->global_model->insert('appointment', $savedata)) {
                $this->session->set_flashdata('message', 'Your Request sent successfully.');

                ////// paitent registration
                $ptn['profession'] = 100;
                $ptn['parent_profession'] = 100;
                $ptn['first_name'] = 'Not Set';
                $ptn['last_name'] = 'Not Set';
                $ptn['user_name'] = md5(date("Y-m-d"));
                $ptn['email'] =  $this->input->post('email');
                $ptn['password'] = md5($this->input->post('pat_password'));
                $ptn['confirmation_key'] 	= uniqid();
                $ptn['confirmed'] 	= 1;
                $ptn['status']		= 1;
                if ($ref_id = $this->global_model->insert('users', $ptn))
                {
                    $this->session->set_flashdata('message', 'New Match created Successfully');
                    $last_insert_id = $this->db->insert_id();


                    $msg['sender_id'] = $last_insert_id;
                    $msg['receiver_id'] = $id;
                    $msg['subject'] = "Paitent Help";
                    $msg['message'] = $postdata['message'];
                    $msg['profession'] = 100;
                    $msg['timestamp'] = date('Y-m-d H:i:s', time());
                    $msg['status'] = 0;
                    if ($ref_id = $this->global_model->insert('messages', $msg)) {
                        $this->session->set_flashdata('message', 'Message sent successfully.');
                    }

                }

            }
            //$this->_send_appointment_email($postdata);
            $this->session->set_flashdata('msg', 'Email send Successfully');
        }
        else{
            $this->session->set_flashdata('msg', 'Something worng please try again.');
        }

    }


    public function setappointment_search($id){
        $loginId = $this->session->userdata('login_id');
        date_default_timezone_set("Asia/Dhaka");
        if($id != null){
            $postdata = (!empty($_POST))?$_POST:'';

            $hour =  date('Y-m-d H:i:s', strtotime('2 minute'));

            $savedata['first_name'] = $postdata['appointment_name'];
            $savedata['email'] = $postdata['email'];
            $savedata['phone'] = $postdata['phone'];
            $savedata['doctor_id'] = $id;
            $savedata['pat_id'] = $loginId;
            $savedata['message'] = $postdata['message'];
            $savedata['schedule_date'] = $hour;
            $savedata['doctor_profession'] = $postdata['doctor_profession'];
            $savedata['doctor_country'] = $postdata['doctor_country'];
            $savedata['doctor_postal_code'] = $postdata['doctor_postal_code'];





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

        //$data['allproducts']  	 = $this->global_model->get($table);

        $loginId = $this->session->userdata('login_id');
        $data['all_doctor_appointment'] = $this->global_model->get('appointment', array('doctor_id' => $loginId));


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

    public function appmsg(){

        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $user_type = $this->session->userdata('user_type');

        $gid = $this->input->post('pat_id');
        $title = $this->input->post('title');
        if($gid != null){
            $postData = $this->input->post();
            $msg['sender_id'] = $loginId;
            $msg['receiver_id'] = $gid;
            $msg['subject'] = "Appointment Messagae" .$title;
            $msg['message'] = $this->encrypt->encode($postData['message']);;
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

    public function updateAppointment($update_status){
        if($update_status != ''){
            $status['status'] = $update_status;
            $ref = $this->global_model->update('appointment', $status, array('status'=>'0'));
        }
        echo json_encode($ref);
    }

    public function get_proffesion_Ajax() {
        $data = array();
        $id = $this->input->post('sub_pro');
        $prof = $this->global_model->get('profession_sub', array('sub_prof_id' => $id));
        $data['prof_sub'] = $prof;
        echo $this->load->view('profession_sub', $data, TRUE);
        exit;
    }

    public function sub_pro() {

        if(!empty($_GET)){
            $id = $_GET['sub_pro'];
            $sub_pro = $this->global_model->get('profession_sub', array('sub_prof_id' => $id));
            echo json_encode($sub_pro);
        }
    }

    //// New search
    ///
    public function publicSearch() {

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
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['state']))?$postData['state']:'';
            $data['result'] = $this->global_model->getPublicSearchData($data);
        }
        $data['page_title'] = 'Search Professionals';
        $data['tabActive'] = 'search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');

        $data['profession'] = $this->global_model->get_search_profession();

        $this->load->view('header_guest_home');
        $this->load->view('doctor/search_view',$data);
        $this->load->view('foother_guest.php');
    }


    public function ajax_Search($proffesion,$sub) {

        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'Search Professionals';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        if($this->input->post()){
            $postData = $this->input->post();
            $value = array();

            $data['profession'] = (!empty($proffesion))?$postData['profession']:'';
            $value['country'] = (!empty($postData['country']))?$postData['country']:'';
            $value['state'] = (!empty($postData['state']))?$postData['state']:'';
            $data['result'] = $this->global_model->getPublicSearchData($data);
        }
        $data['page_title'] = 'Search Professionals';
        $data['tabActive'] = 'search';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');

        $data['profession'] = $this->global_model->get_search_profession();
        $data['get_sub_profession'] = $this->global_model->get_sub_all( $proffesion);
        if($sub==''){$setvalue=0;} else { $setvalue = $sub;}
        $data['get_sub'] = $setvalue;
        $data['get_profession'] = $proffesion;


        echo $this->load->view('doctor/ajax/search_ajax', $data, TRUE);
        exit;

    }


    public function getPro() {
        $data = array();
        $id = $this->input->post('pro');
        $prof = $this->global_model->get('profession_sub', array('sub_prof_id' => $id));
        $data['sub_pro'] = $prof;
        echo $this->load->view('profession_sub', $data, TRUE);
        exit;
    }


    //// Get data
    public function getproffesional($id){

        $data = array();
        $data['user_get'] = $this->global_model->get_data('users', array('id' => $id));
        echo $this->load->view('doctor/ajax/doctor_registration', $data, TRUE);
        exit;

    }

    /// set data
    public function setrequest(){


        $doctorsid = $this->input->post('get_loginid');
        if($doctorsid != null){
            $postdata = (!empty($_POST))?$_POST:'';
                ////// paitent registration
                $ptn['profession'] = 100;
                $ptn['parent_profession'] = 100;
                $ptn['first_name'] = 'Not Set';
                $ptn['last_name'] = 'Not Set';
                $ptn['user_name'] = md5(date("Y-m-d"));
                $ptn['email'] =  $this->input->post('email');
                $ptn['password'] = md5($this->input->post('pat_password'));
                $ptn['confirmation_key'] 	= uniqid();
                $ptn['confirmed'] 	= 1;
                $ptn['status']		= 1;
                if ($new_id = $this->global_model->insert('users', $ptn))
                {
                    $last_insert_id = $this->db->insert_id();
                    ///send email
                    $this->send_confirmation_email($ptn);
                    $this->admin_notfication($ptn);
                    ///

                    $src['profession'] = $this->input->post('profession');
                    $src['profession_sub'] = (!empty($postData['sub_pro']))?$postData['sub_pro']:'0';
                    $src['msg'] = $this->encrypt->encode($this->input->post('message'));;
                    $src['uid'] = $last_insert_id;
                    if ($pef_id = $this->global_model->insert('patient_search', $src))
                    {
                        $this->session->set_flashdata('message', 'Message sent successfully.');
                    }


                    if($new_id){
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

            }
            //$this->_send_appointment_email($postdata);

    }



    public function admin_notfication($data=array()) {

        //Send mail

        if($data['parent_profession'] == 100)
        {
            $emailsubject="patient";
            $typeusers =   'patient';
        }
        else{
            $emailsubject="Doctor";
            $typeusers =   getProfessionById($data['parent_profession']);
        }
        $to_email = "info@cricpop.com";
        $this->email->from($data['email'], 'For All Doctors');
        $this->email->to($to_email);
        $this->email->subject('New '.$emailsubject.'  Registration');


        $datetime  =  Date('Y-m-d h:i:s');

        $comment = "Hi,<br /> <br />";
        $comment .= "ForAllDcotors Recently Added a new User.<br />";
        $comment .= "User Email is : " . $data['email'] . "<br />";
        $comment .= "User Type  : " . $typeusers . "<br />";
        $comment .= "Registration Date and Time  : " . $datetime . "<br />";
        $comment .= "In future More Information Login secure admin panel.<br /> <br /> <br />";
        $comment .= "Thanks<br />";
        $this->email->set_mailtype("html");
        $this->email->message($comment);
        $this->email->send();

    }



    #send a confirmation email with confirmation link
    public function send_confirmation_email($data=array())
    {

        $admin_email = 'info@cricpop.com';
        $admin_name  ='ForAllDoctors';

        $link = base_url('home/confirm'.'/'.$data['confirmation_key']);

        //$this->load->model('admin/system_model');
        $tmpl = get_email_tmpl_by_email_name('registration_email');
        $subject = $tmpl->subject;
        $subject = str_replace("#username",$data['email'],$subject);
        $subject = str_replace("#activationlink",$link,$subject);
        $subject = str_replace("#webadmin",$admin_name,$subject);
        $subject = str_replace("#useremail",$data['email'],$subject);


        $body = $tmpl->body;
        $body = str_replace("#username",$data['user_name'],$body);
        $body = str_replace("#activationlink",$link,$body);
        $body = str_replace("#webadmin",$admin_name,$body);
        $body = str_replace("#useremail",$data['email'],$body);


        $this->load->library('email');
        $this->email->from($admin_email);
        $this->email->to($data['email']);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->send();
    }

    #confirmation email link points here
    public function confirm($code='')
    {

        $res = confirm_email($code);

        if($res==TRUE)
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Email Confirmed. You can now login. '.'</div>');
            redirect(base_url('home/login'));
        }
        else
        {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">'.'Email Confirmation failed. Please try again.'.'</div>');
            redirect(base_url('home/login'));
        }
    }

}
?>
