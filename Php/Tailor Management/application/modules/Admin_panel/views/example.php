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

$heading = 	<<<EOD
	<h3>List of ..</h3>
EOD;
$pdf->WriteHTMLCell(0,0,'','',$heading,0,1,0,true,'C',true);
$img = file_get_contents('http://localhost:8080/tailors/uploads/nowoman.jpg');
$pdf->Ln(8);
$hh = "hello";
$table = '<table style="border: 1px solid lightgrey;">';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">No </th>
			<th style="border: 1px solid lightgrey;">Name</th>
			<th style="border: 1px solid lightgrey;">Phone</th>
			<th style="border: 1px solid lightgrey;">Email</th>
			<th style="border: 1px solid lightgrey;">Address</th>
			<th style="border: 1px solid lightgrey;">Customer Id</th>
			<th style="border: 1px solid lightgrey;">Sex</th>
			
			<th style="border: 1px solid lightgrey;">Creation Date</th>
			</tr>';
			$img = "<?= base_url().'uploads/customer/'?>";

			foreach($allc as $c){

				$table .='<tr>
							<td>'.$c->id.'</td>
							<td>'.$c->name.'</td>
							<td>'.$c->phone.'</td>
							<td>'.$c->email.'</td>
							<td>'.$c->address.'</td>
							<td>'.$c->cust_number.'</td>';
							
				 if($c->sex =='0'){
						$table .=	'<td>'."Male".'</td>';
					} else{
						$table .=	'<td>'."FeMale".'</td>';
					}
						$table .=	'<td>'.$c->date.'</td>
							</tr>';
					
			}
$table.='</table>';
$pdf->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'C',true);

//Close and output PDF document
ob_clean();
$pdf->Output('example_006.pdf', 'I');
// end_ob_clean();
//============================================================+
// END OF FILE
//============================================================+


?>