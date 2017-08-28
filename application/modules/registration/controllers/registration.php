<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Registration extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('registration_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->helper('captcha');
    }

    public function index()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['active'] = 'none';
        $data['lstUp'] = $this->registration_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('index', $data);
        $this->load->view('public_layouts/footer');
    }

    public function site_visitor_function()
    {

        $get_visitor_counter = $this->registration_model->get_page_counter();
        $site_visitor = $get_visitor_counter[0]['site_visitor_number'];
        $site_visitor++;
        $data_visit['site_visitor_number'] = $site_visitor;
        $this->registration_model->update_page_counter($data_visit);

        return $site_visitor;
    }

    public function somobay_reg_number()
    {
        $get_somobay_counter = $this->registration_model->get_somobay_counter();
        $s_counter = $get_somobay_counter[0]['total_somitee'];
        return $s_counter;
    }

    public function pre_registration()
    {
        $data['lstUp'] = $this->registration_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        $this->load->view('pre-registration', $data);
        $this->load->view('public_layouts/footer');
    }

    public function signup()
    {
        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        // setting up captcha config
        $vals = array(
            'word' => $random_number,
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'img_width' => 140,
            'img_height' => 32,
            'expiration' => 7200
        );
        $data['captcha'] = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $data['captcha']['word']);
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['active'] = 'none';
        $data['lstUp'] = $this->registration_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header', $data);
        //$this->load->view('index_nxt', $data);
        $this->load->view('signup', $data);
        //$this->load->view('public_layouts/footer');
    }
    public function signup_iti()
    {
        $random_number = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
        // setting up captcha config
        $vals = array(
            'word' => $random_number,
            'img_path' => './captcha/',
            'img_url' => base_url() . 'captcha/',
            'img_width' => 140,
            'img_height' => 32,
            'expiration' => 7200
        );
        $data['captcha'] = create_captcha($vals);
        $this->session->set_userdata('captchaWord', $data['captcha']['word']);
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['active'] = 'none';
        $data['lstUp'] = $this->registration_model->getAllRecords('lastUpdate');
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

        print_r($res);
    }

    public function signup_post()
    {
        //$this->load->helper('string');
        $tmp_pass = rand(1000, 9999);
        $tmp_password = 'reg' . $tmp_pass;

        //echo $tmp_password; die();
        $destination = $this->input->post('user_phone_eng');


        $phone = $this->input->post('user_phone');
        $en_digits = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $phone = str_replace($bn_digits, $en_digits, $phone);

        $res = $this->registration_model->check_phone($phone);
        if (count($res) > 0) {
            $this->session->set_userdata('duplicate_phone', '<h4 style="color:red;text-align:center;">আপনার ফোন নম্বর দ্বারা পূর্বে অনলাইন নিবন্ধন করা হয়েছে।<br /> অনুগ্রহ করে নতুন ফোন নাম্বার দিন ।</h4>');

            $this->session->set_userdata('reg_u_name_session', $this->input->post('user_name'));
            $this->session->set_userdata('reg_nid_session', $this->input->post('user_nid'));
            $this->session->set_userdata('reg_email_session', $this->input->post('user_email'));
            redirect('registration/signup');
        } else {


            $data_reg['user_name'] = $this->input->post('user_name');
            $data_reg['user_nid'] = $this->input->post('user_nid');
            $data_reg['user_email'] = $this->input->post('user_email');
            $data_reg['user_phone'] = $phone;


            $data_login['user_reg_id'] = $this->registration_model->insert_ret('user_registration', $data_reg);

            $data_log['user_reg_id']=$data_login['user_reg_id'];
            $data_log['details_id']=1;
            $data_log['comment']='';
            $this->registration_model->insert('all_log', $data_log);

            $data_login['user_phone'] = $phone;
            $data_login['user_password'] = $this->encryptIt($tmp_password);
            $this->registration_model->insert('user_login', $data_login);

            $data_sms['n_id'] = $data_reg['user_nid'];
            $data_sms['phone'] = $data_reg['user_phone'];
            $data_sms['auto_code'] = $tmp_password;
            $data_sms['sms_type'] = 1;

            $this->registration_model->insert('sms_service', $data_sms);

            /*$message = "আপনার লগইন পাসওয়ার্ড '" . $tmp_password . "'
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।";*/
            $message = "Apner Login Password '" . $tmp_password . "'.
Thanks  
Samabay Odhidoptor.";


            try {
                $userName = "01613083375";
                $userPass = "80d019";

                $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
                $paramArray = array(
                    'userName' => $userName,
                    'userPassword' => $userPass,
                    'mobileNumber' => $phone,
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


                //$this->session->set_userdata('error', 'আপনার  মোবাইল নম্বর  এ প্রেরিত পাসওয়ার্ড দিয়ে লগইন করুন');
                $this->session->set_userdata('error', 'আপনার  মোবাইল নম্বর  এ প্রেরিত পাসওয়ার্ড দিয়ে লগইন করুন');
                redirect('login');


            } else {


                redirect('home');
            }


        }


        //redirect('login', 'refresh');
        /*
        $userName = "01613083375";
        $passWord = "80d019";

        $this->load->library("nusoap_library");
        $soapClient =  new nusoap_client("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl", 'wsdl');


        //OneToOne

        $paramArray = array(
            'userName'=>$userName,
            'userPassword'=>$passWord,
            'mobileNumber'=> $destination,
            'smsText'=> $message,
            'type'=>"UCS",
            'maskName'=> "DemoMask",
            'campaignName'=>'GNT',
        );
        echo "before calling method";
        $value = $soapClient->call("OneToOne", $paramArray);
        echo 'output is '; print_r($value);

        */
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

        $this->load->view('public_layouts/header');
        $this->load->view('registration2');
        $this->load->view('public_layouts/footer');
    }

    public
    function registration3()
    {

        $this->load->view('layouts/header');
        $this->load->view('registration2');
        $this->load->view('layouts/footer');
    }

}
