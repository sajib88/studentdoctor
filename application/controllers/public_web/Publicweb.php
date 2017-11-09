<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publicweb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index() {

        $data = array();
        $data['page_title'] = 'My Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        
        

        $loginId = $this->session->userdata('login_id');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $countryInfo = $this->global_model->get_data('countries', array('id' => $data['user_info']['country']));
        $data['states'] = $this->global_model->get('states', array('country_id' => $countryInfo['id']));
        $data['user_info'] = $userInfo = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $data['onlinestore'] = $this->global_model->get('store', array('created_by' => $loginId));

        if ($this->input->post()) {
            $postData = $this->input->post();

            $this->form_validation->set_rules('appointment', 'appointment', 'trim');
            $this->form_validation->set_rules('title', 'title', 'trim');
            $this->form_validation->set_rules('url_name', 'url name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('address_1', 'address_1', 'trim');
            //$this->form_validation->set_rules('address_2', 'address_2', 'trim');
            $this->form_validation->set_rules('postal', 'postal', 'trim');
            $this->form_validation->set_rules('first_name', 'first name', 'trim');
            $this->form_validation->set_rules('last_name', 'last name', 'trim');
            $this->form_validation->set_rules('business_name', 'business name', 'trim');
            $this->form_validation->set_rules('business_website', 'business website', 'trim');
            $this->form_validation->set_rules('business_email', 'business email', 'trim');
            $this->form_validation->set_rules('business_telephone', 'business telephone', 'trim');
            $this->form_validation->set_rules('business_fax', 'business fax', 'trim');
            $this->form_validation->set_rules('specialty', 'specialty', 'trim');
            $this->form_validation->set_rules('special_interest', 'special interest', 'trim');

            if ($this->form_validation->run() == true) {

                $save['user_id'] = $loginId;
                $save['appointment'] = $postData['appointment'];
                $save['appointment_start_day'] = $postData['appointment_start_day'];
                $save['appointment_end_day'] = $postData['appointment_end_day'];
                /*$save['start_date'] = $postData['start_date'];
                $save['end_date'] = $postData['end_date'];*/
                $save['start_time'] = $postData['start_time'];
                $save['end_time'] = $postData['end_time'];
                $save['profession'] = $data['user_info']['profession'];
                $save['title'] = $postData['title'];
                $save['url'] = base_url() . $postData['url_name'];
                $save['description'] = $postData['description'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['address_1'] = $postData['address_1'];
                //$save['address_2'] = $postData['address_2'];
                $save['postal'] = $postData['postal'];
                $save['first_name'] = $postData['first_name'];
                $save['last_name'] = $postData['last_name'];
                $save['business_name'] = $postData['business_name'];
                $save['business_website'] = $postData['business_website'];
                $save['business_email'] = $postData['business_email'];
                $save['business_telephone'] = $postData['business_telephone'];
                $save['business_fax'] = $postData['business_fax'];
                $save['specialty'] = $postData['specialty'];
                $save['special_interest'] = $postData['special_interest'];
                //$save['online_store'] = $postData['store'];
                //$save['store_id'] = $postData['store_id'];


                if ($insertedId = $this->global_model->insert('public_website', $save)) {



                    if (isset($_FILES["photo1"]["name"]) && $_FILES["photo1"]["name"] != '') {
                        $this->PATH = './assets/file/publicweb/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo1'] = $this->resizeimg->image_upload('photo1', $this->PATH, 'size[480,320]', '', $photo_name);
                        $photo_data['ref_id'] = $loginId;
                        $photo_data['ref_name'] = 'public_web';
                        $photo_data['name'] = $save['photo1'];
                        $this->global_model->insert('photos', $photo_data);
                    }
                    else {

                    }

                    if (isset($_FILES["photo2"]["name"]) && $_FILES["photo2"]["name"] != '') {
                        $this->PATH = './assets/file/publicweb/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo2'] = $this->resizeimg->image_upload('photo2', $this->PATH, 'size[480,320]', '', $photo_name);
                        $photo1_data['ref_id'] = $loginId;
                        $photo1_data['ref_name'] = 'public_web';
                        $photo1_data['name'] = $save['photo2'];
                        $this->global_model->insert('photos', $photo1_data);
                    }
                    else {

                    }

                    uploadpublicweb();

                    if ($this->upload->do_upload('file1')) {
                        $fileInfo = $this->upload->data();
                        //$file_data['ref_id'] = $insertedId;
                        $file_data['ref_id'] = $loginId;
                        $file_data['ref_name'] = 'public_web';
                        $file_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('files', $file_data);
                    }

                    if ($this->upload->do_upload('file2')) {
                        $fileInfo = $this->upload->data();
                        //$file1_data['ref_id'] = $insertedId;
                        $file1_data['ref_id'] = $loginId;
                        $file1_data['ref_name'] = 'public_web';
                        $file1_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('files', $file1_data);
                    }

                    if ($this->upload->do_upload('audio')) {
                        $fileInfo = $this->upload->data();
                        // $audo_data['ref_id'] = $insertedId;
                        $audo_data['ref_id'] = $loginId;
                        $audo_data['ref_name'] = 'public_web';
                        $audo_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('audio', $audo_data);
                    }

                    if ($this->upload->do_upload('video')) {
                        $fileInfo = $this->upload->data();
                        //$vedio_data['ref_id'] = $insertedId;
                        $vedio_data['created_by'] = $loginId;
                        $vedio_data['ref_name'] = 'public_web';
                        $vedio_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('video', $vedio_data);
                    }

                    $this->session->set_flashdata('message', 'Save Successful');
                    redirect('public_web/publicweb/viewForEdit');
                }
            } else {
                $data['error'] = validation_errors();
            }
        }
        $varification = $this->global_model->get_data('doctor_varification', array('user_id' => $loginId, 'is_valid' => '0'));
        $is_exist = $this->global_model->get_data('doctor_varification', array('user_id' => $loginId));
        //print_r($varification);die;
        //print_r($data['user_info']);die;
        //$data['profession'] = $this->global_model->get('profession');

        if ($this->global_model->get_data('public_website', array('user_id' => $loginId, 'profile_status' => 'public')))
        {

            $data['message'] = "You have alredy posted a public Website";
            $data['message_2'] = "Plese visit your public website edit menu to any farther modification ! Thanks.";
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer');
        }elseif($data['user_info']['is_varified'] != '1'){
            if(!empty($varification['user_id'] != $loginId)) {
                $data['message'] = "Your profile is not varified.";
                $data['message_2'] = "To varify your profile please click the button bellow.";
                $data['message_3'] = "Varify your profile.";
                $this->load->view('header', $data);
                $this->load->view('message', $data);
                $this->load->view('footer');
            }else{
                $data['message'] = "Your varification process still on going.";
                $data['message_2'] = "Please wait, until we varified your profile.";
                $this->load->view('header', $data);
                $this->load->view('message', $data);
                $this->load->view('footer');
            }
        }
        else
        {
            $this->load->view('header', $data);
            $this->load->view('public_web/index', $data);
            $this->load->view('footer');
        }
    }

    public function view() {

        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');

        $data['photos'] = $this->global_model->get('photos', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $data['files'] = $this->global_model->get('files', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $data['audio'] = $this->global_model->get_data('audio', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $data['video'] = $this->global_model->get_data('video', array('created_by' => $loginId, 'ref_name' => 'public_web'));

        $data['website_info'] = $this->global_model->get_data('public_website', array('user_id' => $loginId));
        $data['user_info'] = $user_info = $this->global_model->get_data('users', array('id' => $loginId));
        $data['profession_type'] = $this->global_model->get_data('profession', array('id' => $user_info['profession']));
        $data['countries'] = $this->global_model->get('countries');

        if ($this->global_model->get_data('public_website', array('user_id' => $loginId, 'profile_status' => 'public')))
        {

            $this->load->view('header', $data);
            $this->load->view('public_web/view', $data);
            $this->load->view('footer');
        }
        else
        {


            $data['message'] = "You did not create  website yet, Please create your  website";
            $this->load->view('header', $data);
            $this->load->view('message', $data);
            $this->load->view('footer');

        }



    }

    public function delete() {
        $loginId = $this->session->userdata('login_id');
        $data['photos'] = $photos = $this->global_model->get('photos', array('ref_id' => $loginId, 'ref_name' => 'public_web'));

        $this->global_model->delete('public_website', array('user_id' => $loginId, 'profile_status' => 'public'));
        $this->global_model->delete('files', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $this->global_model->delete('photos', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $this->global_model->delete('video', array('created_by' => $loginId, 'ref_name' => 'public_web'));
        $this->global_model->delete('audio', array('ref_id' => $loginId, 'ref_name' => 'public_web'));



        redirect('public_web/publicweb');
    }

    public function viewForEdit() {
        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['website_info'] = $this->global_model->get_data('public_website', array('user_id' => $loginId));
        //$data['website_info'] = $this->global_model->get_data('public_website', array('user_id' => $data['website_info']));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['countries'] = $this->global_model->get('countries');




        $this->load->view('header', $data);
        $this->load->view('public_web/view_for_edit', $data);
        $this->load->view('footer');
    }

    public function edit() {

        $data = array();
        $data['page_title'] = 'Public Web';
        $data['tabActive'] = 'public';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        
        $data['website_info'] = $pubData = $this->global_model->get_data('public_website', array('user_id' => $loginId));
        $data['profession']  = $this->global_model->get('profession');
        $data['files'] = $files = $this->global_model->get('files', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $data['photos'] = $photos = $this->global_model->get('photos', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        //print_r($data['photos']);die;
        $data['video'] = $video = $this->global_model->get_data('video', array('created_by' => $loginId, 'ref_name' => 'public_web'));
        $data['audio'] = $audio = $this->global_model->get_data('audio', array('ref_id' => $loginId, 'ref_name' => 'public_web'));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['onlinestore'] = $this->global_model->get('store', array('created_by' => $loginId));
        $data['countries'] = $this->global_model->get('countries');
        $id = $data['website_info']['id'];
        $data['states'] = publicgetStatesByCountry($id);


        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('title', 'user name', 'trim');
            $this->form_validation->set_rules('description', 'description', 'trim');
            $this->form_validation->set_rules('country', 'country', 'trim');
            $this->form_validation->set_rules('state', 'state', 'trim');
            $this->form_validation->set_rules('city', 'city', 'trim');
            $this->form_validation->set_rules('address_1', 'address_1', 'trim');
           // $this->form_validation->set_rules('address_2', 'address_2', 'trim');
            $this->form_validation->set_rules('postal', 'postal', 'trim');
            $this->form_validation->set_rules('business_name', 'business name', 'trim');
            $this->form_validation->set_rules('business_website', 'business website', 'trim');
            $this->form_validation->set_rules('business_email', 'business email', 'trim');
            $this->form_validation->set_rules('business_telephone', 'business telephone', 'trim');
            $this->form_validation->set_rules('business_fax', 'business fax', 'trim');
            $this->form_validation->set_rules('specialty', 'specialty', 'trim');
            $this->form_validation->set_rules('special_interest', 'special interest', 'trim');

            if ($this->form_validation->run() == true) {
                $save['appointment'] = $postData['appointment'];
                $save['online_store'] = $postData['online_store'];
                if($save['appointment'] == 0){
                    /*$save['start_date'] = 'null';
                    $save['end_date'] = 'null';*/
                    $save['appointment_start_day'] = 'null';
                    $save['appointment_end_day'] = 'null';
                    $save['start_time'] = 'null';
                    $save['end_time'] = 'null';

                }
                else{
                    /*$save['start_date'] = $postData['start_date'];
                    $save['end_date'] = $postData['end_date'];*/
                    $save['appointment_start_day'] = $postData['appointment_start_day'];
                    $save['appointment_end_day'] = $postData['appointment_end_day'];
                    $save['start_time'] = $postData['start_time'];
                    $save['end_time'] = $postData['end_time'];
                }


                $save['title'] = $postData['title'];
                $save['description'] = $postData['description'];
                $save['country'] = $postData['country'];
                $save['state'] = $postData['state'];
                $save['city'] = $postData['city'];
                $save['address_1'] = $postData['address_1'];
                //$save['address_2'] = $postData['address_2'];
                $save['postal'] = $postData['postal'];
                $save['business_name'] = $postData['business_name'];
                $save['business_website'] = $postData['business_website'];
                $save['business_email'] = $postData['business_email'];
                $save['business_telephone'] = $postData['business_telephone'];
                $save['business_fax'] = $postData['business_fax'];
                $save['specialty'] = $postData['specialty'];
                $save['special_interest'] = $postData['special_interest'];

                if ($this->global_model->update('public_website', $save, array('user_id' => $loginId))) {



                    if (isset($_FILES["photo1"]["name"]) && $_FILES["photo1"]["name"] != '') {
                    $this->PATH = './assets/file/publicweb/';
                    $photo_name = time();
                    if (!file_exists($this->PATH)) {
                        mkdir($this->PATH, 0777, true);
                    }
                        $save['photo1'] = $this->resizeimg->image_upload('photo1', $this->PATH, 'size[318,210]', '', $photo_name);
                        $photo_data['ref_id'] = $loginId;
                        $photo_data['ref_name'] = 'public_web';
                        $photo_data['name'] = $save['photo1'];
                        $this->global_model->update('photos', $photo_data, array('id' => $photos[0]->id));
                    }
                    else {

                    }

                    if (isset($_FILES["photo2"]["name"]) && $_FILES["photo2"]["name"] != '') {
                        $this->PATH = './assets/file/publicweb/';
                        $photo_name = time();
                        if (!file_exists($this->PATH)) {
                            mkdir($this->PATH, 0777, true);
                        }
                        $save['photo2'] = $this->resizeimg->image_upload('photo2', $this->PATH, 'size[318,210]', '', $photo_name);
                        $photo1_data['ref_id'] = $loginId;
                        $photo1_data['ref_name'] = 'public_web';
                        $photo1_data['name'] = $save['photo2'];
                        $this->global_model->update('photos', $photo1_data, array('id' => $photos[1]->id));
                    }
                    else {

                    }

                    uploadpublicweb();

                    if ($this->upload->do_upload('file1')) {
                        $fileInfo = $this->upload->data();
                        //$file_data['ref_id'] = $pubData['id'];
                        $file_data['ref_id'] = $loginId;
                        $file_data['ref_name'] = 'public_web';
                        $file_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('files', $file_data);

                        if (is_array($files) && !empty($files[0])) {
                            $this->global_model->delete('files', array('id' => $files[0]->id));
                        }
                    }

                    if ($this->upload->do_upload('file2')) {
                        $fileInfo = $this->upload->data();
                        //$file1_data['ref_id'] = $pubData['id'];
                        $file1_data['ref_id'] = $loginId;
                        $file1_data['ref_name'] = 'public_web';
                        $file1_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('files', $file1_data);
                        if (is_array($files) && !empty($files[1])) {
                            $this->global_model->delete('files', array('id' => $files[1]->id));
                        }
                    }

                    if ($this->upload->do_upload('audio')) {
                        $fileInfo = $this->upload->data();
                        //$audo_data['ref_id'] = $pubData['id'];
                        $audo_data['ref_id'] = $loginId;
                        $audo_data['ref_name'] = 'public_web';
                        $audo_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('audio', $audo_data);
                        if (is_array($audio) && !empty($audio['name'])) {
                            $this->global_model->delete('audio', array('id' => $audio['id']));
                        }
                    }

                    if ($this->upload->do_upload('video')) {
                        $fileInfo = $this->upload->data();
                        //$vedio_data['ref_id'] = $pubData['id'];
                        $vedio_data['created_by'] = $loginId;
                        $vedio_data['ref_name'] = 'public_web';
                        $vedio_data['name'] = $fileInfo['file_name'];
                        $this->global_model->insert('video', $vedio_data);
                        if (is_array($video) && !empty($video['name'])) {
                            $this->global_model->delete('video', array('id' => $video['id']));
                        }
                    }

                    $this->session->set_flashdata('message', 'Update Successful');
                    redirect(base_url('pub/viewedit'));
                }
            } else {
                $data['error'] = validation_errors();
            }
        }

        $this->load->view('header', $data);
        $this->load->view('public_web/edit', $data);
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
    public function getState() {
        header('Content-type: application/json');
        $data = array();
        $id = $this->input->post('state');
        $states = $this->global_model->get('states', array('country_id' => $id));
        echo json_encode($states);
        /*$data['states'] = $states;
        echo $this->load->view('state', $data, TRUE);
        exit;*/
    }


}

?>
