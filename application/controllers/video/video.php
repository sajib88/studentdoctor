<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class video extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        //$this->load->library('upload');
        if (!check_login()) {
            redirect('home/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');
    }
    public function index(){
        $data = array();
        $data['page_title'] = 'Video Album';
        $data['tabActive'] = 'Private';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $data['user_id']=$loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('video_album');

        $this->load->view('header', $data);
        $this->load->view('video/video_view',$data);
        $this->load->view('footer');
    }

    //Add Album Name
    public function add_album(){
        $data=array();
            $profession=$this->input->post('profession_post');
            $user_id=$this->input->post('user_id_post');
            $album_name=$this->input->post('album_name_post');
            $table = 'video_album';
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

                $insert_id = $this->global_model->insert('video_album', $data);
                if($insert_id>0)
                {
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Created'.'</div>');
                    $this->index();
                }
            }
    }

    public function viewall(){
        $data = array();
        $data['page_title'] = 'Photo Album';
        $data['tabActive'] = 'Private';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('video_album',array('user_id' => $loginId,'status'=>'1'));
        $this->load->view('header', $data);
        $this->load->view('video/viewall',$data);
        $this->load->view('footer');
    }

    public function delete($id=''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        $data['status'] = '0';
        $this->global_model->update('video_album',$data,array('user_id' => $loginId,'album_id'=>$id));
        redirect(site_url('video/video/viewall'));
    }

    public function edit($id=''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;
        $data['album_id'] = $id;

        $data['albumdata'] = $this->global_model->get_data('video_album',array('user_id' => $loginId,'album_id'=>$id));
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $this->load->view('header', $data);
        $this->load->view('video/edit_album',$data);
        $this->load->view('footer');
    }

    //update Album Name
    public function update(){
            $data=array();

            $user_id = $this->input->post('user_id_post');
            $album_id = $this->input->post('album_id');
            $album_name = $this->input->post('album_name_post');
            $table = 'video_album';
            //$like = array('album_name'=>$album_name);
            $where = array('user_id'=>$user_id,'album_name'=>$album_name,'status'=>'1');
            $test=$this->global_model->get_data($table,$where);

            if($test>0){
                $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Name Already Exist'.'</div>');
                redirect(site_url('video/video/edit/'.$album_id));
            }
            else{
                $data = array(
                    'user_id'=>$user_id,
                    'album_name'=>$album_name,
                    'status'=>'1'
                );

                $this->global_model->update('video_album', $data,array('album_id'=>$album_id));
                $this->session->set_flashdata('msg', '<div class="alert alert-success">'.'Album Update'.'</div>');
                redirect(site_url('video/video/edit/'.$album_id));
            }
    }
    
    public function uploadVideo($album_id =''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        if($album_id != ''){            
            $data['allvideos'] = $this->global_model->get('video', array('album_id' => $album_id,'created_by'=>$loginId));

            $data['album_id'] = $album_id;
            $data['user_id'] = $loginId;
            $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
            $this->load->view('header', $data);
            $this->load->view('video/addVideoView', $data);
            $this->load->view('footer');

        }
    }
    
    public function upload(){

        if ( ! empty($_FILES))
        {
            $config['upload_path'] = "./assets/uploads";
            $config['allowed_types'] = 'mp4|ogv';
            $config['file_name'] =time();
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload("file")) {
                echo "File cannot be uploaded. please upload only video.";
            }
            else{
                $fileInfo = $this->upload->data();
                $data['name'] = $fileInfo['file_name'];
                if(!empty($_POST)){
                    $data['created_by'] = $_POST['userID'];
                    $data['ref_name'] = 'website_video';
                    $data['album_id'] = $_POST['album_id'];
                    $this->global_model->insert('video', $data);
                    echo 'Video Uploaded successfully';
                }
            }
        }
        //$this->listFiles();
    }
    private function listFiles()
    {
        $files = $this->global_model->get('video',array('created_by'=>$this->session->userdata('login_id')));
        //$this->load->helper('file');
        //$files = get_filenames("./assets/uploads");
        echo json_encode($files);
    }



    public function  delete_album(){
        $album_id=$this->uri->segment(4);
        $photos=$this->db->select('*')->where('album_id',$album_id)->get('photos');
        if($photos->num_rows()>0){
            foreach ($photos->result()as $row){
                $image_name=$row->name;
                unlink(FCPATH . './assets/file/'. $image_name);
               // delete_files(site_url() . '/assets/file/'. $image_name);
            }
            $tables = array('album', 'photos');
            $this->db->where('album_id', $album_id);
            $query=$this->db->delete($tables);
    }else{
            $tables = array('album', 'photos');
            $this->db->where('album_id', $album_id);
            $query=$this->db->delete($tables);
        }
        redirect('photo/photo/index');

    }



    ////// SAJIB //////
    public function listofalbum(){
        $data = array();
        $data['page_title'] = 'Photo Album';
        $data['tabActive'] = 'Private';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $data['user_id']=$loginId;

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['album'] = $this->global_model->get('video_album',array('status'=>'1'));
        $this->load->view('header', $data);
        $this->load->view('video/listofalbum',$data);
        $this->load->view('footer');
    }


    public function alluservideo($album_id =''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        if($album_id != ''){
            $data['allvideos'] = $this->global_model->get('video', array('album_id' => $album_id));

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