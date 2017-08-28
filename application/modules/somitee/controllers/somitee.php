<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Somitee extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('form_validation');

        $user_phone = $this->session->userdata('user_phone');
        $user_name = $this->session->userdata('user_name');
        $logged_in = $this->session->userdata('logged_in');

        if ($user_phone == NULL) {
            $this->session->unset_userdata('user_phone');
            $this->session->unset_userdata('user_reg_id');
            $this->session->unset_userdata('logged_in');
            $this->session->set_userdata('error', 'প্রথমে লগ ইন করুন ');
            redirect('login', 'refresh');
        }

        $this->load->library("session");
        $this->load->model('somitee_model');
        $this->load->model('dco/dco_model');
        $this->load->library('encrypt');
    }

    public function index()
    {
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $user_reg_id = $this->session->userdata('user_reg_id');
        $data['somitee_info'] = $this->somitee_model->get_somitee_info($user_reg_id);
        $data['site_visitor'] = $this->site_visitor_function();
        $data['division'] = $this->somitee_model->get_all_division();
        //$data['upz'] = $this->somitee_model->get_all_upazilla();

        $data['total_somitee'] = $this->somobay_reg_number();
        if (sizeof($data['somitee_info']) != 0) {
            $data['somitee_member_info'] = $this->somitee_model->get_somitee_member_info($data['somitee_info'][0]['somitee_id']);
            $data['somitee_category'] = $this->somitee_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
            $data['somitee_sub_category'] = $this->somitee_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
            $data['mem_des_count'] = $this->somitee_model->get_somitee_member_des_num($data['somitee_info'][0]['somitee_id'])[0]['mem_des_no'];
            $data['somitee_member_des'] = $this->somitee_model->get_somitee_des($data['somitee_info'][0]['somitee_id']);
            $data['document'] = $this->somitee_model->get_document($data['somitee_info'][0]['somitee_id']);
            $data['complain_info'] = $this->somitee_model->getComplain($data['somitee_info'][0]['somitee_id']);
            $data['division_info'] = $this->somitee_model->getDivision($data['somitee_info'][0]['somitee_id']);
            $data['somitee_info_sodosso'] = $this->somitee_model->get_sodosso_area($data['somitee_info'][0]['somitee_id']);
            $data['uco_details'] = $this->somitee_model->getUco($data['somitee_info'][0]['somitee_id']);
            $data['dco_info'] = $this->somitee_model->getDco($data['somitee_info'][0]['somitee_id']);
            $data['complain_info'] = $this->somitee_model->get_complain_info($data['somitee_info'][0]['somitee_id']);

        }
        //echo "<pre>";
        //print_r($data); die();
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/registered_user_header');
        $this->load->view('index', $data);

    }

   public function chk_bksh(){
        $bid=array('00001111','00002222','00003333','00004444');
        $t=$this->input->post('t_id');
        //echo $t;
        if (in_array($t, $bid)) {
           echo 1;
       }else{
           echo 0;
       }
   }

    public function how_to_bkash(){
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $user_reg_id = $this->session->userdata('user_reg_id');
        $data['somitee_info'] = $this->somitee_model->get_somitee_info($user_reg_id);
        $data['site_visitor'] = $this->site_visitor_function();
        $data['division'] = $this->somitee_model->get_all_division();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/registered_user_header');
        $this->load->view('how_to_bkash', $data);
    }


    public function check_blocked_upz()
    {
        $data['res'] = $this->somitee_model->check_blocked_upz($this->input->post('upz_id'));

        echo json_encode($data);
    }


    public function get_complain_info()
    {
        $data['complain_infos'] = $this->somitee_model->get_complain($this->input->post('complain_id'));
        if (sizeof($data['complain_infos']) == 0) {
            $data['res'] = 0;
        } else {
            $data['res'] = 1;
        }
        echo json_encode($data);
    }


    public function leader_info()
    {
        $this->load->view('leader_info');
    }


    public function certificate_generate($somitee_id)
    {
        $admin_reg_id['reg_id'] = $this->somitee_model->get_admin_reg_id($somitee_id);
        //echo $admin_reg_id;exit();
        $data['dco_admin_info'] = $this->dco_model->get_all_dco_info($admin_reg_id['reg_id'][0]['admin_reg_id']);
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
        $this->load->library('m_pdf', "'utf-8', 'L'");
        //       $this->load->library('m_pdf',"'','', 0, '', 30, 30, 30, 30, 18, 12, 'L'");
        //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "I");

    }


    public function site_visitor_function()
    {

        $get_visitor_counter = $this->somitee_model->get_page_counter();
        $site_visitor = $get_visitor_counter[0]['site_visitor_number'];
        $site_visitor++;
        $data_visit['site_visitor_number'] = $site_visitor;
        $this->somitee_model->update_page_counter($data_visit);

        return $site_visitor;
    }

    public function somobay_reg_number()
    {
        $get_somobay_counter = $this->somitee_model->get_somobay_counter();
        $s_counter = $get_somobay_counter[0]['total_somitee'];
        return $s_counter;
    }


    public function somitee_info_edit($somitee_id)
    {
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['somitee_all_info'] = $this->somitee_model->get_edit_somitee_info($somitee_id);
        $data['division'] = $this->somitee_model->get_all_division();
        $data['district'] = $this->somitee_model->get_all_district();
        $data['upz'] = $this->somitee_model->get_all_upazilla();
        $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat();
        $data['somitee_sub_cat'] = $this->somitee_model->get_all_sub_cat();
        $data['somitee_type'] = $this->somitee_model->get_all_somitee_type();
        $this->load->view('public_layouts/header');
        $this->load->view('somitee_info_edit_view', $data);

        // redirect('somitee');
        // $this->load->view('public_layouts/footer');
    }

    public function update_somitee_information()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $somitee_id = $this->input->post('edit_id');
        $data['somitee_div_id'] = $this->input->post('somitee_div_id');
        $data['somitee_dist_id'] = $this->input->post('somitee_dist_id');
        $data['somitee_upz_id'] = $this->input->post('somitee_upz_id');
        $data['somitee_address'] = $this->input->post('ward') . ' ' . $this->input->post('others');
        $data['somitee_name'] = $this->input->post('somitee_name');
        $data['somitee_type_id'] = $this->input->post('somitee_type_id');
        $data['somitee_cat_id'] = $this->input->post('somitee_cat_id');
        $data['somitee_sub_cat_id'] = $this->input->post('somitee_sub_cat_id');
        $data['somitee_per_share_price'] = $this->input->post('somitee_per_share_price');
        $data['somitee_kormo_div_id'] = $this->input->post('somitee_kormo_div_id');
        $data['somitee_kormo_dist_id'] = $this->input->post('somitee_kormo_dist_id');
        $data['somitee_purpose'] = $this->input->post('somitee_purpose');
        $data['division_id'] = 0;
        $this->db->where('somitee_id', $somitee_id);
        $this->db->update('somitee_info', $data);
        redirect('somitee');
    }   

    public function somitee_registration()
    {
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
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
        $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat2();
        $data['somitee_sub_cat'] = $this->somitee_model->getAllrecords('somitee_sub_category');
        $this->load->view('public_layouts/registered_user_header');
        // $somitee_session_id=$this->session->userdata('session_id');
        //echo $somitee_session_id;
        $data['all_tmp_data'] = $this->somitee_model->get_tmp_data($this->session->userdata('user_reg_id'));
        if ($data['all_tmp_data'] == NULL) {
            // echo "ahahahha";
            // echo "<pre>";
            // print_r($data['all_tmp_data']);
            // die();
        }
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $this->load->view('somitee_registration', $data);

    }

    public function update_somitee_tmp_info()
    {
        $data['user_reg_id'] = $this->session->userdata('user_reg_id');
        $data['somitee_name'] = $this->input->post('somitee_name');
        $data['somitee_div_id'] = $this->input->post('division_name');
        $data['somitee_dist_id'] = $this->input->post('district_name');
        $data['somitee_upz_id'] = $this->input->post('upz_name');
        $data['somitee_ward'] = $this->input->post('ward_name');
        $data['others'] = $this->input->post('others_name');
        $data['somitee_type_id'] = $this->input->post('somitee_type_name');
        $data['somitee_cat_id'] = $this->input->post('somitee_cat_name');
        $data['somitee_sub_cat_id'] = $this->input->post('somitee_cat_sub_name');
        $data['somitee_per_share_price'] = $this->input->post('share_price_eng_name');
        // //$data['share_price_name'] = $this->input->post('share_price_name');
        // //$data['share_qty_name'] = $this->input->post('share_qty_name');
        $data['somitee_share'] = $this->input->post('share_qty_eng');
        // //$data['s_budget_name'] = $this->input->post('s_budget_name');
        // //$data['sell_share_eng_name'] = $this->input->post('sell_share_eng_name');
        $data['sell_share_num'] = $this->input->post('sell_share_eng');
        // //$data['s_sell_budget_name'] = $this->input->post('s_sell_budget_name');
        $data['sodosso_division'] = $this->input->post('sodosso_division');
        $data['sodosso_district'] = $this->input->post('sodosso_district');
        $data['sodosso_upz'] = $this->input->post('sodosso_upz');
        $data['elected_ward_name'] = $this->input->post('elected_ward');
        $data['somitee_kormo_div_id'] = $this->input->post('kormo_division');
        $data['somitee_kormo_dist_id'] = $this->input->post('kormo_district');
        $data['somitee_kormo_upz_id'] = $this->input->post('kormo_upz');
        $data['kormo_elected_ward_name'] = $this->input->post('kormo_elected_ward');
        $data2['check_all_data'] = $this->somitee_model->check_all_given_data($data['user_reg_id']);

        if (count($data2['check_all_data']) > 0) {
            $this->db->update('somitee_info_tmp', $data);

        } else {
            $this->db->insert('somitee_info_tmp', $data);
        }


    }

    public function update_somitee_member_num_info()
    {
        $data['user_reg_id'] = $this->session->userdata('user_reg_id');
        $data['member_number_male'] = $this->input->post('member_number_male_name');
        $data['member_number_female'] = $this->input->post('member_number_female_name');
        $data['somitee_purpose'] = $this->input->post('purpose');

        $data['somitee_purpose'] = preg_replace('/\t+/', '', $data['somitee_purpose']);
        echo $data['somitee_purpose'];
        $this->db->where('user_reg_id', $data['user_reg_id']);
        $this->db->update('somitee_info_tmp', $data);

    }

    public function save_member()
    {
        $check_id = $this->input->post('check_id');
        $member_name = $this->input->post('member_name');
        $member_id = $this->input->post('member_id');
        $user_reg_id = $this->session->userdata('user_reg_id');
        print_r($member_name);
        for ($i = 0; $i < count($member_name); $i++) {
            if ($member_name[$i] != '' || $member_name[$i] != null || !empty($member_name[$i])) {
                $data['user_reg_id'] = $user_reg_id;
                $data['member_name'] = $member_name[$i];
                $data['somitee_member_nid'] = $member_id[$i];
                $data['check_id'] = $check_id;
                $id_is_exist = $this->somitee_model->check_id_is_inserted($user_reg_id, $check_id);
                if (count($id_is_exist) > 0) {
                    $this->db->where('user_reg_id', $user_reg_id);
                    $this->db->where('check_id', $check_id);
                    $this->db->update('somitee_member_registration_tmp', $data);
                } else {
                    $this->db->insert('somitee_member_registration_tmp', $data);
                }
            }
        }

    }


    public function somitee_registration_2()
    {

        $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat();

        if ($this->input->post('s_reg1') == 1) {

            $s_type = $this->input->post('somitee_type_name');
            $s_cat_id = $this->input->post('somitee_cat_name');
            $s_sub_cat_id = $this->input->post('somitee_cat_sub_name');
           /* if ($s_type == 2 || $s_type == 3) {
                $s_cat_id = 0;
                $s_sub_cat_id = 0;
            }*/


            $data_tmp['user_reg_id'] = $this->session->userdata('user_reg_id');
            $data_tmp['somitee_name'] = $this->input->post('momiti_name');
            $data_tmp['somitee_div_id'] = $this->input->post('division_name');
            $data_tmp['somitee_dist_id'] = $this->input->post('district_name');
            $data_tmp['somitee_upz_id'] = $this->input->post('upz_name');
            $data_tmp['somitee_ward'] = $this->input->post('ward_name');
            $data_tmp['others'] = $this->input->post('others_name');

            $data_tmp['somitee_type_id'] = $s_type;
            $data_tmp['somitee_cat_id'] = $s_cat_id;
            $data_tmp['somitee_sub_cat_id'] = $s_sub_cat_id;

            $data_tmp['somitee_per_share_price'] = $this->input->post('share_price_eng_name');
            $data_tmp['somitee_share'] = $this->input->post('share_qty_eng');
            $data_tmp['sell_share_num'] = $this->input->post('sell_share_eng');
            $data_tmp['sodosso_division'] = $this->input->post('sodosso_division');
            $data_tmp['sodosso_district'] = $this->input->post('sodosso_district');
            $data_tmp['sodosso_upz'] = $this->input->post('sodosso_upz');
            $data_tmp['elected_ward_name'] = $this->input->post('elected_ward');
            $data_tmp['somitee_kormo_div_id'] = $this->input->post('kormo_division');
            $data_tmp['somitee_kormo_dist_id'] = $this->input->post('kormo_district');
            $data_tmp['somitee_kormo_upz_id'] = $this->input->post('kormo_upz');
            $data_tmp['kormo_elected_ward_name'] = $this->input->post('kormo_elected_ward');
            $data2['check_all_data'] = $this->somitee_model->check_all_given_data($data_tmp['user_reg_id']);

            if (count($data2['check_all_data']) > 0) {
                $this->db->update('somitee_info_tmp', $data_tmp);

            } else {
                $this->db->insert('somitee_info_tmp', $data_tmp);
            }


            $data['division'] = $this->somitee_model->get_all_division();
            $data['district'] = $this->somitee_model->get_all_district();
            $data['upz'] = $this->somitee_model->get_all_upazilla();

            $data['sodosso_kormo_division'] = $this->somitee_model->get_all_division();
            $data['sodosso_kormo_district'] = $this->somitee_model->get_all_district();
            $data['sodosso_kormo_upz'] = $this->somitee_model->get_all_upazilla();

            $data['somitee_sodosso_division'] = $this->somitee_model->get_all_division();
            $data['somitee_sodosso_district'] = $this->somitee_model->get_all_district();
            $data['somitee_sodosso_upz'] = $this->somitee_model->get_all_upazilla();

            //$data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat();
            $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat2();
            $data['somitee_sub_cat'] = $this->somitee_model->getAllrecords('somitee_sub_category');
            $data['somitee_type'] = $this->somitee_model->getAllRecords('somitee_type');
            $data['site_visitor'] = $this->site_visitor_function();
            $data['total_somitee'] = $this->somobay_reg_number();
            $data['all_tmp_data'] = $this->somitee_model->get_tmp_data($this->session->userdata('user_reg_id'));
            $data['all_tmp_data_member'] = $this->somitee_model->get_tmp_data_member($this->session->userdata('user_reg_id'));
            // echo '<pre>';print_r($data['all_tmp_data']);die();
            $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
            $this->load->view('public_layouts/registered_user_header', $data);
            $this->load->view('somitee_registration_2_modal', $data);
        } else {
            redirect('somitee');
        }

    }


    public function somitee_registration_post()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        // print_r($mem);
        // die();
        if ($this->input->post('all_clear')) {

            $all_tmp_data = $this->somitee_model->get_tmp_data($this->session->userdata('user_reg_id'));
            $all_tmp_data_member = $this->somitee_model->get_tmp_data_member($this->session->userdata('user_reg_id'));
           

            $data_info = array(
                    'somitee_type_id' => $all_tmp_data[0]['somitee_type_id'],
                    'somitee_cat_id' => $all_tmp_data[0]['somitee_cat_id'],
                    'somitee_sub_cat_id' => $all_tmp_data[0]['somitee_sub_cat_id'],

                    'user_reg_id' => $this->session->userdata('user_reg_id'),

                    'somitee_div_id' => $all_tmp_data[0]['somitee_div_id'],
                    'somitee_dist_id' => $all_tmp_data[0]['somitee_dist_id'],
                    'somitee_upz_id' => $all_tmp_data[0]['somitee_upz_id'],
                    'somitee_address' => $all_tmp_data[0]['somitee_ward'] . ' ' . $all_tmp_data[0]['others'],

                    'somitee_kormo_div_id' => $all_tmp_data[0]['somitee_kormo_div_id'],
                    'somitee_kormo_dist_id' => $all_tmp_data[0]['somitee_kormo_dist_id'],
                    'somitee_kormo_upz_id' => $all_tmp_data[0]['somitee_kormo_upz_id'],
                    'somitee_kormo_details' => $all_tmp_data[0]['kormo_elected_ward_name'],

                    'sodosso_division' => $all_tmp_data[0]['sodosso_division'],
                    'sodosso_district' => $all_tmp_data[0]['sodosso_district'],
                    'sodosso_upz' => $all_tmp_data[0]['sodosso_upz'],
                    'sodosso_details' => $all_tmp_data[0]['elected_ward_name'],

                    'somitee_name' => $all_tmp_data[0]['somitee_name'],
                    'member_number' => $all_tmp_data[0]['member_number'],
                    'member_number_female' => $all_tmp_data[0]['member_number_female'],
                    'member_number_male' => $all_tmp_data[0]['member_number_male'],

                    'somitee_share' => $all_tmp_data[0]['somitee_share'],
                    'somitee_per_share_price' => $all_tmp_data[0]['somitee_per_share_price'],
                    'sell_share_num' => $all_tmp_data[0]['sell_share_num'],

                    'somitee_purpose' => $this->input->post('purpose'),
                    'member_number' => $this->input->post('member'),
                    'somitee_reg_date' => date('Y-m-d h:i:a')

            );


            $tmp_s_info = $this->somitee_model->get_somitee_info($this->session->userdata('user_reg_id'));

            if (sizeof($tmp_s_info) != 0) {
                foreach ($tmp_s_info as $r) {
                    $data_block['is_block'] = 1;
                    $s_id = $r['somitee_id'];
                    $this->somitee_model->somitee_update_is_block($s_id, $data_block);
                }
            }


            $data_member['somitee_id'] = $this->somitee_model->insert_ret('somitee_info', $data_info);

            $this->db->where('user_reg_id', $this->session->userdata('user_reg_id'));
            $this->db->delete('somitee_info_tmp');


            $data_member['user_reg_id'] = $this->session->userdata('user_reg_id');

            $mem_id = $this->input->post('member_nid');
            $mem_name = $this->input->post('member_name');
            for ($i = 0; $i < count($mem_id); $i++) {
                $data_member['somitee_member_nid'] = $mem_id[$i];
                $data_member['member_name'] = $mem_name[$i];
                $this->somitee_model->insert('somitee_member_registration_new', $data_member);

            }


            $this->db->where('user_reg_id', $this->session->userdata('user_reg_id'));
            $this->db->delete('somitee_member_registration_tmp');

            $data_sms['n_id'] = $this->session->userdata('user_nid');
            $data_sms['phone'] = $this->session->userdata('user_phone');
            $data_sms['auto_code'] = '';
            $data_sms['sms_type'] = 2;
            $this->somitee_model->insert('sms_service', $data_sms);

            $data_log['user_reg_id']=$this->session->userdata('user_reg_id');
            $data_log['details_id']=2;
            $data_log['comment']='';
            $this->somitee_model->insert('all_log', $data_log);

            $destination = $this->session->userdata('user_phone');

            /*$message = "ধন্যবাদ।
 পরবর্তী করণীয় সম্পর্কে জানার জন্য অপেক্ষা করুন।
 সমবায় অধিদপ্তর ।";*/
            $message = "Thanks.
 Poroborti koronio somporke janar jonno opekkha korun.
 Samabay Odhidoptor";

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


                //$message=$data_info['somitee_name']." নামে একটি আবেদন জমা হয়েছে। অনুগ্রহ করে ব্যবস্থা গ্রহণ করুন।";
                $message=$data_info['somitee_name']." name akti abedon joma hoyeche. Onugroho kore bebostha grohon korun.";



                $tmpAdmin=$this->somitee_model->getAdmin();//get all admin nd super admin

                foreach ($tmpAdmin as $tmp){
                    $data_sms['n_id'] = $tmp['admin_nid'];
                    $data_sms['phone'] = $tmp['admin_phone'];
                    $data_sms['auto_code'] = '';
                    $data_sms['sms_type'] = 2;
                    $this->somitee_model->insert('sms_service', $data_sms);
                    
                    $destination=$tmp['admin_phone'];

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
                redirect('somitee');
            }
        }
        redirect('somitee');

    }

    public function check_somitee_name()
    {
        $res = $this->somitee_model->check_somitee_name($this->input->post('name'));
        if (sizeof($res) > 0) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function get_sub_cat()
    {
        $data['res'] = $this->somitee_model->get_sub_cat($this->input->post('cat_id'));
        echo json_encode($data);
    }
    public function check_login_modal()
    {
        print_r($_POST);
        $data['respond'] = $this->somitee_model->check_login_modal($this->input->post('nid'), $this->input->post('password'));
        echo json_encode($data);
    }

    public function somitee_member_registration()
    {
        $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
        if ($data['s_info'][0]['division_id'] == 0) {
            redirect('somitee');
        } else {
            if ($data['s_info'][0]['member_number'] == 0) {
                $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
                $this->load->view('public_layouts/registered_user_header');
                $this->load->view('somitee_member_reg_1');
                $this->load->view('public_layouts/footer');
            } else {
                redirect('somitee/somitee_member_registration_2');
            }
        }

    }

    public function somitee_member_registration_2()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
        if ($data['s_info'][0]['division_id'] == 0) {
            redirect('somitee');
        } else {
            $data['mem_des_count'] = $this->somitee_model->get_somitee_member_des_num($data['s_info'][0]['somitee_id'])[0]['mem_des_no'];
            if ($data['mem_des_count'] <= 5) {
                if ($this->input->post('mem_update') == '1') {
                    //echo 'member add';
                    $data_insert['member_number'] = $this->input->post('org_mem_qty');
                    $this->somitee_model->update_somitee_member($this->session->userdata('user_reg_id'), $data_insert);
                }
                if ($this->input->post('member_add') == 1) {
                    $data1['somitee_id'] = $this->input->post('somitee_id');
                    $data1['user_reg_id'] = $this->session->userdata('user_reg_id');
                    $data1['somitee_member_name'] = $this->input->post('mem_name');
                    $data1['somitee_member_nid'] = $this->input->post('mem_nid');

                    $tmp_dob = explode('/', $this->input->post('mem_birth_date'));
                    //echo '<pre>'; print_r($tmp_dob[0]); die();
                    $data1['somitee_member_dob'] = '' . $tmp_dob[2] . '-' . $tmp_dob[0] . '-' . $tmp_dob[1] . '';

                    $data1['somitee_member_phone'] = $this->input->post('mem_phone_no');
                    $data1['somitee_member_occupation'] = $this->input->post('mem_occupation');
                    $data1['present_address'] = $this->input->post('curr_ward') . ' ' . $this->input->post('curr_details');
                    $data1['present_div_id'] = $this->input->post('curr_division');
                    $data1['present_dist_id'] = $this->input->post('curr_district');
                    $data1['present_upz_id'] = $this->input->post('curr_subdistrict');
                    $data1['permanent_address'] = $this->input->post('per_ward') . ' ' . $this->input->post('others');
                    $data1['permanent_div_id'] = $this->input->post('per_division');
                    $data1['permanent_dist_id'] = $this->input->post('per_district');
                    $data1['permanent_upz_id'] = $this->input->post('per_subdistrict');
                    $data1['mother_name'] = $this->input->post('mem_mother_name');
                    $data1['father_name'] = $this->input->post('mem_father_name');
                    $data1['somitee_member_share_number'] = $this->input->post('mem_share');
                    $data1['somitee_member_profile_img'] = $this->input->post('pro_pic_path');
                    $data1['somitee_member_share_savings'] = $this->input->post('mem_money');

                    $this->somitee_model->insert('somitee_member_registration', $data1);
                }

                $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
                $data['mem_no'] = $this->somitee_model->get_somitee_num($data['s_info'][0]['somitee_id'])[0]['mem_no'];

                if ($data['mem_no'] < $data['s_info'][0]['member_number']) {
                    $data['division'] = $this->somitee_model->get_all_division();
                    $data['district'] = $this->somitee_model->get_all_district();
                    $data['upz'] = $this->somitee_model->get_all_upazilla();
                    $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat();
                    $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
                    $this->load->view('public_layouts/registered_user_header');
                    $this->load->view('somitee_member_reg_2', $data);
                } else {
                    $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
                    $this->load->view('public_layouts/registered_user_header');
                    $this->load->view('somitee_member_reg_3', $data);
                }
            } else {
                redirect('somitee');
            }


        }
    }

    public function somitee_member_registration_3()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        if ($this->input->post('chk_frm') == 1) {
            $data['commitee_no'] = $this->input->post('commitee');
            $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
            $data['somitee_member_info'] = $this->somitee_model->get_member($data['s_info'][0]['somitee_id']);
            $data['member_designation'] = $this->somitee_model->get_designation(2);

            $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
            // echo '<pre>'; print_r($data['somitee_member_info']);
            $this->load->view('public_layouts/registered_user_header');
            $this->load->view('somitee_member_reg_4', $data);
        } else {
            redirect('somitee');
        }


    }

    public function get_designation()
    {
        $data['res'] = $this->somitee_model->get_designation(2);
        echo json_encode($data);
    }

    public function get_mem()
    {
        $data['res'] = $this->somitee_model->get_member($this->input->post('somitee_id'));
        echo json_encode($data);
    }

    public function somitee_member_registration_5()
    {
        if (isset($_POST)) {
            $conuter_val = $this->input->post('counter_val');
            $somitee_id = $this->input->post('somitee_id');
            for ($i = 0; $i < $conuter_val; $i++) {
                $member_id = $this->input->post('mem_' . $i);
                $data_update['somitee_member_designation_id'] = $this->input->post('des_' . $i);

                $this->somitee_model->update_somitee_member_des($somitee_id, $member_id, $data_update);
            }
            //redirect('somitee');
        }

        $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/registered_user_header');
        $this->load->view('somitee_member_reg_5', $data);
        //$this->load->view('upload_files');

    }

    public function somitee_member_registration_6()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        if ($this->input->post('file_upload_check')) {
            $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
            $this->load->view('public_layouts/registered_user_header');
            if ($this->input->post('file_upload_check') == 1) {
                $this->load->view('somitee_member_reg_6', $data);
            } elseif ($this->input->post('file_upload_check') == 2) {
                redirect('somitee/somitee_member_registration_8');
            }
        } else {
            redirect('somitee');
        }

    }

    public function somitee_member_registration_7()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        if ($this->input->post('file_up_c')) {
            //$files = array($this->input->post('file_name') => $this->input->post('pro_pic_path'), $this->input->post('file_name1') => $this->input->post('pro_pic_path1'), $this->input->post('file_name2') => $this->input->post('pro_pic_path2'));

            $files = array('file_name' => $this->input->post('file_name'), 'file_path' => $this->input->post('pro_pic_path'));
            $tmp = array('file_name' => $this->input->post('file_name1'), 'file_path' => $this->input->post('pro_pic_path1'));
            //array_push($files,$tmp);
            $tmp1 = array('file_name' => $this->input->post('file_name2'), 'file_path' => $this->input->post('pro_pic_path2'));
            //array_push($files,$tmp1);

            $data_insert['somitee_uploaded_file_name'] = json_encode(array($files, $tmp, $tmp1));
            $data_insert['somitee_id'] = $this->input->post('somitee_id');

            $this->somitee_model->insert('somitee_uploaded_file', $data_insert);
            redirect('somitee/somitee_member_registration_8');
        } else {
            redirect('somitee');
        }
    }

    public function somitee_member_registration_8()
    {

        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        $data['s_info'] = $this->somitee_model->get_somitee_infos($this->session->userdata('user_reg_id'));
        //print_r($data); die();
        if (sizeof($data['s_info']) == 0) {
            redirect('somitee');
        } else {
            $data['somitee_member_info'] = $this->somitee_model->get_somitee_member_info($data['s_info'][0]['somitee_id']);
            $data['mem_des_count'] = $this->somitee_model->get_somitee_member_des_num($data['s_info'][0]['somitee_id'])[0]['mem_des_no'];

            if ($data['mem_des_count'] <= 5) {
                redirect('somitee');
            } else {
                $this->load->helper('string');
                $track_id = random_string('alnum', 6);
                $data_update['somitee_track_id'] = $track_id;
                $data_update['somitee_status'] = 1;


                $data_sms['n_id'] = $this->session->userdata('user_nid');
                $data_sms['phone'] = $this->session->userdata('user_phone');
                $data_sms['auto_code'] = $track_id;
                $data_sms['sms_type'] = 3;
                $this->somitee_model->insert('sms_service', $data_sms);

                $destination = $this->session->userdata('user_phone');

                $message = "সমিতি নিবন্ধন সম্পূর্ণ হয়েছে। ট্র্যাকিং  নম্বর  '" . $track_id . "'।
ধন্যবাদ।
সমবায় অধিদপ্তর।";

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
                    $msg_api = $this->somitee_model->getAllRecords('mobile_api');
                    $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 1;
                    $this->somitee_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);
                    //redirect('somitee');
                } else {
                    //redirect('somitee');
                }


                $this->somitee_model->update_somitee_track_id($data['s_info'][0]['somitee_id'], $data_update);
                redirect('somitee');
            }

