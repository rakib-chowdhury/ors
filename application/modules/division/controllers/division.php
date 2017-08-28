<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Division extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();


        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('form_validation');

        $nid = $this->session->userdata('nid');
        $reg_id = $this->session->userdata('reg_id');
        $type = $this->session->userdata('type');
        $name = $this->session->userdata('name');

        if ($nid == NULL || $type == NULL) {
            $this->session->unset_userdata('nid');
            $this->session->unset_userdata('reg_id');
            $this->session->unset_userdata('type');
            $this->session->set_userdata('error', 'প্রথমে লগ ইন করুন ');
            redirect('login_admin', 'refresh');
        }

        $this->load->library("session");
        $this->load->model('division_model');

    }

    public function index()
    {
        $this->load->view('layouts/header');
        $this->load->view('index');
        $this->load->view('layouts/footer');
    }

    public function all_somitee_list()
    {
        $data['somitee_info'] = $this->division_model->get_division_somitee_list();
        //echo '<pre>';
        //print_r($data);
        //die();
        $this->load->view('layouts/header');
        $this->load->view('somitee_list_view', $data);
        //$this->load->view('layouts/footer');
    }

    public function somitee_list_detail($somitee_id)
    {
        $data['somitee_info'] = $this->division_model->get_division_somitee_detail($somitee_id);

        // echo '<pre>';
        //print_r($data);
        //die();
        $this->load->view('layouts/header');
        $this->load->view('somitee_list_detail_view', $data);
       // $this->load->view('layouts/footer');
    }

    public function get_div_work()
    {
        $data_divison['admin_reg_id']=$this->session->userdata('reg_id');
        $data_divison['somitee_id']=$this->input->post('somitee_id');
        $data_divison['divisional_admin_comment']=$this->input->post('comment');
        $data_divison['divisional_admin_inquiry_verify']=$this->input->post('somitee_status');

        $id=$this->input->post('somitee_id');
        $data_somitee_info['division_id']=$this->division_model->insert_ret('somitee_divisional_admin',$data_divison);

        $user_info=$this->division_model->get_user_info($this->input->post('somitee_id'));

        $data_sms['n_id']=$user_info[0]['user_nid'];
        $data_sms['phone']=$user_info[0]['user_phone'];
        $data_sms['auto_code']='';
        $data_sms['sms_type']=3;
        $this->division_model->insert('sms_service',$data_sms);
           
       $destination = $data_sms['phone'];
        
        if($this->input->post('somitee_status')==1){
            //echo "1";
            $this->load->helper('string');
            $tmp_pass = random_string('alnum', 6);
            $data_somitee_info['somitee_track_id'] = $tmp_pass;
            $message = 'আপনার প্রাথমিক আবেদনটি গৃহিত হয়েছে । বিস্তারিত জানতে লগইন করুন আপনার ট্র্যাকিং নম্বর "'.$tmp_pass.' "।  
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।';
            $data_somitee_info['somitee_status'] = 2;
            
        }elseif($this->input->post('somitee_status')==3){

           $message = "যথাযথ  না হওয়ায় আবেদন পত্রটি গ্রহণ করা সম্ভব হলো না । সঠিকভাবে পুনরায় আবেদন করুন ।
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।";
            $data_somitee_info['somitee_status'] = 5;
        }elseif($this->input->post('somitee_status')==2){
 $message = "প্রাথমিক নিবন্ধন এর কিছু  তথ্য পরিবর্তন করুন ।  
ধন্যবাদ ।  
সমবায় অধিদপ্তর ।";
//            $data_somitee_info['somitee_status'] = 0;

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
                'maskName' => "DemoMask", 'campaignName' => ""
            );
            $value = $soapClient->__call("OneToOne", array($paramArray));
            //print_r($value);
        } catch (Exception $e) {
            echo $e;
        }

        $response = explode('||', $value->OneToOneResult);


        if ($response[0] = '1900') {
            $msg_api = $this->division_model->getAllRecords('mobile_api');
            $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 1;
            $this->division_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);
            //redirect('somitee');
        }else{
            //redirect('somitee');
        }

        $this->division_model->update_somitee_info($id, $data_somitee_info);
        redirect('division');
    }

}
