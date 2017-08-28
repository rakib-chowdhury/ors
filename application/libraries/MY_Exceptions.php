<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
class MY_Exceptions extends CI_Exceptions
{
    public function show_error($heading, $message, $template = '', $status_code = 500)
    {
        $ci =& get_instance();
        if (!$page = $ci->uri->uri_string()) {
            $page = 'home';
        }
        switch($status_code) {
            case 403: $heading = 'Access Forbidden'; break;
            case 404: $heading = 'Page Not Found'; break;
            case 503: $heading = 'Undergoing Maintenance'; break;
        }
        log_message('error', $status_code . ' ' . $heading . ' --> '. $page);
        if ($status_code == 404)
        {
            redirect('error');
        }
        return parent::show_error($heading, $message, 'error_general', $status_code);
    }
}