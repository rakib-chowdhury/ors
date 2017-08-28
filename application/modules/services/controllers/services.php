<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Services extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('services_model');
        $this->load->model('doc/doc_model');
        $this->load->model('doc/doc_model');
        $this->load->model('basic_model');
        $this->load->model('registration/registration_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $data1['type'] = 1;
        $this->session->set_userdata($data1);

        $nid = $this->session->userdata('nid');
        $reg_id = $this->session->userdata('reg_id');
        $type = $this->session->userdata('type');
        $this->session->userdata('logged_in');
        if ($nid == NULL || $type == NULL || $type == "" || $type != 1 || $nid == "") {
            $this->session->unset_userdata('nid');
            $this->session->unset_userdata('reg_id');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');

            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন |');
            redirect('login_admin', 'refresh');
        }
    }

    public function index()
    {
        $data['somitee_info'] = $this->services_model->get_division_somitee_list();
        $data['somitee_all_info'] = $this->services_model->get_all_division_somitee_list();


        $data['lstUp'] = $this->services_model->getAllRecords('lastUpdate');
        $data['sms_info'] = $this->services_model->get_sms_detail();
        $data['all_somitee_counter'] = $this->services_model->get_somitee_count('all');
        $data['reject_somitee_counter'] = $this->services_model->get_somitee_count('reject');
        $data['selected_somitee_counter'] = $this->services_model->get_somitee_count(1);
        $data['new_somitee_counter'] = $this->services_model->get_somitee_count('new');

        $data['all_somitee_counters'] = $this->doc_model->get_somitee_counts('all');
        $data['reject_somitee_counters'] = $this->doc_model->get_somitee_counts('reject');
        $data['selected_somitee_counters'] = $this->doc_model->get_somitee_counts('selected');
        $data['new_somitee_counters'] = $this->doc_model->get_somitee_counts('new');
        $data['appeal_somitee_counters'] = $this->doc_model->get_somitee_counts('appeal');
        $data['complain_somitee_counters'] = $this->doc_model->get_somitee_counts('complain');

        //echo '<pre>'; print_r($data['complain_somitee_counters']); die();
        $this->load->view('layouts/header');
        $this->load->view('index', $data);
        $this->load->view('layouts/footer');
    }

    public function site_update_post()
    {
        $data['last_update'] = $this->input->post('siteUp');
        $this->services_model->update_lastUpdate($data);
        redirect('services');
    }

    public function sms_resend($id)
    {
        $get_sms_info = $this->services_model->get_sms_data($id);
        //echo '<pre>';print_r($get_sms_info);
        $type = $get_sms_info[0]['sms_type'];
        $destination = $get_sms_info[0]['phone'];
        $tmp_password = 0;
        if (!empty($get_sms_info[0]['auto_code']) || $get_sms_info[0]['auto_code'] != '') {
            $tmp_password = $get_sms_info[0]['auto_code'];
        }
        $message = '';
        if ($type == 1) {
            $message = "আপনার লগইন পাসওয়ার্ড '" . $tmp_password . "' ।  
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।";
        }
        if ($type == 2) {
            $message = "ধন্যবাদ। 
পরবর্তী করণীয় সম্পর্কে জানার জন্য অপেক্ষা করুন । 
সমবায় অধিদপ্তর ।";
//$message="সেতু বন্ধন ক্ষুদ্র ব্যবসায়ী সমবায় সমিতি লিমিটেড name akti abedon joma hoyeche. Onugroho kore bebostha grohon korun.";
        }

        if ($type == 3) {
            $message = 'আপনার প্রাথমিক আবেদনটি গৃহিত হয়েছে। আপনার ট্র্যাকিং নম্বর "' . $get_sms_info[0]['auto_code'] . ' "। বিস্তারিত জানতে লগইন করুন। 
ধন্যবাদ।
সমবায় অধিদপ্তর।';
        }

        if ($type == 4) {
            $message = "" . $get_sms_info[0]['auto_code'] . "  যথাযথ  না হওয়ায় আবেদন পত্রটি গ্রহণ করা সম্ভব হলো না। সঠিকভাবে পুনরায় আবেদন করুন।
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।";
        }

        if ($type == 5) {
            $message = "সমবায় নিবন্ধন প্রক্রিয়া সম্পন্ন হয়েছে । আপনার একাউন্ট এ লগইন করে 'নিবন্ধন সনদ' সংগ্রহ করুন। 
ধন্যবাদ । 
সমবায়  অধিদপ্তর ।";
        }

        if ($type == 6) {
            $message = "সমবায় নিবন্ধন আবেদন বাতিল হয়েছে। বিস্তারিত জানতে লগইন করুন।
ধন্যবাদ । 
সমবায়  অধিদপ্তর ।";
        }

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

            $msg_api = $this->registration_model->getAllRecords('mobile_api');
            $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 1;
            $this->registration_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);

            $data_resend = array('is_resend' => 1,);
            $this->services_model->update_resend_data($id, $data_resend);

        }
        redirect('services/sms_list');


    }

    public function all_somitee_list()
    {
        $data['somitee_info'] = $this->services_model->get_somitee_lists($this->uri->segment(3), $this->uri->segment(4));

        if ($this->uri->segment(4) == 'all') {
            $data['s_type'] = 'all';
            $data['title'] = 'সকল  সমবায়ের তালিকা';
        } elseif ($this->uri->segment(4) == 'reject') {
            $data['s_type'] = 'reject';
            $data['title'] = 'বাতিলকৃত সমবায়ের তালিকা';
        } elseif ($this->uri->segment(4) == 'new') {
            $data['s_type'] = 'new';
            $data['title'] = 'নতুন সমবায়ের তালিকা';
        } elseif ($this->uri->segment(4) == 1) {
            $data['s_type'] = 'selected';
            $data['title'] = 'সফল সমবায়ের তালিকা';
        } elseif ($this->uri->segment(4) == 'appeal') {
            $data['s_type'] = 'appeal';
            $data['title'] = 'আপিলকৃত সমবায়ের তালিকা';
        } elseif ($this->uri->segment(4) == 'complain') {
            $data['s_type'] = 'complain';
            $data['title'] = 'অভিযোগকৃত সমবায়ের তালিকা';
        }


        $data['lstUp'] = $this->services_model->getAllRecords('lastUpdate');
        //echo '<pre>';   print_r($data['somitee_info']);    die();

        $this->load->view('layouts/header');
        $this->load->view('all_somitee_list', $data);
        $this->load->view('layouts/footer');
    }

    public function somitee_list_detail()
    {
        $data['lstUp'] = $this->services_model->getAllRecords('lastUpdate');
        $somitee_id = $this->uri->segment(3);

        $data['somitee_info'] = $this->doc_model->get_all_somitee_list($somitee_id);
        $data['somitee_info_sodosso'] = $this->doc_model->get_sodosso_area($somitee_id);
        $data['somitee_category'] = $this->doc_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->doc_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);

        $data['s_type'] = $this->uri->segment(4);

        $this->load->view('layouts/header');
        if ($data['somitee_info'][0]['is_re_register'] == 0) {
            $data['check_uco'] = $this->doc_model->check_uco($data['somitee_info'][0]['somitee_div_id'], $data['somitee_info'][0]['somitee_dist_id'], $data['somitee_info'][0]['somitee_upz_id']);
            $data['check_dco'] = $this->doc_model->check_dco($data['somitee_info'][0]['somitee_div_id'], $data['somitee_info'][0]['somitee_dist_id']);
            $data['somitee_member_info'] = $this->doc_model->get_member($data['somitee_info'][0]['somitee_id']);
            $data['uco_info'] = $this->doc_model->getUco($somitee_id);
            $data['dco_info'] = $this->doc_model->getDco($somitee_id);
            $data['division_info'] = $this->doc_model->getDivision($somitee_id);
            $data['leader_info'] = $this->doc_model->get_leader_info($somitee_id);
            $data['appeal_info'] = $this->doc_model->get_appeal_info($data['somitee_info'][0]['appeal_id']);
            $data['complain_info'] = $this->doc_model->get_complain_info($somitee_id);

            $this->load->view('services/somitee_list_detail_view', $data);
        } else {
            $data['somitee_mngmnt_info'] = $this->basic_model->getWhere('*', 'somitee_id=' . $data['somitee_info'][0]['somitee_id'], 'somitee_management');
            $data['somitee_added_info'] = $this->basic_model->getAddedBy($data['somitee_info'][0]['re_register_by']);
           // echo '<pre>'; print_r($data['somitee_mngmnt_info']); die();
            $this->load->view('services/somitee_list_detail_view_2', $data);
        }

    }

    public function check_somitee()
    {
        $somitee_id = $this->input->post('somitee_id');
        $data1['admin_reg_id'] = '';
        $data1['somitee_id'] = $somitee_id;

        if ($this->input->post('accept') == 'accept') {
            $this->load->helper('string');
            $tmp_pass = random_string('alnum', 6);
            $data['somitee_track_id'] = $tmp_pass;
            $message = 'আপনার প্রাথমিক আবেদনটি গৃহিত হয়েছে । বিস্তারিত জানতে লগইন করুন আপনার ট্র্যাকিং নম্বর "' . $tmp_pass . ' "।  
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।';

            $data['somitee_status'] = 2;
            $data['uco_inquiry_date'] = date('Y-m-d');
            $data1['divisional_admin_comment'] = '';
            $data1['divisional_admin_inquiry_verify'] = 1;

        } else {

            $cmnt = array('সমবায়ের নাম', 'সমবায়ের ঠিকানা', 'সমবায় গঠনের উদ্দেশ্য', 'সমবায়ের প্রাথমিক তথ্য', 'সমবায়ের শ্রেণি', 'সমবায়ের সদস্য');
            $data1['divisional_admin_comment'] = $cmnt[$this->input->post('doc_verify') - 1];

            //echo '<pre>';
            //print_r($data1); die();

            $message = "" . $data1['divisional_admin_comment'] . "  যথাযথ  না হওয়ায় আবেদন পত্রটি গ্রহণ করা সম্ভব হলো না । সঠিকভাবে পুনরায় আবেদন করুন ।
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।";

            $data1['divisional_admin_inquiry_verify'] = 0;
            $data['somitee_status'] = 3;
        }

        $user_info = $this->services_model->get_user_info($this->input->post('somitee_id'));
        $data_sms['n_id'] = $user_info[0]['user_nid'];
        $data_sms['phone'] = $user_info[0]['user_phone'];
        $data_sms['auto_code'] = '';
        $data_sms['sms_type'] = 3;
        $this->services_model->insert('sms_service', $data_sms);

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
            $msg_api = $this->services_model->getAllRecords('mobile_api');
            $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 1;
            $this->services_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);
            //redirect('somitee');
        } else {
            //redirect('somitee');
        }


        $data['division_id'] = $this->services_model->insert_ret('somitee_divisional_admin', $data1);
        $this->services_model->update_somitee_status($somitee_id, $data);

        redirect('doc');

    }

    public function somitee_list_by_div($div_id)
    {

        $this->load->view('layouts/header');
        $data['somitee_info'] = $this->services_model->get_somitee_list_by_div($div_id);
        // print_r($data); die();
        $data['lstUp'] = $this->services_model->getAllRecords('lastUpdate');
        $this->load->view('somitee_list', $data);
        $this->load->view('layouts/footer');
    }


    /*
        public function somitee_list_detail($somitee_id){
            $data['somitee_info']=$this->services_model->get_all_somitee_list($somitee_id);
             $data['somitee_member_info'] = $this->somitee_model->get_somitee_member_info($data['somitee_info'][0]['somitee_id']);
                $data['mem_des_count'] = $this->somitee_model->get_somitee_member_des_num($data['somitee_info'][0]['somitee_id'])[0]['mem_des_no'];
                $data['somitee_member_des'] = $this->somitee_model->get_somitee_des($data['somitee_info'][0]['somitee_id']);
                $data['document'] = $this->somitee_model->get_document($data['somitee_info'][0]['somitee_id']);
                $data['complain_info']=$this->somitee_model->getComplain($data['somitee_info'][0]['somitee_id']);
                $data['division_info']=$this->somitee_model->getDivision($data['somitee_info'][0]['somitee_id']);
                
                $data['uco_details'] = $this->somitee_model->getUco($data['somitee_info'][0]['somitee_id']);
                $data['dco_info'] = $this->somitee_model->getDco($data['somitee_info'][0]['somitee_id']);
            
            $this->load->view('layouts/header');
            $this->load->view('somitee_list_detail_view',$data);
            $this->load->view('layouts/footer');
        }
    */
    public function all_notice()
    {
        $data['all_notice_info'] = $this->db->get('notice')->result();
        $this->load->view('layouts/header');
        $this->load->view('notice_all', $data);
        $this->load->view('layouts/footer');
    }

    public function insert_notice()
    {
        $data['notice_title'] = $this->input->post('notice_title');
        $data['notice_detail'] = $this->input->post('notice_detail');
        $this->db->insert('notice', $data);
        redirect('doc/all_notice');
    }

    public function update_notice_status($notice_id)
    {
        $notice_status = $this->services_model->get_specific_notice($notice_id);
        $notice_status = $notice_status[0]['notice_status'];
        if ($notice_status == 0) {
            $notice_status = 1;
        } else {
            $notice_status = 0;
        }
        $data = array('notice_status' => $notice_status,);
        $this->db->where('notice_id', $notice_id);
        $this->db->update('notice', $data);
        redirect('doc/all_notice');
    }

    public function view_notice_detail($notice_id)
    {
        $data['notice_info'] = $this->db->get_where('notice', array('notice_id' => $notice_id))->row();
        $this->load->view('layouts/header');
        $this->load->view('notice_detail_view', $data);
        $this->load->view('layouts/footer');
    }

    public function update_notice_detail()
    {
        $notice_id = $this->input->post('edit_id');
        $data['notice_title'] = $this->input->post('notice_title');
        $data['notice_detail'] = $this->input->post('notice_detail');
        $this->db->where('notice_id', $notice_id);
        $this->db->update('notice', $data);
        redirect('doc/all_notice');
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


    public function register_employee()
    {

        $data['division'] = $this->services_model->get_all_division();

        $this->load->view('layouts/header');
        $this->load->view('register_employee', $data);
    }

    public function employee_registration_form()
    {

        $data['selector_id'] = $this->input->post('selection_id');
        $data['division_id'] = $this->input->post('division_id');
        $data['district_id'] = $this->input->post('district_id');
        $data['upz_id'] = $this->input->post('upz_id');

        if ($data['selector_id'] == 2) {
            if (!is_numeric($data['division_id'])) {
                redirect('doc/register_employee');
            }
            $data['designation_id'] = 3;
            $data['designation_name'] = 'DIVISION';
        } elseif ($data['selector_id'] == 3) {
            if (!is_numeric($data['division_id'])) {
                redirect('doc/register_employee');
            }
            if (!is_numeric($data['district_id'])) {
                redirect('doc/register_employee');
            }
            $data['designation_id'] = 6;
            $data['designation_name'] = 'DCO';
        } elseif ($data['selector_id'] == 4) {
            if (!is_numeric($data['division_id'])) {
                redirect('doc/register_employee');
            }
            if (!is_numeric($data['district_id'])) {
                redirect('doc/register_employee');
            }
            if (!is_numeric($data['upz_id'])) {
                redirect('doc/register_employee');
            }
            $data['designation_id'] = 7;
            $data['designation_name'] = 'UCO';
        } else {
            redirect('doc/register_employee');
        }

        $data['designation'] = $this->services_model->get_designation('1'); //1=admin

        $this->load->view('layouts/header');
        $this->load->view('employee_registration_form', $data);
        $this->load->view('layouts/footer');
    }

    public function employee_registration_form_post()
    {
        $data['admin_name'] = $this->input->post('name');
        $data['admin_nid'] = $this->input->post('nid');
        $data['admin_email'] = $this->input->post('email');
        $data['admin_phone'] = $this->input->post('phone');
        $data['admin_dob'] = $this->input->post('birth-date');
        $data['admin_designation_id'] = $this->input->post('designation');

        $data['div_id'] = $this->input->post('division_id');
        $data['dist_id'] = $this->input->post('district_id');
        $data['upz_id'] = $this->input->post('upz_id');

        //$this->services_model->insert_employee_reg_form($data);
        $data1['admin_reg_id'] = $this->services_model->insert_ret('admin_registration', $data);
        $data1['admin_nid'] = $this->input->post('nid');
        $data1['password'] = $this->encryptIt($this->input->post('password'));
        $data1['admin_type'] = $this->input->post('designation');
        $this->services_model->insert('admin_login', $data1);

        redirect('doc/employee_list');
    }

    public function employee_list()
    {

        $data['division'] = $this->services_model->get_all_division();

        $this->load->view('layouts/header');
        $this->load->view('employee_list', $data);
    }

    public function view_employee()
    {

        $data['selector_id'] = $this->input->post('selection_id');
        $data['division_id'] = $this->input->post('division_id');
        $data['district_id'] = $this->input->post('district_id');
        $data['upz_id'] = $this->input->post('upz_id');

        $page_type = $this->input->post('page_type');
        //echo $page_type;
        if ($data['selector_id'] == 2) {
            if (!is_numeric($data['division_id']) && $page_type == 1) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            $data['employee_info'] = $this->services_model->get_emp_info($data['division_id'], 0, 0);
        } elseif ($data['selector_id'] == 3) {
            if (!is_numeric($data['division_id'])) {
                //redirect('doc/employee_list');
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            if (!is_numeric($data['district_id'])) {
                //redirect('doc/employee_list');
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            $data['employee_info'] = $this->services_model->get_emp_info($data['division_id'], $data['district_id'], 0);
        } elseif ($data['selector_id'] == 4) {
            if (!is_numeric($data['division_id'])) {
                //redirect('doc/employee_list');
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            if (!is_numeric($data['district_id'])) {
                //redirect('doc/employee_list');
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            if (!is_numeric($data['upz_id'])) {
                //redirect('doc/employee_list');
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            $data['employee_info'] = $this->services_model->get_emp_info($data['division_id'], $data['district_id'], $data['upz_id']);
        } else {
            redirect('doc/employee_list');
        }
        $data['division'] = $this->services_model->get_all_division();

        $this->load->view('layouts/header');
        if ($page_type == 1) {
            $this->load->view('transfer', $data);
        } else {
            $this->load->view('filtered-employee-list', $data);
        }
        //$this->load->view('layouts/footer');
    }

    public function sms_list()
    {
        $data['title'] = 'ALL SMS LIST';
        $data['sms_list'] = $this->services_model->get_all_sms_info();
        $data['lstUp'] = $this->services_model->getAllRecords('lastUpdate');
        $this->load->view('layouts/header');
        $this->load->view('all_sms_list', $data);
        $this->load->view('layouts/footer');
    }

    public function employee_designation_change()
    {
        $data['employee_info'] = $this->services_model->get_emp_info_all();
        //$data['designation'] = $this->services_model->get_designation('1'); //1=admin
        $data['division'] = $this->services_model->get_all_division();
        $this->load->view('layouts/header');
        //echo "<pre>"; print_r($data); die();
        $this->load->view('transfer', $data);
        $this->load->view('layouts/footer');
    }

    public function employee_transfer()
    {
        $this->load->view('layouts/header');
        $this->load->view('employee_list');
        $this->load->view('layouts/footer');
    }

    public function change_designation()
    {
        $admin_reg_id = $this->input->post('emp_reg_id');

        $data['div_id'] = $this->input->post('division_id');
        $data['dist_id'] = $this->input->post('district_id');
        $data['upz_id'] = $this->input->post('upz_id');

        $seletion = $this->input->post('selection_id');
        if ($seletion == 2) {
            $data['admin_designation_id'] = 3;
            $data_login['admin_type'] = 3;
        } elseif ($seletion == 3) {
            $data['admin_designation_id'] = 2;
            $data_login['admin_type'] = 2;
        } elseif ($seletion == 4) {
            $data['admin_designation_id'] = 1;
            $data_login['admin_type'] = 1;
        }
        $data_login['is_block'] = 1;
        $this->services_model->update_designation($admin_reg_id, $data);
        $this->services_model->update_login($admin_reg_id, $data_login);
        redirect('doc/employee_list');
    }

    public function somitee_list()
    {

        $this->load->view('layouts/header');
        $data['somitee_info'] = $this->services_model->get_somitee_list();
        // print_r($data); die();
        $this->load->view('somitee_list', $data);
        $this->load->view('layouts/footer');
    }

    public function view_somitee()
    {

        $this->load->view('layouts/header');
        $data['somitee_info'] = $this->services_model->get_division_somitee_detail($$this->uri->srgment(3));

        $this->load->view('view_somitee_info', $data);
        $this->load->view('layouts/footer');
    }

    public function get_dist()
    {
        $data['res'] = $this->services_model->get_dist($this->input->post('div_id'));
        echo json_encode($data);
    }

    public function get_upz()
    {
        $data['res'] = $this->services_model->get_upz($this->input->post('dist_id'));
        echo json_encode($data);
    }

    public function sms_api()
    {

        $this->load->view('layouts/header');
        $data['sms_api_info'] = $this->services_model->getAllRecords('mobile_api');
        // print_r($data); die();
        $this->load->view('sms_api', $data);
        $this->load->view('layouts/footer');
    }

    public function sms_api_change()
    {
        $api_id = $this->input->post('sms_link_id');
        $data['mobile_api_link'] = $this->input->post('sms_api_link');
        $data['total_sms_number'] = $this->input->post('sms_number');
        $data['send_sms_number'] = 0;
        $this->services_model->update_sms_api($api_id, $data);
        redirect('doc/sms_api');
    }

    public function sms_buy()
    {
        $api_id = $this->input->post('sms_link_id');
        //$sms=$this->input->post('pre_sms_num');
        $data['total_sms_number'] = $this->input->post('sms_number') + $this->input->post('pre_sms_num');
        $this->services_model->update_sms_api($api_id, $data);
        redirect('doc/sms_api');
    }

    public function sms_api_add()
    {
        $data['mobile_api_link'] = $this->input->post('sms_api_link');
        $data['total_sms_number'] = $this->input->post('sms_number');
        $data['send_sms_number'] = 0;//$this->input->post('sms_number');
        $this->services_model->insert('mobile_api', $data);
        redirect('doc/sms_api');
    }

    public function dco_download_user_info($somitee_id)
    {
        //$somitee_id=somitee_id;


        $data['somitee_info'] = $this->services_model->get_all_somitee_list($somitee_id);
        //$data['somitee_member_info'] = $this->somitee_model->get_somitee_member_info($data['somitee_info'][0]['somitee_id']);
        $data['somitee_category'] = $this->services_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->services_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_info_sodosso'] = $this->services_model->get_sodosso_area($somitee_id);
        $data['somitee_member_info'] = $this->services_model->get_member($data['somitee_info'][0]['somitee_id']);
        $data['uco_info'] = $this->services_model->getUco($somitee_id);
        $data['dco_info'] = $this->services_model->getDco($somitee_id);
        $data['s_type'] = $this->uri->segment(4);
        //print_r($data['somitee_info_sodosso']); die();
        //$this->load->view('layouts/header');
        //$this->load->view('somitee_list_detail_view',$data);

        $html = $this->load->view('dco_download_user_info', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('m_pdf', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");

    }

    public function delete_somitee_info()
    {
        //echo $somitee_id.'   '.$user_reg_id;
        $somitee_id = $this->input->post('somitee_id');
        $user_reg_id = $this->input->post('user_reg_id');
        $condition1 = "somitee_id";
        //echo '<pre>';print_r($condition1);die();
        $table_name1 = "somitee_info";
        $this->services_model->delete_somitee_info($table_name1, $condition1, $somitee_id);
        $table_name2 = "somitee_info_tmp";
        //echo '<pre>';print_r($table_name2);die();
        $this->services_model->delete_somitee_info($table_name2, $condition1, $somitee_id);
        $table_name3 = "somitee_management";
        $this->services_model->delete_somitee_info($table_name3, $condition1, $somitee_id);
        $table_name4 = "somitee_member_registration_new";
        $this->services_model->delete_somitee_info($table_name4, $condition1, $somitee_id);
        $condition2 = "user_reg_id";
        $table_name5 = "somitee_member_registration_tmp";
        $this->services_model->delete_somitee_info($table_name5, $condition2, $user_reg_id);
        $table_name6 = "uco";
        $this->services_model->delete_somitee_info($table_name6, $condition1, $user_reg_id);
        $table_name7 = "dco";
        $this->services_model->delete_somitee_info($table_name7, $condition1, $user_reg_id);
        $table_name8 = "appeal";
        $this->services_model->delete_somitee_info($table_name8, $condition1, $user_reg_id);
        $table_name9 = "complain";
        $this->services_model->delete_somitee_info($table_name9, $condition1, $user_reg_id);
        $table_name9 = "somitee_certificate";
        $this->services_model->delete_somitee_info($table_name9, $condition1, $user_reg_id);
        redirect('services/all_somitee_list/1/new', 'refresh');
    }


}
