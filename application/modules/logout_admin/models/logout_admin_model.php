<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
	{
		parent::__construct();
    }
    
    public function check_login($uname,$pass)
	{
		$this->db->select('*');
		$this->db->from('login');
		$this->db->where('login_username', $uname);
		$this->db->where('login_password', $pass);
		$this->db->where('is_block', '0');
		$result = $this->db->get();
		
		return $result->result_array();
	}
        
        public function save_customer_info($data) {
            
            $this->db->insert('registration',$data);
        }
          public function save_customer_login_info($data_login) {
            
            $this->db->insert('login',$data_login);
        }
        
        public function check_email($email) {
                
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('email', $email);
            
            $query = $this->db->get();
            $result=$query->row();
            return $result;
    }
    
    public function check_user($user_name) {
                
            $this->db->select('*');
            $this->db->from('registration');
            $this->db->where('user_name', $user_name);
            
            $query = $this->db->get();
            $result=$query->row();
            return $result;
    }


}
?>