/// $this->somitee_model->update_somitee_track_id($data['s_info'][0]['somitee_id'], $data_update);
        }


    }


    public function somitee_add_appeal()
    {

        $data_appeal['somitee_id'] = $this->input->post('somitee_id');
        $temp = array('sub' => $this->input->post('appeal_sub'), 'content' => $this->input->post('appeal_content'));
        $data_appeal['appeal_content'] = json_encode(array($temp));

        $data['appeal_id'] = $this->somitee_model->insert_ret('appeal', $data_appeal);


        $data['appeal_apply_date'] = date('Y-m-d');
        $this->somitee_model->somitee_update_appeal($this->input->post('somitee_id'), $data);
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        redirect('somitee');

    }


////////////iti///////
    public function add_complain()
    {
        $data_complain['somitee_id'] = $this->input->post('somitee_id');
        $temp = array('sub' => $this->input->post('complain_sub'), 'content' => $this->input->post('complain_content'));
        $data_complain['complain_content'] = json_encode(array($temp));

        $data['complain_id'] = $this->somitee_model->insert_ret('complain', $data_complain);

        $this->somitee_model->somitee_update_complain($this->input->post('somitee_id'), $data);

        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();

        redirect('somitee');

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

    public function check_nid()
    {
        $res = $this->somitee_model->check_nid($this->input->post('nid'), $this->input->post('somitee_id'));
        if (sizeof($res) > 0) {
            echo 0;
        } else {
            echo 1;
        }
    }


    public function somitee_reg_form()
    {
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        $this->load->view('public_layouts/header');

        $data['division'] = $this->somitee_model->get_all_division();
        $data['district'] = $this->somitee_model->get_all_district();
        $data['upz'] = $this->somitee_model->get_all_upazilla();
        $data['somitee_type'] = $this->somitee_model->get_all_somitee_type();
        $data['somitee_cat'] = $this->somitee_model->get_all_somitee_cat();

        $this->load->view('somitee_reg_form', $data);
        //$this->load->view('public_layouts/footer');
    }

    public function get_upz_val()
    {
        $data['res'] = $this->somitee_model->get_upz_val($this->input->post('upz_id'));
        echo json_encode($data);
    }

    public function upload()
    {
        if ($this->uri->segment(3) == 'p') {
            $target_path = 'uploads/profile_pic/' . uniqid() . '_' . $_FILES['file']['name'];
        } elseif ($this->uri->segment(3) == 'b') {
            $target_path = 'uploads/birth_certificate/' . uniqid() . '_' . $_FILES['file']['name'];
        } elseif ($this->uri->segment(3) == 't') {
            $target_path = 'uploads/training_certificate/' . uniqid() . '_' . $_FILES['file']['name'];
        } elseif ($this->uri->segment(3) == 'f') {
            $target_path = 'uploads/files/' . uniqid() . '_' . $_FILES['file']['name'];
        }
        if (0 < $_FILES['file']['error']) {
            $data['msg'] = 'Error: ' . $_FILES['file']['error'] . '<br>';
        } else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $target_path)) {
                $data['msg'] = '1';
            } else
                $data['msg'] = '0';
        }
        $data['path'] = $target_path;
        echo json_encode($data);
    }


    /////////////pdf/////
    public function download_user_info()
    {
        $user_reg_id = $this->session->userdata('user_reg_id');
        $data['somitee_info'] = $this->somitee_model->get_somitee_info($user_reg_id);
        $data['leader_info'] = $this->dco_model->get_leader_info($data['somitee_info'][0]['somitee_id']);
        $data['site_visitor'] = $this->site_visitor_function();
        $data['total_somitee'] = $this->somobay_reg_number();
        if (sizeof($data['somitee_info']) != 0) {
            $data['somitee_member_info'] = $this->somitee_model->get_somitee_member_info($data['somitee_info'][0]['somitee_id']);
            $data['somitee_category'] = $this->somitee_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
            $data['somitee_sub_category'] = $this->somitee_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
            $data['mem_des_count'] = $this->somitee_model->get_somitee_member_des_num($data['somitee_info'][0]['somitee_id'])[0]['mem_des_no'];
            $data['somitee_member_des'] = $this->somitee_model->get_somitee_des($data['somitee_info'][0]['somitee_id']);
            $data['document'] = $this->somitee_model->get_document($data['somitee_info'][0]['somitee_id']);
            $data['complain_info'] = $this->somitee_model->getComplain($data['somitee_info'][0]['somitee_id']);
            $data['division_info'] = $this->somitee_model->getDivision($data['somitee_info'][0]['somitee_id']);
            $data['somitee_info_sodosso'] = $this->somitee_model->get_sodosso_area($data['somitee_info'][0]['somitee_id']);
            $data['uco_details'] = $this->somitee_model->getUco($data['somitee_info'][0]['somitee_id']);
            $data['dco_info'] = $this->somitee_model->getDco($data['somitee_info'][0]['somitee_id']);
        }
        $data['lstUp']=$this->somitee_model->getAllRecords('lastUpdate');
        //echo "<pre>";
        //print_r($data); die();
        //$this->load->view('public_layouts/registered_user_header');

        $html = $this->load->view('download_user_info', $data, true);;

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        //$this->load->library('m_pdf', "'utf-8', 'A4'");
        $this->load->library('new_m_pdf', "'utf-8', 'A4'");

        //generate the PDF from the given html
        //$this->m_pdf->pdf->WriteHTML($html);
        $this->new_m_pdf->pdf->WriteHTML($html);

        //download it.
        //$this->m_pdf->pdf->Output($pdfFilePath, "I");
        $this->new_m_pdf->pdf->Output($pdfFilePath, "I");

    }


}
