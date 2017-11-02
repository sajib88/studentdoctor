<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Insideblog extends CI_Controller
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

    //  public function insidebloglist($msg=''){
    //     $data = array();
    //     $data['page_title'] = 'Blog';
    //     $data['error'] = $msg;
    //     $loginId = $this->session->userdata('login_id');

    //     $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
    //     $data['countries'] = $this->global_model->get('countries');
    //     $data['profession'] = $this->global_model->get('profession');
    //     //$data['main_cat'] = $this->global_model->get('classified_main_cat');
    //     $data['login_id'] = $loginId;
    //     $this->load->view('header', $data);
    //     $this->load->view('insideblog/insidebloglist', $data);
    //     $this->load->view('footer');

    // }


    public function insideblogcreate($msg =''){

        $data = array();
        $data['page_title'] = 'Create Blogs';
        $data['error'] = $msg;
        $loginId = $this->session->userdata('login_id');
         $data['profession'] = $this->global_model->get('profession');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
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
            $save = array();
            $save['user_id'] = $loginId;
            $save['title'] = $this->input->post('title');
            $save['description'] = $this->input->post('description');
            $save['cat_type'] = $this->input->post('cat_type');
            $date = date('m/d/Y', time());
            if($date == $this->input->post('date')){
                $save['status'] = 1;
            }else{
                $save['status'] = 0;
            }
            $save['date'] = $this->input->post('date');
            $save['time'] = $this->input->post('time');
            $save['tag'] = $this->input->post('tag');
            $save['keyword'] = $this->input->post('keyword');
            if(!empty($this->input->post('profession_view'))){
                $sata = array();
                $sata ['profession_view'] = $this->input->post('profession_view');
                $save['profession_view'] = (!empty($sata['profession_view']))?implode(',', $sata['profession_view']):'';
            }else{
                $save['profession_view'] = 0;
            }

            if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[500,500]', '', $photo_name);
            }
            else {

            }

            if (isset($_FILES["image1"]["name"]) && $_FILES["image1"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['image1'] = $this->resizeimg->image_upload('image1', $this->PATH, 'size[500,500]', '', $photo_name);
            }
            else {

            }

            if (isset($_FILES["image2"]["name"]) && $_FILES["image2"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['image2'] = $this->resizeimg->image_upload('image2', $this->PATH, 'size[500,500]', '', $photo_name);
            }
            else {

            }

            if (isset($_FILES["image3"]["name"]) && $_FILES["image3"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $save['image3'] = $this->resizeimg->image_upload('image3', $this->PATH, 'size[500,500]', '', $photo_name);
            }
            else {

            }

            uploadInsideBlog();
            //// File UPLOAD
            if ($this->upload->do_upload('file1')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $save['file1'] = $file1['name'];
            }

            if ($this->upload->do_upload('file2')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $save['file2'] = $file1['name'];
            }

           
            if ($this->global_model->insert('insideblog', $save)) {
                $this->session->set_flashdata('message', 'Blog created successfully.');
                //redirect('insideblog/insideblog/insidebloglist');
               //redirect('profile/profile');
            }

             
                

        }

        $data['login_id'] = $loginId;
        $data['main_cat'] = $this->global_model->get('insideblog_cat');
         $this->load->view('header', $data);
        $this->load->view('insideblog/insideblogcreate', $data);
        $this->load->view('footer', $data);
        
    }

    public function blogtcat()
    {
        $data = array();
        $data['page_title'] = 'Add New Category';
        $data['tabActive'] = 'Blog Category';
        $data['error'] = '';
        $loginId = $this->session->userdata('login_id');
        $user_type = $this->session->userdata('user_type');

        if ($this->input->post()) {
            $postData = $this->input->post();
            $this->form_validation->set_rules('cat_name', 'cat_name', 'trim');


            if ($this->form_validation->run() == true) {

                $save['cat_name'] = $postData['cat_name'];
                $save['created_by'] = $loginId;
                $save['status'] = '1';

                if ($ref_id = $this->global_model->insert('insideblog_cat', $save)) {

                    $this->session->set_flashdata('message2', 'New Category Create successfully.');
                    redirect(base_url('insideblog/create'));

                }
            }
        }
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
        $data['login_id'] = $loginId;

    }


    public function insidebloglist($msg='') {

//        $date = date('m/d/Y', time());
//        echo $date; die;
        
        $data = array();
        $data['page_title'] = 'Blog';
        $data['error'] = $msg;
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        //$data['user_info'] = $this->global_model->get_data('users');

        // Get 6 items from arstechnica

         // $data['hello'] = $this->rssparser->set_feed_url('http://www.espncricinfo.com/rss/content/story/feeds/0.xml')->set_cache_life(30)->getFeed(6);

        // foreach ($rss as $item)
        // {
        //     echo '<h6>1'.$item['title'].'</h6>';
        //     echo '<br />';
        //     echo $item['description'];
        //     echo '<br />';
        //     echo $item['author'];
        //     echo '<br />';
        //     echo $item['pubDate'];
        //      echo '<br />';
        //     echo $item['link'];
        //     echo '<br />';echo '<br />';echo '<br />';
        // }
        //$this->db->order_by("id", "DESC");
        //$data_id = 'id';
        //$data_order = 'DESC';
        $profession = $this->session->userdata('user_type');
        $data['allblog'] = $this->global_model->getBlogByProfession('insideblog', $profession);

        //$data['allblog'] = $this->global_model->get('insideblog');

        //$data['recent_post'] = $this->global_model->get('blog_front', False, array('limit' => '3', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));
        
        //$data['join'] = $this->global_model->get_with_join('users', 'appointment', 'id', 'users.id = appointment.doctor_id');

        //$this->load->view('header', $data);
       /// $this->load->view('home',$data);
        //$this->load->view('footer');

        //$this->get_ars();

        $this->load->view('header', $data);
        $this->load->view('insideblog/insidebloglist', $data);
        
        $this->load->view('footer', $data);


    }

      public function insideblogsinglepost($msg =''){
        $data = array();
        $data['page_title'] = 'Blogs';
        $data['error'] = $msg;
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
         
        $id = $this->uri->segment('3');

        $data['single_post'] = $this->global_model->get_data('insideblog', array('id' => $id));

        $data['getid']  = $this->uri->segment('3');
        $data['comments'] = $this->global_model->get('blog_comments', array('blog_id' => $data['getid']));

                ///// comments
          if ($this->input->post()) {
              $postData = $this->input->post();
              $this->form_validation->set_rules('comments_title', 'comments_title', 'trim');
              $this->form_validation->set_rules('comments_details', 'comments_details', 'trim');



              if ($this->form_validation->run() == true) {

                  $save['blog_id'] = $postData['postid'];
                  $save['user_id'] = $loginId;
                  $save['comments_title'] = $postData['comments_title'];
                  $save['comments_details'] = $postData['comments_details'];
                  $save['status'] = '1';




                  if ($ref_id = $this->global_model->insert('blog_comments', $save)) {

                      $this->session->set_flashdata('message', 'New Blog Comments Successfully');
                      $redirect_link = base_url() . 'insideblog/details/'. $postData['postid'];
                      redirect($redirect_link);

                  }
              }
          }

          ////

        $this->load->view('header', $data);
        $this->load->view('insideblog/insideblogsingle', $data);
        $this->load->view('footer', $data);
    }

     public function insideblogmylist($msg =''){
        $data = array();
        $data['page_title'] = 'Blogs';
        $data['error'] = $msg;
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['allblog'] = $this->global_model->get('insideblog', array('user_id' => $loginId));
        //$data['singlepost'] = $this->global_model->get('blog_front');

        $this->load->view('header', $data);
        $this->load->view('insideblog/insideblogmylist', $data);
        $this->load->view('footer', $data);
    }


    public function delete()
    {
        $id = $this->uri->segment('4');
        if ($this->global_model->delete('insideblog', array('id' => $id))) {
            $this->session->set_flashdata('message', 'Delete successfully!');
            redirect(base_url('insideblog/list'));
        }

    }


    public function edit($msg =''){

        $data = array();
        $data['page_title'] = 'Edit Blogs';
        $data['error'] = $msg;
        $loginId = $this->session->userdata('login_id');
         $data['profession'] = $this->global_model->get('profession');

        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));
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
            $data['user_id'] = $loginId;
            $data['title'] = $this->input->post('title');
            $data['description'] = $this->input->post('description');
            $data['cat_type'] = $this->input->post('cat_type');
            $data['date'] = $this->input->post('date');
            $data['time'] = $this->input->post('time');
            $data['tag'] = $this->input->post('tag');
            $data['keyword'] = $this->input->post('keyword');
            $data['profession_view'] = (!empty($this->input->post('profession_view')))?implode(',', $this->input->post('profession_view')):'';

            if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[300,300]', '', $photo_name);
            }
            else {

            }

            if (isset($_FILES["image1"]["name"]) && $_FILES["image1"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['image1'] = $this->resizeimg->image_upload('image1', $this->PATH, 'size[300,300]', '', $photo_name);
            }
            else {

            }

            if (isset($_FILES["image2"]["name"]) && $_FILES["image2"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['image2'] = $this->resizeimg->image_upload('image2', $this->PATH, 'size[300,300]', '', $photo_name);
            }
            else {

            }

            if (isset($_FILES["image3"]["name"]) && $_FILES["image3"]["name"] != '') {
                $this->PATH = './assets/file/insideblog';
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['image3'] = $this->resizeimg->image_upload('image3', $this->PATH, 'size[300,300]', '', $photo_name);
            }
            else {

            }

            uploadInsideBlog();
            //// File UPLOAD
            if ($this->upload->do_upload('file1')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $save['file1'] = $file1['name'];
            }

            if ($this->upload->do_upload('file2')) {
                $fileInfo = $this->upload->data();
                $file1['name'] = $fileInfo['file_name'];
                $save['file2'] = $file1['name'];
            }




           
            $id = $this->uri->segment('3');
                if ($this->global_model->update('insideblog', $data, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Blog updated successfully.');
                    redirect(base_url('insideblog/list'));

                    //redirect('profile/profile');
                }
                

        }

         $id = $this->uri->segment('3');

        $data['editblog'] = $this->global_model->get_data('insideblog', array('id' => $id));

        $data['main_cat'] = $this->global_model->get('insideblog_cat');
         $this->load->view('header', $data);
        $this->load->view('insideblog/edit', $data);
        $this->load->view('footer', $data);
        
    }



}
?>