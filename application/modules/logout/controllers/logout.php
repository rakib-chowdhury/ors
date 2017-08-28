<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends MX_Controller
{
    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $user_phone = $this->session->userdata('user_phone');
        $user_reg_id = $this->session->userdata('user_reg_id');
        $user_name = $this->session->userdata('user_name');
        if ($user_phone == Null || $user_reg_id = "") {
            $this->session->unset_userdata('user_phone');
            $this->session->unset_userdata('user_reg_id');
            $this->session->unset_userdata('user_name');
            $this->session->unset_userdata('logged_in');
            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন ।');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $this->load->helper('text');
        // $data['about_info']=$this->db->get('about')->row();


        $this->session->set_userdata('error', 'আপনার লগআউট সফলভাৱে সম্পন্ন হয়েছে ।');
        $this->session->unset_userdata('user_phone');
        $this->session->unset_userdata('user_reg_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('logged_in');
        redirect('login', 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */