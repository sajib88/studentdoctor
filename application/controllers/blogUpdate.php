<?php
/**
 * Created by PhpStorm.
 * User: alam
 * Date: 12/18/2016
 * Time: 11:04 PM
 */


defined('BASEPATH') OR exit('No direct script access allowed');

class blogUpdate extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('File_processing');
        $this->load->helper('global');
        $this->load->library('upload');
    }

    public function index()
    {
        $data = array();
        $today = date('m/d/Y', time());
        $todayTime = date('h:i A', time());
        //die;
        $blogData = $this->global_model->get('insideblog', array('status' => 0, 'date' => $today, 'time'=> $todayTime));
        if(!empty($blogData)) {
            foreach ($blogData as $row) {
                $date = $row->date;
                $status = $row->status;
                $time = $row->time;
                if ($date == $today & $time == $todayTime) {
                    $save['status'] = 1;
                    $this->global_model->update('insideblog', $save, array('status' => $status, 'date' => $today, 'time'=>$todayTime));
                }
            }
        }

    }


}