<?php

include "mpdf/mpdf.php";
include 'DAODiagnosticos.php';

if (isset($_REQUEST["nombre"])&&($_REQUEST["fecha"])) {
	$nom=$_REQUEST["nombre"];
	$fecha=$_REQUEST["fecha"];
	

$pdf=new mPDF('c');
$dao= new DAODiagnosticos();


$html.="<p align='left'><B><I>Consultorio Clínico ITCA_FEPADE</B><br>";
$html.="<B><I>Dirección: </B><I>Santa Tecla, La Libertad<br>";
$html.="<B><I>Tel: </B> 2298-1213</p>";
$html.="<hr>";
$html.="<h2><p align='center'><I>Constancia Médica</p></h2>";

$html.="<p align='left'><I>El suscrito médico general Fabio Mejia legalmente autorizado para ejercer la profesión de médico general, con cédula profesional 23424-234242.<br><br>
	
	Certifica:<br><br>
 	Que se le realizó un reconocimiento médico a <B> $nom</B>  en la fecha: <B>$fecha</B>, no viendo la necesidad de incapacitar al paciente.<br><br>
 	El presente certificado médico es expedido a petición de <B> $nom</B>, para lo que él le convenga.

 	</p><br><br>";

$html.="<p align='center'><B><I>F.&nbsp; _________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Sello:____________________________<br>";
$html.="<p align='center'><B><I>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dr.Mejia&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B><I>Consultorio Clínico ITCA_FEPADE <br><br>";
$html.="<hr>";






$pdf->WriteHTML($html);
$pdf->Output();
exit;
}
?>