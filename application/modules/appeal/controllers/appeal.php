<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Appeal extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $nid = $this->session->userdata('nid');
        $reg_id = $this->session->userdata('reg_id');
        $type = $this->session->userdata('type');

        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('form_validation');

        if ($nid == NULL || $type == NULL || $type == "" || $type != 4 || $nid == "") {
            $this->session->unset_userdata('nid');
            $this->session->unset_userdata('reg_id');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');

            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন |');
            redirect('login_admin', 'refresh');
        }
        $this->load->library("session");
        $this->load->model('appeal_model');

        $this->load->helper('text');

    }

    public function index()
    {
        $this->session->unset_userdata('trck_err');
        $data['name'] = $this->session->userdata('name');
        $data['admin_info'] = $this->appeal_model->get_admin_info($this->session->userdata('reg_id'));
        $data['track'] = 1;
        $data['pro'] = 0;
        
        $data['new_somitee_info'] = $this->appeal_model->get_somitee_num('new');
        $data['all_somitee_info'] = $this->appeal_model->get_somitee_num('all');
        $data['selected_somitee_info'] = $this->appeal_model->get_somitee_num('selected');
        $data['reject_somitee_info'] = $this->appeal_model->get_somitee_num('reject');
        $data['all_new_somitee'] = $this->appeal_model->get_new_somitee_info();
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('index', $data);
        //$this->load->view('layouts_uco_dco/footer');
    }
 public function get_all_admin_info()
    {
        $data['res'] = $this->appeal_model->get_all_admin_info($this->input->post('iid'), $this->input->post('tble'));
        echo json_encode($data);
    }

    public function get_somitee()
    {
        $data['admin_info'] = $this->appeal_model->get_admin_info($this->session->userdata('reg_id'));

        $data['type'] = $this->uri->segment(3);

        $data['all_info'] = $this->appeal_model->get_somitee($this->uri->segment(3));
        if($data['type']=='all'){
             $data['title']='সকল সমবায় তালিকা';
        }elseif($data['type']=='new'){
             $data['title']='নতুন সমবায় তালিকা';
        }elseif($data['type']=='reject'){
             $data['title']='বাতিল সমবায় তালিকা';
        }elseif($data['type']=='selected'){
             $data['title']='সফল সমবায় তালিকা';
        }
        
        $this->load->view('layouts_uco_dco/header');

        $this->load->view('all_somitee_list', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function somitee_list_details()
    {

        if ($this->uri->segment(5) == 'err') {
            $data['comment_err'] = 1;
        } else {
            $data['comment_err'] = 0;
        }


        $data['admin_info'] = $this->appeal_model->get_admin_info($this->session->userdata('reg_id'));
        $somitee_id = $this->uri->segment(3);

        $data['somitee_info'] = $this->appeal_model->get_all_somitee_list($somitee_id);
        $data['somitee_info_sodosso'] = $this->appeal_model->get_sodosso_area($somitee_id);
        $data['somitee_category'] = $this->appeal_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->appeal_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_member_info'] = $this->appeal_model->get_member($data['somitee_info'][0]['somitee_id']);
        $data['uco_info'] = $this->appeal_model->getUco($somitee_id);
        $data['dco_info'] = $this->appeal_model->getDco($somitee_id);
        $data['division_info'] = $this->appeal_model->getDivision($somitee_id);
        $data['leader_info'] = $this->appeal_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
        $data['appeal_info']=$this->appeal_model->get_appeal_info($data['somitee_info'][0]['appeal_id']);

        $data['s_type'] = $this->uri->segment(4);
        //print_r($data['somitee_info_sodosso']); die();
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('somitee_list_details_view', $data);

    }

    public function change_password()
    {
        $uname = $this->session->userdata('reg_id');

        $pass = $this->encryptIt($this->input->post('pass_change'));

        //$this->load->view('formsuccess');
        $data['password'] = $pass;
        $this->appeal_model->password_change($data, $uname);
        redirect('uco/index', 'refresh');

    }

    function encryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    public function all_somitee_list()
    {
        $data['somitee_info_tab1'] = $this->appeal_model->get_uco_somitee_list_tab1();
        $data['somitee_info_tab2'] = $this->appeal_model->get_uco_somitee_list_tab2();

        $this->load->view('layouts/header');
        $this->load->view('somitee_list_view', $data);
        $this->load->view('layouts/footer');
    }


    public function find_track_id()
    {
        $track_id = $this->input->post('track_id');
        if ($track_id == null || $track_id == '') {
            $track_id = $this->session->userdata('track');
        }
        $data['somitee_infos'] = $this->appeal_model->get_somitee_info_1($track_id);

        if (sizeof($data['somitee_infos']) == 0) {
            $this->session->set_userdata('trck_err', 'সঠিক ট্র্যাকিং আই ডি  দিয়ে অনুসন্ধান করুন ');
            $data['name'] = $this->session->userdata('name');
            $data['admin_info'] = $this->appeal_model->get_admin_info($this->session->userdata('reg_id'));
            $data['track'] = 1;
            $data['pro'] = 0;
            if ($this->uri->segment(3)) {
                $data['track'] = 0;
                $data['pro'] = 1;
            }
            $this->load->view('layouts_uco_dco/header');
            $this->load->view('index', $data);
        } else {
            $this->session->unset_userdata('trck_err');

            $somitee_id = $data['somitee_infos'][0]['somitee_id'];
            redirect('appeal/somitee_list_details/' . $somitee_id);
        }

    }

public function check_tracking_id()
    {       
        if (!empty($this->input->post('tracking_number'))) {            
            $tracking_number = $this->input->post('tracking_number');

            $data['result'] = $this->appeal_model->check_tracking_number($tracking_number, $dist_id);            
            if (count($data['result']) >= 1) {
                $data['somitee_info'] = $this->dco_model->check_tracking_number($tracking_number, $dist_id);
                redirect('appeal/see_somitee_detail/' . $data['somitee_info'][0]['somitee_id'].'/search');
            } else {
                $m_data['message_err'] = 'আপনার ট্র্যাকিং নাম্বার সঠিক নয়।';
                $this->session->set_userdata($m_data);
                redirect('appeal', 'refresh');
            }
        } else {
            $m_data['message_err'] = 'সর্বপ্রথম আপনার ট্র্যাকিং নাম্বার দিন ।';
            $this->session->set_userdata($m_data);
            redirect('appeal', 'refresh');
        }


    }

    public function appeal_comment_post2()
    {
        //echo '<pre>'; print_r($_POST); print_r($_FILES); die();

        $appeal_id=$this->input->post('appeal');
        $somitee = $this->input->post("somitee_id");
        $data_appeal['admin_reg_id'] = $this->session->userdata('reg_id');
        $verify=$this->input->post('bttn');

        $data_appeal['appeal_reply_date']=date('Y-m-d');
        if ($this->input->post('cmmnt') == null) {
            redirect('appeal/somitee_list_details/' . $somitee . '/new' . '/err', 'refresh');
        } elseif ($this->input->post('cmmnt') != null) {
            $data_appeal['appeal_reply'] = $this->input->post('cmmnt');
        }
        
        if($verify=='approve'){
            $data_appeal['appeal_verify']=1;
            $data['somitee_status']=4;
        }else if($verify=='reject'){
            $data_appeal['appeal_verify']=0;
            $data['somitee_status']=6;
        }

        $this->appeal_model->update_where('appeal','appeal_id',$appeal_id, $data_appeal);
        $this->appeal_model->update_where('somitee_info','somitee_id',$somitee, $data);
        redirect('appeal', 'refresh');

    }

    public function appeal_download_user_info($somitee_id)
    {
        $data['somitee_info'] = $this->appeal_model->get_all_somitee_list($somitee_id);
        $data['leader_info'] = $this->appeal_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
        $data['division_info'] = $this->appeal_model->getDivision($data['somitee_info'][0]['somitee_id']);
        $data['uco_info']= $this->appeal_model->getUco($data['somitee_info'][0]['somitee_id']);
        $data['dco_info']= $this->appeal_model->getDco($data['somitee_info'][0]['somitee_id']);
        $data['somitee_category'] = $this->appeal_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->appeal_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_info_sodosso'] = $this->appeal_model->get_sodosso_area($somitee_id);
        $data['somitee_member_info'] = $this->appeal_model->get_member($data['somitee_info'][0]['somitee_id']);
         $data['appeal_info']=$this->appeal_model->get_appeal_info($data['somitee_info'][0]['appeal_id']);
        $data['s_type'] = $this->uri->segment(4);
        $html = $this->load->view('appeal_download_user_info', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('new_m_pdf', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->new_m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->new_m_pdf->pdf->Output($pdfFilePath, "I");

    }


}
