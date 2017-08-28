<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH.'/third_party/mpdf/mpdf.php';

class New_m_pdf {

    public $param;
    public $pdf;

    public function __construct($param = "'L',
        '', '', '', '',
        30,
        30, 
        30, 
        30, 
        18, 
        12")
    {
         $this->param =$param;
        $this->pdf = new mPDF($this->param);
       // $this->pdf->falseBoldWeight = 8;
    }
}
