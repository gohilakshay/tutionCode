<?php defined('BASEPATH') OR exit('No direct script access allowed');
class AddStudentModelPdf extends CI_Model {
    function pdfRedirect($data1){
        
        $pdf = new FPDF();
        $pdf->AddPage();
        /*Student Recipt Details*/
        /*$year = explode("-",$date1);
        $stud_id = $n;
        $i = 0;
        $receipt1 = substr($year[0],2).'CG'.$n.'0'.$i;*/
        $className = $data1['className'];
       // $toDydate = $date1;
        $dateRecipt = $data1['dateRecipt'];
        $studName = $data1['studName'];
        $amountFrom = $data1['amountFrom'];

        $payMode = $data1['payMode'];
        $FinalAmt= $data1['FinalAmt'];
        $RecievedFee =$data1['RecievedFee'];
        $BalanceFee = $data1['BalanceFee'];
        $chq_date = $data1['chq_date'];
        $bank_name = $data1['bank_name'];
        $chq_no = $data1['chq_no'];
        $transc_id = $data1['transc_id'];

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
        $pdfName = $data1['stud_id']."_".$data1['receipt1']."_".$studName.".pdf";
         //$pdf->Output($pdfName,'D');
         $pdf->Output();
        return TRUE;
    }
}
?>