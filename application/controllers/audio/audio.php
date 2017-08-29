<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 1/6/2017
 * Time: 11:17 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class audio extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        //$this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
    }

    public function index(){
        $data = array();
        $data['page_title'] = 'Audio';
        $data['tabActive'] = 'active';
        $data['error'] = '';

        $loginId = $this->session->userdata('login_id');

        $data['user_id'] = $loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));       

        $this->load->view('header', $data);
        $this->load->view('audio/audio_add_view',$data);
        $this->load->view('footer');
    }

    public function add_album(){

        $user_id=$this->input->post('user_id_post');
        $album_name=$this->input->post('album_name');
        $table = 'audio_album';
        $where = array('user_id'=>$user_id,'album_name'=>$album_name,'status'=>'1');
        $test=$this->global_model->get_data($table,$where);

        if($test>0){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Name Already Exist'.'</div>');
            $this->index();
        }
        else{
            $data = array(
                'user_id'=>$user_id,
                'album_name'=>$album_name,
                'status'=>'1'
            );

            $insert_id = $this->global_model->insert($table, $data);
            if($insert_id>0)
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Created'.'</div>');
                $this->index();
            }
        }
    }

    public function viewall(){
        $data = array();
        $data['page_title'] = 'Audio Album';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('audio_album',array('user_id' => $loginId,'status'=>'1'));
        $this->load->view('header', $data);
        $this->load->view('audio/viewall',$data);
        $this->load->view('footer');
    }

    public function edit($id=''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;
        $data['album_id'] = $id;

        $data['albumdata'] = $this->global_model->get_data('audio_album',array('user_id' => $loginId,'album_id'=>$id));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('audio/edit_album',$data);
        $this->load->view('footer');

    }

    public function update(){
        $data=array();

        $user_id = $this->input->post('user_id_post');
        $album_id = $this->input->post('album_id');
        $album_name = $this->input->post('album_name');
        $table = 'audio_album';
        //$like = array('album_name'=>$album_name);
        $where = array('user_id'=>$user_id,'album_name'=>$album_name,'status'=>'1');
        $test=$this->global_model->get_data($table,$where);

        if($test>0){
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Name Already Exist'.'</div>');
            redirect(base_url('audio/audio/edit/'.$album_id));
        }
        else{
            $data = array(
                'user_id'=>$user_id,
                'album_name'=>$album_name,
                'status'=>'1'
            );

            $this->global_model->update($table, $data,array('album_id'=>$album_id));
            $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Update'.'</div>');
            redirect(base_url('audio/audio/edit/'.$album_id));
        }
    }
    
    public function uploadAudio($album_id=null){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        if($album_id != ''){
            $data['allvideos'] = $this->global_model->get('audio', array('album_id' => $album_id,'ref_id'=>$loginId));

            $data['album_id'] = $album_id;
            $data['user_id'] = $loginId;
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $this->load->view('header', $data);
            $this->load->view('audio/addAudioView', $data);
            $this->load->view('footer');

        }
    }

    public function myaudio(){
        $data = array();
        $loginId = $this->session->userdata('login_id');
            $data['allvideos'] = $this->global_model->get('audio', array('ref_name'=> 'website_audio'));
            $data['user_id'] = $loginId;
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $this->load->view('header', $data);
            $this->load->view('audio/myAllAudio', $data);
            $this->load->view('footer');
    }

    public function upload(){

        if ( ! empty($_FILES))
        {
            //die($this->upload->data());
            $config['upload_path'] = "./assets/uploads/audio";
            $config['allowed_types'] = 'mp3|wav|MP3';
            $config['file_name'] =time();

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload("file")) {
                echo "File cannot be uploaded. please upload only mp3.";
            }
            else{
                $fileInfo = $this->upload->data();
                $data['name'] = $fileInfo['file_name'];
                if(!empty($_POST)){
                    $data['ref_id'] = $_POST['userID'];
                    $data['ref_name'] = 'website_audio';
                    $data['album_id'] = $_POST['album_id'];
                    $this->global_model->insert('audio', $data);
                    echo 'Audio Uploaded successfully';
               }
            }
        }
        //$this->listFiles();
    }



    ////// SAJIB //////
    public function listofalbum(){
        $data = array();
        $data['page_title'] = 'Sound :List';
        $data['tabActive'] = 'sound';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('audio',array('status'=>'1'));
        $this->load->view('header', $data);
        $this->load->view('video/listofalbum',$data);
        $this->load->view('footer');
    }


    public function alluservideo($album_id =''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        if($album_id != ''){
            $data['allvideos'] = $this->global_model->get('audio', array('album_id' => $album_id));

            $data['album_id'] = $album_id;
            $data['user_id'] = $loginId;
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $this->load->view('header', $data);
            $this->load->view('video/alluservideo', $data);
            $this->load->view('footer');

        }


    }

    ////// sajib .......

}