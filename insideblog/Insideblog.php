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
        $this->form_validation->set_rules('tag', 'tag', 'required');
        $this->form_validation->set_rules('keyword', 'keyword', 'required');

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
            $data['status'] = 1;
            $data['tag'] = $this->input->post('tag');
            $data['keyword'] = $this->input->post('keyword');
            $sata = array();
            $sata ['profession_view'] = $this->input->post('profession_view');
            $data['profession_view'] = (!empty($sata['profession_view']))?implode(',', $sata['profession_view']):'';

          
             $this->PATH = './assets/file/insideblog';
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

           



           
            if ($post_id = $this->global_model->insert('insideblog', $data)) {
                        $this->session->set_flashdata('message', 'Save Success');
                        redirect('insideblog/insideblog/insidebloglist');
                       //redirect('profile/profile');
                    }

             
                

        }


         $this->load->view('header', $data);
        $this->load->view('insideblog/insideblogcreate', $data);
        $this->load->view('footer', $data);
        
    }


    public function insidebloglist($msg='') {
        
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
        $data['allblog'] = $this->global_model->get('insideblog', False, array('limit' => '4', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));

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
         
        $id = $this->uri->segment('4');

        $data['single_post'] = $this->global_model->get_data('insideblog', array('id' => $id)); 
        //$data['singlepost'] = $this->global_model->get('blog_front');

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

        $data['allblog'] = $this->global_model->get('insideblog'); 
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
            redirect('insideblog/Insideblog/insideblogmylist', $data);
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
        $this->form_validation->set_rules('tag', 'tag', 'required');
        $this->form_validation->set_rules('keyword', 'keyword', 'required');

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
            $data['status'] = 1;
            $data['tag'] = $this->input->post('tag');
            $data['keyword'] = $this->input->post('keyword');
            $sata = array();
            $sata ['profession_view'] = $this->input->post('profession_view');
            $data['profession_view'] = (!empty($sata['profession_view']))?implode(',', $sata['profession_view']):'';

          
             $this->PATH = './assets/file/insideblog';
            if (isset($_FILES["primary_image"]["name"]) && $_FILES["primary_image"]["name"] != '') {
                $photo_name = time();
                if (!file_exists($this->PATH)) {
                    mkdir($this->PATH, 0777, true);
                }
                $data['primary_image'] = $this->resizeimg->image_upload('primary_image', $this->PATH, 'size[300,300]', '', $photo_name);
            } else {
                $data['primary_image'] = '';
            }





           
            $id = $this->uri->segment('4');
                if ($this->global_model->update('insideblog', $data, array('id' => $id))){
                    $this->session->set_flashdata('message', 'Save Success');
                    redirect('insideblog/insideblog/insideblogmylist');

                    //redirect('profile/profile');
                }
                

        }

         $id = $this->uri->segment('4');

        $data['editblog'] = $this->global_model->get_data('insideblog', array('id' => $id));


         $this->load->view('header', $data);
        $this->load->view('insideblog/edit', $data);
        $this->load->view('footer', $data);
        
    }



}
?>