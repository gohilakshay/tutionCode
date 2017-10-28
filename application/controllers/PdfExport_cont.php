<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PdfExport_cont extends CI_Controller {

	/**
	 * Example: FPDF 
	 *
	 * Documentation: 
	 * http://www.fpdf.org/ > Manual
	 *
	 */
	public function index() {	
		$this->load->library('fpdf_gen');
		
		$pdf = new FPDF();
$pdf->AddPage();
/*Student Recipt Details*/
$className = 'Classes Name';
$toDydate = date('d-m-Y');
$dateRecipt = array($toDydate,'Receipt No. 2500');
$studName = "Akshay Gohil";	
$amountFrom = "Amount Recieved From => $studName";
$paymentDetails = array('Final Amount','Received Amount','Balance Amount');
$paymentMode = array('Payment Mode','cash');
$note = "Fees once paid will not be refundable";

/*receipt formAT*/

$pdf->SetFont('Arial','B',16);
$pdf->Cell(190,12,$className,1); // for className
$pdf->Ln();

foreach($dateRecipt as $data) {
	$pdf->SetFont('Arial','',12);	
		$pdf->Cell(95,9,$data,1); // for date and Recipt No.
}

$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,12,$amountFrom,1); // For student name

$pdf->Ln();
foreach($paymentDetails as $data){
    $pdf->SetFont('Arial','',12);	
        $pdf->Cell(63.35,9,$data,1); // for payment Details.
		
}
$pdf->Ln();
foreach($paymentMode as $data){
    $pdf->SetFont('Arial','',12);	
        $pdf->Cell(95,9,$data,1); // for paymentmode Details.	
}

$pdf->Ln();
$pdf->SetFont('Arial','U',12);
$pdf->Cell(190,8,$note,1); // For last line Note

$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(150,8,'Sign', 0, 0, 'R'); // For Sign

 $pdf->Output();
	}
}
?>