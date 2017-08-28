<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MX_Controller {

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
       
         $user_phone = $this->session->userdata('user_phone');
        $user_name = $this->session->userdata('user_name');
        $logged_in = $this->session->userdata('logged_in');

        if ($user_phone != NULL ) {
            redirect('somitee');
        }


    }

    public function index() { 
     
      $data['active']='none';
      $data['lstUp']=$this->registration_model->getAllRecords('lastUpdate');
       $data['site_visitor']=$this->site_visitor_function();
       $data['total_somitee']=$this->somobay_reg_number();
        $this->load->view('public_layouts/header',$data);
        $this->load->view('login',$data);
       //$this->load->view('login_nxt',$data);
       // $this->load->view('public_layouts/footer');
    }
    public function login_iti() {  
     //echo 'dfdsdf'; die();   
      $data['active']='none';
      $data['lstUp']=$this->registration_model->getAllRecords('lastUpdate');
       $data['site_visitor']=$this->site_visitor_function();
       $data['total_somitee']=$this->somobay_reg_number();
        $this->load->view('public_layouts/header',$data);
        $this->load->view('login',$data);
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




    public function login_check() {
        $user_phone = $this->input->post('user_phone_eng');
        $user_password = $this->encryptIt($this->input->post('password'));

        //echo $user_password; die();
        $res = $this->login_model->check_login($user_phone, $user_password);
        if (sizeof($res) == 1) {
            $data = array(
                'user_reg_id' => $res[0]['user_reg_id'],
                'user_phone' => $res[0]['user_phone'],
                'user_name' => $res[0]['user_name'],
                'user_nid'=> $res[0]['user_nid'],
                'logged_in' => TRUE
            );
            $this->session->set_userdata($data);
            redirect('somitee/index');
        } else {
            $this->session->set_userdata('error', 'আপনার ফোন নম্বর  অথবা  পাসওয়ার্ড  টি সঠিক নয়');
            redirect('login', 'refresh');
        }
    }

public function regain_password()
    {
        $phone_no = $this->input->post('user_phone');
        $data['phone_no'] = $this->login_model->match_user_phone($phone_no);
        if ($data['phone_no'] == NULL) {
            $this->session->set_userdata('error', 'আপনার মোবাইল নম্বরটি সঠিক নয়');
            redirect('login', 'refresh');
        } else {
            $chkLmt=$this->login_model->getWhere('count(sms_service_id) as smsLmt','sms_type=7 and phone='.$data['phone_no'][0]['user_phone'],'sms_service');
            if($chkLmt[0]['smsLmt']>=3){
                $this->session->set_userdata('error', 'অনুগ্রহ করে "+৮৮-০১৭০৮৮৬৮১০০" নম্বরে যোগাযোগ করুন');
                redirect('login', 'refresh');
            }
            $tmp_password = $this->decryptIt($data['phone_no'][0]['user_password']);
            $destination = $phone_no;

            if (empty($data['phone_no'][0]['user_phone'])) {
                $data['error_message'] = 'আপনার মোবাইল নম্বরটি সঠিক নয়';
                $this->session->set_userdata($data);
            } else {
                $data_reg = $this->login_model->getWhere('*', 'user_phone=' . $data['phone_no'][0]['user_phone'], 'user_registration');
                $data_sms['n_id'] = $data_reg[0]['user_nid'];
                $data_sms['phone'] = $data_reg[0]['user_phone'];
                $data_sms['auto_code'] = $tmp_password;
                $data_sms['sms_type'] = 8;
                $this->login_model->insert('sms_service', $data_sms);

                $data_log['user_reg_id']=$data_reg[0]['user_reg_id'];
                $data_log['details_id']=8;
                $data_log['comment']='';
                $this->login_model->insert('all_log', $data_log);

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

                    $msg_api = $this->registration_model->getAllRecords('mobile_api');
                    $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 1;
                    $this->registration_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);


                    $this->session->set_userdata('error', 'আপনার  মোবাইল নম্বর এ পুনরায় পাসওয়ার্ড প্রেরণ করা হয়েছে।');
                    redirect('login');
                } else {
                    $this->session->set_userdata('error', 'আপনার  মোবাইল নম্বর  এ প্রেরিত পাসওয়ার্ড দিয়ে লগইন করুন');
                    redirect('login');
                }

            }
        }

    }


    function decryptIt($q) {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qDecoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), base64_decode($q), MCRYPT_MODE_CBC, md5(md5($cryptKey))), "\0");
        return( $qDecoded );
    }

    function encryptIt($q) {
        $cryptKey = 'Lf6Q5htqdgnSn0AABqlsSddj1QNu0fJs';
        $qEncoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($cryptKey), $q, MCRYPT_MODE_CBC, md5(md5($cryptKey))));
        return( $qEncoded );
    }

}
