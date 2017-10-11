<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('global_model');
        $this->load->helper('global');
        $this->load->library('encrypt');

    }

    public function index() {
        $this->load->library('rssparser');
        $data = array();

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');


        //for rss
        $data['hello'] = $this->rssparser->set_feed_url('http://rss.medicalnewstoday.com/featurednews.xml')->set_cache_life(30)->getFeed(12);


        $this->load->view('header_guest_home');
        $this->load->view('home',$data);
        $this->load->view('foother_guest',$data);


    }

    public function login() {

        if (check_login()) {
            redirect('profile/dashboard');
        }
        $data['page_title'] = 'Login';
        $data['tabActive'] = 'login';

        $data = array();

        if ($this->input->post('submit')) {


            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {
                $email = $this->input->post('email');
                $username = $this->input->post('email');
                $password = $this->input->post('password');

                if($this->login_model->chechUser($email,$username)){

                    if ($this->login_model->login($email, $password)) {
                        if ($this->login_model->login($email, $password)) {
                            $this->session->set_flashdata('success_login', 'You have successfully login.');

                            $redirect_link = base_url() . 'dashboard';
                            redirect($redirect_link);
                        } else {
                            $data['error'] = 'Warning! You have not activated it yet Or Your account has either been blocked';
                        }
                    }
                    elseif ($this->login_model->login1($username, $password))
                    {
                        if ($this->login_model->login1($username, $password)) {
                            $this->session->set_flashdata('success_login', 'You have successfully login.');
                            $redirect_link = base_url() . 'dashboard';
                            redirect($redirect_link);
                        } else {
                            $data['error'] = 'Warning! You have not activated it yet Or Your account has either been blocked';
                        }
                    }

                }
                else {
                    $data['error'] = "Login Failed!! Invalid username or password. (Type anything)";
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        //Warning
        //Login error! You have not activated your account.
        //Login denied! Your account has either been blocked or you have not activated it yet.


        $this->load->view('header_guest_home');
        $this->load->view('login',$data);
        $this->load->view('foother_guest.php',$data);
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

    #get web admin name and email for email sending
    public function get_admin_email_and_name()
    {

        $data['admin_email'] = 'info@advertbd.com';
        $data['admin_name']  = 'AllStudentDoctors';

        return $data;
    }

    #send a confirmation email with confirmation link
    public function send_confirmation_email($data=array())
    {
        $val = $this->get_admin_email_and_name();
        $admin_email = $val['admin_email'];
        $admin_name  = $val['admin_name'];

        $link = base_url('home/confirm'.'/'.$data['confirmation_key']);

        //$this->load->model('admin/system_model');
        $tmpl = get_email_tmpl_by_email_name('confirmation_email');
        $subject = $tmpl->subject;
        $subject = str_replace("#username",$data['user_name'],$subject);
        $subject = str_replace("#activationlink",$link,$subject);
        $subject = str_replace("#webadmin",$admin_name,$subject);
        $subject = str_replace("#useremail",$data['email'],$subject);


        $body = $tmpl->body;
        $body = str_replace("#username",$data['user_name'],$body);
        $body = str_replace("#activationlink",$link,$body);
        $body = str_replace("#webadmin",$admin_name,$body);
        $body = str_replace("#useremail",$data['email'],$body);


        $this->load->library('email');
        $this->email->from($admin_email, $subject);
        $this->email->to($data['email']);
        $this->email->subject($subject);
        $this->email->message($body);
        $this->email->send();
    }

    public function registration() {

        $data = array();
        $data['page_title'] = 'Registration';
        $data['tabActive'] = 'registration';
        $data['error'] = '';

        if ($this->input->post()) {

            $this->form_validation->set_rules('profession', 'profession', 'trim|required');
            $this->form_validation->set_rules('user_name', 'user name', 'trim');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
            $this->form_validation->set_rules('conf', 'Confirm Password', 'trim|required|matches[password]');

            if ($this->form_validation->run() == true) {

                $save['profession'] = $this->input->post('profession');
                $save['first_name'] = $this->input->post('first_name');
                $save['last_name'] = $this->input->post('last_name');
                $save['user_name'] = $this->input->post('user_name');
                $save['email'] = $this->input->post('email');
                $save['password'] = md5($this->input->post('password'));

                $save['confirmation_key'] 	= uniqid();
                $save['confirmed'] 	= 0;
                $save['status']		= 1;



                if ($this->global_model->insert('users', $save)) {

                    $this->send_confirmation_email($save);
                    $this->session->set_flashdata('msg', '<div class="alert alert-block alert-success fade in">
                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                <i class="icon-remove"></i>
                                                            </button>
                                                            <strong>Email sent successfully. <br>Check your email to active your acount.</strong> </div>');
                } else {
                    $this->session->set_flashdata('success', 'Something worng please try again.');
                }
            } else {
                $data['error'] = validation_errors();
            }
        }



        $this->load->view('header_guest_home');
        $this->load->view('registration',$data);
        $this->load->view('foother_guest.php',$data);

    }

    public function log_out() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('login_id');
        $this->session->unset_userdata('user_type');
        $this->session->unset_userdata('user_name');
        $this->session->set_flashdata('logu_out_message', 'You have successful log out!');
        $redirect_link = base_url('home/login');
        redirect($redirect_link);
    }

    public function terms() {
        $this->load->view('header_guest_home');
        $this->load->view('webpage/terms-and-condition');
        $this->load->view('foother_guest.php');
    }
    public function privacy() {
        $this->load->view('header_guest_home');
        $this->load->view('webpage/privacy_policy');
        $this->load->view('foother_guest.php');
    }

    public function disclaimer() {
        $this->load->view('header_guest_home');
        $this->load->view('webpage/disclaimer');
        $this->load->view('foother_guest.php');
    }

    public function features() {
        $this->load->view('header_guest_home');
        $this->load->view('webpage/features');
        $this->load->view('foother_guest.php');
    }

    public function forgot_password() {
//        if (check_login()) {
//            redirect('profile/dashboard');
//        }
        $data['error'] = '';
        if ($this->input->post('submit')) {

            $this->load->helper('form');
            $this->load->library('email');
            $this->load->helper('email');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'E-mail', 'trim|required|valid_email');

            if ($this->form_validation->run()) {
                $user_email = $this->input->post('email');
                $newpassword = mt_rand(10000, 150000);
                $encrpassword = MD5($newpassword);

                $is_ok = $this->login_model->forgot_password($user_email, $encrpassword);

                if (!empty($is_ok)) {
                    $this->email->from('sajib@osourcebd.com', 'All Doctors');
                    $this->email->to($user_email);
                    $this->email->subject('Password Reset Confirmation');

                    $comment = "Hi,<br />";
                    $comment .= "You recently requested a new password.<br />";
                    $comment .= "Your new password is :" . $newpassword . "<br />";
                    $comment .= "which you may enter on the password field.<br />";
                    $comment .= "In future you may change your password from your admin panel.<br />";

                    $this->email->set_mailtype("html");
                    $this->email->message($comment);

                    if ($this->email->send()) {
                        $this->session->set_flashdata('success', "Password reset successfull, a confirmation mail with new password will send to your email.<br/>");
                        $redirect_link = base_url() . 'registration/login';
                        redirect($redirect_link);
                    } else {
                        $data['error'] = "Error: mail not send....";
                    }
                } else {
                    // $this->session->set_flashdata('error', 'Wrong Information!');
                    $data['error'] = "Password reset Failed!! <br>Please Enter Valid User Email.";
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $this->load->view('forget_password', $data);
    }



    public function newaccount($type='')
    {
        if ($type == 'fb')
        {
            $appId = '2000358663574742';
            $secret = 'c08c57748feee9b5342a5d65110d3ba4';
            $config = array('appId'=>$appId,'secret'=>$secret);
            $this->load->library('Facebook', $config);

            // Try to get the user's id on Facebook
            $userId = $this->facebook->getUser();

            // If user is not yet authenticated, the id will be zero
            if($userId == 0){

                // Generate a login url
                $data['url'] = $this->facebook->getLoginUrl(array('scope'=>'email'));

                redirect($data['url']);
            }
            else {
                //echo "1";
                // Get user's data and print it



                $user = $this->facebook->api('/me?fields=first_name,last_name,email,gender,picture');


                $user['username']= $user['id'];

                $row = register_user_if_not_exists($user);

                if($row != null)
                {

                    $this->loginfb($row);
                }
            }
        }
        else if($type=='google_plus')
        {
            $this->googleplus();
        }

    }

    function loginfb($row)
    {

        $this->session->set_userdata('user_id',$row['id']);
        $this->session->set_userdata('login_id',$row['id']);
        $this->session->set_userdata('user_name',$row['user_name']);
        $this->session->set_userdata('user_type','3');
        //$redirect_link = base_url() . 'profile/dashboard';

        redirect(base_url('profile/dashboard'));
    }



    function googleplus(){
        $this->load->library('session');
        $this->load->library('Googleplus');
        if($this->session->userdata('user_name')!= '')
        {
            echo 'name: '.$this->session->userdata('user_name');
        }

        else
        {
            $authUrl = $this->googleplus->client->createAuthUrl();
            redirect($authUrl);
        }
    }

    public function auth_callback()
    {
        $this->load->library('session');
        $this->load->library('Googleplus');

        try
        {
            if (isset($_GET['code']))
            {
                $this->googleplus->client->authenticate($_GET['code']);
                $this->googleplus->client->getAccessToken();
                $user_data = $this->googleplus->plus->people->get('me');

                /******** For debuggin purpose*********/

                // echo 'first_name: '.$user_data['name']['givenName'].'<br>';
                // echo 'last_name: '.$user_data['name']['familyName'].'<br>';
                // echo 'gender: '.$user_data['gender'].'<br>';
                // echo 'user_name: '.strstr($user_data['emails']['0']['value'], '@', true).'<br>';
                /*************************************/

                $user['first_name'] = $user_data['name']['givenName'];
                $user['last_name'] 	= $user_data['name']['familyName'];
                $user['gender'] 	= $user_data['gender'];
                $user['username'] 	= strstr($user_data['emails']['0']['value'], '@', true);
                $user['email'] 		= $user_data['emails']['0']['value'];



                $row = register_user_if_not_exists($user,'google');

                if($row != null)
                {
                    $this->session->set_userdata('user_id',$row['id']);
                    $this->session->set_userdata('login_id',$row['id']);
                    $this->session->set_userdata('user_name',$row['user_name']);
                    $this->session->set_userdata('user_type','3');
                    //$redirect_link = base_url() . 'profile/dashboard';

                    redirect(base_url('profile/dashboard'));

                }
            }
        }
        catch(Exception $e)
        {
            $msg = '<div class="alert alert-danger">
			        	<button data-dismiss="alert" class="close" type="button">×</button>
			        	<strong>Permission denied</strong>
			    	</div>';
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url('home/login'));
        }
    }


    #reset password email link points here
    function resetpassword($recovery_key='')
    {

        $query = $this->login_model->verify_recovery_by_username($recovery_key);

        if($query->num_rows()>0)

        {
            $row = $query->row();

            $this->session->set_userdata('user_id',$row->id);

            $this->session->set_userdata('email',$row->email);

            $this->session->set_userdata('user_name',$row->user_name);

            $this->session->set_userdata('profession',$row->profession);

            $this->session->set_userdata('recovery',"yes");

            redirect(base_url('home/changepass'));

        }

        else

        {

            $this->session->set_flashdata('msg', '<div class="alert alert-block">'.'password recovery link invalid'.'</div>');

            redirect(base_url('home/forgotpassword'));

        }

    }

    function _send_recovery_email($data)

    {
        $val = $this->get_admin_email_and_name();

        $admin_email = $val['admin_email'];

        $admin_name  = $val['admin_name'];

        $link = base_url('home/resetpassword').'/'.$data['recovery_key'];



        $tmpl = get_email_tmpl_by_email_name('recovery_email');

        $subject = $tmpl->subject;

        $subject = str_replace("#username",$data['user_name'],$subject);

        $subject = str_replace("#recoverylink",$link,$subject);

        $subject = str_replace("#webadmin",$admin_name,$subject);


        $body = $tmpl->body;

        $body = str_replace("#username",$data['user_name'],$body);

        $body = str_replace("#recoverylink",$link,$body);

        $body = str_replace("#webadmin",$admin_name,$body);



        $this->load->library('email');

        $this->email->from($admin_email, $subject);

        $this->email->to($data['email']);

        $this->email->subject($subject);

        $this->email->message($body);

        $this->email->send();

    }

    #load forgot password view
    function forgotpassword()
    {
        $this->load->view('header_guest_home');
        $this->load->view('forgotpass_view');
        $this->load->view('foother_guest.php');
    }

    public function recoverpassword(){
        $this->form_validation->set_rules('user_email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            redirect(base_url('home/forgotpassword'));
        }
        else
        {
            $user_email = $this->input->post('user_email');
            $val = set_recovery_key($user_email);
            $this->_send_recovery_email($val);
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Email sent successfully'.'<br>'.'Check your email to reset your password.'.'</div>');
            redirect(site_url('home/login'));
        }
    }

    function changepass($data='')
    {
        $this->load->view('header_guest_home');
        $this->load->view('changepass_view', $data);
        $this->load->view('foother_guest.php');
    }

    #update password function
    function update_password()
    {
        if($this->session->userdata('recovery')!='yes')
            $this->form_validation->set_rules('current_password', 'current_password', 'required|callback_currentpass_check');
        $this->form_validation->set_rules('new_password', 'new_password', 'required|min_length[6]|matches[re_password]');
        $this->form_validation->set_rules('re_password', 'confirm_password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $data['error'] = validation_errors();
            $this->changepass($data);
        }
        else
        {
            $password = $this->input->post('new_password');
            $this->login_model->update_password($password);
            $this->session->set_userdata('recovery',"no");
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Password changed successfully'.'</div>');
            redirect(base_url('home/login'));
        }
    }


    public function about_us(){
        $data = array();

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $this->load->view('header_guest_home');
        $this->load->view('about_us',$data);
        $this->load->view('foother_guest.php');
    }

//    public function contact(){
//        $data = array();
//
//        $data['countries'] = $this->global_model->get('countries');
//        $data['profession'] = $this->global_model->get('profession');
//
//        $this->load->view('header_guest_home');
//        $this->load->view('contact',$data);
//        $this->load->view('foother_guest.php');
//    }

    public function feature(){
        $data = array();

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $this->load->view('header_guest_home');
        $this->load->view('feature',$data);
        $this->load->view('foother_guest.php');
    }

    public function email(){
        $data = array();

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $this->load->view('header_guest_home');
        $this->load->view('email',$data);
        $this->load->view('foother_guest.php');
    }

    public function contact()
    {
        $data = array();
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');

        $this->load->library('form_validation');
        $this->load->library('session');


        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|max_length[128]');
        $this->form_validation->set_rules('message', 'message', 'required');

        if($this->form_validation->run() == FALSE){

            $this->session->set_flashdata('error_msg', validation_errors('<div class="alert alert-danger text-center">', '</div>'));

            $this->load->view('header_guest_home');
            $this->load->view('contact',$data);
            $this->load->view('foother_guest.php');
        }else{
            $this->load->library('email');

            $this->email->from(set_value('email'), set_value('name'));
            $this->email->to('info@advertbd.com');
            $this->email->subject('Contact Email');
            $this->email->message(set_value('message'));

            if($this->email->send()){
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">We received your message! Will get back to you shortly!!!</div>');
            }else{
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Something went wrong! Please try again later.</div>');
            }

            $this->load->view('header_guest_home');
            $this->load->view('contact',$data);
            $this->load->view('foother_guest.php');
        }


    }






}
