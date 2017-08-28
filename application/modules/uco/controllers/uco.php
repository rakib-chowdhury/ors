<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Uco extends MX_Controller
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

        if ($nid == NULL || $type == NULL || $type == "" || $type != 7 || $nid == "") {
            $this->session->unset_userdata('nid');
            $this->session->unset_userdata('reg_id');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');

            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন |');
            redirect('login_admin', 'refresh');
        }
        $this->load->library("session");
        $this->load->model('uco_model');
        $this->load->model('basic_model');

        $this->load->helper('text');

    }

    public function index()
    {
        $this->session->unset_userdata('trck_err');
        $data['name'] = $this->session->userdata('name');
        $data['track'] = 1;
        $data['pro'] = 0;
        if ($this->uri->segment(3) == 'profile') {
            $data['track'] = 0;
            $data['pro'] = 1;
        }
        $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
        $div = $this->session->userdata('admin_div_id');
        $dist = $this->session->userdata('admin_dist_id');
        $upz = $this->session->userdata('admin_upz_id');
        $data['new_somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, 'new');
        $data['all_somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, 'all');
        $data['selected_somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, 'selected');
        $data['feedbackInfo'] = $this->uco_model->get_feedback($div, $dist, $upz);
        //echo '<pre>'; print_r($data['feedbackInfo']); die();
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('index', $data);
        //$this->load->view('layouts_uco_dco/footer');
    }

    public function feedback()
    {
        $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
        $data['title'] = 'ফিডব্যাকসমূহ';
        $div = $this->session->userdata('admin_div_id');
        $dist = $this->session->userdata('admin_dist_id');
        $upz = $this->session->userdata('admin_upz_id');
        //$data['newSomitee']=$this->uco_model->getFeedbackSomitee($div,$dist,$upz);
        $data['feedbackSomitee'] = $this->uco_model->getFeedbackSomiteeDetails($div, $dist, $upz);
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('feedback_list', $data);
        //$this->load->view('layouts_uco_dco/footer');
    }

    public function feedback_post()
    {
        //echo '<pre>'; print_r($_POST); die();
        $id = $this->input->post('feedBackId');

        $data_insert['uco_id'] = $this->input->post('ucoID');
        $data_insert['reply'] = $this->input->post('msg');
        $data_insert['type'] = 2;
        $data_insert['is_seen'] = 0;

        $this->uco_model->update_feedback($id, $data_insert);
        redirect('uco/feedback');
    }

    public function user_pdf()
    {
        $somitee_id = $this->uri->segment(3);
        $data['somitee_info'] = $this->uco_model->get_all_somitee_list($somitee_id);
        $data['leader_info'] = $this->uco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
        $data['somitee_category'] = $this->uco_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->uco_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_info_sodosso'] = $this->uco_model->get_sodosso_area($somitee_id);

        $html = $this->load->view('uco_user_pdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");
    }

    public function index_old()
    {
        $this->session->unset_userdata('trck_err');
        $data['name'] = $this->session->userdata('name');
        $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
        $data['track'] = 1;
        $data['pro'] = 0;
        if ($this->uri->segment(3) == 'profile') {
            $data['track'] = 0;
            $data['pro'] = 1;
        }
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('index', $data);
        //$this->load->view('layouts_uco_dco/footer');
    }

    public function get_somitee()
    {
        $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
        $div = $this->session->userdata('admin_div_id');
        $dist = $this->session->userdata('admin_dist_id');
        $upz = $this->session->userdata('admin_upz_id');
        $data['s_type'] = $this->uri->segment(3);

        $data['somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, $this->uri->segment(3));
        //echo '<pre>';print_r($data); die();
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


        $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
        $somitee_id = $this->uri->segment(3);
        $data['s_type'] = $this->uri->segment(4);
        $data['somitee_info'] = $this->uco_model->get_all_somitee_list($somitee_id);
        $data['somitee_info_sodosso'] = $this->uco_model->get_sodosso_area($somitee_id);

        if ($data['somitee_info'][0]['is_re_register'] == 0) {

            $data['somitee_category'] = $this->uco_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
            $data['somitee_sub_category'] = $this->uco_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
            $data['somitee_member_info'] = $this->uco_model->get_member($data['somitee_info'][0]['somitee_id']);
            $data['uco_info'] = $this->uco_model->getUco($somitee_id);
            $data['division_info'] = $this->uco_model->getDivision($somitee_id);
            $data['leader_info'] = $this->uco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
            //echo '<pre>';print_r($data['somitee_info']); die();
            $this->load->view('layouts_uco_dco/header');
            $this->load->view('somitee_list_details_view', $data);
        } else {
            $data['somitee_info'] = $this->uco_model->get_all_somitee_list2($somitee_id);
            $data['somitee_mngmnt_info'] = $this->basic_model->getWhere('*', 'somitee_id=' . $data['somitee_info'][0]['somitee_id'], 'somitee_management');
            $data['somitee_added_info'] = $this->basic_model->getAddedBy($data['somitee_info'][0]['re_register_by']);
            //echo '<pre>';print_r($data['somitee_info']);die();
            $this->load->view('layouts_uco_dco/header');
            $this->load->view('somitee_list_details_view2', $data);
        }

    }

    public function change_password()
    {
        $uname = $this->session->userdata('reg_id');

        $pass = $this->encryptIt($this->input->post('pass_change'));

        //$this->load->view('formsuccess');
        $data['password'] = $pass;
        $this->uco_model->password_change($data, $uname);
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
        $data['somitee_info_tab1'] = $this->uco_model->get_uco_somitee_list_tab1();
        $data['somitee_info_tab2'] = $this->uco_model->get_uco_somitee_list_tab2();

        $this->load->view('layouts/header');
        $this->load->view('somitee_list_view', $data);
        $this->load->view('layouts/footer');
    }


    public function find_track_id()
    { //echo '<pre>'; print_r($_POST);
        $track_id = $this->input->post('track_id');
        if ($track_id == null || $track_id == '') {
            $track_id = $this->session->userdata('track');
        }
        $div_id = $this->session->userdata('admin_div_id');
        $dist_id = $this->session->userdata('admin_dist_id');
        $upz_id = $this->session->userdata('admin_upz_id');
        $data['search_on'] = 0;
        $data['somitee_infos'] = $this->uco_model->get_somitee_info_1($div_id, $dist_id, $upz_id, $track_id);

        if (sizeof($data['somitee_infos']) == 0) {
            $this->session->set_userdata('trck_err', 'সঠিক ট্র্যাকিং আই ডি  দিয়ে অনুসন্ধান করুন ');
            $data['name'] = $this->session->userdata('name');
            $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
            $data['track'] = 1;
            $data['pro'] = 0;
            if ($this->uri->segment(3)) {
                $data['track'] = 0;
                $data['pro'] = 1;
            }
            $data['admin_info'] = $this->uco_model->get_admin_info($this->session->userdata('reg_id'));
            $div = $this->session->userdata('admin_div_id');
            $dist = $this->session->userdata('admin_dist_id');
            $upz = $this->session->userdata('admin_upz_id');
            $data['new_somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, 'new');
            $data['all_somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, 'all');
            $data['selected_somitee_info'] = $this->uco_model->get_somitee($div, $dist, $upz, 'selected');
            $data['feedbackInfo'] = $this->uco_model->get_somitee($div, $dist, $upz, 'new');
            $this->load->view('layouts_uco_dco/header');
            $this->load->view('index', $data);
        } else {
            $this->session->unset_userdata('trck_err');

            $somitee_id = $data['somitee_infos'][0]['somitee_id'];
            redirect('uco/somitee_list_details/' . $somitee_id);
        }
        //$this->load->view('layouts_uco_dco/header');
        //$this->load->view('index',$data);

    }


    function reArrayFiles(&$file_post)
    {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i = 0; $i < $file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }


    public function uco_comment_post2()
    {
        $somitee = $this->input->post("somitee_id");

        $data_uco['admin_reg_id'] = $this->session->userdata('reg_id');
        $data_uco['somitee_id'] = $somitee;

        if ($this->input->post('cmmnt') == null) {
            redirect('uco/somitee_list_details/' . $somitee . '/new' . '/err', 'refresh');
        } elseif ($this->input->post('cmmnt') != null) {
            $data_uco['uco_comment'] = $this->input->post('cmmnt');

        }
        // Count # of uploaded files in array
        $total = count($_FILES['file']['name']);

        $tmp_path = array();
        for ($i = 0; $i < $total; $i++) {

            $tmpFilePath = 'uploads/files/' . uniqid() . '__' . $_FILES['file']['name'][$i];

            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $tmpFilePath)) {
                array_push($tmp_path, $tmpFilePath);
            }
        }
        $data_uco['uco_comment_upload'] = json_encode($tmp_path);

        $tmp = array();
        for ($i = 1; $i <= 6; $i++) {
            $t = $this->input->post('paper' . $i);
            array_push($tmp, $t);
        }
        $tmp1 = json_encode($tmp);
        //print_r(json_decode($tmp1));
        //die();
        $data_uco['files_status'] = $tmp1;
        $data_somitee['uco_id'] = $this->uco_model->insert_ret('uco', $data_uco);
        $data_somitee['dco_inquiry_date'] = date('Y-m-d');
        $this->uco_model->update_somitee_status($somitee, $data_somitee);

        $getDco = $this->uco_model->get_somitee_info($somitee);
        $getDcoInfo = $this->uco_model->get_dco_info($getDco[0]['somitee_div_id'], $getDco[0]['somitee_dist_id'], $getDco[0]['somitee_upz_id']);
        $destination = $getDcoInfo[0]['admin_phone'];
        $message = $getDco[0]['somitee_name'] . " name akti abedon joma hoyeche. Onugroho kore bebostha grohon korun.";
        $data_sms['n_id'] = $getDcoInfo[0]['admin_nid'];
        $data_sms['phone'] = $getDcoInfo[0]['admin_phone'];
        $data_sms['sms_type'] = 7;
        $this->uco_model->insert('sms_service', $data_sms);

        $data_log['user_reg_id'] = $getDco[0]['user_reg_id'];
        $data_log['details_id'] = 7;
        $data_log['comment'] = '';
        $this->uco_model->insert('all_log', $data_log);
        try {
            $userName = "01613083375";
            $userPass = "80d019";

            $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
            $paramArray = array(
                'userName' => $userName,
                'userPassword' => $userPass,
                'mobileNumber' => $destination,
                'smsText' => $message,
                'type' => "UCS",
                'maskName' => "COOP", 'campaignName' => ""
            );
            $value = $soapClient->__call("OneToOne", array($paramArray));
        } catch (Exception $e) {
            echo $e;
        }
        $response = explode('||', $value->OneToOneResult);
        if ($response[0] = '1900') {
            $msg_api = $this->uco_model->getAllRecords('mobile_api');
            $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 3;
            $this->uco_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);
        } else {

        }
        redirect('uco', 'refresh');

    }


    public function uco_comment_post()
    {
        $somitee = $this->input->post("somitee_id");
        if ($_FILES['file']['name'] != null && $this->input->post('cmmnt') != null) {
            $this->session->set_userdata('track', $this->input->post('track'));
            $this->session->set_userdata('uco_err', 'অনুগ্রহ করে ফাইল আপলোড অথবা মন্তব্য করুন ');
            redirect('uco/find_track_id');
        } elseif ($_FILES['file']['name'] == null && $this->input->post('cmmnt') == null) {
            $this->session->set_userdata('track', $this->input->post('track'));
            $this->session->set_userdata('uco_err', 'অনুগ্রহ করে ফাইল আপলোড অথবা মন্তব্য করুন');
            redirect('uco/find_track_id');
        } else {
            $this->session->unset_userdata('track');
            $this->session->unset_userdata('uco_err');
            $data_uco['admin_reg_id'] = $this->session->userdata('reg_id');
            $data_uco['somitee_id'] = $somitee;

            if ($this->input->post('cmmnt') != null) {
                $data_uco['uco_comment'] = $this->input->post('cmmnt');

            } else if ($_FILES['file']['name'] != null) {
                $target_path = 'uploads/files/' . uniqid() . '_' . $_FILES['file']['name'];
                if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                    $data_uco['uco_comment_upload'] = $target_path;
//                      $data['msg'] = '1';
                } else
                    $data['msg'] = '0';
            }

            $data_somitee['uco_id'] = $this->uco_model->insert_ret('uco', $data_uco);
            $data_somitee['dco_inquiry_date'] = date('Y-m-d');
            $this->uco_model->update_somitee_status($somitee, $data_somitee);
            redirect('uco', 'refresh');
        }
    }


    /*
        public function find_track_id(){
            $track_id=$this->input->post('track_id');

            //print_r($this->session->userdata);
            $div_id=$this->session->userdata('admin_div_id');
            $dist_id=$this->session->userdata('admin_dist_id');
            $upz_id=$this->session->userdata('admin_upz_id');

            //echo $div_id .' '.$dist_id.' '.$upz_id;
            $data['somitee_infos']=$this->uco_model->get_somitee_info_1($div_id, $dist_id , $upz_id , $track_id );
            if(sizeof($data['somitee_infos'])==0){
                  echo 0;
            }else{
                 $somitee_id=$data['somitee_infos'][0]['somitee_id'];

                 $data['somitee_info']=$this->uco_model->get_all_somitee_list($somitee_id);
                 $data['somitee_info_sodosso']=$this->uco_model->get_sodosso_area($somitee_id);
                 $data['somitee_member_info']=$this->uco_model->get_member($somitee_id);

                 echo json_encode($data);
            }
       }*/

    public function somitee_list_detail($somitee_id)
    {
        if ($this->uri->segment(3) && $this->uri->segment(3) != 0 && ($this->uri->segment(4) == 's' || $this->uri->segment(4) == 'all')) {
            $data['somitee_info'] = $this->uco_model->get_somitee_info($somitee_id);
            $data['somitee_member_info'] = $this->uco_model->get_somitee_member_info($somitee_id);
            $data['somitee_member_des'] = $this->uco_model->get_somitee_des($somitee_id);
            $data['document'] = $this->uco_model->get_document($somitee_id);
            $data['division_info'] = $this->uco_model->getDivision($somitee_id);
            if ($this->uri->segment(4) == 's') {
                $data['all'] = 0;
            } else {
                $data['all'] = 1;
                $data['uco_details'] = $this->uco_model->getUcoDetails($somitee_id);
            }

            $this->load->view('layouts/header');
            $this->load->view('somitee_list_detail_view', $data);
            $this->load->view('layouts/footer');
        } else {
            redirect('uco/all_somitee_list');
        }

    }

    public function verify_somitee()
    {
        $data['uco_comment'] = $this->input->post('uco_comment');
        $data['admin_reg_id'] = $this->session->userdata('reg_id');
        $data['somitee_id'] = $this->input->post('somitee_id');
        $data_s['uco_id'] = $this->uco_model->insert_ret('uco', $data);
        $data_s['dco_inquiry_date'] = date('Y-m-d');
        $this->uco_model->update_somitee_info_uco_id($data['somitee_id'], $data_s);

        redirect('uco/all_somitee_list');
    }

    public function uco_download_user_info($somitee_id)
    {
        //$somitee_id=somitee_id;


        $data['somitee_info'] = $this->uco_model->get_all_somitee_list($somitee_id);
        $data['leader_info'] = $this->uco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
        $data['somitee_category'] = $this->uco_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->uco_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_info_sodosso'] = $this->uco_model->get_sodosso_area($somitee_id);
        if ($data['somitee_info'][0]['is_re_register'] == 0) {
            $data['somitee_member_info'] = $this->uco_model->get_member($data['somitee_info'][0]['somitee_id']);
            $data['uco_info'] = $this->uco_model->getUco($somitee_id);
            $data['division_info'] = $this->uco_model->getDivision($somitee_id);
            //$data['dco_info']= $this->doc_model->getDco($somitee_id);
            $data['s_type'] = $this->uri->segment(4);
            //print_r($data['somitee_info_sodosso']); die();
            //$this->load->view('layouts/header');
            //$this->load->view('somitee_list_detail_view',$data);

            $html = $this->load->view('uco_download_user_info', $data, true);
        } else {
            $data['somitee_mngmnt_info'] = $this->basic_model->getWhere('*', 'somitee_id=' . $data['somitee_info'][0]['somitee_id'], 'somitee_management');
            $data['somitee_added_info'] = $this->basic_model->getAddedBy($data['somitee_info'][0]['re_register_by']);
            //echo '<pre>'; print_r($data['somitee_mngmnt_info']); die();
            //$this->load->view('somitee_list_detail_view_2', $data);
            $html = $this->load->view('uco_download_user_info2', $data, true);
        }
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
