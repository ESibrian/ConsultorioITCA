
<?php
session_start();
include 'citas/DAOCitas.php';
if (isset($_SESSION["user"])) {
	



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	 <style type="text/css">
 body{
    background: url(imagenes/secre.jpg) no-repeat fixed center center;
    background-size: cover;

  }
</style>
	<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
	<title>Secretaria</title>
</head>
<body>
	<table width="100%">
		<tr>
			<th>
	
	

<?php
	if ($_SESSION["user"]["nivel"]==1) {
		header("location:citas/vistaCitasD.php");

		}else if ($_SESSION["user"]["nivel"]==2) {
			header("location:citas/vistaSecre.php");

		}
		

	

	$dao= new DAOCitas();

	echo $dao->seleccionarD();



	?>

	


</body>
</html>

<?php
}else{
	header("location:login/login.php");
}
?>



