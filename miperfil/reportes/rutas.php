<?php
require('../../complementos/plugins/fpdf/fpdf.php');
require_once('../../config/conexion.php');
require_once('../modelo/reportes_modelo.php');

$id = $_GET['id'];

$clase = new Procesos;

$datos_consulta = $clase->Listarguia($id);

$pdf=new FPDF();
$pdf->AddPage();


$pdf-> Image("../../complementos/images/logo.png",10,10,15,15);

$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(205, 92, 92);
$pdf->Cell(0,15,'GUIA DE REMISION',0,0,'C');
$pdf->Ln(20);

$pdf->SetFont('Arial','B',15);
$pdf->SetTextColor(23, 32, 42);
$pdf->Cell(190,10,'Datos cliente:',0,0,'L');
$pdf->Ln(15);

for($i=0;$i<count($datos_consulta);$i++){
    $datos_usuarios = $clase->Listarclienteguia($id);

    for($j=0;$j<count($datos_usuarios);$j++){
        $pdf->SetFillColor(233, 150, 122);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,12,'DNI',1,0,'C',1);
        $pdf->Cell(100,12,'CLIENTE',1,0,'C',1);
        $pdf->Cell(30,12,'CELULAR',1,0,'C',1);
        $pdf->Cell(30,12,'NUMERO',1,0,'C',1);
        $pdf->Ln(12);

        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(30,12,utf8_decode($datos_usuarios[$j]['Dni']),1,0,'C',1);
        $pdf->Cell(100,12,utf8_decode($datos_usuarios[$j]['Pnom'].' '.$datos_usuarios[$j]['Snom'].' '.$datos_usuarios[$j]['Sape'].' '.$datos_usuarios[$j]['Sape']),1,0,'C',1);
        $pdf->Cell(30,12,utf8_decode($datos_usuarios[$j]['Cel']),1,0,'C',1);
        $pdf->Cell(30,12,utf8_decode($datos_consulta[$i]['ped_num']),1,0,'C',1);
        $pdf->Ln(15);

        $pdf->SetFillColor(233, 150, 122);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(95,12,'DIRECCION',1,0,'C',1);
        $pdf->Cell(95,12,'EMAIL',1,0,'C',1);
        $pdf->Ln(12);


        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetFont('Arial','B',10);
        
        $pdf->Cell(95,12,utf8_decode($datos_usuarios[$j]['Dir']),1,0,'C',1);
        $pdf->Cell(95,12,utf8_decode($datos_usuarios[$j]['Ema']),1,0,'C',1);
        $pdf->Ln(20);
    }

    $pdf->SetFont('Arial','B',15);
    $pdf->SetTextColor(23, 32, 42);
    $pdf->Cell(190,10,'Datos del pedido:',0,0,'L');
    $pdf->Ln(15);

    $pdf->SetFillColor(230, 230, 250);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,12,'CANTIDAD',1,0,'C',1);
    $pdf->Cell(40,12,'FECHA CREACION',1,0,'C',1);
    $pdf->Cell(40,12,'HORA CREACION',1,0,'C',1);
    $pdf->Cell(35,12,'FECHA ENTREGA',1,0,'C',1);
    $pdf->Cell(35,12,'HORA ENTREGA',1,0,'C',1);
    $pdf->Ln(12);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,12,utf8_decode($datos_consulta[$i]['ped_can']),1,0,'C',1);
    $pdf->Cell(40,12,utf8_decode($datos_consulta[$i]['ped_fecing']),1,0,'C',1);
    $pdf->Cell(40,12,utf8_decode($datos_consulta[$i]['ped_horing']),1,0,'C',1);
    $pdf->Cell(35,12,utf8_decode($datos_consulta[$i]['ped_fecent']),1,0,'C',1);
    $pdf->Cell(35,12,utf8_decode($datos_consulta[$i]['ped_horent']),1,0,'C',1);
    $pdf->Ln(50);

    $pdf->SetFillColor(230, 230, 250);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(190,10,'IMPORTANTE:',1,0,'C',1);

    $pdf->Ln(10);

    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(190,8,utf8_decode('El pedido tiene que ser entregado hasta máximo el: ' . $datos_consulta[$i]['ped_fecmax'] . ' a las ' . $datos_consulta[$i]['ped_hormax']),1,0,'C',1);

}

$pdf->SetY(250);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(60,12,'____________________________',0,0,'C',1);
$pdf->Cell(70,12,'____________________________',0,0,'C',1);
$pdf->Cell(60,12,'____________________________',0,0,'C',1);
$pdf->SetY(262);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(60,8,'CLIENTE',0,0,'C',1);
$pdf->Cell(70,8,'REPARTIDOR',0,0,'C',1);
$pdf->Cell(60,8,'RECEPCIONISTA',0,0,'C',1);

$pdf->Output('I','entradamateriaPrima.pdf');
//$pdf->Output('D','Reporte de pedidos.pdf');
?>