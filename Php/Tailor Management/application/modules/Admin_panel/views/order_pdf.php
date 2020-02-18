<?php
//============================================================+
// File name   : example_006.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 006 for TCPDF class
//               WriteHTML and RTL support
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: WriteHTML and RTL support
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Reports');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', '', 10);

// add a page
// $pdf->AddPage();
$pdf->AddPage('L', 'A4');
// $pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');

$heading = 	<<<EOF
	

EOF
;
$pdf->WriteHTMLCell(0,0,'','',$heading,0,1,0,true,'C',true);
$img = file_get_contents('http://localhost:8080/tailors/uploads/nowoman.jpg');
$pdf->Ln(2);
$hh = "hello";
$table = <<<EOF
	<style type="text/css">
	table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

table td, table th {
    border: 1px solid #ddd;
    padding: 8px;
}

 tr:nth-child(even){background-color: #f2f2f2;}

 tr:hover {background-color: #ddd;}

th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
</style>

EOF;
$table .= '<div align="left"> Invoice Number: #'.$sd->invoice_number.'<br> Customer ID: '.$sd->cust_number.'<br> Name: '.$sd->name.'<br> Phone: '.$sd->phone.'<br> Date: '.$sd->invoicedate.'</div>';
// $table .= '<p>Invoice Number: #'.$sd->invoice_number.'<br> Date: '.$sd->invoicedate.'</p>';
$table .='<br>';
$table .= '<table style="border: 1px solid lightgrey;" id="customers">';


			
$table .='<tr>
			<th style="border: 1px solid lightgrey;">SL No. </th>
			<th style="border: 1px solid lightgrey;">Item Name</th>
			<th style="border: 1px solid lightgrey;">Quantity</th>
			<th style="border: 1px solid lightgrey;">Price</th>
			<th style="border: 1px solid lightgrey;">Subtotal</th>
			</tr>';
			$img = "<?= base_url().'uploads/customer/'?>";
			$i =0;
			foreach($gin as $c){
					$i+=1;
				$table .='<tr>
							<td>'.$i.'</td>
							<td>'.$c->stylename.'</td>
							<td>'.$c->quantity.'</td>
							<td>'.$c->price.'</td>
							<td>'.$c->subtotal.'</td></tr>';
							
					
			}
			$table .= '<tr>
					<td colspan="4">Total</td>
					<td>'.$sd->total.'</td>
				</tr>';
			$table .= '<tr>
					<td colspan="4">Discount</td>
					<td>'.$sd->discount.'</td>
				</tr>';
			$table .= '<tr>
					<td colspan="4">Grand Total</td>
					<td>'.$sd->grand_total.'</td>
				</tr>';
			
$table.='</table>';
$pdf->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);

//Close and output PDF document
ob_clean();
$pdf->Output($sd->invoice_number.'.pdf', 'I');
// end_ob_clean();
//============================================================+
// END OF FILE
//============================================================+


?>