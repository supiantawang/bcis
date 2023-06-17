<?php
    $this->load->library('Pdf');
    $img = "assets/images/avatar.png";

    define("IMAGE", $img);
    class MYPDF extends TCPDF {
        //Page header
        public function Header() {
            // get the current page break margin
            $bMargin = $this->getBreakMargin();
            // get current auto-page-break mode
            $auto_page_break = $this->AutoPageBreak;
            // disable auto-page-break
            $this->SetAutoPageBreak(false, 0);
            // set bacground image
            /* $this->Image(IMAGE, 12, 21, 65, 20, '', '', '', false, 300, '', false, false, 0);
            $this->SetFont('helvetica', 'B', 18); */
            // Title
            /* $this->Ln(25);
            $this->Cell(0, 25, 'ANALISA PENCAPAIAN KPI SEMASA :', 0, false, 'C', 0, '', 0, false, 'M', 'M');
			$this->Ln(8);
            $this->Cell(0, 25, 'KUMPULAN 1 - KEMAMAN', 0, false, 'C', 0, '', 0, false, 'M', 'M'); */
            // restore auto-page-break status
            $this->SetAutoPageBreak($auto_page_break, $bMargin);
            // set the starting point for the page content
            $this->setPageMark();
        }
        public function Footer() {
            // Position at 10 mm from bottom
            $this->SetY(-10);
            // Set font
            $this->SetFont('helvetica', 'I', 8);
            // Page number
            $this->Cell(0, 10, 'Muat turun daripada Sistem Profil Pemetaan Orang Asli oleh '.get_cookie('_userFName').' pada '.date("d/m/Y h:i a"), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    $pdf = new MYPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(true);
    $pdf->SetTitle("Laporan");
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetLeftMargin(15);
    $pdf->SetRightMargin(15);
    $pdf->SetTopMargin(5);

       
    $pdf->AddPage('L', 'A4');
	
	
	$pdf->SetFont('helvetica', '', 10);
	
	if($this->uri->segment(3)  && $this->uri->segment(3) != "semua"){
		$this->db->where("a.program_isrequired",$this->uri->segment(3));
	}
	if($this->uri->segment(4)  && $this->uri->segment(4) != "semua"){
		$this->db->where("a.program_kg",$this->uri->segment(4));
	}
	if($this->uri->segment(5)  && $this->uri->segment(5) != "semua"){
		$this->db->where("a.program_type",$this->uri->segment(5));
	}
	if($this->uri->segment(6)  && $this->uri->segment(6) != "semua"){
		$this->db->where("a.program_achievement",$this->uri->segment(6));
	}
	
	
	$this->db->join("pro_kampung c","c.kg_id = a.program_kg");
	$this->db->join("pro_pos b","b.pos_id = c.kg_pos_id");
	$penduduk = $this->blapps_lib->getDataResult("pro_program a",array(),"",array("a.program_title","ASC"));
	$data['penduduk'] = $penduduk;
    $html = $this->load->view('report/program/html_program', $data, true);
    $pdf->writeHTML($html, true, true, false, false, '');
	
	
    $pdf->Ln();
	ob_clean();
	ob_flush();
    $pdf->Output('laporan_'.date("His").'.pdf', 'I');
	ob_end_flush();
	ob_end_clean();
?>