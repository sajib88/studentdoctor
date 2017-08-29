<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 1/9/2017
 * Time: 1:15 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class file extends CI_Controller
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
        $data['page_title'] = 'File add';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $data['user_id'] = $loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['allfiles'] = $this->global_model->get('files', array('ref_id'=>$loginId),false,array('filed'=>'id','order'=>'DESC'));

        $this->load->view('header', $data);
        $this->load->view('file/file_add_view',$data);
        $this->load->view('footer');
    }

    public function upload(){

        if ( ! empty($_FILES))
        {
            //die($this->upload->data());
            $config['upload_path'] = "./assets/uploads/file";
            $config['allowed_types'] = 'pdf|csv|docx|doc|XLS|JPG|GIF|PNG|jpg|gif|png|jpeg';
            $config['file_name'] =time();
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload("file")) {
                echo "File cannot be uploaded. please upload only Document and Image File.";
            }
            else{
                $fileInfo = $this->upload->data();
                $data['name'] = $fileInfo['file_name'];
                if(!empty($_POST)){
                    $data['ref_id'] = $_POST['userID'];
                    $data['ref_name'] = 'website_file';
                    $this->global_model->insert('files', $data);
                    echo 'File Uploaded successfully';
                }
            }
        }
        //$this->listFiles();
    }
    public function delete($id=''){
        $data = array();
        $loginId = $this->session->userdata('login_id');
        $data['status'] = '0';
        $this->global_model->delete('files',array('ref_id' => $loginId,'id'=>$id));
        redirect(base_url('file/file/index'));
    }

    public function listallfiles(){
        $data = array();
        $data['page_title'] = 'File add';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');

        $data['user_id'] = $loginId;
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['allfiles'] = $this->global_model->get('files', array('ref_name'=> 'website_file'),false,array('filed'=>'id','order'=>'DESC'));

        $this->load->view('header', $data);
        $this->load->view('file/filelist',$data);
        $this->load->view('footer');
    }





}
