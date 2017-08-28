<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doc extends MX_Controller
{

    //public $counter=0;
    function __construct()
    {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('basic_model');
        $this->load->model('doc_model');
        $this->load->model('dco/dco_model');
        $this->load->model('somitee/somitee_model');
        $this->load->helper('text');
        $this->load->helper(array('form', 'url'));
        $this->load->helper('inflector');
        $this->load->library('form_validation');
        //echo '<pre>';print_r($this->session->userdata);die();
        $nid = $this->session->userdata('nid');
        $reg_id = $this->session->userdata('reg_id');
        $type = $this->session->userdata('type');
        //echo '<pre>';print_r($type);die();
        if ($nid == NULL || $type == NULL || $type == "" || $type != 2 || $nid == "") {
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
        $data['somitee_info'] = $this->doc_model->get_division_somitee_list();
        $data['somitee_all_info'] = $this->doc_model->get_all_division_somitee_list();


        $data['sms_info'] = $this->doc_model->get_sms_detail();
        $data['all_somitee_counter'] = $this->doc_model->get_somitee_count('all');
        $data['reject_somitee_counter'] = $this->doc_model->get_somitee_count('reject');
        $data['selected_somitee_counter'] = $this->doc_model->get_somitee_count('selected');
        $data['new_somitee_counter'] = $this->doc_model->get_somitee_count('new');
        $data['appeal_somitee_counter'] = $this->doc_model->get_somitee_count('appeal');
        $data['complain_somitee_counter'] = $this->doc_model->get_somitee_count('complain');

        $data['all_somitee_counters'] = $this->doc_model->get_somitee_counts('all');
        $data['reject_somitee_counters'] = $this->doc_model->get_somitee_counts('reject');
        $data['selected_somitee_counters'] = $this->doc_model->get_somitee_counts('selected');
        $data['new_somitee_counters'] = $this->doc_model->get_somitee_counts('new');
        $data['appeal_somitee_counters'] = $this->doc_model->get_somitee_counts('appeal');
        $data['complain_somitee_counters'] = $this->doc_model->get_somitee_counts('complain');
        //echo '<pre>'; print_r($data['complain_somitee_counters']);die();
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
            $tmpRes = $this->doc_model->getBarChartVal($cnd);
            array_push($barChartRes, array('year' => $year1, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        foreach ($mnthForYear2 as $m) {
            $cnd = $year2 . '-' . $m;
            $tmpRes = $this->doc_model->getBarChartVal($cnd);
            array_push($barChartRes, array('year' => $year2, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        $data['chartNew'] = $barChartRes;

        $barChartRes1 = array();
        foreach ($mnthForYear1 as $m) {
            $cnd = $year1 . '-' . $m;
            $tmpRes = $this->doc_model->getBarChartVal1($cnd);
            array_push($barChartRes1, array('year' => $year1, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        foreach ($mnthForYear2 as $m) {
            $cnd = $year2 . '-' . $m;
            $tmpRes = $this->doc_model->getBarChartVal1($cnd);
            array_push($barChartRes1, array('year' => $year2, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        $data['chartSelect'] = $barChartRes1;

        $barChartRes2 = array();
        foreach ($mnthForYear1 as $m) {
            $cnd = $year1 . '-' . $m;
            $tmpRes = $this->doc_model->getBarChartVal2($cnd);
            array_push($barChartRes2, array('year' => $year1, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        foreach ($mnthForYear2 as $m) {
            $cnd = $year2 . '-' . $m;
            $tmpRes = $this->doc_model->getBarChartVal2($cnd);
            array_push($barChartRes2, array('year' => $year2, 'mnth' => $m, 't' => $tmpRes[0]['total']));

        }
        $data['chartReject'] = $barChartRes2;
        //echo '<pre>'; print_r($data['chartNew']); print_r($data['new_somitee_counters']); die();
        $this->load->view('layouts/header');
        $this->load->view('index', $data);
        //$this->load->view('layouts/footer');
    }

    public function report()
    {
        $data['upz'] = $this->doc_model->get_all_upazilla();
        $this->load->view('layouts/header');
        $this->load->view('report_details', $data);
    }

    public function report_post()
    {
        // echo '<pre>';
        $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
        $months = array('জানুয়ারী', 'ফেব্রুয়ারী', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'অগাস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর');
        $strt_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $date1 = date_create($strt_date);//("2013-03-15");
        $date2 = date_create($end_date);//("2013-12-12");
        // $diff = date_diff($date1, $date2);

        $st = explode('/', $strt_date);
        $en = explode('/', $end_date);

        $datenxt = $en[2] . '-' . $en[0] . '-' . $en[1];
        $next_date2 = date('Y-m-d', strtotime($datenxt . ' +1 day'));
        $date2 = date_create($next_date2);//("2013-12-12");
        $diff = date_diff($date1, $date2);

        $msg = '';
        $msg1 = '';
        //print_r($diff);
        if ($diff->days == 0) {
            $msg = '( দৈনিক )';
            $msg1 = '' . str_replace(range(0, 9), $bn_digits, $st[1]) . ' ' . $months[((int)$st[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $st[2]);
        } elseif ($diff->days == 6) {
            $msg = '( সাপ্তাহিক )';
            $msg1 = '' . str_replace(range(0, 9), $bn_digits, $st[1]) . ' ' . $months[((int)$st[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $st[2]) . ' থেকে ' . str_replace(range(0, 9), $bn_digits, $en[1]) . ' ' . $months[((int)$en[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $en[2]);
        } elseif ($diff->days == 14) {
            $msg = '( পাক্ষিক )';
            $msg1 = '' . str_replace(range(0, 9), $bn_digits, $st[1]) . ' ' . $months[((int)$st[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $st[2]) . ' থেকে ' . str_replace(range(0, 9), $bn_digits, $en[1]) . ' ' . $months[((int)$en[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $en[2]);
        } elseif ($diff->days >= 28 && $diff->days < 365) {
            if ($diff->m != 0 && $diff->d == 0) {
                if ($diff->m == 1) {
                    $msg = '( মাসিক )';
                } elseif ($diff->m == 2) {
                    $msg = ' ( দ্বি-মাসিক )';
                } elseif ($diff->m == 3) {
                    $msg = '( তৈ-মাসিক )';
                } elseif ($diff->m == 6) {
                    $msg = '( অর্ধ-বার্ষিক )';

                } else {
                    $msg = '';

                }
            } else {
                $d = (int)$st[1];
                if ($d == 1) {
                    $m = (int)$st[0];
                    if ($m == 2 && ($diff->d == 28 || $diff->d == 29)) {
                        $msg = '( মাসিক )';
                    } elseif (($m == 4 || $m == 6 || $m == 9 || $m == 11) && $diff->d == 30) {
                        $msg = '( মাসিক )';
                    } elseif (($m == 1 || $m == 3 || $m == 5 || $m == 7 || $m == 8 || $m == 10 || $m == 12) && $diff->d == 1) {
                        $msg = '( মাসিক )';
                    }
                }
            }

            //$msg.= $m.''.$diff->m.''.$diff->d.' '.$diff->days;

            $msg1 = '' . str_replace(range(0, 9), $bn_digits, $st[1]) . ' ' . $months[((int)$st[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $st[2]) . ' থেকে ' . str_replace(range(0, 9), $bn_digits, $en[1]) . ' ' . $months[((int)$en[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $en[2]);
        } elseif ($diff->y != 0) {
            if ($diff->y == 1) {
                $msg = '( বার্ষিক )';

            } elseif ($diff->y == 2) {
                $msg = '( দ্বিবার্ষিক )';

            } else {

            }
            $msg1 = '' . str_replace(range(0, 9), $bn_digits, $st[1]) . ' ' . $months[((int)$st[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $st[2]) . ' থেকে ' . str_replace(range(0, 9), $bn_digits, $en[1]) . ' ' . $months[((int)$en[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $en[2]);
        } else {
            $msg1 = '' . str_replace(range(0, 9), $bn_digits, $st[1]) . ' ' . $months[((int)$st[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $st[2]) . ' থেকে ' . str_replace(range(0, 9), $bn_digits, $en[1]) . ' ' . $months[((int)$en[0] - 1)] . ', ' . str_replace(range(0, 9), $bn_digits, $en[2]);
        }
        $data['msg'] = $msg;
        $data['msg1'] = $msg1;


        // print_r($next_date);
        //die();
        $all_div = $this->doc_model->getAllRecords('division');

        $all_info = array();
        foreach ($all_div as $d) {
            $slct = $this->doc_model->get_report2(' and somitee_info.somitee_status=1 and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
            $ongoing = $this->doc_model->get_report2(' and somitee_info.somitee_status=2 and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
            $appeal = $this->doc_model->get_report2(' and ( (somitee_info.somitee_status=4 && somitee_info.appeal_id<>0) || (somitee_info.somitee_status=3 && somitee_info.appeal_id<>0) ) and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
            $reject = $this->doc_model->get_report2(' and ( ( somitee_info.somitee_status=3 && somitee_info.appeal_id=0 ) || somitee_info.somitee_status=5 || somitee_info.somitee_status=6 ) and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
            $all = $this->doc_model->get_report2(' and somitee_info.somitee_status<>0 and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');

            $div_info = array('selected' => $slct[0], 'ongoing' => $ongoing[0], 'appeal' => $appeal[0], 'reject' => $reject[0], 'all' => $all[0]);
            //array_push($all_info,array('div_info'=>$div_info));

            $all_dist_info = $this->doc_model->get_report($d['div_id'], '' . $st[2] . '-' . $st[0] . '-' . $st[1] . '', $next_date2);
            //echo 'all dist';
            // print_r($all_dist_info);
            $dist_infos = array();
            foreach ($all_dist_info as $dist) {
                $slct_dist = $this->doc_model->get_report3(' and somitee_info.somitee_status=1 and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.somitee_dist_id=' . $dist['dist_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
                $ongoing_dist = $this->doc_model->get_report3(' and somitee_info.somitee_status=2  and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.somitee_dist_id=' . $dist['dist_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
                $appeal_dist = $this->doc_model->get_report3(' and ( (somitee_info.somitee_status=4 && somitee_info.appeal_id<>0) || (somitee_info.somitee_status=3 && somitee_info.appeal_id<>0) ) and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.somitee_dist_id=' . $dist['dist_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
                $reject_dist = $this->doc_model->get_report3(' and ( ( somitee_info.somitee_status=3 && somitee_info.appeal_id=0 ) || somitee_info.somitee_status=5 || somitee_info.somitee_status=6 ) and somitee_info.somitee_div_id=' . $d['div_id'] . ' and somitee_info.somitee_dist_id=' . $dist['dist_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');
                $all = $this->doc_model->get_report3(' and somitee_info.somitee_status<>0 and somitee_info.somitee_div_id=' . $d['div_id'] . '  and somitee_info.somitee_dist_id=' . $dist['dist_id'] . ' and somitee_info.updated_at between "' . $st[2] . '-' . $st[0] . '-' . $st[1] . '" and "' . $next_date2 . '"');

                $dist_info = array('selected' => $slct_dist[0], 'ongoing' => $ongoing_dist[0], 'appeal' => $appeal_dist[0], 'reject' => $reject_dist[0], 'all' => $all[0]);
                array_push($dist_infos, $dist_info);
            }
            array_push($all_info, array('div_info' => $div_info, 'dist_info' => $dist_infos));
            //echo '<pre>';
            //print_r($div_info);
        }
        //echo '<pre>';
        // print_r($all_info);

//die();


        $data['report_info_all'] = $all_info;
        //echo '<pre>';
        //print_r($data);

        //$data['report_info_selected']=$this->doc_model->get_report(1);
        //$this->load->view('all_course_details_pdf', $data);
        $html = $this->load->view('report_pdf', $data, true);

        //this the the PDF filename that user will get to download
        $pdfFilePath = "output_pdf_name.pdf";

        //load mPDF library
        $this->load->library('new_m_pdf', "'utf-8', 'A4'");

        //generate the PDF from the given html
        $this->new_m_pdf->pdf->WriteHTML($html);

        //download it.
        $this->new_m_pdf->pdf->Output($pdfFilePath, "I");
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
        //echo '<pre>'; print_r($data); die();

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


    public function upz_block()
    {
        $data['upz'] = $this->doc_model->get_all_upazilla();
        $this->load->view('layouts/header');
        $this->load->view('show_upz', $data);
    }

    public function leader_info()
    {
        $data['leader_info'] = $this->doc_model->get_admin_info($this->session->userdata('reg_id'));
        $this->load->view('layouts/header', $data);
        $this->load->view('leader_info', $data);
        $this->load->view('layouts/footer');
    }

    public function chng_upz_status()
    {
        $tmp = $this->doc_model->get_upz2($this->uri->segment(3));
        if ($tmp[0]['is_block'] == 1) {
            $data['is_block'] = 0;
        } elseif ($tmp[0]['is_block'] == 0) {
            $data['is_block'] = 1;
        }
        $this->doc_model->update_upz_status($this->uri->segment(3), $data);
        redirect('doc/upz_block');

    }

    public function chngLoginStatus()
    {
        $tmp = $this->doc_model->getAdmin($this->uri->segment(3));
        if ($tmp[0]['is_block'] == 1) {
            $data['is_block'] = 0;
        } elseif ($tmp[0]['is_block'] == 0) {
            $data['is_block'] = 1;
        } else {
            $data['is_block'] = 10;
        }
//echo '<pre>'; print_r($tmp); print_r($data);
        $this->doc_model->update_login_status($tmp[0]['admin_login_id'], $data);
        redirect('doc/view_employee');

    }


    public function get_complain_info()
    {
        $data['complain_infos'] = $this->doc_model->get_complain($this->input->post('complain_id'));
        if (sizeof($data['complain_infos']) == 0) {
            $data['res'] = 0;
        } else {
            $data['res'] = 1;
        }
        echo json_encode($data);
    }

    public function all_somitee_list()
    {
        $data['somitee_info'] = $this->doc_model->get_somitee_lists($this->uri->segment(3), $this->uri->segment(4));

        //echo '<pre>'; print_r($data); die();
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
        $this->load->view('layouts/header');
        $this->load->view('all_somitee_list', $data);
        $this->load->view('layouts/footer');
    }

    public function somitee_list_detail()
    {
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

            $this->load->view('somitee_list_detail_view', $data);
        } else {
            $data['somitee_mngmnt_info'] = $this->basic_model->getWhere('*', 'somitee_id=' . $data['somitee_info'][0]['somitee_id'], 'somitee_management');
            $data['somitee_added_info'] = $this->basic_model->getAddedBy($data['somitee_info'][0]['re_register_by']);
            //echo '<pre>'; print_r($data['somitee_added_info']); die();
            $this->load->view('somitee_list_detail_view_2', $data);
        }

    }

    public function dco_download_user_info($somitee_id)
    {
        $data['s_type'] = $this->uri->segment(4);
        $data['somitee_info'] = $this->doc_model->get_all_somitee_list($somitee_id);
        $data['division_info'] = $this->doc_model->getDivision($somitee_id);
        $data['somitee_category'] = $this->doc_model->get_category($data['somitee_info'][0]['somitee_cat_id']);
        $data['somitee_sub_category'] = $this->doc_model->get_sub_category($data['somitee_info'][0]['somitee_sub_cat_id']);
        $data['somitee_info_sodosso'] = $this->doc_model->get_sodosso_area($somitee_id);
        if ($data['somitee_info'][0]['is_re_register'] == 0) {
            $data['somitee_member_info'] = $this->doc_model->get_member($data['somitee_info'][0]['somitee_id']);
            $data['leader_info'] = $this->doc_model->get_leader_info($somitee_id);
            $data['uco_info'] = $this->doc_model->getUco($somitee_id);
            $data['dco_info'] = $this->doc_model->getDco($somitee_id);
            $data['appeal_info'] = $this->doc_model->get_appeal_info($data['somitee_info'][0]['appeal_id']);
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

    public function get_all_admin_info()
    {
        $data['res'] = $this->doc_model->get_all_admin_info($this->input->post('iid'), $this->input->post('tble'));
        echo json_encode($data);
    }


    public function check_nid()
    {
        $res = $this->doc_model->check_nid($this->input->post('nid'));
        if (sizeof($res) == 0) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function check_somitee()
    {
        $somitee_id = $this->input->post('somitee_id');
        $data1['admin_reg_id'] = '';
        $data1['somitee_id'] = $somitee_id;
        $ucoTxt = true;

        if ($this->input->post('bttn') == 'accept') {
            $tmp_pass = rand(100000, 999999);
            $data['somitee_track_id'] = 'coop' . $tmp_pass;
            /*$message = 'আপনার প্রাথমিক আবেদনটি গৃহিত হয়েছে। আপনার ট্র্যাকিং নম্বর "' . $data['somitee_track_id'] . ' "। বিস্তারিত জানতে লগইন করুন।
ধন্যবাদ।
সমবায় অধিদপ্তর।';*/
            $message = 'Apnar prothomic abedonti grehito hoyeche. Apnar tracking number "' . $data['somitee_track_id'] . ' ".Bistarito jante login korun.
Thanks.
Samabay Odhidoptor.';

            $data['somitee_status'] = 2;
            $data['uco_inquiry_date'] = date('Y-m-d');
            $data1['divisional_admin_comment'] = '';
            $data1['divisional_admin_inquiry_verify'] = 1;
            $data_sms['sms_type'] = 3;
            $data_sms['auto_code'] = $data['somitee_track_id'];
            $data_log['details_id'] = 3;

        } else {
            $ucoTxt = false;
            //$cmnt = array('সমবায়ের নাম', 'সমবায়ের ঠিকানা', 'সমবায় গঠনের উদ্দেশ্য', 'সমবায়ের প্রাথমিক তথ্য', 'সমবায়ের শ্রেণি', 'সমবায়ের সদস্য');
            $cmnt = array('Samabayer nam', 'Samabayer thikana', 'Samabay gothoner uddesso', 'Samabayer prathomic tottho', 'Samabayer shreni', 'Samabayer sodosso');
            $data1['divisional_admin_comment'] = $this->input->post('cmmnt');
            $msg = $cmnt[$this->input->post('doc_verify') - 1];

            /*$message = "" . $msg . "  যথাযথ  না হওয়ায় আবেদন পত্রটি গ্রহণ করা সম্ভব হলো না। সঠিকভাবে পুনরায় আবেদন করুন।
ধন্যবাদ ।
সমবায় অধিদপ্তর ।";*/

            $message = "" . $msg . "  jothajotho na houay abedon potroti grohon kora somvob holo na. Sothikvabe punoray abedon korun.
Thanks.
Samabay Odhidoptor.";

            $data1['divisional_admin_inquiry_verify'] = 0;
            $data['somitee_status'] = 5;
            $data_sms['sms_type'] = 4;
            $data_sms['auto_code'] = $msg;
            $data_log['details_id'] = 4;
        }

        $user_info = $this->doc_model->get_user_info($this->input->post('somitee_id'));
        $data_sms['n_id'] = $user_info[0]['user_nid'];
        $data_sms['phone'] = $user_info[0]['user_phone'];

        $this->doc_model->insert('sms_service', $data_sms);

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
        } catch (Exception $e) {
            echo $e;
        }
        $response = explode('||', $value->OneToOneResult);
        if ($response[0] = '1900') {
            $msg_api = $this->doc_model->getAllRecords('mobile_api');
            $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 3;
            $this->doc_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);

            if ($ucoTxt) {
                $data_uco = $this->doc_model->get_all_somitee_list($somitee_id);
                $dataUco = $this->doc_model->check_uco($data_uco[0]['somitee_div_id'], $data_uco[0]['somitee_dist_id'], $data_uco[0]['somitee_upz_id']);
                //print_r($dataUco);
                $message2 = $data_uco[0]['somitee_name'] . " name akti abedon joma hoyeche. Onugroho kore bebostha grohon korun.";
                $destination2 = $dataUco[0]['admin_phone'];
                $data_sms['n_id'] = $dataUco[0]['admin_nid'];
                $data_sms['phone'] = $dataUco[0]['admin_phone'];
                $data_sms['sms_type'] = 3;
                $this->doc_model->insert('sms_service', $data_sms);
                try {
                    $userName = "01613083375";
                    $userPass = "80d019";

                    $soapClient = new SoapClient("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl");
                    $paramArray = array(
                        'userName' => $userName,
                        'userPassword' => $userPass,
                        'mobileNumber' => $destination2,
                        'smsText' => $message2,
                        'type' => "UCS",
                        'maskName' => "COOP", 'campaignName' => ""
                    );
                    $value = $soapClient->__call("OneToOne", array($paramArray));
                } catch (Exception $e) {
                    echo $e;
                }
                $response = explode('||', $value->OneToOneResult);
                if ($response[0] = '1900') {
                    $msg_api = $this->doc_model->getAllRecords('mobile_api');
                    $data_sms_api['send_sms_number'] = $msg_api[0]['send_sms_number'] + 3;
                    $this->doc_model->update_send_sms($msg_api[0]['mobile_api_id'], $data_sms_api);
                } else {

                }
            }
        } else {

        }
        $data['division_id'] = $this->doc_model->insert_ret('somitee_divisional_admin', $data1);
        $this->doc_model->update_somitee_status($somitee_id, $data);

        redirect('doc');
    }

    public function somitee_list_by_div($div_id)
    {
        $this->load->view('layouts/header');
        $data['somitee_info'] = $this->doc_model->get_somitee_list_by_div($div_id);
        $this->load->view('somitee_list', $data);
        $this->load->view('layouts/footer');
    }

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
        $notice_status = $this->doc_model->get_specific_notice($notice_id);
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
        $data['division'] = $this->doc_model->get_all_division();
        $this->load->view('layouts/header');
        $this->load->view('register_employee', $data);
    }

    public function employee_registration_form()
    {
        $data['selector_id'] = $this->input->post('selection_id');
        $data['division_id'] = $this->input->post('division_id');
        $data['district_id'] = $this->input->post('district_id');
        $data['upz_id'] = $this->input->post('upz_id');

        if ($data['selector_id'] == 5) {
            $data['designation_id'] = 4;
            $data['designation_name'] = 'আপীল বিভাগীয় সমবায় কর্মকর্তা';
        } elseif ($data['selector_id'] == 6) {
            $data['designation_id'] = 5;
            $data['designation_name'] = 'অভিযোগ বিভাগীয় সমবায় কর্মকর্তা';
        } elseif ($data['selector_id'] == 2) {
            if (!is_numeric($data['division_id'])) {
                redirect('doc/register_employee');
            }
            $data['designation_id'] = 3;
            $data['designation_name'] = 'বিভাগীয় সমবায় কর্মকর্তা';
        } elseif ($data['selector_id'] == 3) {
            if (!is_numeric($data['division_id'])) {
                redirect('doc/register_employee');
            }
            if (!is_numeric($data['district_id'])) {
                redirect('doc/register_employee');
            }
            $data['designation_id'] = 6;
            $data['designation_name'] = 'জেলা সমবায় কর্মকর্তা ';
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
            $data['designation_name'] = 'উপজেলা সমবায় কর্মকর্তা';
        } else {
            redirect('doc/register_employee');
        }
        $data['designation'] = $this->doc_model->get_designation('1'); //1=admin
        $this->load->view('layouts/header');
        $this->load->view('employee_registration_form', $data);
        $this->load->view('layouts/footer');
    }

    public function edit_admin()
    {
        $id = $this->input->post('admin_id');
        $data['admin_name'] = $this->input->post('admin_name');
        $data['admin_email'] = $this->input->post('email');
        $data['admin_phone'] = $this->input->post('phone');
        $dd = explode('/', $this->input->post('start_date'));
        $data['admin_dob'] = $dd[2] . '-' . $dd[0] . '-' . $dd[1];

        $this->doc_model->update_function('admin_reg_id', $id, 'admin_registration', $data);

        redirect('doc/employee_list');
    }

    public function employee_registration_form_post()
    {
        $this->form_validation->set_rules('name', 'কর্মকর্তা/কর্মচারীর নাম', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nid', 'জাতীয় পরিচয় পত্র নং', 'trim|required|min_length[17]|max_length[17]');
        $this->form_validation->set_rules('email', 'ই-মেইল', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'ফোন নম্বর', 'trim|required|min_length[11]');
        $this->form_validation->set_rules('birth-date', 'জন্ম তারিখ', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['selector_id'] = $this->input->post('selector_id');
            $data['division_id'] = $this->input->post('division_id');
            $data['district_id'] = $this->input->post('district_id');
            $data['upz_id'] = $this->input->post('upz_id');

            $data['designation_id'] = $this->input->post('designation');
            $data['designation_name'] = $this->input->post('designation_name');
            $data['designation'] = $this->doc_model->get_designation('1'); //1=admin

            $this->load->view('layouts/header');
            $this->load->view('employee_registration_form', $data);
            $this->load->view('layouts/footer');
        } else {
            $data['admin_name'] = $this->input->post('name');
            $data['admin_nid'] = $this->input->post('nid');
            $data['admin_email'] = $this->input->post('email');
            $data['admin_phone'] = $this->input->post('phone');
            $dd = explode('/', $this->input->post('birth-date'));
            $data['admin_dob'] = $dd[2] . '-' . $dd[0] . '-' . $dd[1];
            $data['admin_designation_id'] = $this->input->post('designation');

            $data['div_id'] = $this->input->post('division_id');
            $data['dist_id'] = $this->input->post('district_id');
            $data['upz_id'] = $this->input->post('upz_id');

            $data1['admin_reg_id'] = $this->doc_model->insert_ret('admin_registration', $data);
            $data1['admin_nid'] = $this->input->post('nid');
            $data1['password'] = $this->encryptIt($this->input->post('password'));
            $data1['admin_type'] = $this->input->post('designation');
            $this->doc_model->insert('admin_login', $data1);
            redirect('doc/employee_list');
        }
    }

    public function employee_list()
    {
        $data['division'] = $this->doc_model->get_all_division();
        $this->load->view('layouts/header');
        $this->load->view('employee_list', $data);
    }

    public function get_admin_info()
    {
        $data['res'] = $this->doc_model->get_admin_info($this->input->post('id'));
        echo json_encode($data);

    }

    public function view_employee()
    {
        $data['selector_id'] = $this->input->post('selection_id');
        $data['division_id'] = $this->input->post('division_id');
        $data['district_id'] = $this->input->post('district_id');
        $data['upz_id'] = $this->input->post('upz_id');

        $page_type = $this->input->post('page_type');
        if ($data['selector_id'] == 5) {
            $data['employee_info'] = $this->doc_model->getEmpInfo(4);
        } elseif ($data['selector_id'] == 6) {
            $data['employee_info'] = $this->doc_model->getEmpInfo(5);
        } elseif ($data['selector_id'] == 2) {
            if (!is_numeric($data['division_id']) && $page_type == 1) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            $data['employee_info'] = $this->doc_model->get_emp_info22($data['division_id'], 0, 0);
        } elseif ($data['selector_id'] == 3) {
            if (!is_numeric($data['division_id'])) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            if (!is_numeric($data['district_id'])) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            $data['employee_info'] = $this->doc_model->get_emp_info22($data['division_id'], $data['district_id'], 0);
        } elseif ($data['selector_id'] == 4) {
            if (!is_numeric($data['division_id'])) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            if (!is_numeric($data['district_id'])) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            if (!is_numeric($data['upz_id'])) {
                if ($page_type == 1) {
                    redirect('doc/employee_list/1');
                } else {
                    redirect('doc/employee_list');
                }
            }
            $data['employee_info'] = $this->doc_model->get_emp_info22($data['division_id'], $data['district_id'], $data['upz_id']);
        } else {
            redirect('doc/employee_list');
        }
        $data['division'] = $this->doc_model->get_all_division();
        $this->load->view('layouts/header');
        if ($page_type == 1) {
            $this->load->view('transfer', $data);
        } else {
            $this->load->view('filtered-employee-list', $data);
        }
    }

    public function change_password()
    {
        $uname = $this->session->userdata('reg_id');

        $pass = $this->encryptIt($this->input->post('pass_change'));

        $data['password'] = $pass;
        $this->doc_model->password_change($data, $uname);
        redirect('doc/index', 'refresh');

    }

    public function employee_designation_change()
    {
        $data['employee_info'] = $this->doc_model->get_emp_info_all();
        $data['division'] = $this->doc_model->get_all_division();
        $this->load->view('layouts/header');
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
        if ($seletion == 2) {//div
            $data['admin_designation_id'] = 3;
            $data_login['admin_type'] = 3;
        } elseif ($seletion == 3) {//dco
            $data['admin_designation_id'] = 6;
            $data_login['admin_type'] = 6;
        } elseif ($seletion == 4) {///uco
            $data['admin_designation_id'] = 7;
            $data_login['admin_type'] = 7;
        } elseif ($seletion == 5) {///appeal
            $data['admin_designation_id'] = 4;
            $data_login['admin_type'] = 4;
        } elseif ($seletion == 6) {
            $data['admin_designation_id'] = 5;
            $data_login['admin_type'] = 5;
        }

        $data_login['is_block'] = 1;
        $this->doc_model->update_designation($admin_reg_id, $data);
        $this->doc_model->update_login($admin_reg_id, $data_login);
        redirect('doc/employee_list');
    }

    public function somitee_list()
    {
        $this->load->view('layouts/header');
        $data['somitee_info'] = $this->doc_model->get_somitee_list();
        $this->load->view('somitee_list', $data);
        $this->load->view('layouts/footer');
    }

    public function view_somitee()
    {

        $this->load->view('layouts/header');
        $data['somitee_info'] = $this->doc_model->get_division_somitee_detail($this->uri->srgment(3));

        $this->load->view('view_somitee_info', $data);
        $this->load->view('layouts/footer');
    }

    public function get_dist()
    {
        $data['res'] = $this->doc_model->get_dist($this->input->post('div_id'));
        echo json_encode($data);
    }

    public function get_upz()
    {
        $data['res'] = $this->doc_model->get_upz($this->input->post('dist_id'));
        echo json_encode($data);
    }

    public function sms_api()
    {

        $this->load->view('layouts/header');
        $data['sms_api_info'] = $this->doc_model->getAllRecords('mobile_api');
        $data['sms_info'] = $this->doc_model->get_sms_detail();
        $data['sms_info2'] = $this->doc_model->get_sms_detail2();
        $this->load->view('sms_api', $data);
        $this->load->view('layouts/footer');
    }

    public function sms_api_change()
    {
        $api_id = $this->input->post('sms_link_id');
        $data['mobile_api_link'] = $this->input->post('sms_api_link');
        $data['total_sms_number'] = $this->input->post('sms_number');
        $data['send_sms_number'] = 0;
        $this->doc_model->update_sms_api($api_id, $data);
        redirect('doc/sms_api');
    }

    public function sms_buy()
    {
        $api_id = $this->input->post('sms_link_id');
        $data['total_sms_number'] = $this->input->post('sms_number') + $this->input->post('pre_sms_num');
        $this->doc_model->update_sms_api($api_id, $data);
        redirect('doc/sms_api');
    }

    public function sms_api_add()
    {
        $data['mobile_api_link'] = $this->input->post('sms_api_link');
        $data['total_sms_number'] = $this->input->post('sms_number');
        $data['send_sms_number'] = 0;
        $this->doc_model->insert('mobile_api', $data);
        redirect('doc/sms_api');
    }

    public function all_opinion()
    {
        $data['opinion'] = $this->doc_model->get_opinion();
        $this->load->view('layouts/header');
        $this->load->view('show_opinion', $data);
    }
}
