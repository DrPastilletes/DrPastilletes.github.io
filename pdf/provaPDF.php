<?php
require "../fpdf/fpdf.php";
include "../model/usuari.php";
include "../model/product.php";
include "../model/comanda.php";
include "../model/liniaComanda.php";
include "../connect.php";



function crearPDF($comanda){
    $con = new connect();
    $con->openConnection();
    $linies = $con->getComandLines($comanda['idComanda']);

    $client = $con->getUserById($comanda['usuari']);
    $pdf = new FPDF($orientation='P',$unit='mm');
    $pdf->SetTitle("Factura_".$client["Nom"]."_".$client["Cognoms"]."_".$comanda['dataFi']);
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $textypos = 5;
    $pdf->setY(12);
    $pdf->setX(10);
// Agregamos los datos de la empresa
    $pdf->Cell(5,$textypos,"Macacos S.A.");
    $pdf->SetFont('Arial','B',10);
    $pdf->setY(30);$pdf->setX(10);
    $pdf->Cell(5,$textypos,"DE:");
    $pdf->SetFont('Arial','',10);
    $pdf->setY(35);$pdf->setX(10);
    $pdf->Cell(5,$textypos,"Macacos S.A.");
    $pdf->setY(40);$pdf->setX(10);
    $pdf->Cell(5,$textypos,"C/Macaco no 4");
    $pdf->setY(45);$pdf->setX(10);
    $pdf->Cell(5,$textypos,"656 656 656");
    $pdf->setY(50);$pdf->setX(10);
    $pdf->Cell(5,$textypos,"macacos@laselva.cat");

// Agregamos los datos del cliente

    $pdf->SetFont('Arial','B',10);
    $pdf->setY(30);$pdf->setX(75);
    $pdf->Cell(5,$textypos,"PER:");
    $pdf->SetFont('Arial','',10);
    $pdf->setY(35);$pdf->setX(75);
    $pdf->Cell(5,$textypos,$client["Nom"]." ".$client["Cognoms"]);
    $pdf->setY(40);$pdf->setX(75);
    $pdf->Cell(5,$textypos,$client["Adreca"]);
    $pdf->setY(45);$pdf->setX(75);
    $pdf->Cell(5,$textypos,$client["telefon"]);
    $pdf->setY(50);$pdf->setX(75);
    $pdf->Cell(5,$textypos,$client["Correu"]);

// Agregamos los datos del cliente
    $pdf->SetFont('Arial','B',10);
    $pdf->setY(30);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"FACTURA". $comanda['idComanda']);
    $pdf->SetFont('Arial','',10);
    $pdf->setY(35);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"Data: ".$comanda['dataFi']);
    $pdf->setY(45);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"");
    $pdf->setY(45);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"");
    $pdf->setY(50);$pdf->setX(135);
    $pdf->Cell(5,$textypos,"");

/// Apartir de aqui empezamos con la tabla de productos
    $pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
    $header = array("Cod.", "Producte","Quant.","Preu","Total");
//// Arrar de Productos
    $products = array(
        array("0010", "Producto 1",2,120,0),
        array("0024", "Producto 2",5,80,0),
        array("0001", "Producto 3",1,40,0),
        array("0001", "Producto 3",5,80,0),
        array("0001", "Producto 3",4,30,0),
        array("0001", "Producto 3",7,80,0),
        array("0002", "Producto 3",7,80,0),
        array("0005", "Producto 3",7,80,0),
        array("0001", "Producto 3",7,80,0),
    );
// Column widths
    $w = array(20, 95, 20, 25, 25);
// Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
// Data
    $total = 0;
    foreach($linies as $row)
    {
        $producte = $con->getProdById($row['producte']);

        $pdf->Cell($w[0],6,$producte['idProducte'],1);
        $pdf->Cell($w[1],6,$producte['nomProducte'],1);
        $pdf->Cell($w[2],6,number_format($row['quantitat']),'1',0,'R');
        $pdf->Cell($w[3],6,"$ ".number_format($producte['preu'],2,".",","),'1',0,'R');
        $pdf->Cell($w[4],6,"$ ".number_format($row['preuFinal'],2,".",","),'1',0,'R');

        $pdf->Ln();
        $total+=$row[3]*$row[2];

    }
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
    $yposdinamic = 60 + (count($products)*10);

    $pdf->setY($yposdinamic);
    $pdf->setX(235);
    $pdf->Ln();
/////////////////////////////
    $header = array("", "");
    $preuSenseIva = $comanda['preuFinal']/1.21;
    $data2 = array(
        array("Subtotal",$preuSenseIva),
        array("IVA", $comanda['preuFinal']-$preuSenseIva),
        array("Total", $comanda['preuFinal']),
    );
// Column widths
    $w2 = array(40, 40);
// Header

    $pdf->Ln();
// Data
    foreach($data2 as $row)
    {
        $pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }

    $con->closeConnection();
return $pdf->output("", "Factura_".$client["Nom"]."_".$client["Cognoms"]."_".$comanda['dataFi']);
}


?>