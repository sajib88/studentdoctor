<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class Postlist extends CI_Controller
{
     public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('global');
        $this->load->library('encrypt');
        $this->load->library('image_lib');
        $this->load->library('rssparser');
    }

    public function index() {
        
        $data = array();


       

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
       $data['allblog'] = $this->global_model->get('blog_front', False, array('limit' => '2', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));

       $data['recent_post'] = $this->global_model->get('blog_front', False, array('limit' => '3', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));
        
        //$data['join'] = $this->global_model->get_with_join('users', 'appointment', 'id', 'users.id = appointment.doctor_id');

        //$this->load->view('header', $data);
       /// $this->load->view('home',$data);
        //$this->load->view('footer');

        //$this->get_ars();

        $this->load->view('header_guest_home', $data);
        $this->load->view('blog/bloglist', $data);
        
        $this->load->view('foother_guest.php', $data);


    }

      public function singlepost($msg =''){
        $data = array();
        $data['page_title'] = 'Blogs';
        $data['error'] = $msg;
         
        $id = $this->uri->segment('4');

        $data['single_post'] = $this->global_model->get_data('blog_front', array('id' => $id)); 
        //$data['singlepost'] = $this->global_model->get('blog_front');

        $this->load->view('header_guest_home', $data);
        $this->load->view('blog/blog', $data);
        $this->load->view('foother_guest.php', $data);
    }


     public function get_ars
     () {
        // echo 'hello';
        // exit();
    // Load RSS Parser
        $rss = $this->rssparser->set_feed_url('http://www.espncricinfo.com/rss/content/story/feeds/1083436.xml')->set_cache_life(30)->getFeed(6);

        

        foreach ($rss as $item)
        {
            echo '<h6>1'.$item['title'].'</h6>';
            echo '<br />';
            echo $item['description'];
            echo '<br />';
            echo $item['author'];
            echo '<br />';
            echo $item['pubDate'];
             echo '<br />';
            echo $item['link'];
            echo '<br />';echo '<br />';echo '<br />';
        }
        return true;



        

    }
}
?>