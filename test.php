<?php
require('../../complementos/plugins/fpdf/fpdf.php');



$clave = "clave";
$paciente = "paciente";
$sexo = "sexo";
$domicilio = "domicilio";
$img = "logo.png";
$fecha = "fecha";
$medico = "medico";
$consultorio = "consultorio";
$diagnostico = "diagnostico";


// Obtenemos el id del paciente
//$paciente_id= $_GET['id'];
// Creamos nuestro objeto paciente
//$objpaciente = new Paciente();
// obtenemos los datos del paciente por el id
//$paciente = $objpaciente->paciente_id($paciente_id);
// Creamos nuestro objeto pdf
$pdf=new Pdf();
// Agregamos una pagina al archivo
$pdf->AddPage();
// Personalizamos los amrgenes
$pdf->SetMargins(20,20,20);
// Creamos un espacio
$pdf->Ln(10);
// Definimos la fuente y tamaño
$pdf->SetFont('Arial','',12);
// Creamos una celda para mostrar la información
$pdf->Cell(30,6,'CLAVE: ',0,0);
$pdf->Cell(0,6,$clave,0,1);
$pdf->Cell(30,6,'NOMBRE: ',0,0);
$pdf->Cell(0,6,$paciente,0,1);
$pdf->Cell(30,6,'SEXO: ',0,0);
$pdf->Cell(0,6,$sexo,0,1);
$pdf->Cell(30,6,'DOMICILIO: ',0,0); 
$pdf->Cell(0,6,$domicilio,0,1);
// Usamos la función imagen, para obtener la ruta de la imagen usamos nuestra función ruta de conexion
$pdf->Image('../../complementos/images/'.$img,155,20,30,30);
 
$pdf->Ln(10);
 
$pdf->SetWidths(array(30, 40, 50, 50, 20));
$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(85,107,47);
$pdf->SetTextColor(255);
// usamos nuestra funcion creada para listar celdas con varias lineas
$pdf->Row(array('FECHA', 'MEDICO', 'CONSULTORIO', 'DIAGNOSTICO'));
// Creamos nuestra funcion consulta
/*
$objconsulta = new Consulta();
$consultas = $objconsulta->consultasPaciente($paciente_id);
 */
$i = 0;


$pdf->SetFillColor(153,255,153);
$pdf->SetTextColor(0);
$pdf->Row(array($fecha, $medico, $consultorio, $diagnostico));

/*
// listamos las consultas
foreach ($consultas as $consulta) {
    $pdf->SetFont('Arial','',10);
 
    if($i%2 == 1){
        
        $i++;
    }else{
        $pdf->SetFillColor(102,204,51);
        $pdf->SetTextColor(0);
        $pdf->Row(array($fecha, $medico, $consultorio, $diagnostico));
        $i++;
    }
}
*/

// Salida del archivo y nombre
$pdf->Output('reporte.pdf','I');
?>