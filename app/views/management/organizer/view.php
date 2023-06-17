<?php
    $this->load->library('Pdf');
    $img = "assets/images/avatar.png";
    //$title = $this->blapps_lib->getData("cert_title","tb_cert_tpl","cert_id",base64_decode($this->uri->segment(4)));
    $results = $this->blapps_lib->getDataResult("tb_cert_item",array(array('cert_id',base64_decode($this->uri->segment(4))),array('item_status',1)),"", array("item_ordering","ASC"));
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
	
	$pdf->Image("assets/images/logo.png", 12, 21, 37, 15, '', '', '', false, 300, '', false, false, 0);
	
	$pdf->write2DBarcode('111111111111', 'QRCODE,L', 170, 20, 15, 15, $style, 'N');
	$pdf->Ln(3);
    //$pdf->Cell(170, 25, "123456", 0, false, 'R', 0, '', 0, false, 'M', 'M');
	
	
	//start 
	foreach($results as $row){
		if($row->item_type == "image"){
			$pdf->Image($row->item_value, $row->item_positionx, $row->item_positiony, $row->item_width, $row->item_height, '', '', '', false, 300, '', false, false, 0);
		}
		if($row->item_type == "cell"){
			$pdf->SetFont($row->item_font, '', $row->item_fontsize);
			$pdf->Ln((int)$row->item_line);
			$pdf->Cell($row->item_positionx, $row->item_positiony, $row->item_value, 0, false, 'C', 0, '', 0, false, 'M', 'M');
		}
		if($row->item_type == "multicell"){
			$pdf->SetFont($row->item_font, '', $row->item_fontsize);
			$pdf->Ln((int)$row->item_line);
			$pdf->MultiCell($row->item_positionx, $row->item_positiony, $row->item_value, 0, 'C', false, 1);
		}
		
	}
	/*
	$pdf->Image('assets/images/jaheik.png', 90, 25, 30, 30, '', '', '', false, 300, '', false, false, 0);
	
	$pdf->SetFont('times', '', 14);
	$pdf->Ln(25);
    $pdf->Cell(0, 25, "Jabatan Hal Ehwal Agama Islam Kelantan", 0, false, 'C', 0, '', 0, false, 'M', 'M');
	
	$pdf->SetFont('times', 'B', 16);
	$pdf->Ln(20);
    $pdf->Cell(0, 25, $title, 0, false, 'C', 0, '', 0, false, 'M', 'M');
	
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(20);
    $pdf->Cell(0, 25, "Dengan ini disahkan bahawa", 0, false, 'C', 0, '', 0, false, 'M', 'M');
	
	$pdf->SetFont('helvetica', 'B', 12);
	$pdf->Ln(10);
    $pdf->Cell(0, 25, "MOHD SUPIAN BIN TAWANG", 0, false, 'C', 0, '', 0, false, 'M', 'M');
	
	$pdf->SetFont('helvetica', 'B', 12);
	$pdf->Ln(5);
	$pdf->Cell(0, 25, "870108465155", 0, false, 'C', 0, '', 0, false, 'M', 'M');
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(10);
	$pdf->MultiCell(0, 0, "Telah mengikuti Kursus Perkahwinan dan Kekeluargaan Islam berdasarkan \nModul Bersepadu Kursus Perkahwinan Islam (MBKPI) Secara Talian", 0, 'C', false, 1);
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(10);
	$pdf->MultiCell(0, 0, "Tamat Pada", 0, 'C', false, 1);
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(2);
	$pdf->MultiCell(0, 0, "31/5/2020", 0, 'C', false, 1);
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(10);
	$pdf->MultiCell(0, 0, "Penganjur", 0, 'C', false, 1);
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(2);
	$pdf->MultiCell(0, 0, "JABATAN HAL EHWAL AGAMA ISLAM KELANTAN", 0, 'C', false, 1);
	
	$pdf->Image('assets/images/signature.png', 120, 220, 35, 15, '', '', '', false, 300, '', false, false, 0);
	$pdf->Image('assets/images/award-seal-png-4.png', 30, 210, 50, 50, '', '', '', false, 300, '', false, false, 0);
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(50);
	$pdf->MultiCell(230, 0, "Pengarah", 0, 'C', false, 1);
	
	$pdf->SetFont('times', '', 12);
	$pdf->Ln(2);
	$pdf->MultiCell(230, 0, "Jabatan Hal Ehwal Agama Islam Kelantan", 0, 'C', false, 1);
	*/
	
	
    $pdf->Ln();
	ob_clean();
	ob_flush();
    $pdf->Output('kpi_'.date("His").'.pdf', 'I');
	ob_end_flush();
	ob_end_clean();
?>