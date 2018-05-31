<?php
session_start();
include '../credenciales.php';

if (isset($_REQUEST["btnIngresar"])) {
	$usuario=$_REQUEST["txtUsuario"];
	$contra=$_REQUEST["txtContra"];
	$cont=1;

	

	try {

		$con=new mysqli(SERVIDOR,USUARIO,CONTRA,BD);
		$sql="select Nombre, Apellido,nivel_acc from Roles where Username='$usuario' and Pass='$contra'";
		$resultado=$con->query($sql);
		$cant=mysqli_num_rows($resultado);

		if ($cant==1) {
			while ($fila=$resultado->fetch_assoc()) {
				$nombre=$fila['Nombre'];
				$apellido=$fila['Apellido'];
				$nivel=$fila['nivel_acc'];
			}
			$_SESSION["user"]["nombre"]=$nombre;
			$_SESSION["user"]["apellido"]=$apellido;
			$_SESSION["user"]["nivel"]=$nivel;

		if ($_SESSION["user"]["nivel"]==1) {
		header("location:../citas/vistaCitasD.php");

		}else  {
			header("location:../citas/vistaSecre.php");

		}
		}else{
			$cont++;
			if ($cont<=3) {
				echo"<script>alert('Datos Incorrectos')</script>";
			echo"<script language='javascript'>window.location='login.php'</script>";
			}else{
			echo "<script>alert('Datosfsfd')</script>";
			}

			
		}		
	} catch (Exception $e) {
		
	}
}
else{
	header("location:login.php");
}

if (isset($_REQUEST["cerrar"])) {
	session_destroy();
	header("location:login.php");
}


?>