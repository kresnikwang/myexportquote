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
   
  $commodityair=_POST('commodityair'); 
  $Notes=_POST('Notes'); 
  $Destination=_POST('Destination');
  $FOBprice=_POST('FOBprice');
  $commissionRate=_POST('commissionRate');
  $airrate=_POST('airrate');
  $weightpercase=_POST('weightpercase');
  $weightperpallet=_POST('$weightperpallet');
  $Trucking=_POST('Trucking');
  $AirPortTransfer=_POST('AirPortTransfer');
  $temperRecorder=_POST('temperRecorder');
  $GelPack=_POST('GelPack');
  $otherCharge=_POST('otherCharge');
  $coolguard=_POST('coolguard');
  $phyto=_POST('phyto');
  $documentfee=_POST('documentfee');
  $NoCS=_POST('NoCS');
  $NOPS=_POST('NOPS'); 
 
  $FruitPrice = $FOBprice * $commissionRate/100 + $FOBprice;
  $GrossWeight = $NOPS * $weightperpallet;
  $FreightCost = ($airrate*$weightperpallet*$NOPS+$Trucking*$NOPS+$GelPack*$NOPS+$AirPortTransfer*$NOPS+$temperRecorder+$otherCharge+$coolguard*$NOPS+$documentfee+$phyto)/($NoCS*$NOPS);
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
        $this->Write(15, 'GED AIR QUOTE', 'http://kresnik.co/demo/oceanquote.php', false, 'C', true);
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

$pdf->Cell(50, 15, $commodityair, 1, 1, 'C');

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

$pdf->Cell(80, 15, "FOB Price(Including COM)", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($FruitPrice,2), 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Number of Pallets", 1, 0, 'L');

$pdf->Cell(50, 15, $NOPS, 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Number of Cases", 1, 0, 'L');

$pdf->Cell(50, 15, "Total: ".$NoCS*$NOPS."Cases", 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Local Trucking", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($Trucking,2)."/pallet", 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Air Rate", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($airrate,2)."/kg", 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Total Gross Weight", 1, 0, 'L');

$pdf->Cell(50, 15, round($GrossWeight)."kg", 1, 1, 'C');

$pdf->SetX(45);

$pdf->Cell(80, 15, "Total Freight Cost ", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($FreightCost,2), 1, 1, 'C');

$pdf->SetX(45);
 
$pdf->Cell(80, 15, "Final Quote: ", 1, 0, 'L');

$pdf->Cell(50, 15, "$ ".round($finalQuote,2), 1, 1, 'C');

/* <button onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
    window.print();
}
</script> */
 
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