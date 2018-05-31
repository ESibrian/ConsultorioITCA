<?php
session_start();
include 'DAOCitas.php';
if (isset($_SESSION["user"])) {
	



?>


<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="../imagenes/calendar.png"/>
	<meta charset="utf-8">
	 <style type="text/css">
 body{
    background: url(../imagenes/fondo.jpg) no-repeat fixed center center;
    background-size: cover;

  }
</style>
	<link rel="stylesheet" href="../boostrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
	<title>Secretaria</title>
</head>
<body>
	<table width="100%">
		<tr>
			<th>
				<center>
		<h1><font color="black">Bienvenido Secretario(a): <B><?php echo $_SESSION["user"]["nombre"];?>&nbsp;<?php echo $_SESSION["user"]["apellido"]; ?></font></h1>
		</th>
	<th >	<center>
		<h1><font color="blue">Acciones a realizar</font></h1>
			<a href="../paciente/vistaPaciente2.php"><button class="btn btn-danger">Registrar Pacientes</button></a>
		<a href="vistaCitas2.php"><button class="btn btn-danger">Registrar citas</button></a>
	</th>

	<th>
	<a href="../login/acceso.php?cerrar=true"><button class="btn btn-success">Cerrar sesion</button></a>
	
	
</p>
</th>
</tr>


</table>
<center>
	<br><br><br>
	<h1><font color="red">Listado de citas a ejecutarse este día</font></h1><br>
<table width="1000">
	<tr>
		<th><center>

	<?php

	$dao= new DAOCitas();

	echo $dao->seleccionarSe();



	?>

</th>
</tr>
	</table>
</body>
</html>

<?php
}else{
	header("location:login/login.php");
}
?>
