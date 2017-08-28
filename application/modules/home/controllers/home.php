<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MX_Controller
{

    //public $counter=0;

    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('home_model');
        $this->load->model('basic_model');
        $this->load->model('dco/dco_model');
        $this->load->model('somitee/somitee_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');

    }

    public function index()
    {
        $this->db->limit(4);
        $this->db->order_by('notice_id', 'DESC');
        $data['all_notice_info'] = $this->db->get_where('notice', array('notice_status' => 1))->result();
        $data['site_visitor'] = $this->site_visitor_function();
        $data['active'] = 'home';
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');


        $tmpDate = date('Y-m-d');
        $tmpDate1 = explode('-', $tmpDate);

        $year1 = 0;
        $year2 = 0;
        $mnthForYear1 = array('06', '07', '08', '09', '10', '11', '12');
        $mnthForYear2 = array('01', '02', '03', '04', '05');
        if ($tmpDate1[1] <= 5) {
            $year2 = $tmpDate1[0];
            $year1 = (int)$tmpDate1[0] - 1;
        } else {
            $year1 = $tmpDate1[0];
            $year2 = (int)$tmpDate1[0] + 1;
        }
        $barChartRes = array();
        foreach ($mnthForYear1 as $m) {
            $cnd = $year1 . '-' . $m;
            $tmpRes = $this->home_model->getBarChartVal($cnd);
            array_push($barChartRes, array('year' => $year1, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        foreach ($mnthForYear2 as $m) {
            $cnd = $year2 . '-' . $m;
            $tmpRes = $this->home_model->getBarChartVal($cnd);
            array_push($barChartRes, array('year' => $year2, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        $data['chartNew'] = $barChartRes;

        $barChartRes1 = array();
        foreach ($mnthForYear1 as $m) {
            $cnd = $year1 . '-' . $m;
            $tmpRes = $this->home_model->getBarChartVal1($cnd);
            array_push($barChartRes1, array('year' => $year1, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        foreach ($mnthForYear2 as $m) {
            $cnd = $year2 . '-' . $m;
            $tmpRes = $this->home_model->getBarChartVal1($cnd);
            array_push($barChartRes1, array('year' => $year2, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        $data['chartSelect'] = $barChartRes1;

        $barChartRes2 = array();
        foreach ($mnthForYear1 as $m) {
            $cnd = $year1 . '-' . $m;
            $tmpRes = $this->home_model->getBarChartVal2($cnd);
            array_push($barChartRes2, array('year' => $year1, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        foreach ($mnthForYear2 as $m) {
            $cnd = $year2 . '-' . $m;
            $tmpRes = $this->home_model->getBarChartVal2($cnd);
            array_push($barChartRes2, array('year' => $year2, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        $data['chartReject'] = $barChartRes2;


        $this->load->view('public_layouts/header', $data);
        $this->load->view('index', $data);
        //$this->load->view('public_layouts/footer');
    }

    public function feesncharge()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['active'] = 'fee';
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('view_feesncharge', $data);
        $this->load->view('public_layouts/footer');
    }

    public function help()
    {

        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['active'] = 'home';
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('avro_help', $data);
        $this->load->view('public_layouts/footer');

    }

    public function site_visitor_function()
    {

        $get_visitor_counter = $this->home_model->get_page_counter();
        $site_visitor = $get_visitor_counter[0]['site_visitor_number'];
        $site_visitor++;
        $data_visit['site_visitor_number'] = $site_visitor;
        $this->home_model->update_page_counter($data_visit);

        return $site_visitor;
    }

    public function somobay_reg_number()
    {
        $get_somobay_counter = $this->home_model->get_somobay_counter();
        $s_counter = $get_somobay_counter[0]['total_somitee'];
        return $s_counter;
    }

    public function check_tracking_id()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['active'] = 'home';
        $data['total_somitee'] = $this->somobay_reg_number();
        if (!empty($this->input->post('tracking_number'))) {
            $tracking_number = $this->input->post('tracking_number');
            $data['result'] = $this->home_model->check_tracking_number($tracking_number);
            if (count($data['result']) >= 1) {

                $m_data['message_sc'] = 'আপনার সমবায়-এর তথ্য নীচে দেখুন।';
                $this->session->set_userdata($m_data);
                $this->db->limit(4);
                $this->db->order_by('notice_id', 'DESC');
                $data['all_notice_info'] = $this->db->get_where('notice', array('notice_status' => 1))->result();
                $somitee_id_info = $this->db->get_where('somitee_info', array('somitee_track_id' => $tracking_number))->row();
                $data['somitee_member_info'] = $this->home_model->get_somitee_member_info($somitee_id_info);
                $data['somitee_kormo_info'] = $this->home_model->get_somitee_kormo_info($tracking_number);
                // $data['somitee_member_des'] = $this->home_model->get_somitee_des($tracking_number);
                $this->load->view('public_layouts/header', $data);
                $this->load->view('index', $data);
                $this->load->view('public_layouts/footer');
            } else {
                $m_data['message_err'] = 'আপনার প্রদত্ত ট্র্যাকিং নাম্বার সঠিক নয়।';
                $this->session->set_userdata($m_data);
                redirect('home', 'refresh');
            }
        } else {
            $m_data['message_err'] = 'সর্বপ্রথম আপনার ট্র্যাকিং নাম্বার দিন ।';
            $this->session->set_userdata($m_data);
            redirect('home', 'refresh');
        }


    }

    public function pre_registration()
    {
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('pre-registration', $data);
        $this->load->view('public_layouts/footer', $data);
    }

    public function signup()
    {
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('signup', $data);
        //$this->load->view('public_layouts/footer');
    }

    public function check_email()
    {
        $res = $this->registration_model->check_email($this->input->post('email'));
        if (sizeof($res) > 0) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function check_nid()
    {
        $res = $this->registration_model->check_nid($this->input->post('nid'));
        if (sizeof($res) > 0) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function check_phone()
    {
        $res = $this->registration_model->check_phone($this->input->post('phone'));
        if (sizeof($res) > 0) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function signup_post()
    {
        //echo "<pre>"; print_r($_POST); die();

        $data_reg['user_name'] = $this->input->post('user_name');
        $data_reg['user_nid'] = $this->input->post('user_nid');
        $data_reg['user_email'] = $this->input->post('user_email');
        $data_reg['user_phone'] = $this->input->post('user_phone');

        //$data_login['user_reg_id']=$this->registration_model->insert_ret('user_registration',$data_reg);

        $data_login['user_phone'] = $this->input->post('user_phone');
        $data_login['user_password'] = $this->encryptIt($this->input->post('user_password'));

        //$this->registration_model->insert('user_login',$data_login);
        ///get msg api
        $msg_api = $this->registration_model->getAllRecords('mobile_api');
        $destination = $this->input->post('user_phone');
        $source = "সমবায় অধিদপ্তর ";
        $message = "আপনার রেজিস্ট্রেশন সফলভাৱে সম্পন্ন হয়েছে । আপনার লগইন পাসওয়ার্ড '" . $this->input->post('user_password') . "' ।  ধন্যবাদ ।";
        $msg = urlencode($message);
        /* $params="destination=" . $destination . "&source=" . $source . "&message=" . $message;
         $post_data = array(
             "sourceaddr" => $params,
         );
         $stream_options = array(
             'http' => array(
                 'method' => 'POST',
             ),
         );
         $context = stream_context_create($stream_options);
         print_r($context); die();*/


// Create a stream
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: bn\r\n" .
                    "Cookie: foo=bar\r\n"
            )
        );

        $context = stream_context_create($opts);


        //$this->load->library('curl');
        $response = unserialize(file_get_contents('http://121.241.242.114:8080/sendsms?username=lid2-muntasir&password=123456&type=0&dlr=1&destination=8801677003893&source=GNT&message=' . $msg, false, $context));
        // $response = unserialize(file_get_contents($msg_api[0]['mobile_api_link'] . "destination=" . $destination . "&source=" . $source . "&message=" . $message));
        //$response = file_get_contents($msg_api[0]['mobile_api_link'], null, $context);

        print_r($response);

    }

    function Send()
    {

        $this->api_url = 'http://username:password@ip:port/smsgateway/infobulk';
        $params = $this->source . '&destinationaddr=' . $this > dest . '&shortmessage=' . urlencode($this->msg) . ' ' . urlencode($this->url) . '';

        $post_data = array(
            "sourceaddr" => $params,
        );

        $stream_options = array(
            'http' => array(
                'method' => 'POST',
            ),
        );

        $context = stream_context_create($stream_options);

        $response = file_get_contents($this->api_url, null, $context);

        return $response;
    }

    function decryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return ($qDecoded);
    }

    function encryptIt($q)
    {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return ($qEncoded);
    }

    public function registration_step_1()
    {
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('registration2', $data);
        $this->load->view('public_layouts/footer', $data);
    }

    public function registration3()
    {
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('layouts/header', $data);
        $this->load->view('registration2', $data);
        $this->load->view('layouts/footer', $data);
    }

    public function download_form()
    {
        $data['active'] = 'down_form';
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('download-form', $data);
        $this->load->view('public_layouts/footer');
    }

    public function pre_registraion_info()
    {
        $data['active'] = 'pre_reg';
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('pre-registration-attempt', $data);
        $this->load->view('public_layouts/footer');
    }

    public function questionnaire()
    {
        $this->db->limit(4);
        $this->db->order_by('notice_id', 'DESC');
        $data['all_notice_info'] = $this->db->get_where('notice', array('notice_status' => 1))->result();
        $data['site_visitor'] = $this->site_visitor_function();
        $data['active'] = 'questionnaire';
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('view_questionnaire_info', $data);
        $this->load->view('public_layouts/footer');
    }

    public function communication_info()
    {
        $data['active'] = 'communication';
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('view_communication_info', $data);
        $this->load->view('public_layouts/footer');
    }

    public function law_rules()
    {
        $this->db->limit(4);
        $this->db->order_by('notice_id', 'DESC');
        $data['all_notice_info'] = $this->db->get_where('notice', array('notice_status' => 1))->result();
        $data['site_visitor'] = $this->site_visitor_function();
        $data['active'] = 'law';
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('view_law_info', $data);
        $this->load->view('public_layouts/footer');
    }

    public function opinion_info()
    {
        $data['active'] = 'opinion';
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('view_opinion_info', $data);
        //$this->load->view('public_layouts/footer');
    }

    public function save_opinion_info()
    {
        //  echo '<pre>'; //print_r($_POST); die();

        $data['opinion_title'] = $this->input->post('opinion_title');
        $data['opinion_description'] = $this->input->post('opinion_description');
        $data['name'] = $this->input->post('name');
        $data['mobile_no'] = $this->input->post('user_phone_eng');
        $data['email'] = $this->input->post('email_title');

        //print_r($data); die();
        $this->home_model->save_opinion_info($data);
        if ($this->session->userdata('user_reg_id') == null || $this->session->userdata('user_reg_id') == '') {
            redirect('home');
        } else {
            redirect('somitee');
        }

    }

    public function video()
    {
        $data['active'] = 'video';
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp'] = $this->home_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('view_video', $data);
        $this->load->view('public_layouts/footer');
    }

    public function somitee_re_registration()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        $data['division'] = $this->somitee_model->get_all_division();
        $data['somitee_sodosso_division'] = $this->somitee_model->get_all_division();
        $data['sodosso_kormo_division'] = $this->somitee_model->get_all_division();

        $data['district'] = $this->somitee_model->get_all_district();
        $data['somitee_sodosso_district'] = $this->somitee_model->get_all_district();
        $data['sodosso_kormo_district'] = $this->somitee_model->get_all_district();

        $data['upz'] = $this->somitee_model->get_all_upazilla();
        $data['somitee_sodosso_upz'] = $this->somitee_model->get_all_upazilla();
        $data['sodosso_kormo_upz'] = $this->somitee_model->get_all_upazilla();

        $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat_re();
        $data['somitee_sub_cat'] = $this->somitee_model->getAllrecords('somitee_sub_category');

        $data['lstUp'] = $this->somitee_model->getAllRecords('lastUpdate');
        $data['active'] = 'home';
        $this->load->view('public_layouts/header', $data);
        //$this->load->view('public_layouts/registered_user_header');
        $this->load->view('somitee_re_registration', $data);
    }
    public function check_dco()
    {
        $data['res'] = $this->somitee_model->check_dco($this->input->post('dist_id'));
        echo json_encode($data);
    }

    public function somitee_re_registration_1()
    {
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        if (isset($_POST)) {
//            echo '<pre>';
//            print_r($this->session->userdata);
//            print_r($_POST);

            $insrt['somitee_type_id'] = $this->input->post('somitee_type_name');
            $insrt['somitee_cat_id'] = $this->input->post('somitee_cat_name');
            $insrt['somitee_sub_cat_id'] = $this->input->post('somitee_cat_name');
            $insrt['user_reg_id'] = 0;//
            $insrt['somitee_track_id'] = '';//
            $insrt['somitee_div_id'] = $this->input->post('division_name');
            $insrt['somitee_dist_id'] = $this->input->post('district_name');
            $insrt['somitee_upz_id'] = $this->input->post('upz_name');
            $insrt['somitee_address'] = $this->input->post('ward_name') . ' ' . $this->input->post('others_name');
            $insrt['somitee_kormo_div_id'] = $this->input->post('kormo_division');
            $insrt['somitee_kormo_dist_id'] = $this->input->post('kormo_district');
            $insrt['somitee_kormo_upz_id'] = $this->input->post('kormo_upz');
            $insrt['somitee_kormo_details'] = $this->input->post('kormo_elected_ward');
            $insrt['somitee_name'] = $this->input->post('somiti_name');
            $insrt['member_number'] = str_replace($bn_digits, $en_digits, $this->input->post('male_mem_no') + $this->input->post('female_mem_no'));
            $insrt['member_number_female'] = str_replace($bn_digits, $en_digits, $this->input->post('male_mem_no'));
            $insrt['member_number_male'] = str_replace($bn_digits, $en_digits, $this->input->post('female_mem_no'));
            $insrt['somitee_share'] = str_replace($bn_digits, $en_digits, $this->input->post('share_qty'));
            $insrt['somitee_per_share_price'] = str_replace($bn_digits, $en_digits, $this->input->post('share_price'));
            $insrt['sell_share_num'] = str_replace($bn_digits, $en_digits, $this->input->post('sell_share_num'));
            $insrt['somitee_purpose'] = '';
            $insrt['somitee_reg_date'] = date('Y-m-d');
            $insrt['division_inquiry_date'] = '';
            $insrt['division_id'] = 0;
            $insrt['uco_inquiry_date'] = '';
            $insrt['uco_id'] = 0;
            $insrt['dco_inquiry_date'] = '';
            $insrt['dco_id'] = 0;
            $insrt['somitee_status'] = 1;
            $insrt['is_block'] = 0;
            $insrt['appeal_apply_date'] = '';
            $insrt['appeal_id'] = 0;
            $insrt['complain_id'] = 0;
            $insrt['sodosso_division'] = $this->input->post('sodosso_division');
            $insrt['sodosso_district'] = $this->input->post('sodosso_district');
            $insrt['sodosso_upz'] = $this->input->post('sodosso_upz');
            $insrt['sodosso_details'] = $this->input->post('elected_ward');
            //$insrt['updated_at']=$this->input->post('');
            $insrt['is_re_register'] = 1;
            $insrt['somitee_acc_no'] = $this->input->post('account_no');
            $insrt['re_register_by'] = $this->input->post('added_by');
            //$insrt['appeal_apply_date']=$this->input->post('');
            //echo '<pre>';print_r($insrt);die();
            $newSmtee = $this->basic_model->insert_ret('somitee_info', $insrt);
            $insrt1['somitee_id'] = $newSmtee;
            for ($i = 1; $i <= 12; $i++) {
                $tname = $this->input->post('ofcr_name_' . $i);
                $tphn = $this->input->post('ofcr_phn_' . $i);
                if ($tname == '' || $tphn == '' || $tname == null || $tphn == null) {
                } else {
                    $insrt1['name'] = $tname;
                    $insrt1['phone'] = $tphn;
                    //echo '<pre>';print_r($insrt);die();
                    $this->basic_model->insert('somitee_management', $insrt1);
                }
            }

            $cer = $this->dco_model->get_last_certificate();
            if (sizeof($cer) == 0) {
                $sequel = 1;
            } else {
                $sequel = substr($cer[0]['certificate_sequel'], 11) + 1;

            }
            $s_info = $this->dco_model->get_somitee_infos($newSmtee);
            $d_ate = date('y');
            $s_type = $s_info[0]['somitee_type_id'];
            $s_cat = $s_info[0]['somitee_cat_id'];
            $div = $s_info[0]['somitee_div_id'];
            $dist = $s_info[0]['somitee_dist_id'];
            $upz = $s_info[0]['somitee_upz_id'];
            $data_cer['somitee_id'] = $newSmtee;
            $data_cer['certificate_sequel'] = '' . $s_type . '' . $s_cat . '' . $d_ate . '' . sprintf("%'.02d", $div) . '' . sprintf("%'.02d", $dist) . '' . sprintf("%'.03d", $upz) . '' . sprintf("%'.07d\n", $sequel) . '';

            $this->dco_model->insert('somitee_certificate', $data_cer);

            redirect('home/show_certificate/' . $newSmtee);

        } else {
            echo 'error';
        }


    }

    public function check_login_modal()
    {
        //print_r($_POST);
        $check_nid = $this->input->post('nid');
        $check_password = md5($this->input->post('password'));
        $response = $this->somitee_model->check_login_modal($check_nid, $check_password);
        if (sizeof($response) == 0) {
            echo 0;
        } else {
            $data = array(
                'nid' => $response[0]['admin_nid'],
                'reg_id' => $response[0]['admin_reg_id'],
                'type' => $response[0]['admin_type'],
                'name' => $response[0]['admin_name'],
                'admin_div_id' => $response[0]['div_id'],
                'admin_dist_id' => $response[0]['dist_id'],
                'admin_upz_id' => $response[0]['upz_id'],
                'admin_sign' => $response[0]['sign'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);

            echo $response[0]['admin_reg_id'];
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

        //echo '<pre>'; print_r($data); die();
        $this->load->view('layouts_uco_dco/header');
        //$this->load->view('layouts_uco_dco/secondary-nav');
        $this->load->view('home/show_certificate', $data);
        $this->load->view('layouts_uco_dco/footer');
    }

    public function update_certificate($certificate_sequel)
    {
        if ($_FILES['sign']['error'] == 0) {
            $type = explode('/', $_FILES['sign']['type']);
            $image = getimagesize($_FILES['sign']['tmp_name']);
            $height = $image[1];
            $width = $image[0];
            $type_array = array(
                0 => 'png',
                1 => 'jpg',
                2 => 'JPG',
                3 => 'PNG'
            );
            if ((array_search($type, $type_array) < 4) && ($height < 41) && ($width < 151) && ($_FILES['sign']['size'] < 40200)) {
                $data = array(
                    'somitee_area1' => $this->input->post('somitee_area1'),
                    'somitee_area2' => $this->input->post('somitee_area2')
                    //'sign' => $this->input->post('sign')
                );
                $this->dco_model->update_certificate_model($data, $certificate_sequel);
                $target_path = '' . uniqid() . '_' . $_FILES['sign']['name'];
                //echo '<pre>';print_r($this->session->userdata['reg_id']);die();
                if (move_uploaded_file($_FILES['sign']['tmp_name'], 'uploads/sign/' . $target_path)) {
                    $data1['sign'] = $target_path;
                    //echo '<pre>';print_r($data['sign']);die();
                    $this->dco_model->update_sign($this->session->userdata['reg_id'], $data1);
                }
                if ($this->session->userdata('type') == 2) {
                    redirect('doc', 'refresh');
                } elseif ($this->session->userdata('type') == 6) {
                    redirect('dco', 'refresh');
                } elseif ($this->session->userdata('type') == 7) {
                    redirect('uco', 'refresh');
                } else {
                    echo 'something went wrong';
                }
            }

        }

    }

    public function chk_somitee_name()
    {
        $chk = $this->somitee_model->chkSomitee($this->input->post('name'),$this->input->post('dist'));
        echo $chk[0]['num'];
    }

    public function get_dist()
    {

        $data['res'] = $this->somitee_model->get_dist($this->input->post('div_id'));
        echo json_encode($data);
    }

    public function get_upz2()
    {
        $data['res'] = $this->somitee_model->get_upz2($this->input->post('dist_id'));//changed
        echo json_encode($data);
    }

    public function get_upz()
    {
        $data['res'] = $this->somitee_model->get_upz($this->input->post('dist_id'));
        echo json_encode($data);
    }

    public function get_sub_cat()
    {
        $data['res'] = $this->somitee_model->get_sub_cat($this->input->post('cat_id'));
        echo json_encode($data);
    }

}
