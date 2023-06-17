<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Mypdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

     //Page header
    public function Header() {
        // Logo
        $image_file = base_url().'images/logo_perhilitan.jpg';
        $this->Image($image_file, 10, 10, '', 20, 'JPG', '', 'T', false, 300, 'C', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 11);
        // Title
        $this->Ln(25);
        $this->Cell(0, 100, 'I2 INTELLIGENCE PROFILING AND ANALYSIS WILDLIFE CRIME REPORT', 0, false, 'C', 0, '', 100, false, 'M', 'M');
        $this->Ln(5);
        $this->SetFont('helvetica', 'B', 8);
        $this->Cell(0, 0, 'JABATAN PERLINDUNGAN HIDUPAN LIAR DAN TAMAN NEGARA (PERHILITAN) SEMENANJUNG MALAYSIA', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }
}
?>