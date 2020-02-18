<?php

error_reporting ( E_ALL );

//requires file from tcdpf

// require_once ('tcpdf/config/lang/eng.php');

// require_once ('tcpdf/tcpdf.php');

$exa = new TCPDF();

$exa->setCreator ( PDF_CREATOR );

$exa->setAuthor ( 'Vinod kumar' );

$exa->setTitle ( 'Image with HTML' );

$exa->setSubject ( 'Example of TCPDF' );

$exa->setKeywords ( 'TCPDF, pdf, PHP' );

//setting font

$exa->setFont ( 'times', '', 18);

$exa->addPage ();

$txt = <<<HDOC

 Example of TCPDF

HDOC;

$exa->Write ( 0, $txt );

$exa->Ln ();

$exa->setImageScale ( PDF_IMAGE_SCALE_RATIO );

$exa->setJPEGQuality ( 90 );
// $img = '<img src="'.base_url().'uploads/'.'nowoman.jpg'.'" width="50" height="50">';

// $exa->Image ( $img);
$img = file_get_contents('http://localhost:8080/tailors/uploads/nowoman.jpg');

// $exa->Image('@' . $img, 55, 19, '', '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
$exa->Image('@'. $img, 150, '', 40, 40, '', '', 'T', false, 300, '', false, false, 1, false, false, false);


// $exa->Ln ( 30 );

$txt = "<h2>Embedded HTML</h2>

This text should have some <em>italic</em> and some <strong>bold</strong>

and the caption should be an &lt;h2&gt;.";

$exa->WriteHTML ( $txt );

$exa->Output ( 'image_and_html.pdf', 'I' );

?>