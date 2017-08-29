<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Ces_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_admin()) {
            redirect('admin/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');

    }

    public function index($msg=''){
        $data = array();
        $data['page_title'] = 'Add CES';
        $data['error'] = $msg;

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['main_cat'] = $this->global_model->get('classified_main_cat');
        $data['login_id'] = $loginId;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/ces/add_view', $data);
        $this->load->view('admin/footer');

    }
    
   

    public function allces()
    {
        $table = 'ces';
        $data = array();
        $data['page_title'] = 'All ces';
        $data['allces']  	 = $this->global_model->get($table);
        /*print '<pre>';
        print_r($data['allpersonals']);die;*/

        
        $this->load->view('admin/header', $data);
        $this->load->view('admin/ces/allces_view', $data);
        $this->load->view('admin/footer');
    }

   

  

   
}
?>