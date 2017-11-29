<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_controller extends CI_Controller
{
     public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
        $this->load->library('Resizeimg');
        if (!check_admin()) {
            redirect('admin/login');
        }
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger form-error">', '</div>');


    }

    public function blog($msg =''){
        $data = array();
        $data['page_title'] = 'Blogs';
        $data['error'] = $msg;
         
        $data['allblog'] = $this->global_model->get('blog_front');

         $this->load->view('admin/header', $data);
         $this->load->view('admin/blog/blog_view', $data);
         $this->load->view('admin/footer', $data);
    }

    public function create($msg =''){

        $data = array();
        $data['page_title'] = 'Create Blogs';
        $data['error'] = $msg;

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $msg = '<div class="alert alert-danger form-error">'.'ERROR'.'</div>';
            //echo 'alert(message successfully sent yes)';
           // $this->index($msg);
        }
        else{
            //echo 'alert(message successfully sent No)';
            $data = array();
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['cat_type'] = $this->input->post('cat_type');
            $data['date'] = $this->input->post('date');
            $data['time'] = $this->input->post('time');
            $data['status'] = 1;
            $data['tag'] = $this->input->post('tag');
            $data['keyword'] = $this->input->post('keyword');

          
             $this->PATH = './assets/file/blog';
            if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[300,300]', '', $photo_name);
            } else {
                $data['primary_image'] = '';
            }


            // uploadBLOG();

            // // PHOTO UPLOAD
            // if ($this->upload->do_upload('primary_image')) {

            //     $fileInfo = $this->upload->data();
            //     $pic1['name'] = $fileInfo['file_name'];
            //     $data['primary_image'] = $pic1['name'];
            // }

            //  if ($this->upload->do_upload('image1')) {
            //     $fileInfo = $this->upload->data();
            //     $pic2['name'] = $fileInfo['file_name'];
            //     $data['image1'] = $pic2['name'];
            // }
            
            // if ($this->upload->do_upload('image2')) {
            //     $fileInfo = $this->upload->data();
            //     $pic2['name'] = $fileInfo['file_name'];
            //     $data['image2'] = $pic2['name'];
            // }

            // if ($this->upload->do_upload('image3')) {
            //     $fileInfo = $this->upload->data();
            //     $pic3['name'] = $fileInfo['file_name'];
            //     $data['image3'] = $pic3['name'];
            // }

            



           
            if ($post_id = $this->global_model->insert('blog_front', $data)) {
                        $this->session->set_flashdata('message', 'New Blog Ceated Successfully');
                        redirect('admin/Blog/Blog_controller/create');
                       //redirect('profile/profile');
                    }

             
                

        }


         $this->load->view('admin/header', $data);
        $this->load->view('admin/blog/create_blog', $data);
        $this->load->view('admin/footer', $data);
        
    }



    public function edit($id="")
    {
        $data1 = array();
        $data1['page_title'] = 'Update Blog';
        $data1['tabActive'] = 'Blog';
        $data1['error'] = '';

        $this->form_validation->set_rules('title', 'title', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->input->post()) {
            $postData = $this->input->post();
            //$this->form_validation->set_rules('classified', 'classified', 'trim');
           

            if ($this->form_validation->run() == true) {
            $data['id'] = $postData['id'];
            $data['title'] = $postData['title'];
            $data['description'] = $postData['description'];
            $data['cat_type'] = $postData['cat_type'];
            $data['date'] = $postData['date'];
            $data['time'] = $postData['time'];
            $data['tag'] = $postData['tag'];
            $data['keyword'] = $postData['keyword'];

          



            uploadBLOG();


            //// PHOTO UPLOAD
            if ($this->upload->do_upload('primary_image')) {
                $fileInfo = $this->upload->data();
                $pic1['name'] = $fileInfo['file_name'];
                $data['primary_image'] = $pic1['name'];
            }

             if ($this->upload->do_upload('image1')) {
                $fileInfo = $this->upload->data();
                $pic2['name'] = $fileInfo['file_name'];
                $data['image1'] = $pic2['name'];
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



                //$id = $this->uri->segment('5');
                if ($this->global_model->update('blog_front', $data, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Blog Updated Successfully');
                    redirect(base_url('admin/Blog/Blog_controller/blog'));

                    //redirect('profile/profile');
                }
            }
        }
        //$id = $this->uri->segment('5');

        $data['editblog'] = $this->global_model->get_data('blog_front', array('id' => $id));



        $this->load->view('admin/header', $data1);
        $this->load->view('admin/blog/edit_blog', $data);
        $this->load->view('admin/footer', $data1);


    }


    public function delete()
    {
        $id = $this->uri->segment('5');
        if ($this->global_model->delete('blog_front', array('id' => $id))) {
            $this->session->set_flashdata('message', 'Blog Deleted successfully!');
            redirect('admin/Blog/Blog_controller/blog');
        }

    }

















       

    
  
}
?>