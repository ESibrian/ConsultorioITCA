<?php

include "mpdf/mpdf.php";
include 'DAODiagnosticos.php';

if (isset($_REQUEST["nombre"])&&($_REQUEST["fecha"])&&($_REQUEST["sintomas"])) {
	$nom=$_REQUEST["nombre"];
	$fecha=$_REQUEST["fecha"];
	$sintomas=$_REQUEST["sintomas"];
	

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
$html.="<h2><p align='center'><I>Incapacidad Médica</p></h2>";

$html.="<p align='left'><I>El suscrito médico general Fabio Mejia legalmente autorizado para ejercer la profesión de médico general, con cédula profesional 23424-234242.<br><br>
	
	Certifica:<br><br>
 	Que se le realizó un reconocimiento médico a <B> $nom</B>  en la fecha: <B>$fecha</B>, presentando los siguientes síntomas: <I><B>$sintomas</B><br><br>
 	<I>Por lo que requerirá de reposo y cuidado durante </I>_______ <I>días, apartir de la fecha: <B>$fecha</B>.<br><br>

 	<I>El presente certificado médico es expedido a petición de <B> $nom</B>, para lo que él le convenga.

 	</p><br><br>";

$html.="<p align='center'><B><I>F.&nbsp; _________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Sello:____________________________<br>";
$html.="<p align='center'><B><I>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dr.Mejia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Consultorio Clínico ITCA_FEPADE <br><br>";
$html.="<hr>";



$pdf->WriteHTML($html);
$pdf->Output();
exit;
}
?>