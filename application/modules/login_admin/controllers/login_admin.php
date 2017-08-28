<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login_admin extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();

        $this->load->library("session");
        $this->load->model('login_admin_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
    }

    public function index()
    {
        $this->db->order_by('notice_id','DESC');
        $data['all_notice_info']=$this->db->get_where('notice',array('notice_status'=>1))->result();

        $this->load->view('layouts/header');
        $this->load->view('login',$data);
        $this->load->view('layouts/footer');
    }

    public function check_login()
    {
        if (isset($_POST['login'])) {
            $nid = $this->input->post('login_nid');
            $pass = $this->encryptIt($this->input->post('login_pass'));
//echo  $this->decryptIt('WDWJKJrsndrOntZdmdPCJJTUCWRiPi8tEsEdZtVy3ec='); die();
            $result = $this->login_admin_model->get_login_data($nid, $pass);
//echo '<pre>'; print_r($result);
            $counter = count($result);

            if ($counter == 1) {
                $data = array(
                    'nid' => $result[0]['admin_nid'],
                    'reg_id' => $result[0]['admin_reg_id'],
                    'type' => $result[0]['admin_type'],
                    'name'=>$result[0]['admin_name'],
                    'admin_div_id' => $result[0]['div_id'],
                    'admin_dist_id' => $result[0]['dist_id'],
                    'admin_upz_id' => $result[0]['upz_id'],
                    'admin_sign' => $result[0]['sign'],
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($data);
               // print_r($counter); die();
                if ($result[0]['admin_type'] == 1) {
                    redirect('services', 'refresh');
                    //amra
                } else if ($result[0]['admin_type'] == 2) {
                    //die();
                    redirect('doc', 'refresh');
                } else if ($result[0]['admin_type'] == 3) {
                    redirect('division', 'refresh'); //division
                } else if ($result[0]['admin_type'] == 4) {
                      redirect('appeal', 'refresh'); //appeal
                } else if ($result[0]['admin_type'] == 5) {
                     redirect('complain', 'refresh');//complain
                } else if ($result[0]['admin_type'] == 6) {
                     redirect('dco', 'refresh');//dco
                } else if ($result[0]['admin_type'] == 7) {
                     redirect('uco', 'refresh');//uco
                } else {
                    $data['message'] = $this->session->set_flashdata('message', 'Enter your valid nid and password first');
                    redirect('login_admin', 'refresh');
                }
            } else {
                $data['message'] = $this->session->set_userdata('error', 'জাতীয় পরিচয় পত্র  নম্বর অথবা পাসওয়ার্ড এর তথ্য ভুল ');
                //redirect('login', 'refresh');
                redirect('login_admin', 'refresh');
            }

        }

    }

    public function pass_gen()
    {
        $s = 'div1';
        $ret = $this->encryptIt($s);
        echo $ret;
    }

    function encryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    function decryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($qDecoded);
    }


}
