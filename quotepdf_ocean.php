<?php
//Author: Kris Wang
//Version: 1.10
//Date: 04/24/2015

 
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
 
    function _POST($str){ 
	$val = !empty($_POST[$str]) ? $_POST[$str] : null; 
	return $val; 
	}  
	
  $insuranceChoice = "0.5/110%"; 	
   
  $commodity=_POST('commodity');
  $Notes=_POST('Notes');
  $Destination=_POST('Destination');  
  $FOBprice=_POST('FOBprice');
  $commissionRate=_POST('commissionRate');
  $container=_POST('container');
  $purfresh=_POST('purfresh');
  $PreCarriage=_POST('PreCarriage');
  $BL=_POST('BL');
  $aesFee=_POST('aesFee');
  $otherCharge=_POST('otherCharge');
  $temperRecorder=_POST('temperRecorder');
  $Document=_POST('Document');
  $NoCS=_POST('NoCS');
  $insurance=_POST('insurance');
  $insuranceChoice=_POST('insuranceChoice');
 
  $FruitPrice = $FOBprice * $commissionRate/100 + $FOBprice;
	
	$FreightCostNoInsurance = ($container+$purfresh+$PreCarriage+$BL+$aesFee+$otherCharge+$temperRecorder+$Document)/$NoCS;
  
      switch($insuranceChoice){
	case "None";
		$insurance=($FruitPrice + $FreightCostNoInsurance)*0;break;	
	case "0.45/110%";
		$insurance=($FruitPrice + $FreightCostNoInsurance)*0.45/109.55;break;
	case "0.5/110%";
		$insurance=($FruitPrice + $FreightCostNoInsurance)*0.5/109.5;break;
	case "0.45/100%";
		$insurance=($FruitPrice + $FreightCostNoInsurance)*0.45/99.55;break;	
	case "0.65/100%";
		$insurance=($FruitPrice + $FreightCostNoInsurance)*0.65/99.35;break;	
	case "0.6/100%";
		$insurance=($FruitPrice + $FreightCostNoInsurance)*0.6/99.4;break;
  }
  
  
  
  $FreightCost=$FreightCostNoInsurance+$insurance;
  
  $surCharge = $insurance*$NoCS+$purfresh+$PreCarriage+$BL+$aesFee+$otherCharge+$temperRecorder+$Document;
  
  $finalQuote = $FruitPrice + $FreightCost;
 
//header and footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.jpg';
        $this->Image($image_file, 12, 7, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
		$this->SetY(17, false,false);
        // Title
        $this->Cell(0, 15, 'GED Quote', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        //$this->Cell(0, 10, 'kresnik.co/demo/airquote.php', 0, false, 'C', 0, '', 0, false, 'T', 'M');
		$this->Write(15, 'GED OCEAN QUOTE', 'http://kresnik.co/demo/oceanquote.php', false, 'C', true);
    }
} 
 
 
 
// create new PDF document
 
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
 
$pdf->SetCreator(PDF_CREATOR);
 
$pdf->SetAuthor('Kris Wang');
 
$pdf->SetTitle('GED Quote');
 
$pdf->SetSubject('GED Quote');
 
$pdf->SetKeywords('GED, Freight, Fruit');
 
 
// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// set default monospaced font
 
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
//set margins
 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
//set auto page breaks
 
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//set image scale factor
 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
//set some language-dependent strings
 
$pdf->setLanguageArray($l);
 
// ---------------------------------------------------------
 $pdf->setCellPaddings(5, 5, 0, 0);
// set font
 
$pdf->SetFont('times', '', 16);
 
// add a page
 
$pdf->AddPage();
 
// print a line using Cell()

$pdf->SetXY(45,30);
 
$pdf->Cell(80, 15, "Commodity", 1, 0, 'L');

$pdf->Cell(50, 15, $commodity, 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(130, 15, "Notes:".$Notes, 1, 1, 'L');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Destination", 1, 0, 'L');

$pdf->SetFillColor(255, 255, 30);

$pdf->Cell(50, 15, $Destination, 1, 1, 'C',true);

$pdf->SetX(45);

$pdf->Cell(80, 15, "Fruit Cost", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($FOBprice,2), 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Commission Rate", 1, 0, 'L');

$pdf->Cell(50, 15, $commissionRate."%", 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "FOB Price(Including COMM.)", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($FruitPrice,2), 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Number of Cases", 1, 0, 'L');

$pdf->Cell(50, 15, $NoCS, 1, 1, 'C'); 

$pdf->SetX(45);

$pdf->Cell(80, 15, "Container Charge", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($container,2), 1, 1, 'C'); 

$pdf->SetX(45);

$pdf->Cell(80, 15, "Total Sur-Charge", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($surCharge,2), 1, 1, 'C'); 

$pdf->SetX(45);

$pdf->Cell(80, 15, "Marine Insurance", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($insurance,2)."/Box", 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Total Freight Cost ", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($FreightCost,2)."/Box", 1, 1, 'C');

$pdf->SetX(45);
 
$pdf->Cell(80, 15, "Final Quote: ", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($finalQuote,2)."/Box", 1, 1, 'C');

 
/* $html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>

<p>
      <?php 
	    echo "Commodity: ".$commodityair."\n";  
	    echo isset($FOBprice=)?"Fruit Price: $".round($FOBprice=,2)."\n"."      ":"";
	  ?>
  </p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true); */

// ---------------------------------------------------------
 
//Close and output PDF document
 
//$pdf->Output($DIR.'/pdf_cache/example_'.date('His',time()).'.pdf', "I"); // ä¿�å­˜åœ°å�€$DIR.'/pdf_cache/example_'.date('His',time()).'.pdf' ,falseæˆ–è€…'F' ä¿�å­˜ä¸ºæ–‡ä»¶;trueæˆ–è€…'D'ç›´æŽ¥ä¸‹è½½	; 'I'ç›´æŽ¥é˜…è§ˆ
 $pdf->Output('1.pdf', 'I');
?>