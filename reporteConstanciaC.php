<?php

include "mpdf/mpdf.php";
include 'DAOCitas.php';

if (isset($_REQUEST["Nombre"])&&($_REQUEST["fecha"])) {
	$nom=$_REQUEST["Nombre"];
	$fecha=$_REQUEST["fecha"];

	
	

$pdf=new mPDF('c');
$dao= new DAOCitas();

//$html="<title>Generar Receta</title>";
//$html.="<link rel='icon' type='image/png' href='../imagenes/descrip.png'/>";

$html.="<p align='left'><B><I>Consultorio Clínico ITCA_FEPADE 
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Fecha:</B><I> &nbsp; $fecha
<br>";

$html.="<B><I>Dirección: </B><I>Santa Tecla, La Libertad<br>";
$html.="<B>Tel: </B> 2298-1213</p>";
$html.="<hr>";
$html.="<h2><p align='center'><I>Constancia de Cita  Médica</p></h2>";

$html.="<p align='left'><I>El suscrito médico general Fabio Mejia legalmente autorizado para ejercer la profesión de médico general, con cédula profesional 23424-234242.<br><br>
	
	Certifica:<br><br>
 	Que el paciente <B> $nom</B>  tendrá que presentarse a la realización de su cita en la fecha <B>$fecha</B>.<br><br>

 	<I>La presente constancia es expedida a petición de <B> $nom</B>, para lo que él le convenga.

 	</p><br><br>";

$html.="<p align='center'><B><I>F.&nbsp; _________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Sello:____________________________<br>";
$html.="<p align='center'><B><I>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dr.Mejia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Consultorio Clínico ITCA_FEPADE <br><br>";
$html.="<hr>";



$pdf->WriteHTML($html);
$pdf->Output();
exit;
}
?>