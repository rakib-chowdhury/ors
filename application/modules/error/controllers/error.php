<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Error extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('login_model');
 $this->load->model('registration/registration_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('encrypt');


    }

    public function index() {
      $data['active']='none';
$data['lstUp']=$this->registration_model->getAllRecords('lastUpdate');
       $data['site_visitor']=$this->site_visitor_function();
       $data['total_somitee']=$this->somobay_reg_number();
        $this->load->view('public_layouts/header',$data);
        $this->load->view('error',$data);
       // $this->load->view('public_layouts/footer');
    }

public function site_visitor_function()
 {

       $get_visitor_counter=  $this->login_model->get_page_counter();
        $site_visitor=$get_visitor_counter[0]['site_visitor_number'];
        $site_visitor++;
        $data_visit['site_visitor_number']=$site_visitor;
        $this->login_model->update_page_counter($data_visit);
     
         return $site_visitor;
 }

 public function somobay_reg_number()
{
       $get_somobay_counter=  $this->login_model->get_somobay_counter();
        $s_counter=$get_somobay_counter[0]['total_somitee'];
        return $s_counter;
}






}
