<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dco extends MX_Controller
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
        if ($nid == NULL || $type == NULL || $type == "" || $type != 6 || $nid == "") {
            $this->session->unset_userdata('nid');
            $this->session->unset_userdata('reg_id');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');

            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন |');
            redirect('login_admin', 'refresh');
        }
        // $this->load->model('db_search');

        $this->load->library("session");
        $this->load->model('dco_model');
        $this->load->model('basic_model');
        $this->load->model('somitee/somitee_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
    }

    public function index()
    {
        $tmp_sign = $this->dco_model->get_sign($this->session->userdata('reg_id'));
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $data['track'] = 1;
        $data['pro'] = 0;
        $data['sine_done'] = 0;
        if ($tmp_sign[0]['sign'] == null) {
            $data['sine_err'] = 1;
        } else {
            $data['sine_err'] = 0;
        }
        if ($this->uri->segment(3) == 'profile') {
            $data['track'] = 0;
            $data['pro'] = 1;
        }
        if ($this->uri->segment(3) == 'sign') {
            $data['sine_done'] = 1;
        }
        if ($this->uri->segment(3) == 'up_err') {
            $data['sine_err'] = 2;
        }

        $data['all_new_somitee'] = $this->dco_model->get_new_somitee_info($this->session->userdata('admin_dist_id'));
        $tracking_number = 0;
        $dist_id = 0;
        if (!empty($this->input->post('tracking_number'))) {
            $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
            $dist_id = $admin_dist_id[0]['dist_id'];
            $tracking_number = $this->input->post('tracking_number');
        }
        $data['result'] = $this->dco_model->check_tracking_number($tracking_number, $dist_id);
        $data['somitee_info'] = $this->dco_model->check_tracking_number($tracking_number, $dist_id);
        if (sizeof($data['somitee_info']) != 0) {
            $data['somitee_info_sodosso'] = $this->dco_model->get_sodosso_area($data['somitee_info'][0]['somitee_id']);
            $data['somitee_category'] = $this->dco_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
            $data['somitee_sub_category'] = $this->dco_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
            $data['uco_info'] = $this->dco_model->getUco($data['somitee_info'][0]['somitee_id']);
            $data['leader_info'] = $this->dco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
            $data['dco_info'] = $this->dco_model->getDco($data['somitee_info'][0]['somitee_id']);
        }
        $div = $this->session->userdata('admin_div_id');
        $dist = $this->session->userdata('admin_dist_id');
        $data['new_somitee_info'] = $this->dco_model->get_somitee_num($div, $dist, 'new');
        $data['all_somitee_info'] = $this->dco_model->get_somitee_num($div, $dist, 'all');
        //echo '<pre>'; print_r($data['all_somitee_info']); die();
        $data['selected_somitee_info'] = $this->dco_model->get_somitee_num($div, $dist, 'selected');
        $data['reject_somitee_info'] = $this->dco_model->get_somitee_num($div, $dist, 'reject');
        $data['appeal_somitee_info'] = $this->dco_model->get_somitee_num($div, $dist, 'appeal');
        $data['feedbackInfo'] = $this->dco_model->get_feedback($div, $dist);
        //echo '<pre>'; print_r($data['feedbackInfo']); die();
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('index', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function get_all_admin_info()
    {
        $data['res'] = $this->dco_model->get_all_admin_info($this->input->post('iid'), $this->input->post('tble'));
        echo json_encode($data);
    }

    public function feedback()
    {
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $data['title'] = 'ফিডব্যাকসমূহ';
        $div = $this->session->userdata('admin_div_id');
        $dist = $this->session->userdata('admin_dist_id');
        $data['newSomitee'] = $this->dco_model->getFeedbackSomitee($div, $dist);
        $data['feedbackSomitee'] = $this->dco_model->getFeedbackSomiteeDetails($div, $dist);
        foreach ($data['feedbackSomitee'] as $kkk) {
            if ($kkk['type'] == 2 && $kkk['is_seen'] == 0) {
                $d_seen['is_seen'] = 1;
                $this->dco_model->seenSomitee($kkk['id'], $d_seen);
            }
        }

        $this->load->view('layouts_uco_dco/header');
        $this->load->view('feedback_list', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function feedback_post()
    {
        $data_insert['somitee_id'] = $this->input->post('somiteeID');
        $data_insert['dco_id'] = $this->input->post('dcoID');
        $data_insert['uco_id'] = '';
        $data_insert['reply'] = '';
        $data_insert['inquiry'] = $this->input->post('msg');
        $data_insert['type'] = 1;
        $data_insert['created_at'] = date('Y-m-d');

        $this->dco_model->insert('feedback', $data_insert);
        redirect('dco/feedback');
    }

    public function update_somitee_info_by_dco()
    {

        $somitee_id = $this->input->post('somitee_id');
        $data['somitee_name'] = $this->input->post('somitee_name');
        $data['somitee_type_id'] = $this->input->post('org-type');
        $data['somitee_cat_id'] = $this->input->post('org-type-in');
        $data['somitee_sub_cat_id'] = $this->input->post('org-type-inner-most');
        if ($data['somitee_type_id'] == 2 || $data['somitee_type_id'] == 3) {
            $data['somitee_cat_id'] = 0;
            $data['somitee_sub_cat_id'] = 0;
        }

        $data['somitee_div_id'] = $this->input->post('division');
        $data['somitee_dist_id'] = $this->input->post('district');
        $data['somitee_upz_id'] = $this->input->post('upz');
        $data['somitee_address'] = $this->input->post('somitee_address');

        $data['sodosso_division'] = $this->input->post('sodosso_division');
        $data['sodosso_district'] = $this->input->post('sodosso_district');
        $data['sodosso_upz'] = $this->input->post('sodosso_upz');
        $data['sodosso_details'] = $this->input->post('sodosso_details');

        $data['somitee_kormo_div_id'] = $this->input->post('somitee_kormo_div_id');
        $data['somitee_kormo_dist_id'] = $this->input->post('somitee_kormo_dist_id');
        $data['somitee_kormo_upz_id'] = $this->input->post('somitee_kormo_upz_id');
        $data['somitee_kormo_details'] = $this->input->post('somitee_kormo_details');

        $data['somitee_per_share_price'] = $this->input->post('share_price_eng');
        $data['somitee_share'] = $this->input->post('share_qty_eng');
        $data['sell_share_num'] = $this->input->post('sell_share_eng');

        $data['somitee_purpose'] = $this->input->post('purpose');

        $this->dco_model->update_somitee_info($somitee_id, $data);
        redirect('dco/see_somitee_detail/' . $somitee_id);
    }


    public function somitee_member_update_dco()
    {
        $somitee_id = $this->input->post('somitee_id');
        $user_reg_id = $this->input->post('user_reg_id');
        $member_name = $this->input->post('member_name');
        $member_nid = $this->input->post('member_nid');
        $somitee_member_id = $this->input->post('somitee_member_id');
//        echo '<pre>';
//        print_r($member_nid);
//        echo $somitee_id;
//        die();

        for ($i = 0; $i < count($member_name); $i++) {
            $data['member_name'] = $member_name[$i];
            $data['somitee_member_nid'] = $member_nid[$i];
            $id = $somitee_member_id[$i];
            $this->dco_model->update_somitee_member($id, $data);

        }
        redirect('dco/see_somitee_detail/' . $somitee_id);
    }


    public function change_password()
    {
        $uname = $this->session->userdata('reg_id');

        $pass = $this->encryptIt($this->input->post('pass_change'));

        //$this->load->view('formsuccess');
        $data['password'] = $pass;
        $this->dco_model->password_change($data, $uname);
        redirect('dco/index', 'refresh');

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


    public function somitee_list_detail($somitee_id)
    {
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $data['result'] = $this->dco_model->get_somitee_detail($somitee_id);
        $data['somitee_member_info'] = $this->dco_model->get_all_somitee_member_info($somitee_id);
        $data['all_new_somitee'] = $this->dco_model->get_dco_somitee_list();
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('index', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function all_somitee_list()
    {
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
        $dist_id = $admin_dist_id[0]['dist_id'];
        $data['all_info'] = $this->dco_model->get_all_somitee_info($dist_id);
        $data['title'] = 'সকল সমবায় প্রাথমিক আবেদন এর তালিকা';
        $data['type'] = 'all';
        //echo '<pre>';print_r($data);die();

        $this->load->view('layouts_uco_dco/header');
        $this->load->view('all_somitee_view', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function new_somitee_list()
    {
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
        $dist_id = $admin_dist_id[0]['dist_id'];
        $data['all_info'] = $this->dco_model->get_new_somitee_info($dist_id);
        $data['title'] = 'নতুন সমবায় প্রাথমিক আবেদন এর তালিকা';
        $data['type'] = 'new';
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('all_somitee_view', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function success_somitee_list()
    {
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
        $dist_id = $admin_dist_id[0]['dist_id'];
        $data['all_info'] = $this->dco_model->get_success_somitee_info($dist_id);
        //$data['certificate']=$this->dco_model->get_certificate();
        $data['title'] = 'সফল  সমবায় প্রাথমিক আবেদন এর তালিকা';
        $data['type'] = 'selected';
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('all_somitee_view', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function certificate_generate($somitee_id)
    {
        $tmp = $this->basic_model->getWhere('*', 'somitee_id=' . $somitee_id, 'somitee_info');
        if ($tmp[0]['is_re_register'] == 1) {
            $data['dco_admin_info'] = $this->dco_model->get_all_dco_info($tmp[0]['re_register_by']);
        } else {
            $admin_reg_id['reg_id'] = $this->dco_model->get_admin_reg_id($somitee_id);

            $data['dco_admin_info'] = $this->dco_model->get_all_dco_info($admin_reg_id['reg_id'][0]['admin_reg_id']);
        }
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        // $admin_reg_id = $this->session->userdata('reg_id');
        //$data['dco_admin_info'] = $this->dco_model->get_all_dco_info($admin_reg_id);
        $data['select_all_info_by_certificate'] = $this->dco_model->get_all_certificate_info($somitee_id);
        $data['select_somitte_kormo_info'] = $this->dco_model->somitte_kormo_info($somitee_id);
        $data['select_somitte_sodosho_info'] = $this->dco_model->somitte_sodosho_info($somitee_id);
        //print_r($data['dco_admin_info']);
        //exit();


        $string = $data['select_all_info_by_certificate'][0]['created_at'];
        $timestamp = strtotime($string);
        $day = date("d", $timestamp);
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $day = str_replace(range(0, 9), $bn_digits, $day);


        $month = date("m", $timestamp);
        $month = str_replace(range(0, 9), $bn_digits, $month);

        $year = date("Y", $timestamp);
        $year = str_replace(range(0, 9), $bn_digits, $year);

        $this->load->library('ciqrcode');
        $sequence = $data['select_all_info_by_certificate'][0]['certificate_sequel'];
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $sequence = str_replace(range(0, 9), $bn_digits, $sequence);

        $params['data'] = 'সমবায়ের নাম:' . $data['select_all_info_by_certificate'][0]['somitee_name'] . ',' . 'নিবন্ধন নং:' . $sequence . ',' . 'কর্মকর্তা :' . $data['dco_admin_info'][0]['admin_name'] . ',' . ' তাং :' . $day . '/' . $month . '/' . $year . 'ইং';
        $params['level'] = 'H';
        $params['size'] = 1.5;
        $params['savename'] = FCPATH . 'tes.png';
        $this->ciqrcode->generate($params);

        $html = $this->load->view('certification', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf', "'utf-8', 'A4-L'");
        //$this->load->library('m_pdf', "'','', 0, '', 30, 30, 30, 30, 18, 12, 'L'");
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");

    }

    public function reject_somitee_list()
    {

        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
        $dist_id = $admin_dist_id[0]['dist_id'];
        $data['all_info'] = $this->dco_model->get_reject_somitee_info($dist_id);
        $data['type'] = 'reject';
        $data['title'] = 'বাতিল সমবায় প্রাথমিক আবেদন এর তালিকা';
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('all_somitee_view', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function appeal_somitee_list()
    {

        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
        $dist_id = $admin_dist_id[0]['dist_id'];
        $data['all_info'] = $this->dco_model->get_appeal_somitee_info($dist_id);
        $data['type'] = 'appeal';
        $data['title'] = 'আপীল সমবায় নিবন্ধন এর আবেদন তালিকা';
        $this->load->view('layouts_uco_dco/header');
        $this->load->view('all_somitee_view', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function see_somitee_detail($somitee_id, $type)
    {

        if ($this->uri->segment(5) == 'err') {
            $data['comment_err'] = 1;
        } else {
            $data['comment_err'] = 0;
        }
        $data['s_type'] = $type;
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $data['somitee_info'] = $this->dco_model->get_detail($somitee_id);

        $data['somitee_info_sodosso'] = $this->dco_model->get_sodosso_area($somitee_id);

        $data['division'] = $this->somitee_model->get_all_division();
        $data['district'] = $this->somitee_model->get_all_district();
        $data['upz'] = $this->somitee_model->get_all_upazilla();

        $data['somitee_sodosso_division'] = $this->somitee_model->get_all_division();
        $data['somitee_sodosso_district'] = $this->somitee_model->get_all_district();
        $data['somitee_sodosso_upz'] = $this->somitee_model->get_all_upazilla();

        $data['sodosso_kormo_division'] = $this->somitee_model->get_all_division();
        $data['sodosso_kormo_district'] = $this->somitee_model->get_all_district();
        $data['sodosso_kormo_upz'] = $this->somitee_model->get_all_upazilla();

        $data['somitee_category'] = $this->dco_model->get_all_category();
        $data['somitee_sub_category'] = $this->dco_model->get_all_sub_category();

        if ($data['somitee_info'][0]['is_re_register'] == 0) {
            $data['somitee_member_info'] = $this->dco_model->get_all_somitee_member_info_detail($data['somitee_info'][0]['somitee_id']);
            $data['uco_info'] = $this->dco_model->getUco($somitee_id);
            $data['dco_info'] = $this->dco_model->getDco($somitee_id);
            $data['division_info'] = $this->dco_model->getDivision($somitee_id);
            $data['leader_info'] = $this->dco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
            $data['appeal_info'] = $this->dco_model->get_appeal_info($data['somitee_info'][0]['appeal_id']);

            $this->load->view('layouts_uco_dco/header');
            $this->load->view('see_somitee_detail_view', $data);
        } else {
            $data['somitee_info'] = $this->dco_model->get_detail2($somitee_id);
            $data['somitee_mngmnt_info'] = $this->basic_model->getWhere('*', 'somitee_id=' . $data['somitee_info'][0]['somitee_id'], 'somitee_management');
            $data['somitee_added_info'] = $this->basic_model->getAddedBy($data['somitee_info'][0]['re_register_by']);
           // echo '<pre>';
          //  print_r($data['somitee_info']);
           // die();
            $this->load->view('layouts_uco_dco/header');
            $this->load->view('see_somitee_detail_view_2', $data);
        }
    }

    public function get_dist()
    {

        $data['res'] = $this->somitee_model->get_dist($this->input->post('div_id'));
        echo json_encode($data);
    }

    public function get_upz()
    {
        $data['res'] = $this->somitee_model->get_upz($this->input->post('dist_id'));
        echo json_encode($data);
    }

    public function get_upz2()
    {
        $data['res'] = $this->somitee_model->get_upz2($this->input->post('dist_id'));//changed
        echo json_encode($data);
    }

    public function get_sub_cat()
    {
        $data['res'] = $this->somitee_model->get_sub_cat($this->input->post('cat_id'));
        echo json_encode($data);
    }


    public function check_tracking_id()
    {
        //echo '<pre>'; print_r($_POST);// die();
        if (!empty($this->input->post('tracking_number'))) {
            $admin_dist_id = $this->dco_model->get_admin_dist_id($this->session->userdata('reg_id'));
            $dist_id = $admin_dist_id[0]['dist_id'];
            $tracking_number = $this->input->post('tracking_number');

            $data['result'] = $this->dco_model->check_tracking_number($tracking_number, $dist_id);
            //echo $dist_id;
            //print_r($data['result']); die();
            if (count($data['result']) >= 1) {
                $data['somitee_info'] = $this->dco_model->check_tracking_number($tracking_number, $dist_id);
                //redirect('dco/see_somitee_detail/1/search';
                redirect('dco/see_somitee_detail/' . $data['somitee_info'][0]['somitee_id'] . '/search');
            } else {
                $m_data['message_err'] = 'আপনার ট্র্যাকিং নাম্বার সঠিক নয়।';
                $this->session->set_userdata($m_data);
                redirect('dco', 'refresh');
            }
        } else {
            $m_data['message_err'] = 'সর্বপ্রথম আপনার ট্র্যাকিং নাম্বার দিন ।';
            $this->session->set_userdata($m_data);
            redirect('dco', 'refresh');
        }


    }

    public function somitee_list()
    {
        $this->load->view('layouts_uco_dco/header');
        $data['somitee_list'] = $this->dco_model->get_somitee_list();
        // print_r($data); die();
        $this->load->view('somitee_list', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function view_somitee()
    {
        if ($this->uri->segment(3)) {
            $data['somitee_info'] = $this->dco_model->get_somitee_info();

            //echo "<pre>"; print_r($data); die();
            $this->load->view('layouts_uco_dco/header');
            $this->load->view('view_somitee_info', $data);
            $this->load->view('layouts_uco_dco/footer');
        }
    }

    public function upload_sign()
    {
        $image_info = getimagesize($_FILES["sign_up"]["tmp_name"]);
        $image_width = $image_info[0];
        $image_height = $image_info[1];
        if ($image_width >= 151 || $image_height >= 41) {
            redirect('dco/index/up_err');
        }


        // echo '<pre>';
        // print_r($_FILES);
        $target_path = '' . uniqid() . '_' . $_FILES['sign_up']['name'];
        if (move_uploaded_file($_FILES['sign_up']['tmp_name'], 'uploads/sign/' . $target_path)) {
            $data['sign'] = $target_path;
        } else {
        }

        $this->dco_model->update_sign($this->session->userdata('reg_id'), $data);

        redirect('dco/index/sign');
    }


    public function dco_comment_post()
    {
        $verify = $this->input->post('bttn');
        $somitee = $this->input->post("somitee_id");
        $type = $this->input->post("s_type");
        $result = $this->dco_model->get_somitee($somitee);
        // echo '<pre>'; print_r($result);
        if ($verify == 'approve') {
            $tmp_sign = $this->dco_model->get_sign($this->session->userdata('reg_id'));
            if ($tmp_sign[0]['sign'] == null) {
                //redirect('dco/index/signNull');
                redirect('dco');
            }
        }

        $data_dco['admin_reg_id'] = $this->session->userdata('reg_id');
        $data_dco['somitee_id'] = $somitee;

        if ($verify == 'reject') {
            if ($this->input->post('cmmnt') == null) {
                redirect('dco/see_somitee_detail/' . $somitee . '/' . $type . '/err', 'refresh');
            } else {
                $data_dco['dco_comment'] = $this->input->post('cmmnt');
            }
            $total = count($_FILES['file']['name']);

            $tmp_path = array();
            for ($i = 0; $i < $total; $i++) {

                $tmpFilePath = 'uploads/files/' . uniqid() . '__' . $_FILES['file']['name'][$i];

                if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $tmpFilePath)) {
                    array_push($tmp_path, $tmpFilePath);
                }
            }
            $data_dco['dco_comment_upload'] = json_encode($tmp_path);

        }

        //$verify = $this->input->post('bttn');
        $data_sms['sms_type'] = 0;
        if ($verify == 'approve') {
            /*$message = "সমবায় নিবন্ধন প্রক্রিয়া সম্পন্ন হয়েছে । আপনার একাউন্ট এ লগইন করে 'নিবন্ধন সনদ' সংগ্রহ করুন।
ধন্যবাদ ।
সমবায়  অধিদপ্তর ।";*/
            $message = "Samabay nibondhon prokria somponno hoyeche.Apnar account a login kre 'Nibondhon Sonod' Songroho korun.
Thanks.
Samabay Odhidoptor.";

            $data_log['details_id'] = 5;
            $data_sms['sms_type'] = 5;
            $data_somitee['somitee_status'] = 1;
            $data_dco['dco_inquiry_verify'] = 1;
            $s_info = $this->dco_model->get_somitee_infos($somitee);
            $d_ate = date('y');
            $s_type = $s_info[0]['somitee_type_id'];
            $s_cat = $s_info[0]['somitee_cat_id'];
            $div = $s_info[0]['somitee_div_id'];
            $dist = $s_info[0]['somitee_dist_id'];
            $upz = $s_info[0]['somitee_upz_id'];
            $cer = $this->dco_model->get_last_certificate();
            if (sizeof($cer) == 0) {
                $sequel = 1;
            } else {
                $sequel = substr($cer[0]['certificate_sequel'], 11) + 1;

            }

            $data_cer['somitee_id'] = $somitee;
            $data_cer['certificate_sequel'] = '' . $s_type . '' . $s_cat . '' . $d_ate . '' . sprintf("%'.02d", $div) . '' . sprintf("%'.02d", $dist) . '' . sprintf("%'.03d", $upz) . '' . sprintf("%'.07d\n", $sequel) . '';

            $this->dco_model->insert('somitee_certificate', $data_cer);

        } else {
            $message = "Samabay nibondhon abedon batil hoyeche.Bistarito jante login korun.
Thanks.
Samabay Odhidoptor.";

            if ($result[0]['appeal_id'] == 0) {
                $data_somitee['somitee_status'] = 3;
            } else {
                $data_somitee['somitee_status'] = 5;
            }

            $data_dco['dco_inquiry_verify'] = 0;
            $data_sms['sms_type'] = 6;
            $data_log['details_id'] = 6;
        }


        $data_somitee['dco_id'] = $this->dco_model->insert_ret('dco', $data_dco);
        $this->dco_model->update_somitee_status($somitee, $data_somitee);

        $user_info = $this->dco_model->get_user_info($this->input->post('somitee_id'));
        $data_sms['n_id'] = $user_info[0]['user_nid'];
        $data_sms['phone'] = $user_info[0]['user_phone'];
        $data_sms['auto_code'] = '';

        $this->dco_model->insert('sms_service', $data_sms);

        $data_log['user_reg_id'] = $user_info[0]['user_reg_id'];
        $data_log['comment'] = '';
        $this->dco_model->insert('all_log', $data_log);

        $destination = $data_sms['phone'];


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
            //print_r($value);
        } catch (Exception $e) {
            echo $e;
        }


        $response = explode('||', $value->OneToOneResult);


        if ($response[0] = '1900') {
            $msg_api = $this->dco_model->getAllRecords('mobile_api');
            $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 3;
            $this->dco_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);

            if ($verify == 'approve') {
                $message = $result[0]['somitee_name'] . " name akti Somobay sofolvabe nibondhon hoyeche.";

                $tmpAdmin = $this->somitee_model->getAdmin();//get all admin nd super admin

                foreach ($tmpAdmin as $tmp) {
                    $data_sms['n_id'] = $tmp['admin_nid'];
                    $data_sms['phone'] = $tmp['admin_phone'];
                    $data_sms['auto_code'] = '';
                    $data_sms['sms_type'] = 5;
                    $this->somitee_model->insert('sms_service', $data_sms);

                    $destination = $tmp['admin_phone'];

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
                        //print_r($value);
                    } catch (Exception $e) {
                        echo $e;
                    }
                    $response = explode('||', $value->OneToOneResult);
                    if ($response[0] = '1900') {
                        $msg_api = $this->somitee_model->getAllRecords('mobile_api');
                        $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 3;
                        $this->somitee_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);
                    }
                }
            }

        }
        if ($verify == 'approve') {
            redirect('dco/show_certificate/' . $somitee);
        } else {
            redirect('dco');
        }
    }


    public function show_certificate()
    {
        $tmp_sign = $this->dco_model->get_sign($this->session->userdata('reg_id'));
        $data['admin_info'] = $this->dco_model->get_admin_profile($this->session->userdata('reg_id'));
        $somitee_id = $this->uri->segment(3);
        $admin_reg_id = $this->session->userdata('reg_id');
        $data['dco_admin_info'] = $this->dco_model->get_all_dco_info($admin_reg_id);
        $data['select_all_info_by_certificate'] = $this->dco_model->get_all_certificate_info($somitee_id);
        $data['select_somitte_kormo_info'] = $this->dco_model->somitte_kormo_info($somitee_id);
        $data['select_somitte_sodosho_info'] = $this->dco_model->somitte_sodosho_info($somitee_id);
        $this->load->view('layouts_uco_dco/header');
        //$this->load->view('layouts_uco_dco/secondary-nav');
        $this->load->view('dco/show_certificate', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function update_certificate($certificate_sequel)
    {
        $data = array(
            'somitee_area1' => $this->input->post('somitee_area1'),
            'somitee_area2' => $this->input->post('somitee_area2')
        );
        // print_r($data);
        //  die();
        // echo $somitee_certificate_id;die();
        $this->dco_model->update_certificate_model($data, $certificate_sequel);
        redirect('dco/success_somitee_list');


    }

    public function dco_download_user_info($somitee_id)
    {

        $data['somitee_info'] = $this->dco_model->get_all_somitee_list($somitee_id);
        $data['division_info'] = $this->dco_model->getDivision($data['somitee_info'][0]['somitee_id']);
        $data['leader_info'] = $this->dco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
        $data['somitee_category'] = $this->dco_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->dco_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_info_sodosso'] = $this->dco_model->get_sodosso_area($somitee_id);
        if ($data['somitee_info'][0]['is_re_register'] == 0) {
            $data['somitee_member_info'] = $this->dco_model->get_member($data['somitee_info'][0]['somitee_id']);
            $data['uco_info'] = $this->dco_model->getUco($data['somitee_info'][0]['somitee_id']);
            $data['dco_info'] = $this->dco_model->getDco($data['somitee_info'][0]['somitee_id']);
            $data['s_type'] = $this->uri->segment(4);
            $data['appeal_info'] = $this->dco_model->get_appeal_info($data['somitee_info'][0]['appeal_id']);
            //echo '<pre>';
            //print_r($data['somitee_info_sodosso']);
            //die();
            //$this->load->view('layouts/header');
            //$this->load->view('somitee_list_detail_view',$data);

            $html = $this->load->view('dco_download_user_info', $data, true);
        } else {
            $data['somitee_mngmnt_info'] = $this->basic_model->getWhere('*', 'somitee_id=' . $data['somitee_info'][0]['somitee_id'], 'somitee_management');
            $data['somitee_added_info'] = $this->basic_model->getAddedBy($data['somitee_info'][0]['re_register_by']);
            //echo '<pre>'; print_r($data['somitee_mngmnt_info']); die();
            //$this->load->view('somitee_list_detail_view_2', $data);
            $html = $this->load->view('dco_download_user_info2', $data, true);
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

