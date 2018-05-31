<?php

include "mpdf/mpdf.php";
include 'DAODiagnosticos.php';

if (isset($_REQUEST["nombre"])&&($_REQUEST["fecha"])&&($_REQUEST["medi"])) {
	$nom=$_REQUEST["nombre"];
	$fecha=$_REQUEST["fecha"];
	$medi=$_REQUEST["medi"];
	

$pdf=new mPDF('c');
$dao= new DAODiagnosticos();

//$html="<title>Generar Receta</title>";
//$html.="<link rel='icon' type='image/png' href='../imagenes/descrip.png'/>";

$html.="<p align='left'><B><I>Consultorio Clínico ITCA_FEPADE 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fecha:</B><I> &nbsp; $fecha
<br>";

$html.="<B><I>Dirección: </B><I>Santa Tecla, La Libertad<br>";
$html.="<B>Tel: </B> 2298-1213</p>";
$html.="<hr>";
$html.="<h2><p align='center'><B><I>Receta Medica</B></p></h2>";
$html.="<p align='left'><B><I>Paciente:</B><I>&nbsp; $nom<br><br>";
$html.="<B>Medicamentos:</B> $medi<br><br>";
$html.="<B>Duración:&nbsp;___________________________________________________________________________________</B><br><br>";
$html.="<B>Pauta:&nbsp;______________________________________________________________________________________</B><br><br>";
$html.="<B>Farmacia&nbsp;&nbsp;recomendada:&nbsp;______________________________________________________________________</B><br><br>";
$html.="<B>Médico&nbsp;&nbsp;Prescriptor:</B>&nbsp;Dr.Fabio Alonso Mejía<br><br><br><br><br><br></p>";
$html.="<p align='center'><B><I>F.&nbsp; _________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Sello:____________________________<br>";
$html.="<p align='center'><B><I>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dr.Mejia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Consultorio Clínico ITCA_FEPADE <br><br>";
$html.="<hr>";



$pdf->WriteHTML($html);
$pdf->Output();
exit;
}
?>
