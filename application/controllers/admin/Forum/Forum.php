<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_admin()) {
            redirect('admin/login');
        }

    }



    public function all()
    {
        $table = 'forum_category';
        $data = array();
        $data['page_title'] = 'Forum List';
        $data['allforum']  	 = $this->global_model->get($table, array('status' => 1));
        $data['allforumPending']  	 = $this->global_model->get($table, array('status' => 0));
        //print_r($data['allforumPending']);die;


        $this->load->view('admin/header', $data);
        $this->load->view('admin/forum/forumList', $data);
        $this->load->view('admin/footer');
    }

    public function changeStatus($id, $changeStatus)
    {
        $status['status'] = $changeStatus;
        if(!empty($id)){
            $this->global_model->update('forum_category', $status, array('cat_id' => $id));
            $this->session->set_flashdata('success', 'Status update successfully!');
            redirect('admin/Forum/Forum/all');
        }
        echo $id;die;
    }

    public function delete($id){

        if ($this->global_model->delete('forum_category', array('cat_id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('admin/Forum/Forum/all');
        }

    }


}
?>