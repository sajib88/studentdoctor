<?php
/**
 * Created by PhpStorm.
 * User: ALAM
 * Date: 09-Dec-16
 * Time: 10:27 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Personal extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('global');
        $this->load->library('upload');
        if (!check_admin()) {
            redirect('admin/login');
        }
        //$this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');
    }

   
    public function all()
    {
        $table = 'personals';
        $data = array();
        $data['page_title'] = 'All Personals';
        $data['allpersonals']  	 = $this->global_model->get($table);
        /*print '<pre>';
        print_r($data['allpersonals']);die;*/

        $this->load->view('admin/header', $data);
        $this->load->view('admin/personal/allPersonals_view', $data);
        $this->load->view('admin/footer');

    }


    public function edit($id = ''){
        $this->load->helper('global_helper');
        $data = array();
        $data['page_title'] = 'edit';
        $data['error'] = '';

        $id = $this->uri->segment('5');
        $data['countries'] = $this->global_model->get('countries');
        $data['profession'] = $this->global_model->get('profession');
        //$data['states'] = $this->global_model->get('states');



        $data['personaldata'] = $this->global_model->get_data('personals', array('id' => $id));
        $data['states'] = privategetStatesByCountry($id);

        /*print '<pre>';
        print_r($data['personaldata']);exit();*/

        $this->load->view('admin/header', $data);
        $this->load->view('admin/personal/editPersonal', $data);
        $this->load->view('admin/footer');
    }
    
    public function updatePersonal(){

        $data = array();
        $data['page_title'] = 'Edit Personal';
        $data['error'] = '';
        $id 	= $this->input->post('id');


        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('country', 'country', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->edit($id);
        }
        else{
            $data = array();
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['body'] = $this->input->post('body');
            $data['height'] = $this->input->post('height');
            $data['ethnicity'] = $this->input->post('ethnicity');
            $data['maritalstatus'] = $this->input->post('maritalstatus');
            $data['age'] = $this->input->post('age');
            $data['child'] = $this->input->post('child');
            $data['lang'] = $this->input->post('lang');
            $data['religion'] = $this->input->post('religion');
            $data['smoker'] = $this->input->post('smoker');
            $data['drinker'] = $this->input->post('drinker');
            $data['entimicyorpreference'] = $this->input->post('entimicyorpreference');
            $data['eyecolor'] = $this->input->post('eyecolor');
            $data['haircolor'] = $this->input->post('haircolor');
            $data['country'] = $this->input->post('country');
            $data['state'] = (!empty($this->input->post('state'))?$this->input->post('state'):'');
            $data['city'] = $this->input->post('city');
            $data['zip'] = $this->input->post('zip');
            $data['iam'] = $this->input->post('iam');
            $data['interestedin'] = $this->input->post('interestedin');
            $data['profession_view'] = (!empty($this->input->post('profession')))?implode(',', $this->input->post('profession')):'';

            //// (image upload funtion)
            uploadPersonals();
            ///

            //// PHOTO UPLOAD
            if ($this->upload->do_upload('primary_photo')) {
                $fileInfo = $this->upload->data();
                $pic1['name'] = $fileInfo['file_name'];
                $data['primary_photo'] = $pic1['name'];
            }

            if ($this->upload->do_upload('photo1')) {
                $fileInfo = $this->upload->data();
                $pic2['name'] = $fileInfo['file_name'];
                $data['photo1'] = $pic2['name'];
            }

            if ($this->upload->do_upload('photo2')) {
                $fileInfo = $this->upload->data();
                $pic3['name'] = $fileInfo['file_name'];
                $data['photo2'] = $pic3['name'];
            }

            //video upload
            if ($this->upload->do_upload('primary_videos')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['primary_videos'] = $video['name'];
            }

            //video upload
            if ($this->upload->do_upload('video1')) {
                $fileInfo = $this->upload->data();
                $video['name'] = $fileInfo['file_name'];
                $data['video1'] = $video['name'];
            }

            //sound upload
            if ($this->upload->do_upload('primary_sounds')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['primary_sounds'] = $sound['name'];
            }
            //sound upload
            if ($this->upload->do_upload('sound1')) {
                $fileInfo = $this->upload->data();
                $sound['name'] = $fileInfo['file_name'];
                $data['sound1'] = $sound['name'];
            }


            //// File UPLOAD
            if ($this->upload->do_upload('primary_files')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['primary_files'] = $file1['name'];
            }
            if ($this->upload->do_upload('file1')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $data['file1'] = $file1['name'];
            }

            

            //$result = $this->global_model->update('personals',$data,array('id'=>$id));
            if($this->global_model->update('personals',$data,array('id'=>$id)))
            {
                $this->session->set_flashdata('msg', 'Personal Updated Successfully');
            }
            redirect(base_url('admin/Personal/Personal/all'));
        }
        
    }




    //// for remove
    public function delete()
    {
        $id = $this->uri->segment('5');
        if ($this->global_model->delete('personals', array('id' => $id))) {
            $this->session->set_flashdata('msg', 'Personal Deleted successfully!');
            redirect('admin/Personal/Personal/all');
        }

    }




}
?>