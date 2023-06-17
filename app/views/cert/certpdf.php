<?php
    $this->load->library('Pdf');
    $img = "assets/images/avatar.png";

    $results = $this->blapps_lib->getDataResult("tb_cert_item",array(array('cert_id',$certid)),"", array("item_ordering","ASC"));
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
            $this->Cell(0, 10, 'Downloaded from Online Entreprenuer Monitoring System by '.get_cookie('h_userFName').' on '.date("d/m/Y h:i a"), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        }
    }

    $pdf = new MYPDF("P", PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetTitle("Sijil Pra Perkahwinan");
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    $pdf->SetLeftMargin(15);
    $pdf->SetRightMargin(15);
    $pdf->SetTopMargin(25);

       
    $pdf->AddPage('P', 'A4');
	
	
	$pdf->write2DBarcode($certpath.sha1($noic), 'QRCODE,L', 170, 20, 15, 15, $style, 'N');
	$pdf->Ln(3);
    //$pdf->Cell(170, 25, "123456", 0, false, 'R', 0, '', 0, false, 'M', 'M');
	
	
	//start 
	foreach($results as $row){
		$value = "";
		$value = str_replace("{NAMA_PESERTA}", $nama, $row->item_value);
		$value = str_replace("{NO_KP}", $noic, $value);
		$value = str_replace("{TARIKH_TAMAT}", $tarikh, $value);
		
		if($row->item_type == "image"){
			$pdf->Image($value, $row->item_positionx, $row->item_positiony, $row->item_width, $row->item_height, '', '', '', false, 300, '', false, false, 0);
		}
		if($row->item_type == "cell"){
			$pdf->SetFont($row->item_font, '', $row->item_fontsize);
			$pdf->Ln((int)$row->item_line);
			$pdf->Cell($row->item_positionx, $row->item_positiony, $value, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		}
		if($row->item_type == "multicell"){
			$pdf->SetFont($row->item_font, '', $row->item_fontsize);
			$pdf->Ln((int)$row->item_line);
			$pdf->MultiCell($row->item_positionx, $row->item_positiony, $value, 0, 'C', false, 1);
		}
		
	}
	
	
    $pdf->Ln();
	ob_clean();
	ob_flush();
    $pdf->Output(FCPATH.$filepath, 'F');
	ob_end_flush();
	ob_end_clean();
?>