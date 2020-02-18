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
$exa = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$exa->SetCreator(PDF_CREATOR);
$exa->SetAuthor('Nicola Asuni');
$exa->SetTitle('Reports');
$exa->SetSubject('TCPDF Tutorial');
$exa->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$exa->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$exa->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$exa->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$exa->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$exa->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$exa->SetHeaderMargin(PDF_MARGIN_HEADER);
$exa->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$exa->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$exa->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $exa->setLanguageArray($l);
}


//setting font

$exa->setFont ( 'times', '', 18);

$exa->addPage ();

// $txt = <<<HDOC

//  Example of TCPDF

// HDOC;
$txt = 'Details of '.$s->name;

$exa->Write ( 0, $txt );

$exa->Ln ();

$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->setJPEGQuality ( 90 );
// $img = '<img src="'.base_url().'uploads/'.'nowoman.jpg'.'" width="50" height="50">';

// $exa->Image ( $img);
$im = $s->image;
$img = file_get_contents('http://localhost:8080/tailors/uploads/customer/'.$im);

// $exa->Image('@' . $img, 55, 19, '', '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
$exa->Image('@'. $img, 150, 30, 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);


$exa->Ln ( 15 );

// $table = '<h2>'.$s->name.'</h2>';
$table = '<table style="border: 1px solid lightgrey; font-size: 12px; width:70%;">';
$table .='<tr>
			<th>Customer ID </th>
			<td>'.$s->cust_number.'</td>
			</tr>';
$table .='<tr>
			<th>Name </th>
			<td>'.$s->name.'</td>
			</tr>';
$table .='<tr>
			<th>Phone </th>
			<td>'.$s->phone.'</td>
			</tr>';
$table .='<tr>
			<th>Email </th>
			<td>'.$s->email.'</td>
			</tr>';
$table .='<tr>
			<th>Address </th>
			<td>'.$s->address.'</td>
			</tr>';
$table .='<tr>
			<th>Sex </th>';
			if($c->sex =='0'){
						$table .=	'<td>'."Male".'</td>';
					} else{
						$table .=	'<td>'."FeMale".'</td>';
					};
			$table .='</tr>';
$table .='<tr>
			<th>Joining Date </th>
			<td>'.$s->date.'</td>
			</tr>';			
$table.='</table>';
$table.='</br>';
$table.='<h3>'.'Measurement of '.$s->name.'</h3>';
$table .= '<table style="border: 1px solid lightgrey; font-size: 12px; width:100%;">';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Seat </th>
			<td>'.$s->seat.'</td>
			<th style="border: 1px solid lightgrey;">Back Length </th>
			<td>'.$s->back_lenght.'</td>
			<th style="border: 1px solid lightgrey;">Vest </th>
			<td>'.$s->vest.'</td>
			</tr>';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Thigh </th>
			<td>'.$s->thigh.'</td>
			<th style="border: 1px solid lightgrey;">Cuff </th>
			<td>'.$s->cuff.'</td>
			<th style="border: 1px solid lightgrey;">Bottom </th>
			<td>'.$s->bottom.'</td>
			</tr>';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Trouser Length </th>
			<td>'.$s->trouser_lenght.'</td>
			<th style="border: 1px solid lightgrey;">Front Length </th>
			<td>'.$s->front_lenght.'</td>
			<th style="border: 1px solid lightgrey;">Short Sleeves </th>
			<td>'.$s->short_sleeves.'</td>
			</tr>';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Chest </th>
			<td>'.$s->chest.'</td>
			<th style="border: 1px solid lightgrey;">Belly </th>
			<td>'.$s->belly.'</td>
			<th style="border: 1px solid lightgrey;">Inseem </th>
			<td>'.$s->inseem.'</td>
			</tr>';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Waist </th>
			<td>'.$s->waist.'</td>
			<th style="border: 1px solid lightgrey;">Neck </th>
			<td>'.$s->neck.'</td>
			<th style="border: 1px solid lightgrey;">Top Coat </th>
			<td>'.$s->top_coat.'</td>
			</tr>';	
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Hips </th>
			<td>'.$s->hips.'</td>
			<th style="border: 1px solid lightgrey;">Shoulder </th>
			<td>'.$s->shoulder.'</td>
			<th style="border: 1px solid lightgrey;">Right Sleeves </th>
			<td>'.$s->right_sleeves.'</td>
			</tr>';
$table .='<tr>
			<th style="border: 1px solid lightgrey;">Knee </th>
			<td>'.$s->knee.'</td>
			<th style="border: 1px solid lightgrey;">Left Sleeves </th>
			<td>'.$s->left_sleeves.'</td>
			
			</tr>';	
$table.='</table>';
$table.='<style>';
$table.= 'td{color: #003300; font-family: helvetica; border: 1px solid lightgrey;}';
$table.='</style>';
$exa->WriteHTMLCell(0,0,'','',$table,0,1,0,true,'L',true);
// $exa->WriteHTML ( $table );

ob_clean();
$na = $s->id;
$exa->Output ( $na.'.pdf', 'I' );
// end_ob_clean();
?>