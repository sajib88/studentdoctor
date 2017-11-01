<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        $this->load->library('Resizeimg');
        if (!check_login()) {
            redirect('home/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');


    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Message';
        $loginId = $this->session->userdata('login_id');
        $data['profession'] = $this->global_model->get('profession');
        $data['message'] = $this->global_model->get('messages', array('receiver_id'=>$loginId));

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['login_id'] = $loginId;

        $this->load->view('header', $data);
        $this->load->view('message/message', $data);
        $this->load->view('footer', $data);

    }

    public function sentMessages(){
        $data = array();
        $data['page_title'] = 'Sent Message';
        $loginId = $this->session->userdata('login_id');
        $data['profession'] = $this->global_model->get('profession');
        $data['message'] = $this->global_model->get('messages', array('sender_id'=>$loginId));

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['login_id'] = $loginId;

        $this->load->view('header', $data);
        $this->load->view('message/sent_message', $data);
        $this->load->view('footer', $data);

    }

    public function compose(){
        $data = array();
        $data['page_title'] = 'Compose';
        $loginId = $this->session->userdata('login_id');
        $data['profession'] = $this->global_model->get('profession');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('subject', 'subject', 'trim');
            $this->form_validation->set_rules('message', 'message', 'trim');

            if ($this->form_validation->run() == true) {
                $save['profession'] = $postData['profession'];
                $save['sender_id'] = $loginId;
                $save['receiver_id'] = $postData['receiver_id'];
                $save['subject'] = $postData['subject'];
                $save['message'] = $postData['message'];
                $save['timestamp'] = date('Y-m-d H:i:s', time());

                uploadMessage();
                //// File UPLOAD
                if ($this->upload->do_upload('attachment')) {
                    $fileInfo = $this->upload->data();
                    $file1['name'] = $fileInfo['file_name'];
                    $save['attachment'] = $file1['name'];
                }
                if ($ref_id = $this->global_model->insert('messages', $save)) {
                    $this->session->set_flashdata('message', 'Message sent successfully.');
                }
            }

        }

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['login_id'] = $loginId;

        $this->load->view('header', $data);
        $this->load->view('message/compose', $data);
        $this->load->view('footer', $data);

    }

    public function read($id="", $status=""){
        $data = array();
        $data['page_title'] = 'Read Message';
        $loginId = $this->session->userdata('login_id');
        $data['profession'] = $this->global_model->get('profession');
        $data['read_message'] = $this->global_model->get_data('messages', array('id' => $id));

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['login_id'] = $loginId;
        $update['status'] = $status;
        $this->global_model->update('messages', $update, array('id'=>$id));

        $this->load->view('header', $data);
        $this->load->view('message/read_message', $data);
        $this->load->view('footer', $data);
    }


    public function getProfessionByAjax() {
        $data = array();
        $id = $this->input->post('state');
        $user= $this->global_model->get('users', array('profession' => $id));
        $data['get_users'] = $user;
        echo $this->load->view('users', $data, TRUE);
        exit;
    }

    public function delete($id_1=""){
        if($this->input->post('id')){
            foreach ($this->input->post('id') as $id){
                $this->global_model->delete('messages', array('id' => $id));
            }
        }else{
            $this->global_model->delete('messages', array('id' => $id_1));
            redirect(base_url('message'));
        }
    }

}