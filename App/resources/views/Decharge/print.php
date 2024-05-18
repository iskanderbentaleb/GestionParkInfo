<?php

require_once('../../TCPDF-main/tcpdf.php');

class MYPDF extends TCPDF {
    public function Header() {
            $this->ImageSVG('../images/Sonatrach.svg', $x=12, $y=5, $w=43);
    }

}

$pdf = new MYPDF('P', 'mm', 'A4', true, 'UTF-8', true);

// $pdf->SetCreator('Your Name');
// $pdf->SetAuthor('Your Name');
// $pdf->SetTitle('Invoice');
// $pdf->SetSubject('Invoice');
// $pdf->SetKeywords('Invoice');

$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);


// $pdf->SetMargins(10, 10, 10);
// $pdf->SetHeaderMargin(10);
// $pdf->SetFooterMargin(10);

$pdf->SetAutoPageBreak(TRUE, 10);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();

// Text "Activités Exploration-Production"


// Text "Division Production"
$pdf->SetFont('helvetica', 'B', 16);

$pdf->Cell(0, 10, 'Division Production', 0, true, 'R', 0, '', 0, false, 'M', 'M');
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(0, 10, 'Activités Exploration-Production', 0, true, 'R', 0, '', 0, false, 'M', 'M');

// Fournisseur Information
$pdf->SetFont('helvetica', '', 12);


$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');


// Supplier information
$pdf->SetFont('helvetica', '', 12);
$pdf->SetX($pdf->GetPageWidth() - 80); // Set X position to the right margin
$pdf->Cell(0, 10, 'Code Utilisateur : ' . $data['DechargeInfo'][0]->CodeUtilisateur , 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->SetX($pdf->GetPageWidth() - 80); // Set X position to the right margin
$pdf->Cell(0, 10, 'Nom : ' . $data['DechargeInfo'][0]->utNom , 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->SetX($pdf->GetPageWidth() - 80); // Set X position to the right margin
$pdf->Cell(0, 10, 'Prénom : ' . $data['DechargeInfo'][0]->utPrenom , 0, true, 'L', 0, '', 0, false, 'M', 'M');


$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');


$pdf->Cell(0, 10, 'Code Décharge : ' . $data['DechargeInfo'][0]->CodeDech , 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, 'Date : ' . $data['DechargeInfo'][0]->Date , 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, 'Type : ' . $data['DechargeInfo'][0]->Dechtype , 0, true, 'L', 0, '', 0, false, 'M', 'M');



$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');
$pdf->Cell(0, 10, '', 0, true, 'L', 0, '', 0, false, 'M', 'M');


$html = '
<table border="1" style="margin-top: 250px;" cellspacing="0" cellpadding="5">
    <thead>
        <tr sty>
            <th>Numéro</th>
            <th>Matériel SSH</th>
            <th>Matériel Type</th>
            <th>Matériel Marque</th>
        </tr>
    </thead>
    <tbody>
';

foreach ($data['DechargeContenue'] as $key => $item) {
    $html .= '
        <tr>
            <td>' . ($key + 1) . '</td>
            <td>' . $item->SSH .'</td>
            <td>' . $item->TypeMat .'</td>
            <td>' . $item->Marque . '</td>
        </tr>
    ';
}

$html .= '
    </tbody>
</table>
';




$pdf->writeHTML($html, true, false, true, false, '');


$pdf->Output('invoice.pdf', 'I');



?>