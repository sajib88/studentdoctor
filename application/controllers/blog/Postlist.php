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
        $data['page_title'] = 'Article';
        $loginId = $this->session->userdata('login_id');
        $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));

        $data['recent_post'] = $this->global_model->get('blog_front', False, array('limit' => '5', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));
        $data['allblog'] = $this->global_model->get('blog_front', False, array('limit' => '5', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));
        $data['blog_category'] = $this->global_model->get('blog_front');

        ////////////////// ADVERTISE /////////////////////////
        $pageid= 14;
        $pageviewset = getViewByadvertise($pageid);
        if(!empty($pageviewset)){
            $profession = $this->session->userdata('user_type');
            $data['advertise'] = $this->global_model->getViewByProfession('advertise', $profession);
        }
        else{
            $data['advertise'] = array();
        }
        ////////////////// ADVERTISE /////////////////////////

        $this->load->view('header', $data);
        $this->load->view('blog/bloglist', $data);
        $this->load->view('footer.php', $data);


    }

      public function singlepost1($str_slug = FALSE, $id = ''){
        $data = array();
        $data['page_title'] = 'Blogs';
          $loginId = $this->session->userdata('login_id');
          $data['user_info'] = $this->global_model->get_data('users', array('id' => $loginId));



          //$id = $this->uri->segment('4');
          $data['blog_category'] = $this->global_model->get('blog_front');

        $data['single_post'] = $this->global_model->get_data('blog_front', array('id' => $id));
          $data['recent_post'] = $this->global_model->get('blog_front', False, array('limit' => '3', 'start' => '0'), array('filed' => 'id', 'order' => 'DESC'));
        //$data['singlepost'] = $this->global_model->get('blog_front');

        $this->load->view('header', $data);
        $this->load->view('blog/blog', $data);
        $this->load->view('footer.php', $data);
    }


     public function get_ars() {
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

    function singlepost($int_id = NULL, $str_slug = '' ) {

        $row = $this->db->get_where('blog_front', array('id' => $int_id))->row();

        if ($row and ! $str_slug) {

            $this->load->helper('url');

            $str_slug = url_title($row->title, 'dash', TRUE);
            redirect(base_url("article/{$str_slug}/{$int_id}"));

        }

        // Run the rest of the code here

    }
}
?>