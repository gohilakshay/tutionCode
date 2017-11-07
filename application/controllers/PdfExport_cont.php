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
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('url');
		$pdf = new FPDF();
        $pdf->AddPage();
        /*Student Recipt Details*/
        $className = $this->input->post('classes_name');
        $toDydate = $this->input->post('admission_date'); 
        $reciept = $this->input->post('receipt_1');
        $dateRecipt = array($toDydate,'Receipt No.'.$reciept);
        $studName = $this->input->post('student_name');
        $amountFrom = "Amount Recieved From => $studName";
        
        $payMode = $this->input->post('payMode');
        $FinalAmt= $this->input->post('FinalAmt');
        $RecievedFee = $this->input->post('RecievedFee');
        $BalanceFee = $this->input->post('BalanceFee');
        $chq_date = $this->input->post('chq_date');
        $bank_name = $this->input->post('bank_name');
        $chq_no = $this->input->post('chq_no');
        $transc_id = $this->input->post('transc_id');
           
        $paymentDetails = array("Final Amount : $FinalAmt","Received Amount : $RecievedFee","Balance Amount : $BalanceFee");   
        $paymentMode = array('Payment Mode',"$payMode");
        $note = "Fees once paid will not be refundable";
           if($payMode == 'cheque'){
               $bankDetail = array("Bank Name : $bank_name","Cheque No : $chq_no","Cheque date : $chq_date");
           }
           else if($payMode == 'credit' || $payMode == 'debit' || $payMode == 'netbanking'){
               $bankDetail = "Transaction ID : $transc_id";
           }   
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
        if($payMode == 'cheque'){
            $pdf->Ln();
            foreach($bankDetail as $data){
                $pdf->SetFont('Arial','',12);	
                $pdf->Cell(63.35,9,$data,1); // for payment Details.

            }
        }
           if($payMode == 'credit' || $payMode == 'debit' || $payMode == 'netbanking'){
               $pdf->Ln();
               $pdf->SetFont('Arial','',12);	
               $pdf->Cell(190,9,$bankDetail,1); // for payment Details.
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