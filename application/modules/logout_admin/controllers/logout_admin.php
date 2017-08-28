<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logout_admin extends MX_Controller
{
    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $nid = $this->session->userdata('nid');
        $reg_id = $this->session->userdata('reg_id');
        $type = $this->session->userdata('type');
        if ($nid == Null || $type = "") {
            $this->session->unset_userdata('nid');
            $this->session->unset_userdata('reg_id');
            $this->session->unset_userdata('type');
            $this->session->unset_userdata('logged_in');
            $this->session->set_userdata('error', 'সর্বপ্রথম আপনার লগইন তথ্য দিন ।');
            redirect('login_admin', 'refresh');
        }
    }

    public function index()
    {
        $this->load->helper('text');
        // $data['about_info']=$this->db->get('about')->row();


        $this->session->set_userdata('logout_message', 'আপনার লগআউট সফলভাৱে সম্পন্ন হয়েছে ।');
        $this->session->unset_userdata('nid');
        $this->session->unset_userdata('reg_id');
        $this->session->unset_userdata('type');
        $this->session->unset_userdata('logged_in');
        redirect('login_admin', 'refresh');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */