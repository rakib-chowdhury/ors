<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Javascript extends MX_Controller {

    //public $counter=0;
    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('javascript_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('encrypt');
    }

    public function index() {

        $this->load->view('index');
      
    }

    

}
