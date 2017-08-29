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
        

    }

    public function index($msg=''){
        $data = array();
        $data['page_title'] = 'Add CES';
        $data['error'] = $msg;

        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['main_cat'] = $this->global_model->get('classified_main_cat');
        //$data['login_id'] = $loginId;
        $this->load->view('admin/header', $data);
        $this->load->view('admin/ces/edit_ces_view', $data);
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

    public function delete()
    {
        $id = $this->uri->segment('5');
        if ($this->global_model->delete('ces', array('id' => $id))) {
            $this->session->set_flashdata('success', 'Delete successfully!');
            redirect('admin/ces/Admin_Ces_controller/allces');
        }

    }


    public function edit($cesID=''){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'edit';
        $data['error'] = '';

        $id = $this->uri->segment('4');
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');
        // $data['login_id'] = $loginId;




        $data['value'] = $this->global_model->get_data('ces', array('id' => $cesID));
        $tablename = 'ces';
        $data['states'] = getStatesByCountry($tablename,$id);

        /*print '<pre>';
        print_r($data['personaldata']);exit();*/

        $this->load->view('admin/header', $data);
        $this->load->view('admin/ces/edit_ces_view', $data);
        $this->load->view('admin/footer');

    }

    public function updateCES(){

        $data = array();
        $data['page_title'] = 'Edit CES';
        $data['error'] = '';
        // $loginId = $this->session->userdata('login_id');
        $id     = $this->input->post('id');


        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else{
            $data = array();
            // $data['uid'] = $loginId;
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['ce_type'] = $this->input->post('ce_type');
            $data['price'] = $this->input->post('price');
            $data['special_price'] = $this->input->post('special_price');
            $data['country'] = $this->input->post('country');
            $data['state'] = (!empty($this->input->post('state'))?$this->input->post('state'):'');
            $data['postcode'] = $this->input->post('postcode');
            $data['address1'] = $this->input->post('address1');
            $data['address2'] = $this->input->post('address2');
            $data['business_name'] = $this->input->post('business_name');
            $data['business_email'] = $this->input->post('business_email');
            $data['business_phone'] = $this->input->post('business_phone');
            $data['business_fax'] = $this->input->post('business_fax');
            $data['business_website'] = $this->input->post('business_website');
            $data['status'] = 1;
           // $data['profession_view'] = (!empty($this->input->post('profession')))?implode(',', $this->input->post('profession')):'';



            uploadCES();


            //// PHOTO UPLOAD
            if ($this->upload->do_upload('primary_image')) {
                $fileInfo = $this->upload->data();
                $pic1['name'] = $fileInfo['file_name'];
                $data['primary_image'] = $pic1['name'];
            }

            if ($this->upload->do_upload('image2')) {
                $fileInfo = $this->upload->data();
                $pic2['name'] = $fileInfo['file_name'];
                $data['image2'] = $pic2['name'];
            }

            if ($this->upload->do_upload('image3')) {
                $fileInfo = $this->upload->data();
                $pic3['name'] = $fileInfo['file_name'];
                $data['image3'] = $pic3['name'];
            }

            //video upload
            if ($this->upload->do_upload('primary_video')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['primary_video'] = $video['name'];
            }

            //video upload
            if ($this->upload->do_upload('video1')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['video1'] = $video['name'];
            }

            //sound upload
            if ($this->upload->do_upload('primary_sound')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['primary_sound'] = $sound['name'];
            }
            //sound upload
            if ($this->upload->do_upload('sound1')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['sound1'] = $sound['name'];
            }


            //// File UPLOAD
            if ($this->upload->do_upload('primary_file')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['primary_file'] = $file1['name'];
            }
            if ($this->upload->do_upload('file2')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['file2'] = $file1['name'];
            }

              $id = $this->uri->segment('5');

             

           /* print '<pre>';
            print_r($data);die;*/
            
            $result = $this->global_model->update('ces',$data,array('id'=>$id));
            if($result > 0)
            {
                $this->session->set_flashdata('msg', '<div class="alert alert-success" id="success-alert">'.'Data Update Successfully'.'</div>');
            }
            redirect(base_url('admin/ces/Admin_Ces_controller/edit/'.$id));


        }

    }
   


 

  

   
}
?>